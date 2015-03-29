<?php
namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\Regex;
use Zend\Validator\Date;

class PostFilter extends InputFilter
{
    private $categories;
    
    public function setCategories($categories) 
    {
        $this->categories = $categories;
    }
    
    public function buildFilter() 
    {
    	//category char 16 not null,
        $category = new Input('category');
        	$category->setAllowEmpty(TRUE);
	        $category->getFilterChain()
	                 ->attachByName('StringTrim')
	                 ->attachByName('StripTags')
	                 ->attachByName('StringToLower');
	        $category->getValidatorChain()
	                 ->attachByName('inArray',array('haystack'=>$this->categories));
        
        //title varchar 128 not null
        $title = new Input('title');
        	$title->setAllowEmpty(TRUE);
	        $title->getFilterChain()
	              ->attachByName('StringTrim')
	              ->attachByName('StripTags');
	        
	        $titleRegex = new Regex(array('pattern'=>'/^[a-zA-Z0-9 ]*$/'));
	        $titleRegex->setMessage('Title should contain only numbers, letters or spaces.');
	        
	        $title->getValidatorChain()
	              ->attach($titleRegex)
	              ->attachByName('StringLength',array('min'=>1,'max'=>128));
        
        //date_created timestamp not null default current_timestamp
	    $dateCreated = new Input('dateCreated');
	    $dateCreated->getFilterChain()
	    			->attachByName('StringTrim')
	    			->attachByName('StripTags');
	    $dateCreated->getValidatorChain()
	    			->attachByName('StringLength',array('min'=>10,'max'=>10));
	    
		// 	    date_expires timestamp not null default null
		// 	    descripton varchar 4096 default null
		// 	    photo_filename varchar 1024 default null
		// 	    contact_name varchar 255 default null
		// 	    contact_email varchar 255 default null
		// 	    contact_phone varchar 32 default null
		// 	    city varchar 128 default null
		// 	    country char 2 not null
		// 	    price decimal 12,2 not null
		// 	    delete_code char 16 character set utf8 collate utf8_bin default null
	    
        
        $this->add($category)
             ->add($title)
        	 ->add($dateCreated);
    }
}

?>