<?php


namespace HseEvents\View;


interface ViewInterface
{
    public function render(string $template, array $data = []): string;
}