<?php
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();
        try {
            $table = $setup->getConnection()
                ->newTable($setup->getTable("webpos_location"))
                ->addColumn(
                    "location_id",
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'primary' => true, 'unsigned' => true, 'nullable' => false],
                    "location id"
                )
                ->addColumn(
                    "name",
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => 'taiha'],
                    'name'
                )
                ->addColumn(
                    'address',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => true, 'default' => 'Ha Tay'],
                    'address'
                )
                ->setComment("webpos_location table");
            $setup->getConnection()->createTable($table);
            $setup->endSetup();
        } catch (Zend_Db_Exception $e) {
            $e . printHead();
        }

    }
}
