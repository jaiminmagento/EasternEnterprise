<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Api\Data;

interface PriceBySkuInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const PRICE = 'price';
    const PRICEBYSKU_ID = 'pricebysku_id';
    const SKU = 'sku';

    /**
     * Get pricebysku_id
     * @return string|null
     */
    public function getPricebyskuId();

    /**
     * Set pricebysku_id
     * @param string $pricebyskuId
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     */
    public function setPricebyskuId($pricebyskuId);

    /**
     * Get sku
     * @return string|null
     */
    public function getSku();

    /**
     * Set sku
     * @param string $sku
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     */
    public function setSku($sku);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuExtensionInterface $extensionAttributes
    );

    /**
     * Get price
     * @return string|null
     */
    public function getPrice();

    /**
     * Set price
     * @param string $price
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     */
    public function setPrice($price);
}

