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
class __TwigTemplate_ee0b8baa90f5ddeade45383970b9142dfcc6cec227365a419dc5867c5f728216 extends Template
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
        // line 7
        if ((0 === twig_compare(($context["userPermission"] ?? null), 2))) {
            // line 8
            echo "
                ";
            // line 9
            if ( !twig_test_empty(($context["currentUser"] ?? null))) {
                // line 10
                echo "                    ";
                $context["regedPoint"] = twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "getRegedEventPoint", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 10)], "any", false, false, false, 10);
                // line 11
                echo "                ";
            }
            // line 12
            echo "
                ";
            // line 13
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["registeredToPoint"] ?? null), "success", [], "any", false, false, false, 13))) {
                // line 14
                echo "                    <div class=\"alert alert-success\" role=\"alert\">
                        ";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registeredToPoint"] ?? null), "success", [], "any", false, false, false, 15), "html", null, true);
                echo "
                    </div>
                ";
            }
            // line 18
            echo "
                ";
            // line 19
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "regErrors", [], "any", false, false, false, 19), 0, [], "any", false, false, false, 19))) {
                // line 20
                echo "                    <div class=\"alert alert-danger\" role=\"alert\">
                        ";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "regErrors", [], "any", false, false, false, 21), 0, [], "any", false, false, false, 21), "html", null, true);
                echo "
                    </div>
                ";
            }
            // line 24
            echo "
            ";
        }
        // line 26
        echo "
            ";
        // line 27
        if ( !twig_test_empty(($context["points"] ?? null))) {
            // line 28
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["points"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["point"]) {
                // line 29
                echo "
                    ";
                // line 30
                if (twig_get_attribute($this->env, $this->source, $context["point"], "isComplex", [], "any", false, false, false, 30)) {
                    // line 31
                    echo "                        ";
                    $context["complexPoints"] = twig_get_attribute($this->env, $this->source, ($context["pointRepository"] ?? null), "findComplexPoints", [0 => twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 31)], "any", false, false, false, 31);
                    // line 32
                    echo "                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["complexPoints"] ?? null));
                    foreach ($context['_seq'] as $context["key"] => $context["point"]) {
                        // line 33
                        echo "                            ";
                        echo twig_escape_filter($this->env, ($context["testGlobal"] ?? null), "html", null, true);
                        echo "
                            ";
                        // line 34
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 34), "html", null, true);
                        echo "
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 36
                    echo "                    ";
                }
                // line 37
                echo "                    <div class=\"text-center\">
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
                // line 51
                if ((0 === twig_compare(($context["userPermission"] ?? null), 2))) {
                    // line 52
                    echo "
                        ";
                    // line 53
                    if ( !twig_test_empty(($context["currentUser"] ?? null))) {
                        // line 54
                        echo "                            <form action=\"\" method=\"post\">
                                ";
                        // line 55
                        if ( !twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "isRegedToPoint", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 55), 1 => twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 55)], "any", false, false, false, 55)) {
                            // line 56
                            echo "                                    <div class=\"text-center\">
                                        <input type=\"hidden\" name=\"pointId\" value=\"";
                            // line 57
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 57), "html", null, true);
                            echo "\">
                                        <button class=\"reg-button btn btn-primary btn-lg mb-5\" name=\"regStudToPoint\">
                                            Зарегистрироваться
                                        </button>
                                    </div>
                                ";
                        } else {
                            // line 63
                            echo "                                    ";
                            if ( !twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "isCheckedIn", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 63), 1 => twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 63)], "any", false, false, false, 63)) {
                                // line 64
                                echo "                                        ";
                                $context["link"] = ((((((("https://api.qrserver.com/v1/create-qr-code/?data=" . "http://") .                                 // line 65
($context["host"] ?? null)) . "/check-in-to-point/") . twig_get_attribute($this->env, $this->source,                                 // line 66
($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 66)) . "/") . twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 66)) . "&size=150x150");
                                // line 68
                                echo "                                        ";
                                // line 69
                                echo "                                        <img src=";
                                echo twig_escape_filter($this->env, ($context["link"] ?? null), "html", null, true);
                                echo " alt=\"qr-code\" class=\"img-center\">
                                        <div class=\"text-center\">
                                            <input type=\"hidden\" name=\"pointId\" value=\"";
                                // line 71
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 71), "html", null, true);
                                echo "\">
                                            <button class=\"reg-button btn btn-primary btn-lg mt-4 mb-5\"
                                                    name=\"unregStudFromPoint\">
                                                Отменить регистрацию
                                            </button>
                                        </div>
                                    ";
                            } else {
                                // line 78
                                echo "                                        <div class=\"text-center\">
                                            <input type=\"hidden\" name=\"pointId\" value=\"";
                                // line 79
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 79), "html", null, true);
                                echo "\">
                                            <button class=\"reg-button btn btn-success btn-lg mt-4 mb-5\"
                                                    name=\"unregStudFromPoint\">
                                                Пройдено
                                            </button>
                                        </div>
                                    ";
                            }
                            // line 86
                            echo "                                ";
                        }
                        // line 87
                        echo "                            </form>
                        ";
                    }
                    // line 89
                    echo "                    ";
                }
                // line 90
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "            ";
        }
        // line 93
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
        return array (  250 => 93,  247 => 92,  240 => 90,  237 => 89,  233 => 87,  230 => 86,  220 => 79,  217 => 78,  207 => 71,  201 => 69,  199 => 68,  197 => 66,  196 => 65,  194 => 64,  191 => 63,  182 => 57,  179 => 56,  177 => 55,  174 => 54,  172 => 53,  169 => 52,  167 => 51,  160 => 47,  155 => 45,  149 => 42,  143 => 39,  139 => 37,  136 => 36,  128 => 34,  123 => 33,  118 => 32,  115 => 31,  113 => 30,  110 => 29,  105 => 28,  103 => 27,  100 => 26,  96 => 24,  90 => 21,  87 => 20,  85 => 19,  82 => 18,  76 => 15,  73 => 14,  71 => 13,  68 => 12,  65 => 11,  62 => 10,  60 => 9,  57 => 8,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container\">
        <div class='reg-background'>

            {% if (userPermission == 2) %}

                {% if (currentUser is not empty) %}
                    {% set regedPoint = attribute(studentRepository, 'getRegedEventPoint', [currentUser.getId]) %}
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

            {% endif %}

            {% if points is not empty %}
                {% for key, point in points %}

                    {% if point.isComplex %}
                        {% set complexPoints = attribute(pointRepository, 'findComplexPoints', [point.getId]) %}
                        {% for key, point in complexPoints %}
                            {{ testGlobal }}
                            {{ point.getName }}
                        {% endfor %}
                    {% endif %}
                    <div class=\"text-center\">
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


                    {% if (userPermission == 2) %}

                        {% if currentUser is not empty %}
                            <form action=\"\" method=\"post\">
                                {% if not attribute(studentRepository, 'isRegedToPoint', [currentUser.getId, point.getId]) %}
                                    <div class=\"text-center\">
                                        <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\">
                                        <button class=\"reg-button btn btn-primary btn-lg mb-5\" name=\"regStudToPoint\">
                                            Зарегистрироваться
                                        </button>
                                    </div>
                                {% else %}
                                    {% if not attribute(studentRepository, 'isCheckedIn', [currentUser.getId, point.getId]) %}
                                        {% set link = \"https://api.qrserver.com/v1/create-qr-code/?data=\"
                                            ~ \"http://\" ~ host ~ \"/check-in-to-point/\"
                                            ~ currentUser.getId ~ \"/\" ~ point.getId
                                            ~ \"&size=150x150\" %}
                                        {# <img src=\"https://api.qrserver.com/v1/create-qr-code/?data=\"~\"http://localhost:8000/check-in-to-point/{{ currentUser.getId }}/{{ point.getId }}&size=150x150\" alt=\"\"> #}
                                        <img src={{ link }} alt=\"qr-code\" class=\"img-center\">
                                        <div class=\"text-center\">
                                            <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\">
                                            <button class=\"reg-button btn btn-primary btn-lg mt-4 mb-5\"
                                                    name=\"unregStudFromPoint\">
                                                Отменить регистрацию
                                            </button>
                                        </div>
                                    {% else %}
                                        <div class=\"text-center\">
                                            <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\">
                                            <button class=\"reg-button btn btn-success btn-lg mt-4 mb-5\"
                                                    name=\"unregStudFromPoint\">
                                                Пройдено
                                            </button>
                                        </div>
                                    {% endif %}
                                {% endif %}
                            </form>
                        {% endif %}
                    {% endif %}

                {% endfor %}
            {% endif %}


        </div>
    </div>

{% endblock %}", "eventPoints.twig", "/home/user/PhpstormProjects/hseEvents/templates/eventPoints.twig");
    }
}
