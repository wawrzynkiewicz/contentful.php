<?php

namespace Contentful;

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Management\Client as ManagementClient;

/**
 * Abstract client for common code for the different clients.
 */
class Clients
{
    /**
     * @var DeliveryClient
     */
    private $readClient;

    /**
     * @var DeliveryClient
     */
    private $previewClient;

    /**
     * @var ManagementClient
     */
    private $writeClient;

    public function __construct(DeliveryClient $readClient, DeliveryClient $previewClient, ManagementClient $writeClient)
    {
        $this->readClient = $readClient;
        $this->previewClient = $previewClient;
        $this->writeClient = $writeClient;
    }

    /**
     * @return DeliveryClient
     */
    public function getReadClient()
    {
        return $this->readClient;
    }

    /**
     * @param DeliveryClient $readClient
     */
    public function setReadClient($readClient)
    {
        $this->readClient = $readClient;
    }

    /**
     * @return DeliveryClient
     */
    public function getPreviewClient()
    {
        return $this->previewClient;
    }

    /**
     * @param DeliveryClient $previewClient
     */
    public function setPreviewClient($previewClient)
    {
        $this->previewClient = $previewClient;
    }

    /**
     * @return ManagementClient
     */
    public function getWriteClient()
    {
        return $this->writeClient;
    }

    /**
     * @param ManagementClient $writeClient
     */
    public function setWriteClient($writeClient)
    {
        $this->writeClient = $writeClient;
    }
}
