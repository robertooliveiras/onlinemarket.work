<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail\Message,
// 	Zend\Mail\Transport\Sendmail as SendMailTransport
	Zend\Mail\Transport\Smtp as SmtpTransport,
	Zend\Mail\Transport\SmtpOptions
;

class PostController extends AbstractActionController {
	use ListingsTableTrait;
	public $categories;
	private $postForm;
	public function setPostForm($postForm) {
		$this->postForm = $postForm;
	}
	public function setCategories(Array $arrCategories) {
		$this->categories = $arrCategories;
	}
	public function indexAction() {
		$data = $this->params ()->fromPost ();
		$viewModel = new ViewModel ( array (
				'postForm' => $this->postForm,
				'data' => $data 
		) );
		$viewModel->setTemplate ( 'market/post/index.phtml' );
		
		if ($this->getRequest ()->isPost ()) {
			if ($this->invalidCount ()) {
				$this->postForm->setData ( $data );
				if ($this->postForm->isValid ()) {
					$this->listingsTable->addPosting ( $this->postForm->getData () );
					$this->sendAMessage("Category: ".$this->postForm->get('category')->getValue() .
										"Title: ".$this->postForm->get('title')->getValue() . 
										"Price: ".$this->postForm->get('price')->getValue());
					$this->flashMessenger ()->addMessage ( "Thanks for posting!" );
					$this->redirect ()->toRoute ( 'home' );
				} else {
					$invalidView = new ViewModel ();
					$invalidView->setTemplate ( "market/post/invalid.phtml" );
					$invalidView->addChild ( $viewModel, 'main' );
					return $invalidView;
				}
			} else {
				$this->flashMessenger ()->addMessage ( "Sessão expirada!" );
				$this->redirect ()->toRoute ( 'home' );
			}
		}
		return $viewModel;
	}
	public function invalidCount() {
		return true;
// 		$appSession = $this->getServiceLocator()->get('application-session');
// 		if (isset ( $appSession->count_post )) {
// 			$appSession->count_post ++;
// 			if ($appSession->count_post > 30) {
// 				var_dump ( $appSession->count_post );
// 				die ();
// 				return false;
// 			} else {
// 				return true;
// 			}
// 		} else {
// 			$appSession->count_post = 1;
// 		}
	}
	
	public function sendAMessage($body,$subject = null){
		if(empty($subject)){
			$subject = 'Novo item do onlinemarket';
		}
// 		$message = new Message();
// 		$message->addTo('robertooliveira2604@gmail.com')
// 				->addFrom('fehsoares@gmail.com')
// 				->setSubject($subject)
// 				->setBody($body);
// 		$transport = new SendMailTransport();
// 		$transport = new SmtpTransport();
// 		$options = new SmtpOptions(array(
// 				'name'				=> 'localhost',
// 				'connection_class'	=> 'login',
// 				'connection_config' => array(
// 						'username' => 'root',
// 						'password' => ''
// 				)
// 		));
		
// 		$transport->setOptions($options);

// 		$transport->send($message);
	}
}
