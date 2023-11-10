<?php
// namespace Test\Form\Block\Adminhtml\Form;

// use Magento\Framework\View\Element\Template;
// use Test\Form\Model\Form;

// class Edit extends Template
// {
//     public function getFormId($entity_id)
//     {
//         return $entity_id;
//     }
// }

namespace Mavenbird\Customgrid\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\Template;
use Mavenbird\Customgrid\Model\Customgrid; // Replace with your data model

class Edit extends Template
{
    protected $customgrid;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Customgrid $customgrid, // Replace with your data model
        array $data = []
    ) {
        $this->customgrid = $customgrid;
        parent::__construct($context, $data);
    }

    public function getFormData($entity_id)
    {
        return $this->customgrid->load($entity_id); // Replace with your data retrieval logic
    }
}