<?php

namespace Test\Form\Ui\DataProvider\Category;

class ListingDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Test\Form\Model\ResourceModel\Form\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        // Fetch and return data from the collection
        return parent::getData();
    }
}
