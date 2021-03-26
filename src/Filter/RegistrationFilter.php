<?php


namespace HseEvents\Filter;


class RegistrationFilter implements FilterInterface
{

    public function filter($data)
    {

//        $data['lastName'] = $data['lastName'] ?? filter_var(
//            $data['lastName'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['firstName'] = $data['firstName'] ?? filter_var(
//            $data['firstName'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['patronymic'] = $data['patronymic'] ?? filter_var(
//            $data['patronymic'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['university'] = $data['university'] ?? filter_var(
//            $data['university'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['speciality'] = $data['speciality'] ?? filter_var(
//            $data['speciality'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['year'] = $data['year'] ?? filter_var(
//            $data['year'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['phone'] = $data['phone'] ?? filter_var(
//            $data['phone'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['email'] = $data['email'] ?? filter_var(
//            $data['email'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );
//
//        $data['password'] = $data['password'] ?? filter_var(
//            $data['password'],
//            FILTER_SANITIZE_SPECIAL_CHARS
//        );

        $password = md5($data['password']);
        $data = (new SanitizingFilter())->filter($data);
        $data['password'] = $password;

        return $data;
    }
}