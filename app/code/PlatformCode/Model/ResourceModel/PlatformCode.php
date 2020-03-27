<?php


namespace NSTech\PlatformCode\Model\ResourceModel;

/**
 * Class PlatformCode
 *
 * @package NSTech\PlatformCode\Model\ResourceModel
 */
class PlatformCode extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('nstech_platformcode_platformcode', 'platformcode_id');
    }

    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        if (!$this->checkIsUnique($object)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('The code is existing, please use another code')
            );
        }
        return parent::_beforeSave($object);
    }
    
    public function checkIsUnique(\Magento\Framework\Model\AbstractModel  $object)
    {
        $select = $this->getConnection()->select()
            ->from(['nstech_platformcode_platformcode' => $this->getMainTable()])
            ->where('nstech_platformcode_platformcode.code = ?', $object->getData('code'));

        if ($object->getId()) {
            $select->where('nstech_platformcode_platformcode.entity_id <> ?', $object->getId());
        }

        if ($this->getConnection()->fetchRow($select)) {
            return false;
        }

        return true;
    }
}

