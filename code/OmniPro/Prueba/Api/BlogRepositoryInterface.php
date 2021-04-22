<?php
namespace OmniPro\Prueba\Api;

use \OmniPro\Prueba\Api\Data\BlogInterface;
use \OmniPro\Prueba\Api\Data\BlogSearchResultInterface;

interface BlogRepositoryInterface
{
    /**
     * @param int $id
     * @return \OmniPro\Prueba\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);
 
    /**
     * @param \OmniPro\Prueba\Api\Data\BlogInterface $blog
     * @return \OmniPro\Prueba\Api\Data\BlogInterface
     */
    public function save(BlogInterface $blog);
 
    /**
     * @param \OmniPro\Prueba\Api\Data\BlogInterface $blog
     * @return void
     */
    public function delete(BlogInterface $blog);
 
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \OmniPro\Prueba\Api\Data\BlogSearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}