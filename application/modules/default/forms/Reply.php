<?php
    
    class Form_Reply extends Zend_Form
    {
        public function __construct()
        {
            parent::__construct(null);
            $this->setName('Reply');
            $this->setMethod('post');
            
            $id = new Zend_Form_Element_Hidden('id');
            $id->addFilter('Int');
            
            $reply_text = new Zend_Form_Element_Textarea('reply_text');
            $reply_text->setLabel('Atbildes teksts')
                ->setAttrib('cols', '100')
                ->setAttrib('rows', '20')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
            
            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setAttrib('id', 'submitbutton')
                   ->setLabel('Pievienot atbildi');
                       
            $this->addElements(array($reply_text, $submit));
        }
    }

?>
