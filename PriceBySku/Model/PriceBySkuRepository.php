<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Model;

use EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterfaceFactory;
use EasternEnterprise\PriceBySku\Api\Data\PriceBySkuSearchResultsInterfaceFactory;
use EasternEnterprise\PriceBySku\Api\PriceBySkuRepositoryInterface;
use EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku as ResourcePriceBySku;
use EasternEnterprise\PriceBySku\Model\ResourceModel\PriceBySku\CollectionFactory as PriceBySkuCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class PriceBySkuRepository implements PriceBySkuRepositoryInterface
{

    protected $dataObjectProcessor;

    protected $resource;

    protected $extensionAttributesJoinProcessor;

    protected $dataPriceBySkuFactory;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;
    protected $priceBySkuCollectionFactory;

    private $storeManager;

    protected $priceBySkuFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;


    /**
     * @param ResourcePriceBySku $resource
     * @param PriceBySkuFactory $priceBySkuFactory
     * @param PriceBySkuInterfaceFactory $dataPriceBySkuFactory
     * @param PriceBySkuCollectionFactory $priceBySkuCollectionFactory
     * @param PriceBySkuSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourcePriceBySku $resource,
        PriceBySkuFactory $priceBySkuFactory,
        PriceBySkuInterfaceFactory $dataPriceBySkuFactory,
        PriceBySkuCollectionFactory $priceBySkuCollectionFactory,
        PriceBySkuSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->priceBySkuFactory = $priceBySkuFactory;
        $this->priceBySkuCollectionFactory = $priceBySkuCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataPriceBySkuFactory = $dataPriceBySkuFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface $priceBySku
    ) { 
        $priceBySkuData = $this->extensibleDataObjectConverter->toNestedArray(
            $priceBySku,
            [],
            \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface::class
        );
        
        $priceBySkuModel = $this->priceBySkuFactory->create()->setData($priceBySkuData);
        
        try {
            $this->resource->save($priceBySkuModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the priceBySku: %1',
                $exception->getMessage()
            ));
        }
        return $priceBySkuModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($priceBySkuId)
    {
        $priceBySku = $this->priceBySkuFactory->create();
        $this->resource->load($priceBySku, $priceBySkuId);
        if (!$priceBySku->getId()) {
            throw new NoSuchEntityException(__('PriceBySku with id "%1" does not exist.', $priceBySkuId));
        }
        return $priceBySku->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->priceBySkuCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \EasternEnterprise\PriceBySku\Api\Data\PriceBySkuInterface $priceBySku
    ) {
        try {
            $priceBySkuModel = $this->priceBySkuFactory->create();
            $this->resource->load($priceBySkuModel, $priceBySku->getPricebyskuId());
            $this->resource->delete($priceBySkuModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the PriceBySku: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($priceBySkuId)
    {
        return $this->delete($this->get($priceBySkuId));
    }
}

