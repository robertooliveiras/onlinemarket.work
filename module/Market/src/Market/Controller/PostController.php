<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    public $categories;
    
    public function setCategories(Array $arrCategories)
    {
        $this->categories = $arrCategories;        
    }

    public function indexAction()
    {
        return new ViewModel( array(
                'categories' => $this->categories
            )
        );
    }
}
