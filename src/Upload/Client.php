<?php

namespace Contentful\Upload;


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
        $baseUri = 'https://upload.contentful.com/spaces/';
        $api = 'MANAGEMENT';

        $instanceCache = new InstanceCache;

        parent::__construct($token, $baseUri . $spaceId . '/', $api, $logger);

        $this->instanceCache = $instanceCache;
    }

    public function store(Upload &$data)
    {
        $response = $this->call('POST', 'uploads', $data->getBody());
        $data->setId($response->sys->id);
    }

    public function get($id)
    {
        return $this->call('GET', 'uploads/' . $id);
    }

    public function delete($id)
    {
        return $this->call('DELETE', 'uploads/' . $id);
    }

    protected function call($method, $path, $body = '')
    {
        $options = [
            'headers' => self::DEFAULT_HEADERS,
            'body' => $body
        ];
        $result = $this->request($method, $path, $options);

        return $result;
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