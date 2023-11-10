<?php

namespace Mavenbird\Customgrid\Model\ResourceModel;

class Customgrid extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("customgrid_data", "entity_id");
    }
}
