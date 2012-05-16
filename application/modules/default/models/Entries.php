<?php
    class Model_Entries extends Zend_Db_Table_Abstract
    {
        protected $_name = 'entries';
        
        public function addEntry ($section_id, $entry_topic, $entry_text)
        {
            $data = array(
              'section_id' => 1, // $section_id
              'entry_topic' => $entry_topic,
              'entry_text' => $entry_text,
            );
            $this->insert($data);
        }
        
        public function getEntry ()
        {
            $entry_id = (int)$id;
            $row = $this->fetchRow('entry_id = ' . $entry_id);
            if (!$row) {
            throw new Exception("Could not find row $entry_id");
            }
            return $row->toArray();
        }
        
        public function updateEntry ()
        {
            $data = array(
            'entry_topic' => $entry_topic,
            'entry_text' => $entry_text,
            );
            $this->update($data, 'entry_id = '. (int)$entry_id);
        }
        
        public function deleteEntry ()
        {
            $this->delete('entry_id =' . (int)$entry_id);
        }
    }
?>
