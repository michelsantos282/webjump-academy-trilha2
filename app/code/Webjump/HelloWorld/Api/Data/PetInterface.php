<?php
/*
 * PHP version 7
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

namespace Webjump\HelloWorld\Api\Data;

interface PetInterface
{

    /**
     * Column Names
     */
    const PET_ID = "entity_id";
    const PET_NAME = "pet_name";
    const PET_OWNER = "pet_owner";
    const CREATED_AT = "created_at";
    const OWNER_TELEPHONE = "owner_telephone";
    const OWNER_ID = "owner_id";

    /**
     * Get Pet Id
     * @return int
     */
    public function getPetId(): int;

    /**
     * Set Pet Id
     *
     * @param int $id
     * @return void
     */
    public function setPetId(int $id);

    /**
     * Get Owner Id
     * @return int
     */
    public function getOwnerId(): int;

    /**
     * Set Owner Id
     *
     * @param int $id
     * @return void
     */
    public function setOwnerId(int $id);

    /**
     * Get Pet Name
     * @return string
     */
    public function getPetName(): string;

    /**
     * Set Pet Name
     *
     * @param string $name
     * @return void
     */
    public function setPetName(string $name);

    /**
     * Get Pet Owner
     * @return string
     */
    public function getPetOwner(): string;

    /**
     * Set Pet Owner
     *
     * @param string $owner
     * @return void
     */
    public function setPetOwner(string $owner);

    /**
     * Get Created At
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Set Created At
     *
     * @param string $date
     * @return void
     */
    public function setCreatedAt(string $date);

    /**
     * Get Owner Telephone
     * @return string
     */
    public function getOwnerTelephone(): string;

    /**
     * Set Owner Telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setOwnerTelephone(string $telephone);
}

