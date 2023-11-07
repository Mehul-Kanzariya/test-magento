<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Rohan Hapani
 */
namespace MB\Grid\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Add extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Record'));
        return $resultPage;
    }
}