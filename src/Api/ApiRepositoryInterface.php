<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Api;

interface ApiRepositoryInterface
{
    /**
     * Create row
     *
     * @param \RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface $row
     * @return \RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface $row);

    /**
     * Delete row
     *
     * @param \RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface $row
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\StateException
     */
    public function delete(\RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface $row);

    /**
     * @param string $sku
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function deleteById($sku);

    /**
     * Get list of rows
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \RichardParnabyKing\PixieMediaTest\Api\Data\ApiSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
