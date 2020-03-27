<?php

namespace NSTech\PlatformCode\Block\Frontend;

class Edit extends \Magento\Customer\Block\Form\Edit
{
    public function getPlatformCode()
    {
        return $this->customerSession->getCustomer()->getPlatformCode();
    }

}