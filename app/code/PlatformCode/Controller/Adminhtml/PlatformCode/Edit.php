<?php


namespace NSTech\PlatformCode\Controller\Adminhtml\PlatformCode;

/**
 * Class Edit
 *
 * @package NSTech\PlatformCode\Controller\Adminhtml\PlatformCode
 */
class Edit extends \NSTech\PlatformCode\Controller\Adminhtml\PlatformCode
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('platformcode_id');
        $model = $this->_objectManager->create(\NSTech\PlatformCode\Model\PlatformCode::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Platformcode no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('nstech_platformcode_platformcode', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Platformcode') : __('New Platformcode'),
            $id ? __('Edit Platformcode') : __('New Platformcode')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Platformcodes'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Platformcode %1', $model->getId()) : __('New Platformcode'));
        return $resultPage;
    }
}

