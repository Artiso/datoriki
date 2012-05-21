<?php
    
    class Form_Thread extends Zend_Form
    {
        public function init()
        {
            $this->setName('Thread');
            $this->setMethod('post');
            
            $id = new Zend_Form_Element_Hidden('id');
            $id->addFilter('Int');
         
            /*$sections = new Model_Sections();
            $section_list = $sections->getSectionList();
            $sectionSelection = new Zend_Form_Element_Select('section');
            $sectionSelection->setLabel('Sadaļas:')
                             ->addMultiOptions($section_list);*/
            
            /*$form=new Zend_Form();
            $dropdown= new Zend_Form_Element_Select("dropdown");
            $dropdown->setLabel("Country:");
            $dropdown->setMultiOptions(array($recordset)); // $recordset is collection of record which is from database
            $form->addElement($dropdown);*/
            
            
            /*$form = new Zend_Form();
            $form->addElement('select', '', array(
                'multiOptions' => array('' => '', '' => '', '' => '', '' => '')
            ));
            $select = $form->getElement('');
            $select->setValue('');*/
            
            /* create the element, then add options, validation, and filters
            $form->addElement('textarea', 'address');
            $form->address->setLabel('Address:')
                                   ->setOptions(array('class' => 'tAreaStyles'))
                                   ->setRequired(false)
                                   ->addValidator('stringLength', true, array(0, 250))
                                   ->addFilter('StripTags');*/
            
            
            
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

    class Form_Dropdown extends Zend_Form
    {
        public function init()
        {
            $this->addElement(new Form_Element_SectionSelect('section_id'));
        }
    }
?>
