<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Model;

use EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface;
use EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class PriceBySku extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'easternenterprise_pricebysku_pricebysku';
    protected $pricebyskuDataFactory;

    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param PriceBySkuInterfaceFactory $pricebyskuDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku $resource
     * @param \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        PriceBySkuInterfaceFactory $pricebyskuDataFactory,
        DataObjectHelper $dataObjectHelper,
        \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku $resource,
        \EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku\Collection $resourceCollection,
        array $data = []
    ) {
        $this->pricebyskuDataFactory = $pricebyskuDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve pricebysku model with pricebysku data
     * @return PriceBySkuInterface
     */
    public function getDataModel()
    {
        $pricebyskuData = $this->getData();
        
        $pricebyskuDataObject = $this->pricebyskuDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $pricebyskuDataObject,
            $pricebyskuData,
            PriceBySkuInterface::class
        );
        
        return $pricebyskuDataObject;
    }
}

