<?php
    class Model_Undersections extends Zend_Db_Table_Abstract
    {
        protected $_name = 'undersections';
        
        public function init()
        {
            
        }
        
        public function getAllData(){
            return $this->fetchAll();
        }
        
        public function getUndersectionList($direction="")
        {
            $query = $this->select()->from($this->_name)->order('undersection_id'.$direction);
            $result = $this->fetchAll($query);
            return $result;
        }
    }
?>