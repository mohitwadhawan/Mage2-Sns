<?php
 
namespace Sns\Affiliate\Model;

use Sns\Affiliate\Api\AffiliateInterface;
use Sns\Affiliate\Model\ItemsFactory;
use Magento\Framework\View\Element\Template\Context;

class Affiliate implements AffiliateInterface
{
    protected $_productFactory;

    public function __construct(
       Context $context, 
       ItemsFactory $itemsFactory,
       array $data = array()       
    ) {
       $this->_itemsFactory   = $itemsFactory;
    }
    
     /**
     * @return $array
     */
    public function members() {
        $itemsFactory = $this->_itemsFactory->create()->getCollection();

        $membersName=array();
        foreach ($itemsFactory as $value) {
            $membersName[]=$value['name'];
        }
        return $membersName;
        
    }
}