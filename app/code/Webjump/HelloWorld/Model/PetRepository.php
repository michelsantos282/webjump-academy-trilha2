<?php
/*
 * PHP version 7
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

namespace Webjump\HelloWorld\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Webjump\HelloWorld\Api\Data\PetInterface;
use Webjump\HelloWorld\Api\Data\PetSearchResultsInterfaceFactory;
use Webjump\HelloWorld\Api\Data\PetSearchResultsInterface;
use Webjump\HelloWorld\Api\PetRepositoryInterface;
use Webjump\HelloWorld\Model\ResourceModel\Pet as ResourcePet;
use Webjump\HelloWorld\Model\ResourceModel\Pet\Collection as CollectionFactory;
use Webjump\HelloWorld\Model\Data\PetFactory;

class PetRepository implements PetRepositoryInterface
{
    /**
     * @var ResourcePet
     */
    private $resource;

    /**
     * @var PetSearchResultsInterfaceFactory
     */
    private $petSearchResultsInterfaceFactory;

    /**
     * @var PetFactory
     */
    private $petFactory;

    /**
     * @var CollectionFactory
     */
    private $petCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param ResourcePet $resource
     * @param PetFactory $petFactory
     * @param CollectionFactory $petCollectionFactory
     * @param PetSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePet $resource,
        PetFactory $petFactory,
        CollectionFactory $petCollectionFactory,
        PetSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor

    ) {
        $this->resource = $resource;
        $this->petFactory = $petFactory;
        $this->petCollectionFactory = $petCollectionFactory;
        $this->petSearchResultsInterfaceFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param PetInterface $pet
     * @return PetInterface
     * @throws CouldNotSaveException
     */
    public function save(PetInterface $pet): PetInterface
    {
        try {
            $this->resource->save($pet);
            return $pet;
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
    }

    /**
     * @param int $petId
     * @return PetInterface
     */
    public function getById(int $petId): PetInterface
    {
        $pet = $this->petFactory->create();
        $this->resource->load($pet, $petId, 'entity_id');
        return $pet;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return PetSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): PetSearchResultsInterface
    {
        $collection = $this->petCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $collection->load();
        $searchResult = $this->petSearchResultsInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

}
