<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostFilter;

class PostFilterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $filter = new PostFilter();
        $filter->setCategories($sm->get('categories'));
        $filter->buildForm();
        
        return $filter;
    }
}
