<?php
/**
 * Copyright © 2015 Sns. All rights reserved.
 */
namespace Sns\Affiliate\Block\Adminhtml\Items\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('sns_affiliate_items_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Customer'));
    }
}
