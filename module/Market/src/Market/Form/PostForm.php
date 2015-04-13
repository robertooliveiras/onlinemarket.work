<?php
namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Date;
use Zend\Form\Element\Email	;

class PostForm extends Form 
{
    
    private $categories;
    
    /**
     * 
     * @param field_type $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;        
    }
    
    /**
     * Constroi o formulário
     */
    public function buildForm()
    {
        $this->setAttribute("method", "POST");
        
        $category = new Select('category');
        $category->setLabel("Category")
                 ->setValueOptions(
                        array_combine($this->categories, $this->categories)
                     );
        
        //Zend\Form\Element\Text
        $title = new Text('title');
        $title->setLabel("Title")
              ->setAttributes(array('size'=>55, 'maxLength'=>128));
        

        $photoFilename = new Textarea('photo_filename');
        $photoFilename->setLabel("Photo Filename")
        ->setAttributes(array('rows'=>4, 'cols'=>80, 'maxLength'=>1024));
        
        $price = new Text('price');
        $price->setLabel("Price")
        ->setAttributes(array('size'=>16, 'maxLength'=>16));
        
        $dateCreated = new Date('date_created');
        $dateCreated->setLabel("Date Created")
              ->setAttributes(array('size'=>20, 'maxLength'=>10));
        
        $dateExpires = new Date('date_expires');
        $dateExpires->setLabel("Date Expires")
              ->setAttributes(array('size'=>20, 'maxLength'=>10));
        
        $descripton = new Textarea('descripton');
        $descripton->setLabel("Descripton")
              ->setAttributes(array('rows'=>4, 'cols'=>80, 'maxLength'=>4096));
        
        
        $contactName = new Text('contact_name');
        $contactName->setLabel("Contact Name")
              ->setAttributes(array('size'=>40, 'maxLength'=>255));
        
        $contactEmail = new Email('contact_email');
        $contactEmail->setLabel("Contact Email")
              ->setAttributes(array('size'=>40, 'maxLength'=>255));
        
        $contactPhone = new Text('contact_phone');
        $contactPhone->setLabel("Contact Phone")
              ->setAttributes(array('size'=>20, 'maxLength'=>32));
        
        $city = new Text('city');
        $city->setLabel("City")
              ->setAttributes(array('size'=>40, 'maxLength'=>128));
        
        $country = new Text('country');
        $country->setLabel("Country")
              ->setAttributes(array('size'=>2, 'maxLength'=>2));
        
//         $deleteCode = new Text('delete_code');
//         $deleteCode->setLabel("Delete Code")
//               ->setAttributes(array('size'=>30, 'maxLength'=>16));
        
        $submit = new Submit('submit');                
        $submit->setAttribute('value', 'Post');
        
        $this->add($category)
             ->add($title)
             ->add($dateCreated)
             ->add($dateExpires)
             ->add($descripton)
             ->add($photoFilename)
             ->add($contactName)
             ->add($contactPhone)
             ->add($contactEmail)
             ->add($city)
             ->add($country)
             ->add($price)
//              ->add($deleteCode)
             ->add($submit);
    }
}