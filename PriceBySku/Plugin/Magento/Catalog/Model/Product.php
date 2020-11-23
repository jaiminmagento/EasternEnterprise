<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace EasternEnterprise\PriceBySku\Plugin\Magento\Catalog\Model;

use Magento\Framework\HTTP\Client\Curl;

class Product
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface $_storeManager
     */
    protected $_storeManager;

    /**
     * @var Curl
     */
    protected $curlClient;

    /**
     * @var string
     */
    protected $apiUrl = 'rest/V1/easternenterprise-pricebysku/productprice/';

    /**
     * @var string
     */
    protected $token = '0nevgbyx7livc3b8me5m4i6dtqrdva1o';

    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param Curl $curl
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        Curl $curl
        ) {
            $this->_storeManager=$storeManager;
            $this->curlClient = $curl;
    }

    /**
    * @return string
    */
    public function getApiUrl($sku)
    {
        return $this->getBaseUrl() . $this->apiUrl . $sku;
    }

    /**
    * @return string
    */
    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    /**
     * @return Curl
     */
    public function getCurlClient()
    {
        return $this->curlClient;
    }

    public function afterGetPrice(
        \Magento\Catalog\Model\Product $subject,
        $result
    ) {
        $sku = $subject->getSku();
        $apiUrlend = $this->getApiUrl($sku);
        try{
            $this->getCurlClient()->setOptions(
                [
                    CURLOPT_RETURNTRANSFER => true 
                ]
            );
            $this->getCurlClient()->addHeader("Content-Type", "application/json");
            $this->getCurlClient()->addHeader("Authorization", "Bearer . $this->token");
            $this->getCurlClient()->get($apiUrlend);
            $response = json_decode($this->getCurlClient()->getBody(), true);
            file_put_contents(BP.'/var/log/apires.log', print_r($response,true), FILE_APPEND);
            if ($response) {
                return $response;
            } else {
                return $result;
            }
            } catch (\Exception $e) {
                return $result;
            }
    }
}

