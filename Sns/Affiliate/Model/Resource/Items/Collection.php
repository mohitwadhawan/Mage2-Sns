<?php
namespace Sns\Affiliate\Model\Resource\Items;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Sns\Affiliate\Model\Items', 'Sns\Affiliate\Model\Resource\Items');
    }
}
