<?php


namespace HseEvents\Filter;


class RegistrationFilter implements FilterInterface
{

    public function filter($data)
    {
        $data['last_name'] = $data['last_name'] ?? filter_var(
            $data['last_name'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['first_name'] = $data['first_name'] ?? filter_var(
            $data['first_name'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['patronymic'] = $data['patronymic'] ?? filter_var(
            $data['patronymic'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['university'] = $data['university'] ?? filter_var(
            $data['university'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['speciality'] = $data['speciality'] ?? filter_var(
            $data['speciality'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['year'] = $data['year'] ?? filter_var(
            $data['year'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['phone'] = $data['phone'] ?? filter_var(
            $data['phone'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['email'] = $data['email'] ?? filter_var(
            $data['email'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $data['password'] = $data['password'] ?? filter_var(
            $data['password'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        return $data;
    }
}