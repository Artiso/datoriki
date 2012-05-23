<?php
    class Model_Sections extends Zend_Db_Table_Abstract
    {
        protected $_name = 'sections';
        
        public function getSectionList($direction="")
        {
            $query = $this->select()->from($this->_name)->order('section_id'.$direction);
            $result = $this->fetchAll($query);
            return $result;
        }
    }
?>