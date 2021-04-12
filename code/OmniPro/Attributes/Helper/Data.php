<?php
namespace OmniPro\Attributes\Helper;

use Magento\TestFramework\Event\Magento;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    const CONFIG_PATH = 'omniprosection/omniprogroup/';

    public function __construct($context)
    {
        self::__construct($context);
    }

    public function getConfig(){
        return $this->scopeConfig->getValue();
    }
}
