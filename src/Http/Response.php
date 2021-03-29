<?php


namespace HseEvents\Http;


class Response
{
    private string $content;
    private int $status;
    private array $headers;

    public function __construct(string $content = '', int $status = 200, array $headers = [])
    {
        $this->content = $content;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function send(): void {
        if (!headers_sent()) {
            http_response_code($this->getStatus());
            foreach ($this->getHeaders() as $headerName=>$headerValue) {
                header("$headerName: $headerValue");
            }
        }

        echo $this->getContent();
    }

}