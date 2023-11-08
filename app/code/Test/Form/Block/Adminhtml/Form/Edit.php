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

namespace Test\Form\Block\Adminhtml\Form;

use Magento\Framework\View\Element\Template;
use Test\Form\Model\Form; // Replace with your data model

class Edit extends Template
{
    protected $form;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Form $form, // Replace with your data model
        array $data = []
    ) {
        $this->form = $form;
        parent::__construct($context, $data);
    }

    public function getFormData($entity_id)
    {
        return $this->form->load($entity_id); // Replace with your data retrieval logic
    }
}