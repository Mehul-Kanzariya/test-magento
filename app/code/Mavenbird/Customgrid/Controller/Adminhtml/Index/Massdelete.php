<?php

namespace Mavenbird\Customgrid\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Mavenbird\Customgrid\Model\ResourceModel\Customgrid\CollectionFactory;
use Mavenbird\Customgrid\Model\CustomgridFactory;

class Massdelete extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $customgridFactory;

	public $collectionFactory;

    public $filter;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
	 	Filter $filter,
        CollectionFactory $collectionFactory,
        CustomgridFactory $customgridFactory
	)
	{
		parent::__construct($context);
		$this->customgridFactory = $customgridFactory;
	 	$this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{   $ids=$this->getRequest()->getParams();
		 try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $count = 0;

            // With Mass Action Filter Class
            
          /*  foreach ($collection as $model) {
                $model = $this->postFactory->create()->load($model->getId());
                $model->delete();
                $count++;
            }*/

            //Without Mass Action Filter Class
             foreach ($ids['selected'] as $id) {
                $model = $this->customgridFactory->create()->load($id);
                $model->delete();
                $count++;
            }

            $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $count));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
	}


}