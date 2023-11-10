<?php 
namespace Mavenbird\Customgrid\Model;
class Customgrid extends \Magento\Framework\Model\AbstractModel{
    public function _construct(){
        $this->_init("Mavenbird\Customgrid\Model\ResourceModel\Customgrid");
    }
}
 ?>