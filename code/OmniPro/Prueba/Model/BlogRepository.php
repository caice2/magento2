<?php
namespace OmniPro\Prueba\Model;

use OmniPro\Prueba\Api\Data\BlogInterface;
use OmniPro\Prueba\Api\Data\BlogSearchResultInterface;
use \OmniPro\Prueba\Model\ResourceModel\Blog\Collection;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;

class BlogRepository implements \OmniPro\Prueba\Api\BlogRepositoryInterface
{
    protected $_blogInterfaceFactory;
    protected $_blogCollectionFactory;
    protected $_blogSearchResultFactory;

    public function __construct(
        \OmniPro\Prueba\Api\Data\BlogInterfaceFactory $blogInterfaceFactory,
        \OmniPro\Prueba\Model\ResourceModel\Blog\CollectionFactory $blogCollectionFactory,
        \OmniPro\Prueba\Api\Data\BlogSearchResultInterfaceFactory $blogSearchResultInterfaceFactory
    )
    {
        $this->_blogInterfaceFactory = $blogInterfaceFactory;
        $this->_blogCollectionFactory = $blogCollectionFactory;
        $this->_blogSearchResultFactory = $blogSearchResultInterfaceFactory;
    }

    public function getById($id)
    {
        $blog = $this->_blogInterfaceFactory->create();
        $blog->getResource()->load($blog, $id);
        if(!$blog->getId()) {
            throw new NoSuchEntityException(__('Unable to load blog with id "%1"', $id));
        }
        return $blog;
    }

    public function save(BlogInterface $blog)
    {
        $blog->getResource()->save($blog);
        return $blog;
    }

    public function delete(BlogInterface $blog)
    {
        $blog->getResource()->delete($blog);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->_blogCollectionFactory->create();
 
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
 
        $collection->load();
 
        return $this->buildSearchResult($searchCriteria, $collection);
    }
 
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }
 
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }
 
    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }
 
    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->_blogSearchResultFactory->create();
 
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
 
        return $searchResults;
    }
}
