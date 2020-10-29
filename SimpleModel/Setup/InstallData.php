<?php

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {

    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

    }
}
