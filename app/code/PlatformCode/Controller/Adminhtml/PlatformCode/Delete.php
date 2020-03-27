<?php


namespace NSTech\PlatformCode\Controller\Adminhtml\PlatformCode;

/**
 * Class Delete
 *
 * @package NSTech\PlatformCode\Controller\Adminhtml\PlatformCode
 */
class Delete extends \NSTech\PlatformCode\Controller\Adminhtml\PlatformCode
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('platformcode_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\NSTech\PlatformCode\Model\PlatformCode::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Platformcode.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['platformcode_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Platformcode to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

