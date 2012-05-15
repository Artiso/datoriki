<?php
    
    class Form_Thread extends Zend_Form
    {
        public function init()
        {
            $this->setName('Thread');
            $id = new Zend_Form_Element_Hidden('id');
            $id->addFilter('Int');
            $threadTitle = new Zend_Form_Element_Text('threadTitle');
            $threadTitle->setLabel('Tēmas virsraksts')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
            $threadText = new Zend_Form_Element_Text('threadText');
            $threadText->setLabel('Teksts')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setAttrib('id', 'submitbutton');
            $this->addElements(array($id, $threadTitle, $threadText, $submit));
        }
    }
?>
