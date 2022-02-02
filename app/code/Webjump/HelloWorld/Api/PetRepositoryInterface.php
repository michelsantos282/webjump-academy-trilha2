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

namespace Webjump\HelloWorld\Api;

use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\State\InputMismatchException;
use Webjump\HelloWorld\Api\Data\PetInterface;
use Webjump\HelloWorld\Api\Data\PetSearchResultsInterface;

interface PetRepositoryInterface
{
    /**
     * Create or update a pet.
     *
     * @param  PetInterface $pet
     * @return PetInterface
     * @throws InputException If bad input is provided
     * @throws InputMismatchException If the provided email is already used
     * @throws LocalizedException
     */
    public function save(PetInterface $pet): PetInterface;

    /**
     * Get pet by pet ID.
     *
     * @param int $petId
     * @return PetInterface
     * @throws NoSuchEntityException If pet with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function getById(int $petId): PetInterface;

    /**
     * Retrieve pets which match a specified criteria.
     *
     * This call returns an array of objects, but detailed information about each object’s attributes might not be
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return PetSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria): PetSearchResultsInterface;
}
