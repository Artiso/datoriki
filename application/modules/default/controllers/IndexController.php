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
       $this->view->headTitle('Sākums', 'PREPEND');
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
        //$addTopocModel= new Model_Addtopic();
        //$this->load->Model_Addtopic();
        //$addTopicModel->getSomeData();
        
        //$this->view->form = $this->getForm('topic');
        $form = new Form_Thread();
        $form->submit->setLabel('addtopic');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $threadTitle = $form->getValue('threadTitle');
                $threadText = $form->getValue('threadText');
                // ŠO IR JĀIZVEIDO: http://akrabat.com/wp-content/uploads/Getting-Started-with-Zend-Framework.pdf
                $posts = new Application_Model_DbTable_Entries();
                $posts->addEntry($threadTitle, $threadTitle);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }   
    }
    
    public function councilacademicAction()
    {
    	
    }
}

