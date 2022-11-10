<?php

declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Model\ResourceModel;

class Api extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('rpk_chucknorris', 'id');
    }
}
