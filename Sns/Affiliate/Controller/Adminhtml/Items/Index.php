<?php
/**
 * Copyright © 2015 Sns. All rights reserved.
 */

namespace Sns\Affiliate\Controller\Adminhtml\Items;

class Index extends \Sns\Affiliate\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sns_Affiliate::affiliate');
        $resultPage->getConfig()->getTitle()->prepend(__('Sns Affiliate'));
        $resultPage->addBreadcrumb(__('Sns'), __('Sns'));
        $resultPage->addBreadcrumb(__('Items'), __('Customers'));
        return $resultPage;
    }
}
