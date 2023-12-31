<?php
namespace Cloudways\Newmodule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('form_data'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'user_name',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'User Name'
            )
            ->addColumn(
                'email',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'User Email'
            )
            ->addColumn(
                'telephone',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'User Telephone'
            )
            ->setComment('About Your Table');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}