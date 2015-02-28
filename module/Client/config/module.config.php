<?php
return array(
    'controllers' => array(
        'invokables' => array(
            //registro de serviços do tipo invokables (ServiceManager)
            //esta key ('Client\Controller\Index') pode receber o nome que melhor lhe convier
            //porem a rota deverá ser configurada com a mesma nomenclatura
            //'Client\Controller\Index' => 'Client\Controller\IndexController',
            'client-controller-index' => 'Client\Controller\IndexController',
            //'meuteste' => 'Client\Controller\IndexController',
        )
    ),
    'router' => array(
        'routes' => array(
            'client' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/client',
                    'defaults' => array(
                        //'controller'    => 'Client\Controller\Index',
                        'controller'    => 'client-controller-index',
                        //'controller'    => 'meuteste',
                        'action'        => 'index'
                    )
                ),
                //o may terminate e o child_routes permitem
                //que você personalize os nomes dos controllers (keys) e as rotas do seu módulo
                //passando caminhos específicos até chegar na action
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            )
                        )
                    )
                )
            )
        )
     ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    )
);