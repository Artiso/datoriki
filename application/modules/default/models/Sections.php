<?php
    class Model_Sections extends Zend_Db_Table_Abstract
    {
        protected $_name = 'sections';
        
        public function init()
        {
            
        }
        
        public function sectionNaming()
        {
           $v1 = $_GET['section_id'];
           
           foreach($this->sections as $sections) :
               $section_id = $this->escape($sections->section_id);
               if ($section_id == $v1)
               {
                   $sectionName = $this->escape($sections->section_name);
                   echo $sectionName;
                   return $sectionName;
               }              
           endforeach;
        }
    }
?>