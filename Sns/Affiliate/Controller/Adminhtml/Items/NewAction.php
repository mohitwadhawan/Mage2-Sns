<?php
/**
 * Copyright © 2015 Sns. All rights reserved.
 */

namespace Sns\Affiliate\Controller\Adminhtml\Items;

class NewAction extends \Sns\Affiliate\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
