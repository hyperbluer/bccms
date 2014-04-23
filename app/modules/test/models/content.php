<?php
class Model_Content extends BC_Model
{
    public $db;
    
    public function __construct() {
        parent::__construct();
        $this->tableName = 'content';
    }
    
    public function getList()
    {
        $tableObject = new Database_Table();
        $table = $tableObject->table($this->tableName);

        $conditionObject = new Database_Condition();
        $condition = $conditionObject->where()->order()->offset(0)->limit(10);

        $result = $this->db->select()->table($table)->condition($condition)->query();
		$rows = $result->result();

        return $rows;
    }
    
    public function insert()
    {
        
    }
    
    public function update()
    {
    }
    
    public function delete()
    {
    }
}
?>
