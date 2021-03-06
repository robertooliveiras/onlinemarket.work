<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Market for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	use ListingsTableTrait;
	
    public function indexAction()
    {
        $messages = array("Welcome to the Online Market");
        if($this->flashmessenger()->hasMessages()) {
            $messages = $this->flashmessenger()->getMessages();
        }
        
        $itemRecent = $this->listingsTable->getLatestListings();
        
        return new ViewModel(array('messages'=>$messages,'item'=>$itemRecent));
    }

}
