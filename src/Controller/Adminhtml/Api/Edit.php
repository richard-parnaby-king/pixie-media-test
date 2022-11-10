<?php declare(strict_types=1);

namespace \RichardParnabyKing\PixieMediaTest\Controller\Adminhtml\Api;

class Edit extends \RichardParnabyKing\PixieMediaTest\Controller\Adminhtml\Api
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \RichardParnabyKing\PixieMediaTest\Model\Api $apiModel,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry, $apiModel);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('Api_id');
        $model = $this->apiModel;
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Api no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('RichardParnabyKing_PixieMediaTest_Api', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Api') : __('New Api'),
            $id ? __('Edit Api') : __('New Api')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Apis'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Api %1', $model->getId()) : __('New Api'));
        return $resultPage;
    }
}

