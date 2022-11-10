<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Block;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Widget implements BlockInterface
{
    protected $_template = "widget.phtml";
    protected $apiRepo;
    protected $helper;
    
    public function __construct(
        \RichardParnabyKing\PixieMediaTest\Api\ApiRepositoryInterface $apiRepo,
        \RichardParnabyKing\PixieMediaTest\Helper\Data $helper
    ) {
        $this->apiRepo = $apiRepo;
        $this->helper = $helper;
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
            catch (\NoSuchEntityException $e) {
                $value = $e->getMessage();
            }
        }
        return $value;
    }
}