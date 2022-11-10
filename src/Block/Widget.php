<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Block;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Widget extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    protected $_template = "widget.phtml";
    protected $apiRepo;
    protected $helper;
    
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \RichardParnabyKing\PixieMediaTest\Api\ApiRepositoryInterface $apiRepo,
        \RichardParnabyKing\PixieMediaTest\Helper\Data $helper,
        array $data = []
    ) {
        $this->apiRepo = $apiRepo;
        $this->helper = $helper;
        parent::__construct($context, $data);
    }
    
    /**
     * Get the value with the supplied id.
     * @return String
     */
    public function getFact() {
        $value = '';
        if($this->helper->isActive()) {
            $id = $this->getData('id');
            try {
                $value = $this->apiRepo->get($id)->getValue();
            }
            //If value does not exist, show error message
            catch (NoSuchEntityException $e) {
                $value = $e->getMessage();
            }
        }
        return $value;
    }
}