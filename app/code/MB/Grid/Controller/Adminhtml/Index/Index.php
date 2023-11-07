<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Rohan Hapani
 */
namespace MB\Grid\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
  /**
     * @return \Magento\Framework\Controller\ResultFactory
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Record'));
        return $resultPage;
    }
}