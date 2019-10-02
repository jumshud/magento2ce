<?php
declare(strict_types = 1);

namespace Epam\Crud\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    const TABLE_NAME = 'epam_table_snippet';

    /**
     * @inheritdoc
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->insertArray(
            $setup->getTable(self::TABLE_NAME),
            $this->getColumns(),
            $this->getData()
        );
        $setup->endSetup();
    }

    /**
     * Column list
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name',
            'created_at',
            'updated_at',
            'is_active'
        ];
    }

    /**
     * Data sample
     *
     * @return array
     */
    private function getData()
    {
        $date = gmdate('Y-m-d H:i:s');
        return [
            ['Magento2', $date, $date, 1],
            ['Magento Enterprise Edition', $date, $date, 0],
            ['Magento Community Edition', $date, $date, 1],
            ['Magento with Docker', $date, $date, 1],
            ['Magento with VM', $date, $date, 0]
        ];
    }
}
