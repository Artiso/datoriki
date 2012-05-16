<?php
    
    class Form_Thread extends Zend_Form
    {
        public function init()
        {
            $this->setName('Thread');
            $id = new Zend_Form_Element_Hidden('id');
            $id->addFilter('Int');
            $entry_topic = new Zend_Form_Element_Text('entry_topic');
            $entry_topic->setLabel('Tēmas virsraksts')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
            $entry_text = new Zend_Form_Element_Text('entry_text');
            $entry_text->setLabel('Teksts')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setAttrib('id', 'submitbutton');
            $this->addElements(array($id, $entry_topic, $entry_text, $submit));
        }
    }
?>
