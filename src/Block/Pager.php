<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Block;

use Magento\Framework\View\Element\Template;

class Pager extends Template
{
    protected $apiFactory;
    protected $apiCollectionFactory;

    public function __construct(
        Template\Context $context,
        \RichardParnabyKing\PixieMediaTest\Model\Api $apiFactory,
        \RichardParnabyKing\PixieMediaTest\Model\ResourceModel\Api\CollectionFactory $apiCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->apiFactory = $apiFactory;
        $this->apiCollectionFactory = $apiCollectionFactory;
    }
    
    protected function _prepareLayout() {
        parent::_prepareLayout();
        $page_size = $this->getPagerCount();
        $page_data = $this->getChuckData();
        if ($this->getChuckData()) {
            $pager = $this->getLayout()->createBlock(
                \Magento\Theme\Block\Html\Pager::class,
                'api.pager'
            )
                ->setAvailableLimit($page_size)
                ->setShowPerPage(true)
                ->setCollection($page_data);
            $this->setChild('pager', $pager);
            $this->getChuckData()->load();
        }
        return $this;
    }
    
    public function getPagerHtml() {
        return $this->getChildHtml('pager');
    }

    public function getChuckData() {
        // get param values
        $page = $this->getRequest()->getParam('p', 1);
        $pageSize = $this->getRequest()->getParam('limit', 10);
        // get custom collection
        $collection = $this->apiFactory->getCollection();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }

    public function getPagerCount() {
        $pages = [ 10, 25, 50, 100 ];
        return array_combine($pages, $pages);
    }
}