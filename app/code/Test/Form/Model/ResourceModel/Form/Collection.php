<?php 
namespace Test\Form\Model\ResourceModel\Form;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
    public function _construct(){
        $this->_init("Test\Form\Model\Form","Test\Form\Model\ResourceModel\Form");
    }
}
 ?>