<?php

class IndexController extends JP_Controller_Action
{

    public function init()
    {
    	// N.B. Šis ir priekš breadcrumbs
        //$uri = $this->_request->getPathInfo();
        //$die($uri);
        //$activeNav = $this->view->nav()->findByUri($uri);
        //$activeNav->active = true;
        //require_once('Zend/Loader/Autoloader.php');
        //$autoloader = Zend_Loader_Autoloader::getInstance();
    }

    public function indexAction()
    {
        // Adds a title to the page
        $this->view->headTitle('Sākums', 'PREPEND');
        
        //$entries = new DbTable_Entries();
        //$this->view->entries = $entries->fetchAll();
    }

    public function viewProfileAction()
    {
    	
    }

    public function viewMessagesAction()
    {
    	 
    }
    
    public function searchAction()
    {
    	 
    }
    
    // Topic entries with forms.xml
    /*public function getForm($myForm)
    {
        $config = new Zend_Config_Xml('/configs/forms.xml', 'localhost');
        $form = new Zend_Form($config->user->$myForm);
        return $form;
    }*/
    
    function addtopicAction()
    {  
        // AddTopic model call
        $addTopicModel = new Model_Addtopic();
        $addTopicModel->newTopicForm();
        
        $form = new Form_Thread();
        $form->submit->setLabel('Izveidot');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $entry_topic = $form->getValue('entry_topic');
                $entry_text = $form->getValue('entry_text');
                $posts = new Model_Entries();
                $posts->addEntry($entry_topic, $entry_text);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
        
    }
    
    public function councilacademicAction()
    {
        $this->view->headTitle('Akadēmiskā komisija', 'PREPEND');
        
    }
    
}

