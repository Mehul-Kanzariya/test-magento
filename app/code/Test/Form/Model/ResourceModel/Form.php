<?php

namespace Test\Form\Model\ResourceModel;

class Form extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("form_data", "entity_id");
    }
}
