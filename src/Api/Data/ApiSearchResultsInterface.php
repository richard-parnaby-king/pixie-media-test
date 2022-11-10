<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Api\Data;

interface ApiSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get list.
     * @return \RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface[]
     */
    public function getItems();

    /**
     * Set list.
     * @param \RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

