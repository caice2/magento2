<?php
namespace OmniPro\Prueba\Controller\Bootcamp;

use \Magento\Framework\Controller\ResultFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $_blogInterfaceFactory;

    protected $_blogRepository;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \OmniPro\Prueba\Api\Data\BlogInterfaceFactory $blogInterfaceFactory,
       \OmniPro\Prueba\Api\BlogRepositoryInterface $blogRepository
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_blogRepository = $blogRepository;
        $this->_blogInterfaceFactory = $blogInterfaceFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $params = $this->_request->getParams();
        /**
         * @var \OmniPro\Prueba\Model\Blog $blog
         */
        $blog = $this->_blogInterfaceFactory->create();
        $blog->setTitle($params['titulo'] ?? '');
        $blog->setEmail($params['email'] ?? '');
        $blog->setContent($params['contenido'] ?? '');
        $blog->setImg($params['img'] ?? '');
        $this->_blogRepository->save($blog);
        /**
         * @var \Magento\Framework\Controller\Result\Json $result
         */
        
        return $this->_redirect('*/*/prueba');
    }
}
