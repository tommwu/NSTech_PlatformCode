<?php


namespace NSTech\PlatformCode\Api\Data;

/**
 * Interface PlatformCodeInterface
 *
 * @package NSTech\PlatformCode\Api\Data
 */
interface PlatformCodeInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const VALID_TO = 'valid_to';
    const CODE = 'code';
    const PLATFORMCODE_ID = 'platformcode_id';
    const VALID_FROM = 'valid_from';
    const COMMISSION_RATE = 'commission_rate';

    /**
     * Get platformcode_id
     * @return string|null
     */
    public function getPlatformcodeId();

    /**
     * Set platformcode_id
     * @param string $platformcodeId
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setPlatformcodeId($platformcodeId);

    /**
     * Get code
     * @return string|null
     */
    public function getCode();

    /**
     * Set code
     * @param string $code
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setCode($code);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \NSTech\PlatformCode\Api\Data\PlatformCodeExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \NSTech\PlatformCode\Api\Data\PlatformCodeExtensionInterface $extensionAttributes
    );

    /**
     * Get valid_from
     * @return string|null
     */
    public function getValidFrom();

    /**
     * Set valid_from
     * @param string $validFrom
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setValidFrom($validFrom);

    /**
     * Get valid_to
     * @return string|null
     */
    public function getValidTo();

    /**
     * Set valid_to
     * @param string $validTo
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setValidTo($validTo);

    /**
     * Get commission_rate
     * @return string|null
     */
    public function getCommissionRate();

    /**
     * Set commission_rate
     * @param string $commissionRate
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setCommissionRate($commissionRate);
}

