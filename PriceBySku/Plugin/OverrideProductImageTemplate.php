<?php
namespace EasternEnterprise\PriceBySku\Plugin;

use Magento\Catalog\Block\Product\Image as ImageSubject;

class OverrideProductImageTemplate
{
    public function beforeSetTemplate(ImageSubject $subject, string $template): array
    {
        $template = str_replace('Magento_Catalog', 'EasternEnterprise_PriceBySku', $template);
        return [$template];
    }
}
