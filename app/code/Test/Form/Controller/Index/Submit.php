<?php

namespace Test\Form\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Test\Form\Model\FormFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Submit extends Action
{
    protected $resultPageFactory;
    protected $formnFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        FormFactory $formFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->formFactory = $formFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        
        try {
            $data = (array)$this->getRequest()->getPost();
            if ($data) {
                $model = $this->formFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
    
}