<?php


namespace NSTech\PlatformCode\Model;

use Magento\Framework\Api\DataObjectHelper;
use NSTech\PlatformCode\Api\Data\PlatformCodeInterfaceFactory;
use NSTech\PlatformCode\Api\Data\PlatformCodeInterface;

/**
 * Class PlatformCode
 *
 * @package NSTech\PlatformCode\Model
 */
class PlatformCode extends \Magento\Framework\Model\AbstractModel
{

    protected $platformcodeDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'nstech_platformcode_platformcode';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param PlatformCodeInterfaceFactory $platformcodeDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \NSTech\PlatformCode\Model\ResourceModel\PlatformCode $resource
     * @param \NSTech\PlatformCode\Model\ResourceModel\PlatformCode\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        PlatformCodeInterfaceFactory $platformcodeDataFactory,
        DataObjectHelper $dataObjectHelper,
        \NSTech\PlatformCode\Model\ResourceModel\PlatformCode $resource,
        \NSTech\PlatformCode\Model\ResourceModel\PlatformCode\Collection $resourceCollection,
        array $data = []
    ) {
        $this->platformcodeDataFactory = $platformcodeDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve platformcode model with platformcode data
     * @return PlatformCodeInterface
     */
    public function getDataModel()
    {
        $platformcodeData = $this->getData();
        
        $platformcodeDataObject = $this->platformcodeDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $platformcodeDataObject,
            $platformcodeData,
            PlatformCodeInterface::class
        );
        
        return $platformcodeDataObject;
    }
}

