<?php 

namespace NSTech\PlatformCode\Model\Attribute\Backend;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

class CustomerPlatformCodeAttribute extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
   public function checkCodeValid($object)
   {


       $attribute_code = $this->getAttribute()->getAttributeCode();
       $value = $object->getData($attribute_code);


       if(empty($value) )
       return true;
       
       $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
			$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
			$connection = $resource->getConnection();

       $select = $connection->select()
            ->from(['nstech_platformcode_platformcode' => $resource->getTableName('nstech_platformcode_platformcode')])
            ->where('nstech_platformcode_platformcode.code = ?', $value)
            ->where('date(nstech_platformcode_platformcode.valid_from) <= ?' ,date("Y-m-d"))
            ->where('date(nstech_platformcode_platformcode.valid_to) >= ?' ,date("Y-m-d"));



        if ($connection->fetchRow($select)) {
            return true;
        }else{

        }
        return false ;
   }
   public function beforeSave($object)
   {

        if($this->checkCodeValid($object)){

            return parent::beforeSave($object);

        }
        else{
         throw new \Magento\Framework\Exception\LocalizedException(__("Platform Code is invalid"));

        }

    }
}