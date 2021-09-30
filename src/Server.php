<?php

namespace DevKhris\NetSocket;

class Server
{
    protected $socket = null;

    protected array $options = [
        'domain' => 1,
        'protocol' => 1,
        'type' => 6,
    ];

    public function __construct(Socket $socket)
    {
        $this->socket = $socket;
    }

    /**
     * Get the value of socket
     *
     * @return Socket
     */
    public function getSocket(): Socket
    {
        return $this->socket;
    }

    /**
     * Set the value of socket
     *
     * @param Socket $socket socket to set
     * 
     * @return boolean
     */
    public function setSocket(socket $socket): bool
    {
        return $this->socket = $socket;
    }
    /**
     * Get the value of options
     *
     * @param string $key option to get
     * 
     * @return string|int
     */
    public function getOptions(string $key): string|int
    {
        return $this->options[$key];
    }

    /**
     *  Set the value of options
     *
     * @param string     $key   key to set
     * @param string|int $value value to set
     * 
     * @return bool
     */
    public function setOptions(string $key, string|int $value): bool
    {
        return $this->options[$key] = $value;
    }

    /**
     * Set the value of socket
     *
     * @return  boolean
     */
    public function setSocket(Socket $socket): bool
    {
        return $this->socket = $socket;
    }

    public function setupServer(string $ipAddress, int $port)
    {
        $this->socket->setDomain($this->getOptions('domain'));
        $this->socket->setProtocol($this->getOptions('protocol'));
        $this->socket->setType($this->getOptions('type'));

        $this->setSocket($this->socket->createSocket());

        $this->socket->setSocket($this->getSocket());
        $this->socket->setIpAddress($ipAddress);
        $this->socket->setPort($port);
    }

    public function listenServer(int $maxConnections)
    {
        $this->socket->setMax
        $this->socket->bindSocket();
        $this->socket->listenSocket();
    }
}