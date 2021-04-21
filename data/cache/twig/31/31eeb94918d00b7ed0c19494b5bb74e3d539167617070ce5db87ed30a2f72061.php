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

/* homepage.twig */
class __TwigTemplate_7d3f28f8f07a7d7689e4ef205fc7442a887a16c8ea26ecbbf36f3438756e0567 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "homepage.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"container\">
        <div class='reg-background'>


            <div class=\"text-center\">
                <h1> Мероприятия</h1>
            </div>

            <table class=\"event-table mt-5\">
                <!--        <table class=\"table table-striped table-hover\">-->
                <thead>
                <tr>
                    <th>Название мероприятия</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tbody>


                ";
        // line 23
        if ( !twig_test_empty(($context["events"] ?? null))) {
            // line 24
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                // line 25
                echo "                        <tr>
                            <td>
                                ";
                // line 28
                echo "                                <a href=\"/view-event/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 28), "html", null, true);
                echo "\">
                                    ";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 29), "html", null, true);
                echo "
                                </a>
                            </td>
                            <td>
                                ";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getDescription", [], "any", false, false, false, 33), "html", null, true);
                echo "
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                ";
        }
        // line 38
        echo "

                </tbody>

            </table>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "homepage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 38,  104 => 37,  94 => 33,  87 => 29,  82 => 28,  78 => 25,  73 => 24,  71 => 23,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container\">
        <div class='reg-background'>


            <div class=\"text-center\">
                <h1> Мероприятия</h1>
            </div>

            <table class=\"event-table mt-5\">
                <!--        <table class=\"table table-striped table-hover\">-->
                <thead>
                <tr>
                    <th>Название мероприятия</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tbody>


                {% if events is not empty %}
                    {% for key, event in events %}
                        <tr>
                            <td>
                                {# <a href=\"/view-event/?eventId={{ event.getId }}\"> #}
                                <a href=\"/view-event/{{ event.getId }}\">
                                    {{ event.getName }}
                                </a>
                            </td>
                            <td>
                                {{ event.getDescription }}
                            </td>
                        </tr>
                    {% endfor %}
                {% endif %}


                </tbody>

            </table>
        </div>

    </div>

{% endblock %}", "homepage.twig", "/home/user/PhpstormProjects/hseEvents/templates/homepage.twig");
    }
}
