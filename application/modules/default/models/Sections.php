<?php
    class Model_Sections extends Zend_Db_Table_Abstract
    {
        protected $_name = 'sections';
        
        public function getSectionList()
        {
            /*$query = $this->select()
                           ->from(array('s' => 'sections'),
                                  array('section_id', 'section_name'));*/
            
            //$query = "SELECT section_id, section_name FROM sections";
            
            $query = $this->select()->from('sections')->order('section_id');
            
            $result = $this->fetchAll($query);
            
            print_r($result);
            
            return $result;
        }
    }
?>
