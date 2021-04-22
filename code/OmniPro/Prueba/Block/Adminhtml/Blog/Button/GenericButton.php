<?php
namespace OmniPro\Prueba\Block\Adminhtml\Blog\Button;

use Magento\Backend\Block\Widget\Context;

class GenericButton
{

    private  $context;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * Return model ID
     *
     * @return int|null
     */
    public function getModelId()
    {
        return $this->context->getRequest()->getParam('id');
    }

   

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
