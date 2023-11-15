<?php
/**
 * Copyright &copy; Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mavenbird\Customgrid\Ui\Component\Category\Listing\Column;


use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\UrlInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * @var string
     */
    protected $_viewUrl;

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param string $viewUrl
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        $viewUrl = '',
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_viewUrl    = $viewUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        // if (isset($dataSource['data']['items'])) {
        //     foreach ($dataSource['data']['items'] as &$item) {
        //         $name = $this->getData('name'); 
        //         if (isset($item['entity_id'])) {
        //             $item[$name]['view']   = [
        //                 'href'  => $this->_urlBuilder->getUrl('test_form/index/edit', ['id' => $item['entity_id']]),
        //                 'label' => __('Edit')
        //             ];
        //             $item[$name]['view']   = [
        //                 'href' => $this->urlBuilder->getUrl(
        //                     'test_form/index/delete',
        //                     [
        //                         'id' => $item['entity_id'
        //                         ],
        //                     ]
        //                 ),
        //                 'label' => __('Delete'),
        //             ];
        //         }
        //     }
        // }
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['entity_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->_urlBuilder->getUrl(
                                'mavenbird_customgrid/index/edit',
                                [
                                    'entity_id' => $item['entity_id'
                                    ],
                                ]
                            ),
                            'label' => __('Edit'),
                        ],
                        'delete' => [
                            'href' => $this->_urlBuilder->getUrl(
                                'mavenbird_customgrid/index/delete',
                                [
                                    'entity_id' => $item['entity_id'
                                    ],
                                ]
                            ),
                            'label' => __('Delete'),
                        ],
                    ];
                }
            }
        }
        return $dataSource; 
    }
}



