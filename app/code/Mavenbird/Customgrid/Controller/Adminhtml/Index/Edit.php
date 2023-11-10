<?php

namespace Mavenbird\Customgrid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;

class Edit extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Edit action
     *
     * @return void
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Grid Data'));

        return $resultPage;
    }
}
