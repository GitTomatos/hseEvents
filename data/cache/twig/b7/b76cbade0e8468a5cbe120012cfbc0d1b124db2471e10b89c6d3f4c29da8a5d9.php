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

/* eventPoints.twig */
class __TwigTemplate_ed7b7f4c7c5d28afd4c01fba049f17639417dd756b59e2d24499716191042e1b extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "eventPoints.twig", 1);
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
        // line 8
        if ( !twig_test_empty(($context["currentUser"] ?? null))) {
            // line 9
            echo "                <p>
                    ";
            // line 10
            $context["regedPoint"] = twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "getRegedEventPoint", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 10)], "any", false, false, false, 10);
            // line 11
            echo "                    ";
            if ( !twig_test_empty(($context["regedPoint"] ?? null))) {
                // line 12
                echo "                        <p>
                            Зарегистрирован на <a href=''>";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["regedPoint"] ?? null), "getName", [], "any", false, false, false, 13), "html", null, true);
                echo "</a>
                        </p>
                    ";
            } else {
                // line 16
                echo "                        <p>
                            Не зарегистрирован нигде
                        </p>
                    ";
            }
            // line 20
            echo "                </p>
            ";
        }
        // line 22
        echo "
            ";
        // line 23
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["registeredToPoint"] ?? null), "success", [], "any", false, false, false, 23))) {
            // line 24
            echo "                <div class=\"alert alert-success\" role=\"alert\">
                    ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registeredToPoint"] ?? null), "success", [], "any", false, false, false, 25), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 28
        echo "
            ";
        // line 29
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "regErrors", [], "any", false, false, false, 29), 0, [], "any", false, false, false, 29))) {
            // line 30
            echo "                <div class=\"alert alert-danger\" role=\"alert\">
                    ";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "regErrors", [], "any", false, false, false, 31), 0, [], "any", false, false, false, 31), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 34
        echo "
            ";
        // line 35
        if ( !twig_test_empty(($context["points"] ?? null))) {
            // line 36
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["points"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["point"]) {
                // line 37
                echo "                    <div class=\"text-center py-5\">
                        <h1>
                            <p>ID этапа: ";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 39), "html", null, true);
                echo "</p>
                        </h1>
                        <h1>
                            <p>ID мероприятия: ";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getEventId", [], "any", false, false, false, 42), "html", null, true);
                echo "</p>
                        </h1>
                        <h1>
                            <p>Название: ";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 45), "html", null, true);
                echo " </p>
                        </h1>
                        <p>Описание: ";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getDescription", [], "any", false, false, false, 47), "html", null, true);
                echo " </p>
                    </div>
                    ";
                // line 49
                if ( !twig_test_empty(($context["currentUser"] ?? null))) {
                    // line 50
                    echo "                        <form action=\"\" method=\"post\">
                            ";
                    // line 51
                    if ( !twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "isRegedToPoint", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 51), 1 => twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 51)], "any", false, false, false, 51)) {
                        // line 52
                        echo "                                <div class=\"text-center\">
                                    <input type=\"hidden\" name=\"pointId\" value=\"";
                        // line 53
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 53), "html", null, true);
                        echo "\">
                                    <button class=\"reg-button btn btn-primary btn-lg\" name=\"regStudToPoint\">
                                        Зарегистрироваться
                                    </button>
                                </div>
                            ";
                    } else {
                        // line 59
                        echo "                                <div class=\"text-center\">
                                    <input type=\"hidden\" name=\"pointId\" value=\"";
                        // line 60
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 60), "html", null, true);
                        echo "\">
                                    <button class=\"reg-button btn btn-primary btn-lg\" name=\"unregStudFromPoint\">
                                        Отменить регистрацию
                                    </button>
                                </div>
                            ";
                    }
                    // line 66
                    echo "                        </form>
                    ";
                }
                // line 68
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "            ";
        }
        // line 70
        echo "

        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "eventPoints.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 70,  190 => 69,  184 => 68,  180 => 66,  171 => 60,  168 => 59,  159 => 53,  156 => 52,  154 => 51,  151 => 50,  149 => 49,  144 => 47,  139 => 45,  133 => 42,  127 => 39,  123 => 37,  118 => 36,  116 => 35,  113 => 34,  107 => 31,  104 => 30,  102 => 29,  99 => 28,  93 => 25,  90 => 24,  88 => 23,  85 => 22,  81 => 20,  75 => 16,  69 => 13,  66 => 12,  63 => 11,  61 => 10,  58 => 9,  56 => 8,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container\">
        <div class='reg-background'>


            {% if currentUser is not empty %}
                <p>
                    {% set regedPoint = attribute(studentRepository, 'getRegedEventPoint', [currentUser.getId]) %}
                    {% if regedPoint is not empty %}
                        <p>
                            Зарегистрирован на <a href=''>{{ regedPoint.getName }}</a>
                        </p>
                    {% else %}
                        <p>
                            Не зарегистрирован нигде
                        </p>
                    {% endif %}
                </p>
            {% endif %}

            {% if registeredToPoint.success is not empty %}
                <div class=\"alert alert-success\" role=\"alert\">
                    {{ registeredToPoint.success }}
                </div>
            {% endif %}

            {% if errors.regErrors.0 is not empty %}
                <div class=\"alert alert-danger\" role=\"alert\">
                    {{ errors.regErrors.0 }}
                </div>
            {% endif %}

            {% if points is not empty %}
                {% for key, point in points %}
                    <div class=\"text-center py-5\">
                        <h1>
                            <p>ID этапа: {{ point.getId }}</p>
                        </h1>
                        <h1>
                            <p>ID мероприятия: {{ point.getEventId }}</p>
                        </h1>
                        <h1>
                            <p>Название: {{ point.getName }} </p>
                        </h1>
                        <p>Описание: {{ point.getDescription }} </p>
                    </div>
                    {% if currentUser is not empty %}
                        <form action=\"\" method=\"post\">
                            {% if not attribute(studentRepository, 'isRegedToPoint', [currentUser.getId, point.getId]) %}
                                <div class=\"text-center\">
                                    <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\">
                                    <button class=\"reg-button btn btn-primary btn-lg\" name=\"regStudToPoint\">
                                        Зарегистрироваться
                                    </button>
                                </div>
                            {% else %}
                                <div class=\"text-center\">
                                    <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\">
                                    <button class=\"reg-button btn btn-primary btn-lg\" name=\"unregStudFromPoint\">
                                        Отменить регистрацию
                                    </button>
                                </div>
                            {% endif %}
                        </form>
                    {% endif %}
                {% endfor %}
            {% endif %}


        </div>
    </div>

{% endblock %}", "eventPoints.twig", "/srv/www/hse_events/templates/eventPoints.twig");
    }
}
