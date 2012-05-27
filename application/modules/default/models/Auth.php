<?php
 
class Model_Auth {

    public function getAuthAdapter(){

        $authAdapter = new Zend_Auth_Adapter_DbTable(
                Zend_Db_Table::getDefaultAdapter());
                $authAdapter->setTableName('users')->setIdentityColumn(
               'username')->setCredentialColumn('password')->setCredentialTreatment('MD5(?)');
                return $authAdapter;
    }
    
    public function getusernameAction() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $user = $auth->getIdentity();
            $username = $user->username;
            return $username;
        }
    }
}
