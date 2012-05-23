<?php
    class Model_Undersections extends Zend_Db_Table_Abstract
    {
        protected $_name = 'undersections';
        
        public function init()
        {
            
        }
        public function getAll(){
            return $this->fetchAll();
        }
    }
?>