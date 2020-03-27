<?php


namespace NSTech\PlatformCode\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use NSTech\PlatformCode\Model\ResourceModel\PlatformCode\CollectionFactory as PlatformCodeCollectionFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use NSTech\PlatformCode\Api\Data\PlatformCodeSearchResultsInterfaceFactory;
use NSTech\PlatformCode\Api\PlatformCodeRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Store\Model\StoreManagerInterface;
use NSTech\PlatformCode\Model\ResourceModel\PlatformCode as ResourcePlatformCode;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use NSTech\PlatformCode\Api\Data\PlatformCodeInterfaceFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;

/**
 * Class PlatformCodeRepository
 *
 * @package NSTech\PlatformCode\Model
 */
class PlatformCodeRepository implements PlatformCodeRepositoryInterface
{

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $platformCodeCollectionFactory;

    protected $extensionAttributesJoinProcessor;

    protected $dataPlatformCodeFactory;

    protected $platformCodeFactory;

    private $collectionProcessor;

    protected $resource;

    private $storeManager;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourcePlatformCode $resource
     * @param PlatformCodeFactory $platformCodeFactory
     * @param PlatformCodeInterfaceFactory $dataPlatformCodeFactory
     * @param PlatformCodeCollectionFactory $platformCodeCollectionFactory
     * @param PlatformCodeSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourcePlatformCode $resource,
        PlatformCodeFactory $platformCodeFactory,
        PlatformCodeInterfaceFactory $dataPlatformCodeFactory,
        PlatformCodeCollectionFactory $platformCodeCollectionFactory,
        PlatformCodeSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->platformCodeFactory = $platformCodeFactory;
        $this->platformCodeCollectionFactory = $platformCodeCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataPlatformCodeFactory = $dataPlatformCodeFactory;
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
        \NSTech\PlatformCode\Api\Data\PlatformCodeInterface $platformCode
    ) {
        /* if (empty($platformCode->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $platformCode->setStoreId($storeId);
        } */
        
        $platformCodeData = $this->extensibleDataObjectConverter->toNestedArray(
            $platformCode,
            [],
            \NSTech\PlatformCode\Api\Data\PlatformCodeInterface::class
        );
        
        $platformCodeModel = $this->platformCodeFactory->create()->setData($platformCodeData);
        
        try {
            $this->resource->save($platformCodeModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the platformCode: %1',
                $exception->getMessage()
            ));
        }
        return $platformCodeModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($platformCodeId)
    {
        $platformCode = $this->platformCodeFactory->create();
        $this->resource->load($platformCode, $platformCodeId);
        if (!$platformCode->getId()) {
            throw new NoSuchEntityException(__('PlatformCode with id "%1" does not exist.', $platformCodeId));
        }
        return $platformCode->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->platformCodeCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \NSTech\PlatformCode\Api\Data\PlatformCodeInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \NSTech\PlatformCode\Api\Data\PlatformCodeInterface $platformCode
    ) {
        try {
            $platformCodeModel = $this->platformCodeFactory->create();
            $this->resource->load($platformCodeModel, $platformCode->getPlatformcodeId());
            $this->resource->delete($platformCodeModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the PlatformCode: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($platformCodeId)
    {
        return $this->delete($this->get($platformCodeId));
    }
}

