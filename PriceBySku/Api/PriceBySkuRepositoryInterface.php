<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PriceBySkuRepositoryInterface
{

    /**
     * Save PriceBySku
     * @param \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface $priceBySku
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface $priceBySku
    );

    /**
     * Retrieve PriceBySku
     * @param string $pricebyskuId
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($pricebyskuId);

    /**
     * Retrieve PriceBySku matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete PriceBySku
     * @param \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface $priceBySku
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface $priceBySku
    );

    /**
     * Delete PriceBySku by ID
     * @param string $pricebyskuId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($pricebyskuId);
}

