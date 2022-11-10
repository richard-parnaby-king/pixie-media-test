<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Model\ResourceModel\Api;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct() {
        $this->_init(
            \RichardParnabyKing\PixieMediaTest\Model\Api::class,
            \RichardParnabyKing\PixieMediaTest\Model\ResourceModel\Api::class
        );
    }
}

