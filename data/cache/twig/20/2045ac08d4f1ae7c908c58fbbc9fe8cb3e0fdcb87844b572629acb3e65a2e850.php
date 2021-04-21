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

/* login.twig */
class __TwigTemplate_870656f9462bf779d4c21dd0e29c113a2ef17177407ff68dae63aa6c00a127f6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.twig", "login.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"container\">
        <!-- <div class=\"background-center\"> -->
        <div class=\"reg-background\">

            <div class=\"text-center\">
                <h1> Войти в аккаунт </h1>
            </div>


            <form action=\"\" method=\"post\">
                <div class='login-fields'>
                    <input type=\"text\" name=\"userLogin\" placeholder=\"Введите логин\"
                           value=\"";
        // line 16
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "userLogin", [], "any", false, false, false, 16)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "userLogin", [], "any", false, false, false, 16), "html", null, true))) : (print (null)));
        echo "\">

                    ";
        // line 18
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "login", [], "any", false, false, false, 18))) {
            // line 19
            echo "                        <div>
                            ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "login", [], "any", false, false, false, 20));
            foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                // line 21
                echo "                                <p>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</p>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "                        </div>
                    ";
        }
        // line 25
        echo "

                    <input type=\"password\" name=\"userPass\" placeholder=\"Введите пароль\"
                           value=\"";
        // line 28
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "userPass", [], "any", false, false, false, 28)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "userPass", [], "any", false, false, false, 28), "html", null, true))) : (print (null)));
        echo "\"
                    >

                    ";
        // line 31
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 31))) {
            // line 32
            echo "                        <div>
                            ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 33));
            foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                // line 34
                echo "                                <p>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</p>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "                        </div>
                    ";
        }
        // line 38
        echo "
                </div>

                <div class=\"text-center\">
                    <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"login\" value=\"Register\">
                        Регистрация
                    </button>
                </div>

            </form>

        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 38,  120 => 36,  111 => 34,  107 => 33,  104 => 32,  102 => 31,  96 => 28,  91 => 25,  87 => 23,  78 => 21,  74 => 20,  71 => 19,  69 => 18,  64 => 16,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container\">
        <!-- <div class=\"background-center\"> -->
        <div class=\"reg-background\">

            <div class=\"text-center\">
                <h1> Войти в аккаунт </h1>
            </div>


            <form action=\"\" method=\"post\">
                <div class='login-fields'>
                    <input type=\"text\" name=\"userLogin\" placeholder=\"Введите логин\"
                           value=\"{{ postData.userLogin ?: null }}\">

                    {% if errors.login is not empty %}
                        <div>
                            {% for key, error in errors.login %}
                                <p>{{ error }}</p>
                            {% endfor %}
                        </div>
                    {% endif %}


                    <input type=\"password\" name=\"userPass\" placeholder=\"Введите пароль\"
                           value=\"{{ postData.userPass ?: null }}\"
                    >

                    {% if errors.password is not empty %}
                        <div>
                            {% for key, error in errors.password %}
                                <p>{{ error }}</p>
                            {% endfor %}
                        </div>
                    {% endif %}

                </div>

                <div class=\"text-center\">
                    <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"login\" value=\"Register\">
                        Регистрация
                    </button>
                </div>

            </form>

        </div>

    </div>

{% endblock %}
", "login.twig", "/home/user/PhpstormProjects/hseEvents/templates/login.twig");
    }
}
