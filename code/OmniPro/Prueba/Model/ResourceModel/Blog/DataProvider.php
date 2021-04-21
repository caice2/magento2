<?php
namespace OmniPro\Prueba\Model\ResourceModel\Blog;

use OmniPro\Prueba\Model\ResourceModel\Blog\CollectionFactory;
use OmniPro\Prueba\Model\Blog;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $blog)
        {
            $this->_loadedData[$blog->getId()] = $blog->getData();
        }

        return $this->_loadedData;
    }
}
