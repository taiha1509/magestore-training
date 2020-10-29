<?php
namespace Learning\Magestore\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (!$setup->tableExists('mgt_Customer')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('Customer')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    [
                        'nullable'=>false
                    ],
                    'Name'
                )
                ->setComment('Customer table');
            $setup->getConnection()->createTable($table);
            $setup->getConnection()->addIndex(
                $setup->getTable('mgt_Customer'),
                $setup->getIdxName(
                    $setup->getTable('mgt_Customer'),
                    ['name'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $setup->endSetup();
    }
}
