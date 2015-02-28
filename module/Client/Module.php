<?php
namespace Client;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        //o autoloadclassmap deve ser rodado 
        //com ele melhora-se a performance, pois 
        //o standardautoloader procura por tudo
        //enquanto o autoloadclassmap vai direto
        //para isso, ou vc deve criar o arquivo autoload_classmap.php
        //e preenche-lo com os detalhes, ou
        //você pode abrir o terminal, colocar o cursor na 
        //pasta do módulo e executar o comando
        //php ../../vendor/zendeframework/zendframework/bin/classmap_generator.php
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );
    }
}
