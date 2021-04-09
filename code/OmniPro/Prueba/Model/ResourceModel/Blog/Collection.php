<?php
namespace OmniPro\Prueba\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
	protected $_eventPrefix = 'omnipro_prueba_blog_collection';
	protected $_eventObject = 'blog_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\OmniPro\Prueba\Model\Blog::class, \OmniPro\Prueba\Model\ResourceModel\Blog::class);
    }
}
