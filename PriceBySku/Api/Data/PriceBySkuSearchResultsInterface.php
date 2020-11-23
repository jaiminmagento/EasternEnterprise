<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Api\Data;

interface PriceBySkuSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get PriceBySku list.
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface[]
     */
    public function getItems();

    /**
     * Set sku list.
     * @param \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

