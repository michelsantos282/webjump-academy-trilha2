<?php
/*
 * PHP version 7
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\Data;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Webjump\HelloWorld\Api\Data\PetInterface;
use Webjump\HelloWOrld\Model\ResourceModel\Pet as ResourcePet;

/**
 * Class Pet
 */
class Pet extends AbstractModel implements PetInterface
{
    protected $_eventPrefix = 'pet_table';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourcePet::class);
    }

    /**
     * @param Context $context
     * @param Registry $registry
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection, $data
        );
    }

    /**
     * @return int
     */
    public function getPetId(): int
    {
        return (int) $this->getData(self::PET_ID);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setPetId(int $id)
    {
       $this->setData(self::PET_ID, $id);
       return $this;
    }


    /**
     * @return int
     */
    public function getOwnerId(): int
    {
        return (int) $this->getData(self::OWNER_ID);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setOwnerId(int $id)
    {
        $this->setData(self::OWNER_ID, $id);
        return $this;
    }

    /**
     * @return string
     */
    public function getPetName(): string
    {
        return (string) $this->getData(self::PET_NAME);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setPetName(string $name)
    {
        $this->setData(self::PET_NAME, $name);
        return $this;
    }

    /**
     * @return string
     */
    public function getPetOwner(): string
    {
        return (string) $this->getData(self::PET_OWNER);
    }

    /**
     * @param string $owner
     * @return $this
     */
    public function setPetOwner(string $owner)
    {
        $this->setData(self::PET_OWNER, $owner);
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return (string) $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setCreatedAt(string $date)
    {
        $this->setData(self::CREATED_AT, $date);
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerTelephone(): string
    {
        return (string) $this->getData(self::OWNER_TELEPHONE);
    }

    /**
     * @param string $telephone
     * @return $this
     */
    public function setOwnerTelephone(string $telephone)
    {
        $this->setData(self::OWNER_TELEPHONE, $telephone);
        return $this;
    }
}
