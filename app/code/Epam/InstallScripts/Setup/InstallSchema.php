<?php
declare(strict_types = 1);

namespace Epam\InstallScripts\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    const TABLE_NAME = 'epam_table_snippet';

    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->createSnippetTable($setup);
        $setup->endSetup();
    }

    /**
     * @param SchemaSetupInterface $setup
     * @throws \Zend_Db_Exception
     * @return void
     */
    private function createSnippetTable(SchemaSetupInterface $setup)
    {
        if ($setup->tableExists(self::TABLE_NAME)) {
            return;
        }

        $table = $setup->getConnection()
            ->newTable($setup->getTable(self::TABLE_NAME))
            ->addColumn(
                'entity_id',
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn('name', Table::TYPE_TEXT, 255, ['nullable' => false], 'Name')
            ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, [], 'Creation Time')
            ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, [], 'Modification Time')
            ->addColumn('is_active', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => 0], 'Is Active')
            ->setComment('Snippet Example Table');

        $setup->getConnection()->createTable($table);
    }
}
