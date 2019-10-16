<?php
   

    /**
     * Tax totals modification block. Can be used just as subblock of \Magento\Sales\Block\Order\Totals
     */
    namespace Dev\Custom\Block\Adminhtml\Sales\Order\Invoice;



    class Gst extends \Magento\Framework\View\Element\Template
    {
        protected $_config;
        protected $_order;
        protected $_source;

        public function __construct(
            \Magento\Framework\View\Element\Template\Context $context,
            \Magento\Tax\Model\Config $taxConfig,
            array $data = []
        ) {
            $this->_config = $taxConfig;
            parent::__construct($context, $data);
        }

        public function displayFullSummary()
        {
            return true;
        }

        public function getSource()
        {
            return $this->_source;
        } 
        public function getStore()
        {
            return $this->_order->getStore();
        }
        public function getOrder()
        {
            return $this->_order;
        }
        public function getLabelProperties()
        {
            return $this->getParentBlock()->getLabelProperties();
        }

        public function getValueProperties()
        {
            return $this->getParentBlock()->getValueProperties();
        }
         public function initTotals()
        {
            $parent = $this->getParentBlock();
            $this->_order = $parent->getOrder();
            $this->_source = $parent->getSource();

            $store = $this->getStore();

                $gst = new \Magento\Framework\DataObject(
                        [
                            'code' => 'gst',
                            'strong' => false,
                            'value' => $this->_order->getGst(),
                            'base_value' => $this->_order->getGst(),
                            'label' => __('Gst'),
                        ]
                    );
                    $parent->addTotal($gst, 'gst');
                    return $this;

        }

    }