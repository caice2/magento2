<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Omnipro\ExampleUpload\Controller\Adminhtml\Blog;

use Magento\Framework\Exception\LocalizedException;


class Upload extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'OmniPro_Prueba::newaction';

    protected $dataPersistor;
    /**
     * @var \Magento\Framework\Filesystem
     */
    private $filesystem;
    /**
     * @var \Magento\MediaStorage\Model\File\UploaderFactory
     */
    private $fileUploaderFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
        $this->filesystem = $filesystem;
        $this->fileUploaderFactory = $fileUploaderFactory;
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');

            $model = $this->_objectManager->create(\Omnipro\Prueba\Api\Model\Blog::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Blog no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            try {
                $filesData = $this->getRequest()->getFiles('img');
                // init uploader model.
                $uploader = $this->fileUploaderFactory->create(['fileId' => 'img']);
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);
                $uploader->setAllowCreateFolders(true);
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png', 'pdf', 'docx']);
                $path = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath('blog-images');
                $result = $uploader->save($path);
                $upload_document = 'blog-images'.$uploader->getUploadedFilename();
                $filePath = $result['path'].$result['file'];
                $fileName = $result['name'];
                $data['img'] = $fileName;
            }catch (\Exception $e) {
               echo $e->getMessage();
            }
            die();

            $this->dataPersistor->set('omnipro_blog_blogitem', $data);
            return $resultRedirect->setPath('*/*/save', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

