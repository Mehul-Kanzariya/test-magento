<?php 
namespace Test\Form\Model;
class Form extends \Magento\Framework\Model\AbstractModel{
    public function _construct(){
        $this->_init("Test\Form\Model\ResourceModel\Form");
    }
}
 ?>