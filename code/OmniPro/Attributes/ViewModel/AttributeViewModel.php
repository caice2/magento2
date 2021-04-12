<?php
namespace OmniPro\Attributes\ViewModel;

class AttributeViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @param \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig    
    )
    {
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;        
    }

    public function getConfig() {
        $id = $this->storeManager->getStore()->getId();
        $config = $this->scopeConfig->getValue("omniprosection/omniprogroup/omniprofield", 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $id);
        return $config;
    }
}
