<?php
/**
 *
 * @package Authentication
 * @subpackage Front
 */
/**
 * Allows for the authentication of users credentials. Without authentication, admin section cannot be accessed.
 * @package Authentication
 * @subpackage Front
 */
class AuthenticationController extends JP_Controller_Action
{
    public $userModel;
    public $authmodel;

    public function init()
    {
        $this->authModel = new Model_Auth();
    }

    public function indexAction()
    {
        $this->_forward('login');
    }
    public function loginAction()
    {
        $this->view->title = 'Login';
        if (Zend_Auth::getInstance()->hasIdentity()) {
            // $role = Zend_Registry::get('role');
            $this->_redirect('/');
        }

        $redirectUri = APP_DOMAIN . '/authentication/login/';
$this->_redirect($redirectUri);
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }
}





