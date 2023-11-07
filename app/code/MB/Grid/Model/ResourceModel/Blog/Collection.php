<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Rohan Hapani
 */
namespace MB\Grid\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MB\Grid\Model\Blog as BlogModel;
use MB\Grid\Model\ResourceModel\Blog as BlogResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(BlogModel::class, BlogResourceModel::class);
    }
}