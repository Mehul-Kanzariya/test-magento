<?php
namespace Test\Form\Ui\DataProvider\Category\ListingDataProvider;

/**
 * Interceptor class for @see \Test\Form\Ui\DataProvider\Category\ListingDataProvider
 */
class Interceptor extends \Test\Form\Ui\DataProvider\Category\ListingDataProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct($name, $primaryFieldName, $requestFieldName, \Test\Form\Model\ResourceModel\Form\CollectionFactory $collectionFactory, array $meta = [], array $data = [])
    {
        $this->___init();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $collectionFactory, $meta, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getSearchResult()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSearchResult');
        return $pluginInfo ? $this->___callPlugins('getSearchResult', func_get_args(), $pluginInfo) : parent::getSearchResult();
    }
}
