<?php
class Model_Mongo extends BC_Model
{
    public $db;
    protected static $instances = array(
        'Table' => null,
        'Condition' => null
    );
    
    public function __construct()
    {
        $this->setDriver('mongo');
        parent::__construct();
        $this->tableName = 'content';

        if (self::$instances['Table'] === null)
        {
            self::$instances['Table'] = new Database_Table();
        }
        
        if (self::$instances['Condition'] === null)
        {
            self::$instances['Condition'] = new Database_Condition();
        }
    }
    
    public function getList(array $where = array())
    {
        $table = self::$instances['Table']->table($this->tableName);
        $condition = self::$instances['Condition']->where($where)->order()->offset(0)->limit(10);

        $result = $this->db->select()->table($table)->condition($condition)->query();
		$rows = $result->result();

        return $rows;
    }
    
    public function insert(array $data, array $options = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName)->values($data);
        $condition = self::$instances['Condition']->reset()->options($options);

        return $this->db->insert()->table($table)->condition($condition)->query()->result();
    }
    
    public function update(array $data, array $where = array(), array $options = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName)->values($data);
        $condition = self::$instances['Condition']->reset()->where($where)->options($options);

        return $this->db->update()->table($table)->condition($condition)->query()->result();
    }
    
    public function delete(array $where = array(), array $options = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName);
        $condition = self::$instances['Condition']->reset()->where($where)->options($options);

        return $this->db->delete()->table($table)->condition($condition)->query()->result();
    }
}