<?php
    
    class Form_Thread extends Zend_Form
    {
        public function init()
        {
            $this->setName('Thread');
            $this->setMethod('post');
            
            $id = new Zend_Form_Element_Hidden('id');
            $id->addFilter('Int');
         
            /*/$sections = $this->createElement("select","sections");
            $sections ->setLabel("Foruma sadaļa")
                      ->addMultiOptions(array(
                            "1" => "DF SP jaunumi un ziņas",
                            "2" => "DF SP pasākumi"
                      ));*/
                    
            $sections = new Model_Topics();
            $sectionList = $sections->getSectionList();
            $section = new Zend_form_Element_Select('sections');
            $section->setLabel("Sadaļa, kurā publicēt")
                    ->addMultiOptions($sectionList);
            
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
        }
    }

?>
