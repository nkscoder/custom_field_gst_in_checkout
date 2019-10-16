<?php
namespace Dev\Custom\Plugin\Checkout\Block\Checkout;
class LayoutProcessor
{
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
 
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['gst'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'options' => [],
                'id' => 'gst'
            ],
            'dataScope' => 'shippingAddress.custom_attributes.gst',
            'label' => 'GST IN',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => ['min_text_length' => 0,'max_text_length' => 20,],
            'sortOrder' => 299,
            'id' => 'gst'
        ];
 
 
        return $jsLayout;
    }
}