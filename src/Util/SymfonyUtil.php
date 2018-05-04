<?php

namespace App\Util;

use Doctrine\ODM\MongoDB\DocumentManager;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;

class SymfonyUtil
{
    /** @var DocumentManager */
    protected static $dm;

    /** @var Container */
    protected static $container;

    /**
     * @param ContainerInterface $container
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function init(ContainerInterface $container)
    {
        self::$container = $container;
        self::$dm = $container->get('doctrine_mongodb')->getManager();
    }

    /**
     * @return DocumentManager
     */
    public static function getDm()
    {
        return self::$dm;
    }

    /**
     * @return Container
     */
    public static function getContainer()
    {
        return self::$container;
    }

    /**
     * @return string[]
     */
    public static function getAvailableRoles()
    {
        $roleHierarchy = self::getContainer()->getParameter('security.role_hierarchy.roles') ?: [];
        $roles = [];
        foreach ($roleHierarchy as $key => $value) {
            $roles[] = $key;
            foreach ($value as $value2) {
                $roles[] = $value2;
            }
        }
        return array_unique($roles);
    }
}