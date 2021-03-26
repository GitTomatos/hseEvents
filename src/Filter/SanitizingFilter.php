<?php


namespace HseEvents\Filter;


use Exception;

class SanitizingFilter implements FilterInterface
{

    public function filter($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $data[$key] ?? filter_var(
                        $data[$key],
                        FILTER_SANITIZE_SPECIAL_CHARS
                    );
            }
        } elseif (is_string($data)) {
            $data = $data ?? filter_var(
                    $data,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
        } else {
            throw new Exception('Необрабатываемый тип данных');
        }

        return $data;
    }
}