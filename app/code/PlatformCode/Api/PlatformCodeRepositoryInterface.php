<?php


namespace NSTech\PlatformCode\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface PlatformCodeRepositoryInterface
 *
 * @package NSTech\PlatformCode\Api
 */
interface PlatformCodeRepositoryInterface
{

    /**
     * Save PlatformCode
     * @param \NSTech\PlatformCode\Api\Data\PlatformCodeInterface $platformCode
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \NSTech\PlatformCode\Api\Data\PlatformCodeInterface $platformCode
    );

    /**
     * Retrieve PlatformCode
     * @param string $platformcodeId
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($platformcodeId);

    /**
     * Retrieve PlatformCode matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete PlatformCode
     * @param \NSTech\PlatformCode\Api\Data\PlatformCodeInterface $platformCode
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \NSTech\PlatformCode\Api\Data\PlatformCodeInterface $platformCode
    );

    /**
     * Delete PlatformCode by ID
     * @param string $platformcodeId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($platformcodeId);
}

