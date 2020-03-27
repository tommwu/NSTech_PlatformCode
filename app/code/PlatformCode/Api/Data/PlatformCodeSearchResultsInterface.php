<?php


namespace NSTech\PlatformCode\Api\Data;

/**
 * Interface PlatformCodeSearchResultsInterface
 *
 * @package NSTech\PlatformCode\Api\Data
 */
interface PlatformCodeSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get PlatformCode list.
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface[]
     */
    public function getItems();

    /**
     * Set code list.
     * @param \NSTech\PlatformCode\Api\Data\PlatformCodeInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

