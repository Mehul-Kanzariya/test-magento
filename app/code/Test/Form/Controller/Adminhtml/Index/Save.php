<?php
namespace Test\Form\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Test\Form\Model\Form; // Adjust the model class as needed

class Save extends Action
{
    protected $form;

    public function __construct(
        Action\Context $context,
        Form $form
    ) {
        parent::__construct($context);
        $this->form = $form;
    }

    public function execute()
    {
        $postData = $this->getRequest()->getPostValue();
        // echo "<pre>";print_r($postData);die();
        if ($postData) {
            $id = $postData['entity_id']; // Replace with your primary key field name
            $model = $this->form->load($id);

            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This data no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }

            try {
                // Update the data model with the form data
                $model->setData('username', $postData['username']);
                $model->setData('email', $postData['email']);
                $model->setData('telephone', $postData['telephone']);
                // Add any additional fields as needed

                // Save the model
                $model->save();

                $this->messageManager->addSuccess(__('Data has been Saved successfully!'));

                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());

                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('test_form/index/edit', ['id' => $id]);
            }
        }
    }
}
