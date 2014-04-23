<?php
/**
 * language.php 后台内容模型模型类
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-17
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Model extends App_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'models';
    }

    public function getContentModelTableName($table)
    {
        return 'contents_'.$table.'_data';
    }

    public function getDefaultColumns()
    {
        $defaultColumns = array(
            'content_id' => array (
                'name' => '内容ID',
                'alias' => 'content_id',
                'type' => 'int',
                'value' => '',
                'width' => '',
                'height' => '',
                'tips' => '',
                'pattern' => '',
                'error_tips' => '',
                'sort_order' => 0,
                'required' => 0,
                'is_system' => 1,
                'status' => 1,
                'attr' => array (
                  'type' => 'int',
				  'unsigned' => TRUE,
                  'null' => FALSE,
                  'auto_increment' => FALSE,
                ),
            ),
            'content' => array (
                'name' => '内容',
                'alias' => 'content',
                'type' => 'editor',
                'value' => '',
                'width' => '',
                'height' => '',
                'tips' => '',
                'pattern' => '',
                'error_tips' => '',
                'sort_order' => 0,
                'required' => 0,
                'is_system' => 1,
                'status' => 1,
                'attr' => array (
                  'toolbar' => 'full',
                  'remote_image' => 0,
                ),
            ),
        );

        return $defaultColumns;
    }
	
	public function getExtraColumns($model)
	{
		$where = array('alias' => $model);
        $modelResult = $this->getOne($where);
		$fields = unserialize($modelResult['fields']);
        $defaultColumns = $this->getDefaultColumns();
        $fields = array_diff_key($fields, $defaultColumns); //移除默认字段
		$fields = ArrayConvert::multiSortArray($fields, array('sort_order' => 'asc'));
		
		return $fields;
	}

    public function createTable($tableName)
    {
        if (empty($tableName)) return false;
		$columns = array();
        $tableName = $this->getContentModelTableName($tableName);
		
		$defaultColumns = $this->getDefaultColumns();
		foreach ($defaultColumns as $k => $v)
		{
			$columns[$k] = $this->convertColumn($v);
		}
        
        $structureData = array(
            'columns' => $columns,
            'primary_keys' => array('content_id'),
            'engine' => 'MyISAM',
            'charset' => $this->config['charset'],
        );
        $table = self::$instances['Table']->reset()->table($tableName)->structure($structureData);
        $result = $this->db->create()->table($table)->query();

        return $result;
    }

    public function dropTable($tableName)
    {
        if (empty($tableName)) return false;
        $tableName = $this->getContentModelTableName($tableName);
        
        $table = self::$instances['Table']->reset()->table($tableName);
        $result = $this->db->drop()->table($table)->query();

        return $result;
    }

    public function addColumn($tableName, array $data)
    {
        if (empty($tableName)) return false;
        $tableName = $this->getContentModelTableName($tableName);
		
		//检测字段是否存在
		if ($this->existsColumn($tableName, $data['alias'])) return false;
        
        $column = array(
            $data['alias'] => $this->convertColumn($data)
        );
        $structureData = array(
            'alter_type' => 'ADD',
            'columns' => $column,
            'after_column' => '',
        );

        $table = self::$instances['Table']->reset()->table($tableName)->structure($structureData);
        $result = $this->db->alter()->table($table)->query();

        return $result;
    }
	
	public function changeColumn($tableName, array $data)
	{
		if (empty($tableName)) return false;
        $tableName = $this->getContentModelTableName($tableName);
		
		//检测字段是否存在
		if (!$this->existsColumn($tableName, $data['alias'])) return false;
		
		$columnData = $this->convertColumn($data);
		$columnData['name'] = $data['alias'];
        $column = array(
            $data['alias'] => $columnData
        );
        $structureData = array(
            'alter_type' => 'CHANGE',
            'columns' => $column,
            'after_column' => '',
        );

        $table = self::$instances['Table']->reset()->table($tableName)->structure($structureData);
        $result = $this->db->alter()->table($table)->query();

        return $result;
	}
	
	public function dropColumn($tableName, $field)
	{
		if (empty($tableName)) return false;
        $tableName = $this->getContentModelTableName($tableName);
		
		//检测字段是否存在
		if (!$this->existsColumn($tableName, $field)) return false;

        $structureData = array(
            'alter_type' => 'DROP',
            'columns' => $field,
            'after_column' => '',
        );

        $table = self::$instances['Table']->reset()->table($tableName)->structure($structureData);
        $result = $this->db->alter()->table($table)->query();

        return $result;
	}
	
	public function convertColumn(array $data)
	{
		$columnInfo = array();
		$intArray = array('tinyint' => 3, 'smallint' => 5, 'mediumint' => 8, 'int' => 10);
		
		$type = $data['type']; 
		!empty($data['value']) && $columnInfo['default'] = $data['value'];
		isset($data['attr']['unsigned']) && $columnInfo['unsigned'] = $data['unsigned'];
		isset($data['attr']['auto_increment']) && $columnInfo['auto_increment'] = $data['auto_increment'];
		isset($data['attr']['null']) && $columnInfo['null'] = $data['null'];
		
		if ($type == 'int')
		{
			if (isset($data['attr']['type']))
			{
				$columnInfo['type'] = $data['attr']['type'];
				$columnInfo['constraint'] = $intArray[$data['attr']['type']];
			}
			else
			{
				$columnInfo['type'] = 'int';
				$columnInfo['constraint'] = 10;
				$columnInfo['unsigned'] = TRUE;
			}
		}
		elseif ($type == 'number')
		{	
			$columnInfo['type'] = 'decimal';
			if (isset($data['attr']['decimaldigits']))
			{
				if ($data['attr']['decimaldigits'] == -1)
				{
					$columnInfo['type'] = 'float';
				}
				else 
				{
					$length = isset($data['attr']['max']) ? strlen($data['attr']['max']) + intval($data['attr']['decimaldigits']) : 10;
					$columnInfo['constraint'] = array($length, intval($data['attr']['decimaldigits']));
				}
			}
			else
			{
				$columnInfo['constraint'] = array(10, 0);
			}
		}	
		elseif ($type == 'box')
		{
			if (isset($data['attr']['fieldtype']) && array_key_exists($data['attr']['fieldtype'], $intArray))
			{
				$columnInfo['type'] = $data['attr']['fieldtype'];
				$columnInfo['constraint'] = $intArray[$data['attr']['fieldtype']];
			}
			else
			{
				$columnInfo['type'] = 'varchar';
				$columnInfo['constraint'] = 255;
			}
		}
		elseif ($type == 'datetime')
		{
			$columnInfo['type'] = 'datetime';	
		}
		elseif ($type == 'editor')
		{
			$columnInfo['type'] = 'text';
		}
		else
		{
			$columnInfo['type'] = 'varchar';
			$columnInfo['constraint'] = 255;
			if (isset($data['type']['max']) && $data['type']['max'] < 255 && $data['type']['max'] > 0) 
				$columnInfo['constraint'] = intval($data['type']['max']);
			$type == 'colorpicker' && $columnInfo['constraint'] = 7;
		}
		
		return $columnInfo;
	}
	
	public function existsColumn($tableName, $field)
	{
		if (empty($tableName)) return false;
		
		$tableName = $this->db->getPrefix().$tableName;
		$result = $this->db->query("show columns from ".$tableName);
		$rows = $result->result();
		$rows = ArrayConvert::resetArrayKey($rows, 'Field');
		
		if (isset($rows[$field]))
		{
			return true;
		}
		
		return false;
	}
}