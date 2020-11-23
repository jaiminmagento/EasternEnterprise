<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Setup\Patch\Data;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;


class ApiData implements DataPatchInterface, PatchRevertableInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $data = [
            ['sku' => '24-WG02', 'price' => '82.00'],
            ['sku' => '24-WG03', 'price' => '92.00'],
            ['sku' => '24-WG01', 'price' => '85.00'],
            ['sku' => '24-WG09', 'price' => '62.00'],
            ['sku' => '24-MG01', 'price' => '63.00'],
            ['sku' => '24-MG02', 'price' => '86.00'],
            ['sku' => '24-MG03', 'price' => '87.00'],
            ['sku' => '24-MG04', 'price' => '88.00'],
            ['sku' => '24-MG05', 'price' => '89.00']
        ];

        foreach ($data as $bind) {
            $this->moduleDataSetup->getConnection()->insertForce(
                $this->moduleDataSetup->getTable(
                    'easternenterprise_pricebysku_pricebysku'
                ),
                $bind
            );
        }
        
    }

    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [
        
        ];
    }
}

