<?php


namespace NSTech\PlatformCode\Model\ResourceModel\PlatformCode;

/**
 * Class Collection
 *
 * @package NSTech\PlatformCode\Model\ResourceModel\PlatformCode
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'platformcode_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \NSTech\PlatformCode\Model\PlatformCode::class,
            \NSTech\PlatformCode\Model\ResourceModel\PlatformCode::class
        );
    }
}

