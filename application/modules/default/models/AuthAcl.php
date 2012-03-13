<?php
class Model_AuthAcl extends Zend_Acl
{
    public function __construct ()
    {
        $this->addRole(new Zend_Acl_Role('guest')); // not authenicated
        $this->addRole(new Zend_Acl_Role('user'), 'guest'); // not authenicated
        $this->addRole(new Zend_Acl_Role('editor'), 'user'); // authenticated as member inherit guest privilages

        $this->addRole(new Zend_Acl_Role('admin'), 'editor'); // authenticated as admin inherit member privilages
        // define Resources
        $this->add(new Zend_Acl_Resource('default'))
            ->add(new Zend_Acl_Resource('default:authentication'), 'default')
            ->add(new Zend_Acl_Resource('default:index'), 'default')
            ->add(new Zend_Acl_Resource('default:error'), 'default')
            ->add(new Zend_Acl_Resource('default:js'), 'default')
            ->add(new Zend_Acl_Resource('default:css'), 'default');

        $this->allow('guest', 'default:index', 'index');
        $this->allow('guest', 'default:js', 'index');
        $this->allow('guest', 'default:css', 'index');
        $this->allow('guest', 'default:index', 'visits');
        $this->allow('guest', 'default:authentication', array('login', 'logout'));
        $this->allow('guest', 'default:error', 'error');

        $this->allow('admin');

    }
}
