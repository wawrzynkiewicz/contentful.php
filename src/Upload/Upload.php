<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 30.08.17
 * Time: 12:29
 */

namespace Contentful\Upload;


class Upload
{
    private $id;
    private $body;

    /**
     * Upload constructor.
     * @param string $body
     * @param null|integer $id
     */
    public function __construct($body, $id = null)
    {
        $this->body = $body;
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
}