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
        // Retrieves the necessary data from the database
        $select = $sections->select()->from('sections')->order('section_id ASC');
        // Passes the retrieved data to the section view
        $this->view->sections = $sections->fetchAll($select);
        
        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->fetchAll();
        
        $entries = new Model_Entries();
        $this->view->entries = $entries->fetchAll();
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
    
    // Topic entries with forms.xml
    /*public function getForm($myForm)
    {
        $config = new Zend_Config_Xml('/configs/forms.xml', 'localhost');
        $form = new Zend_Form($config->user->$myForm);
        return $form;
    }*/
    
    function addtopicAction()
    {  
        //$addTopicModel = new Model_Topics();
        //$addTopicModel->getSectionList($sections);
        
        /*$db = Zend_Db::factory('mysqli', 'application.ini');
        $db->getConnection();
        Zend_Db_Table::setDefaultAdapter($db);*/
        
        $sectionList = new Model_Sections();
        
        $form = new Form_Thread($sectionList->getSectionList());
        $form->submit->setLabel('Izveidot');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $section_id = $form->getValue('section_id');
                $entry_topic = $form->getValue('entry_topic');
                $entry_text = $form->getValue('entry_text');
                $posts = new Model_Entries();
                $posts->addEntry($section_id, $entry_topic, $entry_text);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
        
    }
    
    public function sectionAction()
    {
        $sections = new Model_Sections();
        //$section_name = $sections->sectionNaming();
        //$this->view->section_name = $section_name;
        $this->view->sections = $sections->fetchAll();
        
        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->fetchAll();
        
        $entries = new Model_Entries();
        $this->view->entries = $entries->fetchAll();
    }
    
    public function undersectionAction()
    {
        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->fetchAll();
        
        $entries = new Model_Entries();
        $this->view->entries = $entries->fetchAll();
    }
    
    /*public function saveentryAction(){
        $saveEntry = new Model_Topics();
        $saveEntry->saveEntry();
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }*/
    
}

