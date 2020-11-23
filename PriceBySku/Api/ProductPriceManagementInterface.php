<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Api;

interface ProductPriceManagementInterface
{

    /**
     * GET for ProductPrice api
     * @param string $param
     * @return string
     */
    public function getProductPrice($sku);
}

