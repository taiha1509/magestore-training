<?php
namespace Learning\Magestore\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel implements IdentityInterface
{
    public function _construct()
    {
        $this->_init('Learning\Magestore\Model\ResourceModel\Customer');
    }

    public function getIdentities()
    {
        return 'mgt_Customer' . $this->getId();
    }
}

