<?php
class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{
    public function upgrade(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        print("upgraded");
        $setup->startSetup();
        if (version_compare($context->getVersion(), '0.0.2', '<')) {
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
            } catch (Zend_Db_Exception $e) {
                $e . printHead();
            }
        }
        $setup->endSetup();
    }
}
