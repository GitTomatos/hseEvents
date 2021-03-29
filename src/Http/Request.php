<?php


namespace HseEvents\Http;


class Request
{
    private array $params;
    private array $request;
    private array $cookie;
    private array $files;

    public function __construct(array $params = [], array $request = [], array $cookie = [], array $files = [])
    {
        $this->params = $params;
        $this->request = $request;
        $this->cookie = $cookie;
        $this->files = $files;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getRequest(): array
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getCookie(): array
    {
        return $this->cookie;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }


}