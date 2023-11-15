<?php

namespace Mavenbird\Customgrid\Controller\Adminhtml\Index;
// die("testestestestestestAA________________");

use Mavenbird\Customgrid\Model\CustomgridFactory;
class Save extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $customgridFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		CustomgridFactory $customgridFactory
	)
	{
		$this->customgridFactory = $customgridFactory;
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		$data = $this->getRequest()->getPostValue();
      /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $id=$this->getRequest()->getParam('entity_id');
        //echo $id; exit;
	     try{
	        /** @var \Magento\Cms\Model\Page $model */
	           if(isset($id) && !empty($id)){
	           	   $model = $this->customgridFactory->create()->load($id);
				   $model->addData($data);
				   $model->save();
	           }else{
		           $model = $this->customgridFactory->create();
				   $model->setData($data);
				   $model->save();
			   }
		    	$this->messageManager->addSuccessMessage(__('You saved the post.'));
			}catch(\Exception $e){
				 $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the post.'));
			}
	 return $resultRedirect->setPath('*/*/');
	}


}