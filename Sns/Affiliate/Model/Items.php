<?php
namespace Sns\Affiliate\Model;

class Items extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Sns\Affiliate\Model\Resource\Items');
    }
}
