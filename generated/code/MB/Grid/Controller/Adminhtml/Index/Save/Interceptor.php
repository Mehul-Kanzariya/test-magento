<?php
namespace MB\Grid\Controller\Adminhtml\Index\Save;

/**
 * Interceptor class for @see \MB\Grid\Controller\Adminhtml\Index\Save
 */
class Interceptor extends \MB\Grid\Controller\Adminhtml\Index\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \MB\Grid\Model\Blog $rhblog, \Magento\Backend\Model\Session $adminsession)
    {
        $this->___init();
        parent::__construct($context, $rhblog, $adminsession);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
