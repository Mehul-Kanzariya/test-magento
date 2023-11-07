<?php
namespace Test\Form\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{
    protected $FormFactory;

    public function __construct(
        Action\Context $context,
        \Test\Form\Model\FormFactory $FormFactory
    ) {
        parent::__construct($context);
        $this->FormFactory = $FormFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $model = $this->FormFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This data no longer exists.'));
                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
