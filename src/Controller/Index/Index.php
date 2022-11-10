<?php
namespace RichardParnabyKing\PixieMediaTest\Controller\Index;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected  $pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        
        parent::__construct($context);
    }

    public function execute() {
        return $this->pageFactory->create();
    }
}