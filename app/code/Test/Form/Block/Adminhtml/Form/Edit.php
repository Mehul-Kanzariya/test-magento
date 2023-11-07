<?php
namespace Test\Form\Block\Adminhtml\Form;

use Magento\Backend\Block\Widget\Form\Generic;

class Edit extends Generic
{
    protected function _prepareForm()
    {
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Edit Your Data')]
        );

        // Add Username Field
        $fieldset->addField(
            'username',
            'text',
            [
                'name' => 'username',
                'label' => __('Username'),
                'title' => __('Username'),
                'required' => true,
            ]
        );

        // Add Email Field
        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'title' => __('Email'),
                'required' => true,
                'class' => 'validate-email',
            ]
        );

        // Add Telephone Field
        $fieldset->addField(
            'telephone',
            'text',
            [
                'name' => 'telephone',
                'label' => __('Telephone'),
                'title' => __('Telephone'),
                'required' => true,
                'class' => 'validate-phoneStrict',
            ]
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        parent::_prepareForm();
    }
}
