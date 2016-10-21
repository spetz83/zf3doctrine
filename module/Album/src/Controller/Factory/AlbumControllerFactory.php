<?php
////////////////////
//
// Copyright 2014-2016. Quantum Corporation. All Rights Reserved.
// StorNext is either a trademark or registered trademark of
// Quantum Corporation in the US and/or other countries.
//
////////////////////

namespace Album\Controller\Factory;


use Album\Controller\AlbumController;
use Album\Model\Album;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class AlbumControllerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('Doctrine\ORM\EntityManager');
        $albumRepo = $entityManager->getRepository(Album::class);

        return new AlbumController($albumRepo);
    }
}