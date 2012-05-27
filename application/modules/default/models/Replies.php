<?php

class Model_Replies extends Zend_Db_Table_Abstract {

    protected $_name = 'replies';

    public function addReply($user_id, $topic_id, $reply_text) {
        $data = array(
            'user_id' => '1',
            'topic_id' => $topic_id,
            'reply_text' => $reply_text,
        );
        return $this->insert($data);
    }

    public function getReply() {
        $entry_id = (int) $id;
        $row = $this->fetchRow('entry_id = ' . $entry_id);
        if (!$row) {
            throw new Exception("Could not find row $entry_id");
        }
        return $row->toArray();
    }

    public function updateReply() {
        $data = array(
            'entry_topic' => $entry_topic,
            'entry_text' => $entry_text,
        );
        $this->update($data, 'entry_id = ' . (int) $entry_id);
    }

    public function deleteReply() {
        $this->delete('entry_id =' . (int) $entry_id);
    }

    public function getAllData() {
        return $this->fetchAll();
    }

    public function fetchTopicId() {

        // Retrieving the parameter added in the link
        $topicId = $_GET['topic_id'];
        return $topicId;
        
    }

}

?>
