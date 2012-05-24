<?php
 
class Model_Auth {

    public function getAuthAdapter(){

        $authAdapter = new Zend_Auth_Adapter_DbTable(
                Zend_Db_Table::getDefaultAdapter());
                $authAdapter->setTableName('users')->setIdentityColumn(
               'username')->setCredentialColumn('password')->setCredentialTreatment('MD5(?)');
                return $authAdapter;
    }
}
