<?php
    class Model_Sections extends Zend_Db_Table_Abstract
    {
        protected $_name = 'sections';
        
        public function init()
        {

        }
        
        public function getSectionList()
        {
            $result = $this->select()->from(array('s' => 'sections'),
                                        array('section_id', 'section_name'));
            
            foreach ($this->sections as $sections) :
                $section_name = $this->escape($undersections->section_name);
                echo $section_name;
            endforeach;
            
            return $result;
        }
    }
?>
