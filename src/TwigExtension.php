<?php


namespace HseEvents;


class TwigExtension extends \Twig\Extension\AbstractExtension
{
    private array $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('test'),
        ];
    }

    public function test()
    {
        return 'good';
    }
}