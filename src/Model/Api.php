<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Model;

use RichardParnabyKing\PixieMediaTest\Api\Data\ApiInterface;

class Api extends \Magento\Framework\Model\AbstractModel implements ApiInterface
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct() {
        $this->_init(\RichardParnabyKing\PixieMediaTest\Model\ResourceModel\Api::class);
    }
    
    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getId() {
        return $this->getData(self::ID);
    }
    
    /**
     * @inheritdoc
     *
     * @param int $id
     * @return $this
     */
    public function setId($id) {
        return $this->setData(self::ID, $id);
    }
    
    /**
     * @inheritdoc
     *
     * @return string|null
     */
    public function getCreatedAt() {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritdoc
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt) {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritdoc
     *
     * @return string|null
     */
    public function getRemoteId() {
        return $this->getData(self::REMOTE_ID); 
    }

    /**
     * @inheritdoc
     *
     * @param string $remoteId
     * @return $this
     */
    public function setRemoteId($remoteId) {
        return $this->setData(self::REMOTE_ID, $remoteId); 
    }

    /**
     * @inheritdoc
     *
     * @return string|null
     */
    public function getUrl() {
        return $this->getData(self::URL); 
    }

    /**
     * @inheritdoc
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url) {
        return $this->setData(self::URL, $url); 
    }

    /**
     * @inheritdoc
     *
     * @return string|null
     */
    public function getValue() {
        return $this->getData(self::VALUE); 
    }

    /**
     * @inheritdoc
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value) {
        return $this->setData(self::VALUE, $value); 
    }
}