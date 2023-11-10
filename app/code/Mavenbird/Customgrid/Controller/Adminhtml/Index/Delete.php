<?php

namespace Mavenbird\Customgrid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{

    /**
     * @var \Mavenbird\Customgrid\Model\Customgrid
     */
    protected $rhblog;

    /**
     * @param Context $context
     * @param \Mavenbird\Customgrid\Model\Customgrid $rhblog
     */
    public function __construct(
        Context $context,
        \Mavenbird\Customgrid\Model\Customgrid $rhblog
    ) {
        parent::__construct($context);
        $this->rhblog = $rhblog;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mavenbird_Customgrid::index_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->rhblog;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Record deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Record does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}