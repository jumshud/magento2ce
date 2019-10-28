<?php
declare(strict_types=1);

namespace Epam\Declarative\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class TableData implements DataPatchInterface
{
    const TABLE_NAME = 'epam_table_snippet2';

    /**
     * @var ModuleDataSetupInterface
     */
    public $setup;

    /**
     * @param ModuleDataSetupInterface $setup
     */
    public function __construct(ModuleDataSetupInterface $setup)
    {
        $this->setup = $setup;
    }

    /**
     * Get array of patches that have to be executed prior to this.
     *
     * Example of implementation:
     *
     * [
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch1::class,
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch2::class
     * ]
     *
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get aliases (previous names) for the patch.
     *
     * @return string[]
     */
    public function getAliases()
    {
        // TODO: Implement getAliases() method.
    }

    /**
     * Run code inside patch
     * If code fails, patch must be reverted, in case when we are speaking about schema - than under revert
     * means run PatchInterface::revert()
     *
     * If we speak about data, under revert means: $transaction->rollback()
     *
     * @return $this
     */
    public function apply()
    {
        $this->setup->startSetup();

        $this->setup->getConnection()->insertArray(
            $this->setup->getTable(self::TABLE_NAME),
            $this->getColumns(),
            $this->getData()
        );

        $this->setup->endSetup();
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