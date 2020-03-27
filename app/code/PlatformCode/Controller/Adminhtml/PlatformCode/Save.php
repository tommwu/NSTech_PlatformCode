<?php


namespace NSTech\PlatformCode\Controller\Adminhtml\PlatformCode;

use Magento\Framework\Exception\LocalizedException;

/**
 * Class Save
 *
 * @package NSTech\PlatformCode\Controller\Adminhtml\PlatformCode
 */
class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('platformcode_id');
        
            $model = $this->_objectManager->create(\NSTech\PlatformCode\Model\PlatformCode::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Platformcode no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Platformcode.'));
                $this->dataPersistor->clear('nstech_platformcode_platformcode');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['platformcode_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Platformcode.'));
            }
        
            $this->dataPersistor->set('nstech_platformcode_platformcode', $data);
            return $resultRedirect->setPath('*/*/edit', ['platformcode_id' => $this->getRequest()->getParam('platformcode_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

