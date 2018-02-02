<?php

namespace Contentful\Asset;

use Contentful\Client as BaseClient;
use Contentful\Delivery\InstanceCache;
use Contentful\Log\LoggerInterface;

class Client extends BaseClient
{
    const VERSION = '0.6.5-beta';
    const DEFAULT_HEADERS = [
        'Content-Type' => 'application/octet-stream'
    ];

    private $instanceCache;


    public function __construct($token, $spaceId, LoggerInterface $logger = null)
    {
        $baseUri = 'https://api.contentful.com/spaces/';
        $api = 'MANAGEMENT';

        $instanceCache = new InstanceCache;

        parent::__construct($token, $baseUri . $spaceId . '/', $api, $logger);

        $this->instanceCache = $instanceCache;
    }

    public function store(Fields $fields)
    {
        return $this->call('POST', 'assets', $fields->getAsJson(), ['Content-Type' => 'application/vnd.contentful.management.v1+json']);
    }

    public function get($id)
    {
        return $this->call('GET', 'assets/' . $id);
    }

    public function process($id, $locale)
    {
        try {
            return $this->call('PUT', 'assets/' . $id . '/files/' . $locale . '/process', '');
        } catch (\RuntimeException $exception) {
            return $this->get($id);
        }
    }

    public function publish($id, $version)
    {
        $this->call('PUT', 'assets/' . $id . '/published', '', ['X-Contentful-Version' => $version + 1]);
    }

    protected function call($method, $path, $data = '', $headers = [])
    {
        $options = [
            'headers' => $headers,
        ];
        if ($data) {
            $options['body'] = $data;
        }

        return $this->request($method, $path, $options);
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