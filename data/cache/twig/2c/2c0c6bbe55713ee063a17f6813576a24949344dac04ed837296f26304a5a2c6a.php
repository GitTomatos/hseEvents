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

/* singleEvent.twig */
class __TwigTemplate_cdbaaeb44817351baf757c6bac6449d0c67ab3814b307cb31e38d3e80ccb5396 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "singleEvent.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"container\">
        <div class='reg-background'>

";
        // line 9
        echo "            ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["registeredToEvent"] ?? null), "success", [], "any", false, false, false, 9))) {
            // line 10
            echo "                <div class=\"alert alert-success\" role=\"alert\">
                    ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registeredToEvent"] ?? null), "success", [], "any", false, false, false, 11), "html", null, true);
            echo "
                </div>
            ";
        } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 13
($context["registeredToEvent"] ?? null), "unsuccess", [], "any", false, false, false, 13))) {
            // line 14
            echo "                <div class=\"alert alert-danger\" role=\"alert\">
                    ";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registeredToEvent"] ?? null), "unsuccess", [], "any", false, false, false, 15), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 18
        echo "
            <div class=\"text-center py-5\">
                <h1>
                    <p>ID мероприятия: ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentEvent"] ?? null), "getId", [], "any", false, false, false, 21), "html", null, true);
        echo "</p>
                </h1>                    ";
        // line 22
        $context["a"] = twig_get_attribute($this->env, $this->source, ($context["currentEvent"] ?? null), "getId", [], "any", false, false, false, 22);
        // line 23
        echo "
                <h1>
                    <p>Название: ";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentEvent"] ?? null), "getName", [], "any", false, false, false, 25), "html", null, true);
        echo "</p>
                </h1>
                <p>Описание: ";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentEvent"] ?? null), "getDescription", [], "any", false, false, false, 27), "html", null, true);
        echo "</p>
            </div>


            ";
        // line 31
        if (( !twig_test_empty(($context["username"] ?? null)) && (0 === twig_compare(($context["userPermission"] ?? null), 2)))) {
            // line 32
            echo "                <form action=\"\" method=\"post\">
                    ";
            // line 33
            if ( !twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "isRegedToEvent", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 33), 1 => twig_get_attribute($this->env, $this->source, ($context["currentEvent"] ?? null), "getId", [], "any", false, false, false, 33)], "any", false, false, false, 33)) {
                // line 34
                echo "                        <div class=\"text-center\">
                            <button class=\"reg-button btn btn-primary btn-lg mt-5\" name=\"regStudToEvent\">
                                Зарегистрироваться
                            </button>
                        </div>
                    ";
            } else {
                // line 40
                echo "                        <div class=\"text-center\">
                            <button class=\"reg-button btn btn-primary btn-lg mt-5\" name=\"unregStudFromEvent\">
                                Отменить регистрацию
                            </button>
                        </div>
                    ";
            }
            // line 46
            echo "                </form>
            ";
        }
        // line 48
        echo "
";
        // line 50
        echo "            <p><a href=\"/view-event-points/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentEvent"] ?? null), "getId", [], "any", false, false, false, 50), "html", null, true);
        echo "\">Посмотреть этапы</a></p>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "singleEvent.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 50,  131 => 48,  127 => 46,  119 => 40,  111 => 34,  109 => 33,  106 => 32,  104 => 31,  97 => 27,  92 => 25,  88 => 23,  86 => 22,  82 => 21,  77 => 18,  71 => 15,  68 => 14,  66 => 13,  61 => 11,  58 => 10,  55 => 9,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container\">
        <div class='reg-background'>

{#            {{ attribute(currentEvent, 'getId') is defined ? currentEvent.Id : \"no\" }}#}
{#            {{ attribute(currentUser, 'isRegedToEvent', [currentEvent.getId]) }}#}
            {% if registeredToEvent.success is not empty %}
                <div class=\"alert alert-success\" role=\"alert\">
                    {{ registeredToEvent.success }}
                </div>
            {% elseif registeredToEvent.unsuccess is not empty %}
                <div class=\"alert alert-danger\" role=\"alert\">
                    {{ registeredToEvent.unsuccess }}
                </div>
            {% endif %}

            <div class=\"text-center py-5\">
                <h1>
                    <p>ID мероприятия: {{ currentEvent.getId }}</p>
                </h1>                    {% set a=currentEvent.getId %}

                <h1>
                    <p>Название: {{ currentEvent.getName }}</p>
                </h1>
                <p>Описание: {{ currentEvent.getDescription }}</p>
            </div>


            {% if (username is not empty) and (userPermission == 2) %}
                <form action=\"\" method=\"post\">
                    {% if not attribute(studentRepository, 'isRegedToEvent', [currentUser.getId, currentEvent.getId]) %}
                        <div class=\"text-center\">
                            <button class=\"reg-button btn btn-primary btn-lg mt-5\" name=\"regStudToEvent\">
                                Зарегистрироваться
                            </button>
                        </div>
                    {% else %}
                        <div class=\"text-center\">
                            <button class=\"reg-button btn btn-primary btn-lg mt-5\" name=\"unregStudFromEvent\">
                                Отменить регистрацию
                            </button>
                        </div>
                    {% endif %}
                </form>
            {% endif %}

{#            <p><a href=\"/view-event-points?eventId={{ currentEvent.getId }}\">Посмотреть этапы</a></p>#}
            <p><a href=\"/view-event-points/{{ currentEvent.getId }}\">Посмотреть этапы</a></p>
        </div>
    </div>

{% endblock %}", "singleEvent.twig", "/home/user/PhpstormProjects/hseEvents/templates/singleEvent.twig");
    }
}
