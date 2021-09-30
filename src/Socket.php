<?php

namespace DevKhris\NetSocket;

use Socket as GlobalSocket;

class Socket
{
    protected string $ipAddress;

    protected int $port;

    protected GlobalSocket $socket;

    protected int $type = SOL_TCP;

    protected int $protocol = SOCK_STREAM;

    protected int $domain = AF_INET;

    protected int $maxConnections = 50;

    /**
     * Socket constructor
     *
     * @param string $ipAdress        IP Adress
     * @param int $port               Port number
     * @param int ...$type            type of connection
     * @param int ...$protocol        protocol
     * @param int ...$domain          domain 
     * @param int ...$maxConnections  max connections for socket
     * 
     * @return Socket
     */
    public function __construct(
        string $ipAdress,
        int $port,
        int ...$type,
        int ...$protocol,
        int ...$domain,
        int ...$maxConnections,
    ): Socket {
        $this->ipAddress = $ipAdress;
        $this->port = $port;
        $this->type = $type;
        $this->protocol = $protocol;
        $this->domain = $domain;
        $this->maxConnections = $maxConnections;

        return $this;
    }

    /**
     * Get the value of ipAddress
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set the value of ipAddress
     * 
     * @param string $ipAddress IP Address to bind socket
     * 
     * @return bool
     */
    public function setIpAddress(string $ipAddress): bool
    {
        return $this->ipAddress = $ipAddress;
    }

    /**
     * Get the value of port
     * 
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Set the value of port
     * @param int $port Port numnber
     * 
     * @return  bool
     */
    public function setPort(int $port): bool
    {
        return $this->port = $port;
    }

    /**
     * Get the value of socket
     */
    public function getSocket(): GlobalSocket
    {
        return $this->socket;
    }

    /**
     * Set the value of socket
     * @param GlobalSocket $socket
     * 
     * @return  GlobalSocket
     */
    public function setSocket(GlobalSocket $socket): GlobalSocket
    {
        return $this->socket = $socket;
    }

    /**
     * Set the value of type
     *
     * @return  boolean
     */
    public function setType(int $type): bool
    {
        return $this->type = $type;
    }

    /**
     * Set the value of protocol
     *
     * @return  boolean
     */
    public function setProtocol(int $protocol): bool
    {
        return $this->protocol = $protocol;
    }

    /**
     * Set the value of domain
     *
     * @return boolean
     */
    public function setDomain(int $domain): bool
    {
        return $this->domain = $domain;
    }

    /**
     * Get the value of maxConnections
     * 
     * @return int
     */
    public function getMaxConnections(): int
    {
        return $this->maxConnections;
    }

    /**
     * Set the value of maxConnections
     * @param int $maxConnections
     * 
     * @return  bool
     */
    public function setMaxConnections($maxConnections): bool
    {
        return $this->maxConnections = $maxConnections;
    }

    public function createSocket(): Socket|bool
    {
        $socket = socket_create($this->domain, $this->type, $this->protocol);
        return $this->setSocket($socket);
    }

    public function bindSocket(): bool
    {
        return socket_bind($this->socket, $this->ipAddress, $this->port);
    }

    public function listenSocket(): bool
    {
        return socket_listen($this->socket, $this->maxConnections);
    }
}
