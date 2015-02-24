<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Navigation\Page\Mvc;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        // escutar / listens: "dispatch" event
        // context: $this
        // handler / callback / metodo: onDispatch()
        // priority / prioridade: 100
        // funciona igual: $eventManager->attach('dispatch' , array($this,'onDispatch') , 100);
        $eventManager->attach(MvcEvent::EVENT_DISPATCH , array($this,'onDispatch') , 100);
    }

    public function onDispatch(MvcEvent $e)
    {
        $sm = $e->getApplication()->getServiceManager();
        $categories = $sm->get("categories");
//      $e->getViewModel()->setVariable("categories", "CATEGORY_LIST");
        $vm = $e->getViewModel();
//      $vm->setVariable("categories", "CATEGORY_LIST");
        $vm->setVariable("categories", $categories);
        
    }
    
//     public function getServiceConfig(){
//         //opção de uso do module.config.php adicionando invokableas ao array service_manager
//         //@todo mais utilizado para função anônima --  
//         return array(
//             'invokables' => array(
//                 //'ExemploService' => 'Application\Service\ExemploService'
//                 //recomenda-se nomear os types do service_manager com o nome nomo do caminho completo
//                 //    para não gerar confusão, pois ExemploService pode estar em vários caminhos,
//                 //    mas dentro de um caminho existe apenas um ExemploService
//                 //   Importante: renomear nas chamadas
//                 'Application\Service\ExemploService' => 'Application\Service\ExemploService'
                
//             )            
//         );
//     }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
