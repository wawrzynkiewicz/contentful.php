<?php

namespace Contentful;

use Contentful\Log\NullLogger;
use Contentful\Log\LoggerInterface;
use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Management\Client as ManagementClient;
use Contentful\Clients;

/**
 * Abstract client for common code for the different clients.
 */
class ClientFactory
{
    private $logger;
    /**
     * @var Clients
     */
    private $clients;

    /**
     * Client constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?: new NullLogger();
    }

    /**
     * @param $parameters ['host_name', 'root', 'space', 'read_token', 'preview_token', 'write_token'];
     * @return Clients
     */
    function initializeClients($parameters)
    {
        $clients = new Clients(
            new DeliveryClient($parameters['read_token'], $parameters['space'], false, $this->logger),
            new DeliveryClient($parameters['preview_token'], $parameters['space'], true, $this->logger),
            new ManagementClient($parameters['write_token'], $parameters['space'], false, $this->logger, new DeliveryClient($parameters['read_token'], $parameters['space'], false, $this->logger))
        );

        $this->setClients($clients);
        return $this->getClients();
    }

    /**
     * @return Clients
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param Clients $clients
     */
    public function setClients($clients)
    {
        $this->clients = $clients;
    }
}
