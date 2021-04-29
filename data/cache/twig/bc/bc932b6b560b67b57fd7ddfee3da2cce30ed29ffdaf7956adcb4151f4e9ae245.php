<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout.twig */
class __TwigTemplate_03e76152815339f543f4ebc642f51ad4adb35045c22318495758be91819af812 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'styles' => [$this, 'block_styles'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <!-- Css Link -->
    ";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        // line 11
        echo "
    <!-- <link rel=\"stylesheet\" href=\"css/bootstrap.css\"> -->
    ";
        // line 13
        $this->displayBlock('styles', $context, $blocks);
        // line 20
        echo "
</head>
<body>

";
        // line 24
        $this->displayBlock('header', $context, $blocks);
        // line 47
        echo "<main>
    ";
        // line 48
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "    ";
        // line 51
        echo "</main>


<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf\"
        crossorigin=\"anonymous\"></script>

</body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "        <title>Мероприятия</title>
    ";
    }

    // line 13
    public function block_styles($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\"
              integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\"
              crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/styles.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/blocks.css\">
    ";
    }

    // line 24
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "    <header class=\"header d-flex justify-content-between\">
        <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
            <a href=\"/home\"><p class=\"res-margin ml-2\">Мероприятия</p></a>
            <!-- <img src=\"images/hse-logo.png\" alt=\"Logo\" class=\"logo-img\"> -->
        </div>

        ";
        // line 31
        if ( !twig_test_empty(($context["username"] ?? null))) {
            // line 32
            echo "            <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
                <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
                <a href=\"/account\"><p class=\"res-margin\">Личный кабинет</p></a>
                <a href=\"/logout\"><p class=\"res-margin\">Выйти</p></a>
            </div>
        ";
        } else {
            // line 38
            echo "            <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
                <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
                <a href=\"/registration\"><p class=\"res-margin\">Регистрация</p></a>
                <a href=\"/login\"><p class=\"res-margin\">Войти</p></a>
            </div>
        ";
        }
        // line 44
        echo "    </header>

";
    }

    // line 48
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "    ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  148 => 49,  144 => 48,  138 => 44,  130 => 38,  122 => 32,  120 => 31,  112 => 25,  108 => 24,  99 => 14,  95 => 13,  90 => 9,  86 => 8,  73 => 51,  71 => 50,  69 => 48,  66 => 47,  64 => 24,  58 => 20,  56 => 13,  52 => 11,  50 => 8,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <!-- Css Link -->
    {% block title %}
        <title>Мероприятия</title>
    {% endblock %}

    <!-- <link rel=\"stylesheet\" href=\"css/bootstrap.css\"> -->
    {% block styles %}
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\"
              integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\"
              crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/styles.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/blocks.css\">
    {% endblock %}

</head>
<body>

{% block header %}
    <header class=\"header d-flex justify-content-between\">
        <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
            <a href=\"/home\"><p class=\"res-margin ml-2\">Мероприятия</p></a>
            <!-- <img src=\"images/hse-logo.png\" alt=\"Logo\" class=\"logo-img\"> -->
        </div>

        {% if username is not empty %}
            <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
                <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
                <a href=\"/account\"><p class=\"res-margin\">Личный кабинет</p></a>
                <a href=\"/logout\"><p class=\"res-margin\">Выйти</p></a>
            </div>
        {% else %}
            <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
                <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
                <a href=\"/registration\"><p class=\"res-margin\">Регистрация</p></a>
                <a href=\"/login\"><p class=\"res-margin\">Войти</p></a>
            </div>
        {% endif %}
    </header>

{% endblock %}
<main>
    {% block content %}
    {% endblock %}
    {# <?= \$content ?> #}
</main>


<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf\"
        crossorigin=\"anonymous\"></script>

</body>
</html>
", "layout.twig", "/home/user/PhpstormProjects/hseEvents/templates/layout.twig");
    }
}
