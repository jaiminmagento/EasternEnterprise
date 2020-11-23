<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Model\Data;

use EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface;

class PriceBySku extends \Magento\Framework\Api\AbstractExtensibleObject implements PriceBySkuInterface
{

    /**
     * Get pricebysku_id
     * @return string|null
     */
    public function getPricebyskuId()
    {
        return $this->_get(self::PRICEBYSKU_ID);
    }

    /**
     * Set pricebysku_id
     * @param string $pricebyskuId
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     */
    public function setPricebyskuId($pricebyskuId)
    {
        return $this->setData(self::PRICEBYSKU_ID, $pricebyskuId);
    }

    /**
     * Get sku
     * @return string|null
     */
    public function getSku()
    {
        return $this->_get(self::SKU);
    }

    /**
     * Set sku
     * @param string $sku
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get price
     * @return string|null
     */
    public function getPrice()
    {
        return $this->_get(self::PRICE);
    }

    /**
     * Set price
     * @param string $price
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     */
    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
    }
}

