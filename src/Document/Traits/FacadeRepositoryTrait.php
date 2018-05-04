<?php

namespace App\Document\Traits;

use App\Util\SymfonyUtil;

trait FacadeRepositoryTrait
{
    /**
     * @return \Doctrine\ODM\MongoDB\DocumentManager
     */
    public static function dm()
    {
        return SymfonyUtil::getDm();
    }

    public static function getRepositoryClass()
    {
        return static::class;
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public static function repository()
    {
        return self::dm()->getRepository(static::getRepositoryClass());
    }

    public static function builder()
    {
        return self::dm()->createQueryBuilder(static::getRepositoryClass());
    }

    public static function find($id)
    {
        return static::repository()->find($id);
    }

    public static function findAll()
    {
        return static::repository()->findAll();
    }

    public static function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return static::repository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    public static function findOneBy(array $criteria)
    {
        return static::repository()->findOneBy($criteria);
    }

    public static function getClassName()
    {
        return static::repository()->getClassName();
    }

}