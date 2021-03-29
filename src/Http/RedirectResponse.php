<?php


namespace HseEvents\Http;


class RedirectResponse extends Response
{

    public function __construct(string $url, int $status)
    {
        parent::__construct($content = '', $status, ['Location'=>$url]);
    }


}