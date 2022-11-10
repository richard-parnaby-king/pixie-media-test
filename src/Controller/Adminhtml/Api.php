<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Controller\Adminhtml;

abstract class Api extends \Magento\Backend\App\Action
{

    protected $_coreRegistry;
    const ADMIN_RESOURCE = 'RichardParnabyKing_PixieMediaTest::top_level';
    protected $apiModel;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \RichardParnabyKing\PixieMediaTest\Model\Api $apiModel
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
        $this->apiModel = $apiModel;
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Richard PK'), __('Richard PK'))
            ->addBreadcrumb(__('Api'), __('Api'));
        return $resultPage;
    }
}

