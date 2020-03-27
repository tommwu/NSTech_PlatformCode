<?php


namespace NSTech\PlatformCode\Model\Data;

use NSTech\PlatformCode\Api\Data\PlatformCodeInterface;

/**
 * Class PlatformCode
 *
 * @package NSTech\PlatformCode\Model\Data
 */
class PlatformCode extends \Magento\Framework\Api\AbstractExtensibleObject implements PlatformCodeInterface
{

    /**
     * Get platformcode_id
     * @return string|null
     */
    public function getPlatformcodeId()
    {
        return $this->_get(self::PLATFORMCODE_ID);
    }

    /**
     * Set platformcode_id
     * @param string $platformcodeId
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setPlatformcodeId($platformcodeId)
    {
        return $this->setData(self::PLATFORMCODE_ID, $platformcodeId);
    }

    /**
     * Get code
     * @return string|null
     */
    public function getCode()
    {
        return $this->_get(self::CODE);
    }

    /**
     * Set code
     * @param string $code
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setCode($code)
    {
        return $this->setData(self::CODE, $code);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \NSTech\PlatformCode\Api\Data\PlatformCodeExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \NSTech\PlatformCode\Api\Data\PlatformCodeExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get valid_from
     * @return string|null
     */
    public function getValidFrom()
    {
        return $this->_get(self::VALID_FROM);
    }

    /**
     * Set valid_from
     * @param string $validFrom
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setValidFrom($validFrom)
    {
        return $this->setData(self::VALID_FROM, $validFrom);
    }

    /**
     * Get valid_to
     * @return string|null
     */
    public function getValidTo()
    {
        return $this->_get(self::VALID_TO);
    }

    /**
     * Set valid_to
     * @param string $validTo
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setValidTo($validTo)
    {
        return $this->setData(self::VALID_TO, $validTo);
    }

    /**
     * Get commission_rate
     * @return string|null
     */
    public function getCommissionRate()
    {
        return $this->_get(self::COMMISSION_RATE);
    }

    /**
     * Set commission_rate
     * @param string $commissionRate
     * @return \NSTech\PlatformCode\Api\Data\PlatformCodeInterface
     */
    public function setCommissionRate($commissionRate)
    {
        return $this->setData(self::COMMISSION_RATE, $commissionRate);
    }
}

