<?php

namespace App\Document;

use App\Document\Traits\SerializableTrait;
use App\Repository\UserFacadeRepositoryTrait;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @MongoDB\Document
 */
class User extends BaseUser
{
    use UserFacadeRepositoryTrait;
    use SerializableTrait;

    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function isAdmin()
    {
        return $this->hasRole(User::ROLE_ADMIN);
    }
}