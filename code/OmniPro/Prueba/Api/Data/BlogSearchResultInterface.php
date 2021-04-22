<?php
namespace OmniPro\Prueba\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BlogSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \OmniPro\Prueba\Api\Data\BlogInterface[]
     */
    public function getItems();
 
    /**
     * @param \OmniPro\Prueba\Api\Data\BlogInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}