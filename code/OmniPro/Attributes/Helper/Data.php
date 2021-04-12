<?php
namespace OmniPro\Attributes\Helper;

use Magento\TestFramework\Event\Magento;
use \Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    const CONFIG_PATH = 'omniprosection/omniprogroup/';

    public function __construct(\Magento\Framework\App\Helper\Context $context)
    {
        parent::__construct($context);
    }

    public function getConfig($config, $storeId = null){
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH . $config,
            ScopeInterface::SCOPE_STORE,
            $storeId);
    }

    public function getOmniproField($storeId = null){
        return $this->getConfig('omniprofield',$storeId );
    }
}
