<?php

namespace Mavenbird\Customgrid\Block\Adminhtml\Edit\Button;

// die("test save data");
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class Save extends Generic implements ButtonProviderInterface
{
    public function getButtonData()
    {   
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'mavenbird_customgrid_index_listing.mavenbird_customgrid_index_listing',
                                'actionName' => 'save',
                                'params' => [false],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

}