<?php


namespace OmniPro\Prueba\Controller\Adminhtml\Index;

use Magento\Framework\Exception\LocalizedException;


class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'OmniPro_Prueba::newaction';
    // const ADMIN_RESOURCE = 'OmniPro_Prueba::newaction';

    // protected $dataPersistor;
    // /**
    //  * @var \Magento\Framework\Filesystem
    //  */
    // private $filesystem;
    // /**
    //  * @var \Magento\MediaStorage\Model\File\UploaderFactory
    //  */
    // private $fileUploaderFactory;

    // /**
    //  * @param \Magento\Backend\App\Action\Context $context
    //  * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    //  */
    // public function __construct(
    //     \Magento\Backend\App\Action\Context $context,
    //     \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
    //     \Magento\Framework\Filesystem $filesystem,
    //     \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory
    // ) {
    //     $this->dataPersistor = $dataPersistor;
    //     parent::__construct($context);
    //     $this->filesystem = $filesystem;
    //     $this->fileUploaderFactory = $fileUploaderFactory;
    // }

    // /**
    //  * Save action
    //  *
    //  * @return \Magento\Framework\Controller\ResultInterface
    //  */
    // public function execute()
    // {
    //     /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
    //     $resultRedirect = $this->resultRedirectFactory->create();
    //     $data = $this->getRequest()->getPostValue();
    //     if ($data) {
    //         $id = $this->getRequest()->getParam('id');

    //         $model = $this->_objectManager->create(\Omnipro\Prueba\Model\Blog::class)->load($id);
    //         if (!$model->getId() && $id) {
    //             $this->messageManager->addErrorMessage(__('This Blog no longer exists.'));
    //             return $resultRedirect->setPath('*/*/');
    //         }

    //         try {
    //             $filesData = $this->getRequest()->getFiles('img');
    //             // init uploader model.
    //             $uploader = $this->fileUploaderFactory->create(['fileId' => 'img']);
    //             $uploader->setAllowRenameFiles(true);
    //             $uploader->setFilesDispersion(true);
    //             $uploader->setAllowCreateFolders(true);
    //             $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png', 'pdf', 'docx']);
    //             $path = $this->fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath('blog-images');
    //             $result = $uploader->save($path);
    //             $upload_document = 'blog-images'.$uploader->getUploadedFilename();
    //             $filePath = $result['path'].$result['file'];
    //             $fileName = $result['name'];
    //             $data['img'] = $fileName;
    //         }catch (\Exception $e) {
    //             $this->inlineTranslation->resume();
    //             $this->messageManager->addError(
    //                 __('File format not supported.')
    //             );
    //         }


    //         $model->setData($data);

    //         try {
    //             $model->save();
    //             $this->messageManager->addSuccessMessage(__('You saved the Blog.'));
    //             $this->dataPersistor->clear('omnipro_blog_blogitem');

    //             if ($this->getRequest()->getParam('back')) {
    //                 return $resultRedirect->setPath('*/*/save', ['id' => $model->getId()]);
    //             }
    //             return $resultRedirect->setPath('*/*/');
    //         } catch (LocalizedException $e) {
    //             $this->messageManager->addErrorMessage($e->getMessage());
    //         } catch (\Exception $e) {
    //             $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Blog.'));
    //         }

    //         $this->dataPersistor->set('omnipro_blog_blogitem', $data);
    //         return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
    //     }
    //     return $resultRedirect->setPath('*/*/');
    // }
    
     /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \OmniPro\Prueba\Api\Data\BlogInterfaceFactory
     */
    private $blogInterfaceFactory;

    /**
     * @param \OmniPro\Prueba\Api\BlogRepositoryInterface
     */
    private $blogRepository;

    /**
     * @param \Magento\Framework\App\Request\DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @param \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
        \OmniPro\Prueba\Api\Data\BlogInterfaceFactory $blogInterfaceFactory,
        \OmniPro\Prueba\Api\BlogRepositoryInterface $blogRepository,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->blogInterfaceFactory = $blogInterfaceFactory;
        $this->blogRepository = $blogRepository;
        $this->dataPersistor = $dataPersistor;
        $this->logger = $logger;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        $this->logger->debug('omni-blog '. json_encode($data));
        return $resultRedirect->setPath('*/index');
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

