<?php
/**
 * @copyright 2015 Contentful GmbH
 * @license   MIT
 */

namespace Contentful\Management;

use Contentful\Client as BaseClient;
use Contentful\Delivery\Asset;
use Contentful\Delivery\ContentType;
use Contentful\Delivery\EntryInterface;
use Contentful\Delivery\InstanceCache;
use Contentful\Delivery\Link;
use Contentful\Log\LoggerInterface;
use Contentful\Delivery\Client as DeliveryClient;

/**
 * A Client is used to communicate the Contentful Delivery API.
 *
 * A Client is only responsible for one Space. When access to multiple spaces is required, create multiple Clients.
 *
 * @api
 */
class Client extends BaseClient
{
    const VERSION = '0.6.5-beta';

    /**
     * @var ResourceBuilder
     */
    private $builder;

    /**
     * @var DeliveryClient
     */
    private $deliveryClient;

    /**
     * @var InstanceCache
     */
    private $instanceCache;

    /**
     * Client constructor.
     *
     * @param string $token Delivery API Access Token for the space used with this Client
     * @param string $spaceId ID of the space used with this Client.
     * @param bool $preview True to use the Preview API - not available in Manegement Client
     * @param LoggerInterface $logger
     * @param DeliveryClient $deliveryClient
     *
     * @api
     */
    public function __construct($token, $spaceId, $preview = false, LoggerInterface $logger = null, DeliveryClient $deliveryClient)
    {
        $baseUri = 'https://api.contentful.com/spaces/';
        $api = 'MANAGEMENT';

        $instanceCache = new InstanceCache;

        parent::__construct($token, $baseUri . $spaceId . '/', $api, $logger);

        $this->instanceCache = $instanceCache;
        $this->deliveryClient = $deliveryClient;
        $this->builder = new ResourceBuilder($deliveryClient, $this, $instanceCache, $spaceId);
    }

    /**
     * @param  ContentType $contentType
     * @param  array $fields
     *
     * @return EntryInterface
     *
     * @api
     */
    public function createEntry(ContentType $contentType, array $fields)
    {
        //transfer payload into JSON
        $payload = json_encode(['fields' => $fields]);

        $options = ['headers' => ['X-Contentful-Content-Type' => $contentType->getId()],
            'body' => $payload];

        return $this->requestAndBuild('POST', 'entries', $options);
    }

    private function requestAndBuild($method, $path, array $options = [])
    {
        if ($method == 'GET')
            return $this->builder->buildObjectsFromRawData($this->request($method, $path, $options));
        return $this->builder->buildResponseFromRawData($this->request($method, $path, $options));
    }

    /**
     * @param  string $id
     * @param  integer $version
     *
     * @return EntryInterface
     *
     * @api
     */
    public function publishEntry($id, $version)
    {
        $options = ['headers' => ['X-Contentful-Version' => $version]];
        $path = 'entries/' . $id . '/published';

        return $this->requestAndBuild('PUT', $path, $options);
    }

    /**
     * Resolve a link to it's resource.
     *
     * @param Link $link
     *
     * @return Asset|EntryInterface
     *
     * @throws \InvalidArgumentException When encountering an unexpected link type.
     *
     * @internal
     */
    public function resolveLink(Link $link)
    {
        $id = $link->getId();
        $type = $link->getLinkType();

        switch ($link->getLinkType()) {
            case 'Entry':
                return $this->deliveryClient->getEntry($id);
            case 'Asset':
                return $this->deliveryClient->getAsset($id);
            default:
                throw new \InvalidArgumentException('Tyring to resolve link for unknown type "' . $type . '".');
        }
    }

    /**
     * The name of the library to be used in the User-Agent header.
     *
     * @return string
     */
    protected function getUserAgentAppName()
    {
        return 'ContentfulCDA/' . self::VERSION;
    }
}
