<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Model;

use EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku\Collection;

class ProductPriceManagement implements \EasternEnterprise\PriceBySku\Api\ProductPriceManagementInterface
{
    /**
     * @var \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku\CollectionFactory $CollectionFactory
     */
    protected $CollectionFactory;
    
    /**
     * @param \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku\CollectionFactory $CollectionFactory
     */
    public function __construct(
        \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku\CollectionFactory $CollectionFactory
     ) {
         $this->collectionFactory = $CollectionFactory;
     }

    /**
     * {@inheritdoc}
     */
    public function getProductPrice($sku)
    {
        $collection = $this->collectionFactory->create();
        foreach($collection as $products){
            if($products->getSku() == $sku){
                return $products->getPrice();
            }
        }
    }
}

