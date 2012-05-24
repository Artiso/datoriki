<?php

class IndexController extends JP_Controller_Action {

    public function init() {
        // With the help of Zend Autoloader, the information for the breadcrumbs is retrieved
        $uri = $this->_request->getPathInfo();
        //$die($uri);
        //$activeNav = $this->view->nav()->findByUri($uri);
        $activeNav->active = true;
        require_once('Zend/Loader/Autoloader.php');
        $autoloader = Zend_Loader_Autoloader::getInstance();
    }

    public function indexAction() {
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

    public function viewprofileAction() {
        // With the help of Zend Autoloader the necessary view is called upon
    }

    public function viewMessagesAction() {
        // With the help of Zend Autoloader the necessary view is called upon    	 
    }

    public function searchAction() {
        // With the help of Zend Autoloader the necessary view is called upon    	 
    }

    // Function for adding topics
    function addtopicAction() {
        // Model for undersection displaying is called upon
        $undersectionList = new Model_Undersections();

        // Form for new topic creation is called upon
        $form = new Form_Thread($undersectionList->getUndersectionList());
        $this->view->form = $form;

        // If the data in the form is entered corectly it is saved in the database
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $undersection_id = $form->getValue('undersection');
                $entry_topic = $form->getValue('entry_topic');
                $entry_text = $form->getValue('entry_text');
                $posts = new Model_Entries();
                $posts->addEntry($undersection_id, $entry_topic, $entry_text);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    // Function that calls for the topic view
    public function topicviewAction() {
        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
    }

    // Function that calls for the sections to be displayed
    public function sectionAction() {
        $sections = new Model_Sections();
        $this->view->sections = $sections->fetchAll();

        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->getAllData();

        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
    }

    // Function that calls for the undersections to be displayed
    public function undersectionAction() {
        $sections = new Model_Sections();
        $this->view->sections = $sections->fetchAll();

        $undersections = new Model_Undersections();
        $this->view->undersections = $undersections->getAllData();

        $entries = new Model_Entries();
        $this->view->entries = $entries->getAllData();
    }

}
?>