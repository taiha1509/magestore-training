<?php
namespace Learning\SimpleModel\Model\ResourceModel\Location;

use Learning\SimpleModel\Model\Location;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magestore\HelloWorld\Model\Location as Model;
use Magestore\HelloWorld\Model\ResourceModel\Location as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Location::class, \Learning\SimpleModel\Model\ResourceModel\Location::class);
    }
}
