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
        
        // Calls for the section model
        $sections = new Model_Sections();
        // Passes the retrieved data to the section view
        $this->view->sections = $sections->getSectionList(" ASC");
        
        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->getAllData();
        
        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
    }

    public function viewprofileAction()
    {
    	
    }

    public function viewMessagesAction()
    {
    	 
    }
    
    public function searchAction()
    {
    	 
    }
    
    // Function for adding topics
    function addtopicAction()
    {          
        $undersectionList = new Model_Undersections();
        
        $form = new Form_Thread($undersectionList->getUndersectionList());
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $undersection_id = $form->getValue('undersection');
                $entry_topic = $form->getValue('entry_topic');
                $entry_text = $form->getValue('entry_text');
                $posts = new Model_Entries();
                $posts->addEntry($undersection_id, $entry_topic, $entry_text);
                
                $this->_helper->redirector('index');
            }
            else
            {
                $form->populate($formData);
            }
        }
        
    }
    
    // Function that calls for the topic view
    public function topicviewAction()
    {
        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
    }
    
    public function sectionAction()
    {
        $sections = new Model_Sections();
        $this->view->sections = $sections->fetchAll();
        
        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->getAllData();
        
        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
    }
    
    public function undersectionAction()
    {        
        $sections = new Model_Sections();
        $this->view->sections = $sections->fetchAll();
        
        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->getAllData();
        
        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
    }   
}

