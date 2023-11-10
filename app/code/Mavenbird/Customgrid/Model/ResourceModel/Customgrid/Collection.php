<?php 
namespace Mavenbird\Customgrid\Model\ResourceModel\Customgrid;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
    public function _construct(){
        $this->_init("Mavenbird\Customgrid\Model\Customgrid","Mavenbird\Customgrid\Model\ResourceModel\Customgrid");
    }
}
 ?>