<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Model;

use RichardParnabyKing\PixieMediaTest\Api\ApiRepositoryInterface;
use RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterfaceFactory;
use RichardParnabyKing\PixieMediaTest\Api\Data\ApiSearchResultsInterfaceFactory;
use RichardParnabyKing\PixieMediaTest\Model\ResourceModel\Api as ResourceApi;
use RichardParnabyKing\PixieMediaTest\Model\ResourceModel\Api\CollectionFactory as ApiCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class ApiRepository implements ApiRepositoryInterface
{

    protected $dataApiFactory;

    protected $searchResultsFactory;

    private $collectionProcessor;

    protected $apiCollectionFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $dataObjectProcessor;

    protected $dataObjectHelper;

    private $storeManager;

    protected $extensionAttributesJoinProcessor;

    protected $apiFactory;


    /**
     * @param ResourceApi $resource
     * @param ApiFactory $apiFactory
     * @param ApiInterfaceFactory $dataApiFactory
     * @param ApiCollectionFactory $apiCollectionFactory
     * @param ApiSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceApi $resource,
        ApiFactory $apiFactory,
        ApiInterfaceFactory $dataApiFactory,
        ApiCollectionFactory $apiCollectionFactory,
        ApiSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->apiFactory = $apiFactory;
        $this->apiCollectionFactory = $apiCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataApiFactory = $dataApiFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface $api
    ) {
        $api->getResource()->save($api);
        return $api;
    }

    /**
     * {@inheritdoc}
     */
    public function get($apiId)
    {
        $api = $this->apiFactory->create();
        $this->resource->load($api, $apiId);
        if (!$api->getId()) {
            throw new NoSuchEntityException(__('Api with id "%1" does not exist.', $apiId));
        }
        return $api;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
       $collection = $this->apiCollectionFactory->create();
       $this->collectionProcessor->process($criteria, $collection);
       $searchResults = $this->searchResultFactory->create();
 
       $searchResults->setSearchCriteria($criteria);
       $searchResults->setItems($collection->getItems());
 
       return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface $api
    ) {
        $api->getResource()->delete($api);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($apiId)
    {
        return $this->delete($this->get($apiId));
    }
}

