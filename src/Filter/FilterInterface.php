<?php


namespace HseEvents\Filter;


interface FilterInterface
{
    /**
     * @param mixed $data
     * @return mixed
     */
    public function filter($data);
}