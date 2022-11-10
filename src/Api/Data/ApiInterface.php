<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Api\Data;

interface ApiInterface extends \Magento\Framework\Api\CustomAttributesDataInterface
{
    /**
     * Constants defined for keys of  data array
     */
    const ID = 'id';
    const CREATED_AT = 'created_at';
    const REMOTE_ID = 'remote_id';
    const URL = 'url';
    const VALUE = 'value';

    /**
     * id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * created date
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created date
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Remote id
     *
     * @return string|null
     */
    public function getRemoteId();

    /**
     * Set remote id
     *
     * @param string $remoteId
     * @return $this
     */
    public function setRemoteId($remoteId);

    /**
     * Url
     *
     * @return string|null
     */
    public function getUrl();

    /**
     * Set Url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url);

    /**
     * Value
     *
     * @return string|null
     */
    public function getValue();

    /**
     * Set Value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Magento\Catalog\Api\Data\ProductExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Magento\Catalog\Api\Data\ProductExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Magento\Catalog\Api\Data\ProductExtensionInterface $extensionAttributes);

}
