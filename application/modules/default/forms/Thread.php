<?php
    
    class Form_Thread extends Zend_Form
    {
        public function __construct($choice = null)
        {
            $undersectionSelects = $choice;
            parent::__construct(null);
            $this->setName('Thread');
            $this->setMethod('post');
            
            $id = new Zend_Form_Element_Hidden('id');
            $id->addFilter('Int');
                           
            $undersection = new Zend_Form_Element_Select('undersection');
            $undersection->setLabel("Sadaļa, kurā publicēt")
                    ->setRequired(true);
                        
            $entry_topic = new Zend_Form_Element_Text('entry_topic');
            $entry_topic->setLabel('Tēmas virsraksts')
                ->setAttrib('size', '80')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
            
            $entry_text = new Zend_Form_Element_Textarea('entry_text');
            $entry_text->setLabel('Teksts')
                ->setAttrib('cols', '100')
                ->setAttrib('rows', '20')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
            
            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setAttrib('id', 'submitbutton')
                   ->setLabel('Publicēt');
            
            if (!is_null($undersectionSelects))
            {
                foreach ($undersectionSelects as $undersectionSelect)
                {
                    $undersection->addMultiOption($undersectionSelect['undersection_id'],
                                             $undersectionSelect['undersection_name']);
                }
            }
            
            $this->addElements(array($undersection, $entry_topic, $entry_text, $submit));
            
            
        }
    }

?>
