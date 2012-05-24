<?php
class PostController extends JP_Controller_Action
{
    function addreplyAction()
    {   
        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
        
        $form = new Form_Reply();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $undersection_id = $form->getValue('reply_text');
                $posts = new Model_Entries();
                $posts->addEntry($reply_text);
                
                $this->_helper->redirector('index');
            }
            else
            {
                $form->populate($formData);
            }
        }
    }
}
?>
