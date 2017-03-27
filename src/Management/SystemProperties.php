<?php
/**
 * @copyright 2015 Contentful GmbH
 * @license   MIT
 */

namespace Contentful\Management;

use Contentful\Management\ContentType;
use Contentful\Delivery\Link;
use Contentful\Delivery\Space;

/**
 * A SystemProperties instance contains the metadata of a resource.
 *
 * @package Contentful\Delivery
 */
class SystemProperties implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Space|null
     */
    private $space;

    /**
     * @var ContentType|null
     */
    private $contentType;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var int|null
     */
    private $publishedCounter;

    /**
     * @var int|null
     */
    private $publishedVersion;

    /**
     * @var \DateTimeImmutable|null
     */
    private $firstPublishedAt;

    /**
     * @var \DateTimeImmutable|null
     */
    private $createdAt;

    /**
     * @var Link|null
     */
    private $createdBy;

    /**
     * @var \DateTimeImmutable|null
     */
    private $publishedAt;

    /**
     * @var Link|null
     */
    private $publishedBy;

    /**
     * @var \DateTimeImmutable|null
     */
    private $updatedAt;

    /**
     * @var \DateTimeImmutable|null
     */
    private $updatedBy;

    /**
     * SystemProperties constructor.
     *
     * @param string $id
     * @param string $type
     * @param Space|null $space
     * @param ContentType|null $contentType
     * @param integer $publishedCounter
     * @param integer $publishedVersion
     * @param integer $version
     * @param \DateTimeImmutable|null $firstPublishedAt
     * @param \DateTimeImmutable|null $createdAt
     * @param Link $createdBy
     * @param \DateTimeImmutable|null $publishedAt
     * @param Link $publishedBy
     * @param \DateTimeImmutable|null $updatedAt
     * @param Link $updatedBy
     */
    public function __construct($id, $type, Space $space = null, ContentType $contentType = null, $publishedCounter = null, $publishedVersion = null, $version = null, \DateTimeImmutable $firstPublishedAt = null,
                                \DateTimeImmutable $createdAt = null, Link $createdBy = null, \DateTimeImmutable $publishedAt = null, Link $publishedBy = null, \DateTimeImmutable $updatedAt = null,
                                Link $updatedBy = null)
    {
        $this->id = $id;
        $this->type = $type;
        $this->space = $space;
        $this->contentType = $contentType;
        $this->publishedCounter = $publishedCounter;
        $this->publishedVersion = $publishedVersion;
        $this->version = $version;
        $this->firstPublishedAt = $firstPublishedAt;
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->publishedAt = $publishedAt;
        $this->publishedBy = $publishedBy;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return SystemProperties
     */
    public function setType(ContentType $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Space|null
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * @return SystemProperties
     */
    public function setSpace(Space $space)
    {
        $this->space = $space;
        return $this;
    }

    /**
     * @return ContentType|null
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return SystemProperties
     */
    public function setContentType(ContentType $contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublishedCounter()
    {
        return $this->publishedCounter;
    }

    /**
     * @return SystemProperties
     */
    public function setPublishedCounter($publishedCounter)
    {
        $this->publishedCounter = $publishedCounter;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublishedVersion()
    {
        return $this->publishedVersion;
    }

    /**
     * @return SystemProperties
     */
    public function setPublishedVersion($publishedVersion)
    {
        $this->publishedVersion = $publishedVersion;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return SystemProperties
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFirstPublishedAt()
    {
        return $this->firstPublishedAt;
    }

    /**
     * @return SystemProperties
     */
    public function setFirstPublishedAt(\DateTimeImmutable $firstPublishedAt)
    {
        $this->firstPublishedAt = $firstPublishedAt;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return SystemProperties
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Link|null
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @return SystemProperties
     */
    public function setCreatedBy(Link $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @return SystemProperties
     */
    public function setPublishedAt(\DateTimeImmutable $publishedAt)
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    /**
     * @return Link|null
     */
    public function getPublishedBy()
    {
        return $this->publishedBy;
    }

    /**
     * @return SystemProperties
     */
    public function setPublishedBy(Link $publishedBy)
    {
        $this->publishedBy = $publishedBy;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return SystemProperties
     */
    public function setUpdatedAt(\DateTimeImmutable $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return Link|null
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * @return SystemProperties
     */
    public function setUpdatedBy(Link $updatedBy)
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }

    /**
     * Returns an object to be used by `json_encode` to serialize objects of this class.
     *
     * @return object
     *
     * @see http://php.net/manual/en/jsonserializable.jsonserialize.php JsonSerializable::jsonSerialize
     */
    public function jsonSerialize()
    {
        $obj = new \stdClass;

        if ($this->id !== null) {
            $obj->id = $this->id;
        }
        if ($this->type !== null) {
            $obj->type = $this->type;
        }
        if ($this->space !== null) {
            $obj->space = (object)[
                'sys' => (object)[
                    'type' => 'Link',
                    'linkType' => 'Space',
                    'id' => $this->space->getId()
                ]
            ];
        }
        if ($this->contentType !== null) {
            $obj->contentType = (object)[
                'sys' => (object)[
                    'type' => 'Link',
                    'linkType' => 'ContentType',
                    'id' => $this->contentType->getId()
                ]
            ];
        }
        if ($this->revision !== null) {
            $obj->revision = $this->revision;
        }
        if ($this->createdAt !== null) {
            $obj->createdAt = $this->formatDateForJson($this->createdAt);
        }
        if ($this->updatedAt !== null) {
            $obj->updatedAt = $this->formatDateForJson($this->updatedAt);
        }
        if ($this->deletedAt !== null) {
            $obj->deletedAt = $this->formatDateForJson($this->deletedAt);
        }

        return $obj;
    }

    /**
     * Unfortunately PHP has no eeasy way to create a nice, ISO 8601 formatted date string with miliseconds and Z
     * as the time zone specifier. Thus this hack.
     *
     * @param  \DateTimeImmutable $dt
     *
     * @return string ISO 8601 formatted date
     */
    private function formatDateForJson(\DateTimeImmutable $dt)
    {
        $dt = $dt->setTimezone(new \DateTimeZone('Etc/UTC'));
        return $dt->format('Y-m-d\TH:i:s.') . str_pad(floor($dt->format('u') / 1000), 3, '0', STR_PAD_LEFT) . 'Z';
    }
}
