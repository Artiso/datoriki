<?php
class PostController extends JP_Controller_Action
{   
    // The PostController's addreplyAction displays the form form adding replies
    // to threads
    function addreplyAction()
    {   
        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
        
        $form = new Form_Reply();
        $this->view->form = $form;
        
        // With this if statement, data is inserted in the database in the case of valid data
        if ($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $reply_text = $form->getValue('reply_text');
                $reply_id = "1";
                $replies = new Model_Replies();
                $replies->addReply($reply_id, $replies->fetchTopicId(), $reply_text);
                //$this->_helper->redirector('index');
                $urlOptions = array('controller'=>'index', 'action'=>'index');
                $this->_helper->redirector->gotoRoute($urlOptions);
            }
            // If there are errors on the page, it is shown again with the data entered and error messages shown
            else
            {
                $form->populate($formData);
            }
        }
    }
}
?>
