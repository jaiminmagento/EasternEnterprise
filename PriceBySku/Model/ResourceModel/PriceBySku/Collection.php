<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'pricebysku_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \EasternEnterprise\PriceBySku\Model\PriceBySku::class,
            \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku::class
        );
    }
}

