<?php


namespace NSTech\PlatformCode\Controller\Adminhtml;

/**
 * Class PlatformCode
 *
 * @package NSTech\PlatformCode\Controller\Adminhtml
 */
abstract class PlatformCode extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'NSTech_PlatformCode::top_level';
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('NSTech'), __('NSTech'))
            ->addBreadcrumb(__('Platformcode'), __('Platformcode'));
        return $resultPage;
    }
}

