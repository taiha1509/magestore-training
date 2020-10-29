<?php

namespace Learning\SimpleModel\Model;

use Magento\Framework\Model\AbstractModel;
use Magestore\HelloWorld\Model\ResourceModel\Location as ResourceModel;

class Location extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Learning\SimpleModel\Model\ResourceModel\Location::class);
    }
}
