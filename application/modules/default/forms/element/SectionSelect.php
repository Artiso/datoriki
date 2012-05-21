<?php

class Form_Element_SectionSelect extends Zend_Form_Element_Select 
{
    public function init()
    {
        $oSectionTb = new Application_Model_Country();
        $this->addMultiOption(0, 'Lūdzu, izvēlaties..');
        foreach ($oSection->fetchAll() as $oSection) {
            $this->addMultiOption($oSection['id'], $oSection['name']);
        }
    }
}

?>
