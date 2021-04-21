<?php
namespace OmniPro\Prueba\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'OmniPro_Prueba::delete';


    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \OmniPro\Prueba\Model\BlogFactory $contactFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->contactFactory = $contactFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $contact = $this->contactFactory->create()->load($id);

        if(!$contact)
        {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('blogs/prueba/', array('_current' => true));
        }

        try{
            $contact->delete();
            $this->messageManager->addSuccess(__('Your blog has been deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete blog'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('blogs/prueba/', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('blogs/prueba/', array('_current' => true));
    }
    /**
     * Is the user allowed to view the page.
    *
    * @return bool
    */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
