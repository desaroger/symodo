<?php

namespace App\Document\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints as Assert;

trait SerializableTrait
{
    protected static $serializer;
    protected static $propertyAccessor;

    public function __construct(array $data = [])
    {
        $this->populate($data);
    }

    public function get(string $path, $default = null)
    {
        try {
            return self::_getPropertyAccessor()->getValue($this, $path);
        } catch (NoSuchPropertyException $e) {
            return $default;
        }
    }

    public function populate(array $array)
    {
        $this->_populate($array);
    }

    public function _populate(array $array)
    {
        self::_getSerializer()->denormalize($array, static::class, null, [
            'object_to_populate' => $this
        ]);
    }

    public function toArray()
    {
        return self::_getSerializer()->normalize($this);
    }

    public function toJson()
    {
        return self::_getSerializer()->serialize($this, 'json');
    }

    public static function instantiateArray(array $array)
    {
        return self::_buildSerializer()->denormalize($array, static::class . '[]');
    }

    protected static function _getSerializer()
    {
        return self::$serializer ?: self::$serializer = self::_buildSerializer();
    }

    protected static function _buildSerializer()
    {
        $normalizers = [new ObjectNormalizer(), new ArrayDenormalizer()];
        $encoders = [new JsonEncoder()];
        return new Serializer($normalizers, $encoders);
    }

    protected static function _getPropertyAccessor()
    {
        return self::$propertyAccessor ?: self::$propertyAccessor = PropertyAccess::createPropertyAccessor();
    }
}