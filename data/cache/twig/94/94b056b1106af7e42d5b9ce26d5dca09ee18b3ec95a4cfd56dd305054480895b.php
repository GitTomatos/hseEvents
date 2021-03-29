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
class __TwigTemplate_b797858c3b8580892b02659a2d13e4f67ffd06fa941d6deda3b62310a4af0ba4 extends Template
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
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\"
          integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/styles.css\">

</head>
<body>


<header class=\"header d-flex justify-content-between\">
    <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
        <a href=\"/home\"><p class=\"res-margin ml-2\">Мероприятия</p></a>
        <!-- <img src=\"images/hse-logo.png\" alt=\"Logo\" class=\"logo-img\"> -->
    </div>

    ";
        // line 27
        if ( !twig_test_empty(($context["sessionUsername"] ?? null))) {
            // line 28
            echo "        <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
            <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
            <a href=\"/account\"><p class=\"res-margin\">Личный кабинет</p></a>
            <a href=\"/logout\"><p class=\"res-margin\">Выйти</p></a>
        </div>
    ";
        } else {
            // line 34
            echo "        <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
            <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
            <a href=\"/registration\"><p class=\"res-margin\">Регистрация</p></a>
            <a href=\"http://localhost:8080/login\"><p class=\"res-margin\">Войти</p></a>
        </div>
    ";
        }
        // line 40
        echo "

</header>

<main>
    ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 48
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

    // line 45
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "    ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 46,  117 => 45,  112 => 9,  108 => 8,  95 => 48,  93 => 45,  86 => 40,  78 => 34,  70 => 28,  68 => 27,  50 => 11,  48 => 8,  39 => 1,);
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
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\"
          integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/styles.css\">

</head>
<body>


<header class=\"header d-flex justify-content-between\">
    <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
        <a href=\"/home\"><p class=\"res-margin ml-2\">Мероприятия</p></a>
        <!-- <img src=\"images/hse-logo.png\" alt=\"Logo\" class=\"logo-img\"> -->
    </div>

    {% if sessionUsername is not empty %}
        <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
            <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
            <a href=\"/account\"><p class=\"res-margin\">Личный кабинет</p></a>
            <a href=\"/logout\"><p class=\"res-margin\">Выйти</p></a>
        </div>
    {% else %}
        <div class=\"col-lg-4 d-flex justify-content-center align-items-center header-button\">
            <!-- <img src=\"https://img.icons8.com/cute-clipart/64/000000/bulleted-list.png\"/> -->
            <a href=\"/registration\"><p class=\"res-margin\">Регистрация</p></a>
            <a href=\"http://localhost:8080/login\"><p class=\"res-margin\">Войти</p></a>
        </div>
    {% endif %}


</header>

<main>
    {% block content %}
    {% endblock %}
{#    <?= \$content ?>#}
</main>


<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf\"
        crossorigin=\"anonymous\"></script>

</body>
</html>
", "layout.twig", "/srv/www/hse_events/templates/layout.twig");
    }
}
