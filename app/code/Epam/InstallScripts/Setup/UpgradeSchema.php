<?php
declare(strict_types = 1);

namespace Epam\InstallScripts\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    const TABLE_NAME = 'epam_table_snippet';

    /**
     * Add description field to 'epam_table_snippet' table
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->addDescriptionColumn($setup, $context);
        $setup->endSetup();
    }

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    private function addDescriptionColumn(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            return;
        }

        $setup->getConnection()
            ->addColumn(
                $setup->getTable(self::TABLE_NAME),
                'name',
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => '1k',
                    'nullable' => true,
                    'comment' => 'Description'
                ]
            );
    }
}
