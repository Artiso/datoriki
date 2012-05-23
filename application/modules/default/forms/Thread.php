<?php
    
    class Form_Thread extends Zend_Form
    {
        public function init($choice = null)
        {
            $sectionSelects = $choice;
            
            $this->setName('Thread');
            $this->setMethod('post');
            
            $id = new Zend_Form_Element_Hidden('id');
            $id->addFilter('Int');
                           
            $section = new Zend_Form_Element_Select('sections');
            $section->setLabel("Sadaļa, kurā publicēt")
                    ->setRequired(true);
            
            /*
             * $this->addElement($typeParent = $this->createElement('select', 'pasakumsCategory')
                     ->setLabel('Pasākuma kategorija')
                     ->setRequired(true));
             */
            
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
            $this->addElements(array($id, $section, $entry_topic, $entry_text, $submit));
            
            if (!is_null($sectionSelects))
            {
                foreach ($sectionSelects as $sectionSelect)
                {
                    $section->addMultiOption($sectionSelect->sectionId,
                                             $sectionSelect->sectionName);
                }
            }
        }
    }

?>
