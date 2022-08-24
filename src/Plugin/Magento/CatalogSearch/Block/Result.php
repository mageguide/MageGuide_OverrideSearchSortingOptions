<?php


namespace MageGuide\OverrideSearchSortingOptions\Plugin\Magento\CatalogSearch\Block;

use Magento\Catalog\Model\Layer\Resolver as LayerResolver;

class Result
{

	/**
     * Catalog layer
     *
     * @var \Magento\Catalog\Model\Layer
     */
    protected $catalogLayer; 

    public function __construct(
      LayerResolver $layerResolver      
    ) {

        $this->catalogLayer = $layerResolver->get();             
    }

    public function aroundSetListOrders(
        \Magento\CatalogSearch\Block\Result $subject,
        \Closure $proceed       
    )
    {
        $category = $this->catalogLayer->getCurrentCategory();
        /* @var $category \Magento\Catalog\Model\Category */
        $availableOrders = $category->getAvailableSortByOptions();
        unset($availableOrders['position']);

        $subject->getListBlock()->setAvailableOrders(
            $availableOrders
        )->setDefaultDirection(
            'desc'
        )->setDefaultSortBy(
            $category->getDefaultSortBy()
        );

        return $subject;
    }
}
