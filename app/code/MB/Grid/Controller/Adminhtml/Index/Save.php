<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Rohan Hapani
 */
namespace MB\Grid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use MB\Grid\Model\Blog;

class Save extends \Magento\Backend\App\Action
{

    /**
     * @var Blog
     */
    protected $rhblog;

    /**
     * @var Session
     */
    protected $adminsession;

    /**
     * @param Action\Context $context
     * @param Blog $rhblog
     * @param Session $adminsession
     */
    public function __construct(
        Action\Context $context,
        Blog $rhblog,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->rhblog = $rhblog;
        $this->adminsession = $adminsession;
    }

    /**
     * Save blog record action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $blog_id = $this->getRequest()->getParam('blog_id');
            if ($blog_id) {
                $this->rhblog->load($blog_id);
            }

            $this->rhblog->setData($data);

            try {
                $this->rhblog->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->adminsession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath('*/*/edit', ['blog_id' => $this->rhblog->getBlogId(), '_current' => true]);
                    }
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['blog_id' => $this->getRequest()->getParam('blog_id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}