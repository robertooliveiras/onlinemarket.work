<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function exemploaAction()
    {
        $nome = "Zend Framework 2 (exemplo a)";
        return new ViewModel(array('nome'=>$nome));
    }
    
    public function exemplobAction()
    {
        // alternativa
        // $arr_view = array('nome' => "Zend Framework 2 (exemplo b)");
        $arr_view = array();
        $arr_view['nome'] = "Zend Framework 2 (exemplo b)";
        return new ViewModel($arr_view);
    }
    
    public function exemplocAction()
    {
        $obj_view = new ViewModel();
        $obj_view->nome = "Zend Framework 2 (exemplo c)";
        return $obj_view;
    }
}
