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
class __TwigTemplate_7a1b7a74b09f7455b48a7c75c0c7472cb0206a2745fdf04b0b896c56eafdc46e extends Template
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
                // line 31
                echo "                    ";
                // line 32
                echo "                    ";
                // line 33
                echo "                    ";
                // line 34
                echo "                    ";
                // line 35
                echo "                    ";
                // line 36
                echo "                    ";
                // line 37
                echo "                    ";
                // line 38
                echo "                    ";
                // line 39
                echo "                    ";
                // line 40
                echo "                    ";
                // line 41
                echo "                    ";
                // line 42
                echo "                    ";
                // line 43
                echo "                    ";
                // line 44
                echo "
                    ";
                // line 45
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('outputPointInfo')->getCallable(), [$context["point"]]), "html", null, true);
                echo "
                    ";
                // line 46
                if ((0 === twig_compare(($context["userPermission"] ?? null), 2))) {
                    // line 47
                    echo "                        ";
                    if (twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "isRegedToEvent", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 47), 1 => ($context["eventId"] ?? null)], "any", false, false, false, 47)) {
                        // line 48
                        echo "                            <div class=\"mb-4 text-center\">
                            ";
                        // line 49
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('outputQR')->getCallable(), [($context["currentUser"] ?? null), $context["point"]]), "html", null, true);
                        echo "

                            ";
                        // line 51
                        if (twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "isCheckedIn", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 51), 1 => twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 51)], "any", false, false, false, 51)) {
                            // line 52
                            echo "
                                ";
                            // line 53
                            if (twig_get_attribute($this->env, $this->source, $context["point"], "isComplex", [], "method", false, false, false, 53)) {
                                // line 54
                                echo "                                    <button class='reg-button btn btn-success btn-lg mt-4 mb-5'>
                                        <a href='/view-complex-event-points/";
                                // line 55
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 55), "html", null, true);
                                echo "'>
                                            Пройдено
                                        </a>
                                    </button>
                                ";
                            } else {
                                // line 60
                                echo "                                    <input type='hidden' name='pointId' value='";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 60), "html", null, true);
                                echo "'>
                                    <button class='reg-button btn btn-success btn-lg mt-4 mb-5'>
                                        Пройдено
                                    </button>
                                ";
                            }
                            // line 65
                            echo "                                </div>
                            ";
                        }
                        // line 67
                        echo "
                            ";
                        // line 68
                        if (twig_get_attribute($this->env, $this->source, $context["point"], "isComplex", [], "any", false, false, false, 68)) {
                            // line 69
                            echo "                                <div class='text-center'>
                                    <button class='reg-button btn btn-primary btn-lg mb-5'>
                                        <a href='/view-complex-event-points/";
                            // line 71
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 71), "html", null, true);
                            echo "'>
                                            Посмотреть
                                        </a>
                                    </button>
                                </div>
                            ";
                        }
                        // line 77
                        echo "                        ";
                    }
                    // line 78
                    echo "                    ";
                }
                // line 79
                echo "

                    ";
                // line 82
                echo "                    ";
                // line 83
                echo "                    ";
                // line 84
                echo "                    ";
                // line 85
                echo "                    ";
                // line 86
                echo "                    ";
                // line 87
                echo "                    ";
                // line 88
                echo "                    ";
                // line 89
                echo "                    ";
                // line 90
                echo "                    ";
                // line 91
                echo "                    ";
                // line 92
                echo "                    ";
                // line 93
                echo "                    ";
                // line 94
                echo "                    ";
                // line 95
                echo "                    ";
                // line 96
                echo "                    ";
                // line 97
                echo "                    ";
                // line 98
                echo "                    ";
                // line 99
                echo "                    ";
                // line 100
                echo "                    ";
                // line 101
                echo "                    ";
                // line 102
                echo "                    ";
                // line 103
                echo "                    ";
                // line 104
                echo "                    ";
                // line 105
                echo "                    ";
                // line 106
                echo "                    ";
                // line 107
                echo "                    ";
                // line 108
                echo "                    ";
                // line 109
                echo "                    ";
                // line 110
                echo "                    ";
                // line 111
                echo "                    ";
                // line 112
                echo "                    ";
                // line 113
                echo "                    ";
                // line 114
                echo "                    ";
                // line 115
                echo "                    ";
                // line 116
                echo "                    ";
                // line 117
                echo "                    ";
                // line 118
                echo "                    ";
                // line 119
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "            ";
        }
        // line 122
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
        return array (  302 => 122,  299 => 121,  292 => 119,  290 => 118,  288 => 117,  286 => 116,  284 => 115,  282 => 114,  280 => 113,  278 => 112,  276 => 111,  274 => 110,  272 => 109,  270 => 108,  268 => 107,  266 => 106,  264 => 105,  262 => 104,  260 => 103,  258 => 102,  256 => 101,  254 => 100,  252 => 99,  250 => 98,  248 => 97,  246 => 96,  244 => 95,  242 => 94,  240 => 93,  238 => 92,  236 => 91,  234 => 90,  232 => 89,  230 => 88,  228 => 87,  226 => 86,  224 => 85,  222 => 84,  220 => 83,  218 => 82,  214 => 79,  211 => 78,  208 => 77,  199 => 71,  195 => 69,  193 => 68,  190 => 67,  186 => 65,  177 => 60,  169 => 55,  166 => 54,  164 => 53,  161 => 52,  159 => 51,  154 => 49,  151 => 48,  148 => 47,  146 => 46,  142 => 45,  139 => 44,  137 => 43,  135 => 42,  133 => 41,  131 => 40,  129 => 39,  127 => 38,  125 => 37,  123 => 36,  121 => 35,  119 => 34,  117 => 33,  115 => 32,  113 => 31,  110 => 29,  105 => 28,  103 => 27,  100 => 26,  96 => 24,  90 => 21,  87 => 20,  85 => 19,  82 => 18,  76 => 15,  73 => 14,  71 => 13,  68 => 12,  65 => 11,  62 => 10,  60 => 9,  57 => 8,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
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

                    {# {% if point.isComplex %} #}
                    {# {% set complexPoints = attribute(pointRepository, 'findComplexPoints', [point.getId]) %} #}
                    {# {% for key, point in complexPoints %} #}
                    {# {{ outputPointInfo(point) }} #}
                    {# {% if (userPermission == 2) %} #}
                    {# {{ outputButton(studentRepository, currentUser, point, 1) }} #}
                    {# {% endif %} #}
                    {# {% endfor %} #}
                    {# {% else %} #}
                    {# {{ outputPointInfo(point) }} #}
                    {# {% if (userPermission == 2) %} #}
                    {# {{ outputButton(studentRepository, currentUser, point) }} #}
                    {# {% endif %} #}
                    {# {% endif %} #}

                    {{ outputPointInfo(point) }}
                    {% if (userPermission == 2) %}
                        {% if (attribute(studentRepository, 'isRegedToEvent', [currentUser.getId, eventId])) %}
                            <div class=\"mb-4 text-center\">
                            {{ outputQR(currentUser, point) }}

                            {% if attribute(studentRepository, \"isCheckedIn\", [currentUser.getId, point.getId]) %}

                                {% if point.isComplex() %}
                                    <button class='reg-button btn btn-success btn-lg mt-4 mb-5'>
                                        <a href='/view-complex-event-points/{{ point.getId }}'>
                                            Пройдено
                                        </a>
                                    </button>
                                {% else %}
                                    <input type='hidden' name='pointId' value='{{ point.getId }}'>
                                    <button class='reg-button btn btn-success btn-lg mt-4 mb-5'>
                                        Пройдено
                                    </button>
                                {% endif %}
                                </div>
                            {% endif %}

                            {% if point.isComplex %}
                                <div class='text-center'>
                                    <button class='reg-button btn btn-primary btn-lg mb-5'>
                                        <a href='/view-complex-event-points/{{ point.getId }}'>
                                            Посмотреть
                                        </a>
                                    </button>
                                </div>
                            {% endif %}
                        {% endif %}
                    {% endif %}


                    {# {% if (userPermission == 2) %} #}
                    {# {% if currentUser is not empty %} #}
                    {# <form action=\"\" method=\"post\"> #}
                    {# {% if not attribute(studentRepository, 'isRegedToPoint', [currentUser.getId, point.getId]) %} #}
                    {# <div class=\"text-center\"> #}
                    {# <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\"> #}
                    {# <button class=\"reg-button btn btn-primary btn-lg mb-5\" name=\"regStudToPoint\"> #}
                    {# Зарегистрироваться #}
                    {# </button> #}
                    {# </div> #}
                    {# {% else %} #}
                    {# {% if not attribute(studentRepository, 'isCheckedIn', [currentUser.getId, point.getId]) %} #}
                    {# {% set link = \"https://api.qrserver.com/v1/create-qr-code/?data=\" #}
                    {# ~ \"http://\" ~ host ~ \"/check-in-to-point/\" #}
                    {# ~ currentUser.getId ~ \"/\" ~ point.getId #}
                    {# ~ \"&size=150x150\" %} #}
                    {# #}{# <img src=\"https://api.qrserver.com/v1/create-qr-code/?data=\"~\"http://localhost:8000/check-in-to-point/{{ currentUser.getId }}/{{ point.getId }}&size=150x150\" alt=\"\"> #}
                    {# <img src={{ link }} alt=\"qr-code\" class=\"img-center\"> #}
                    {# <div class=\"text-center\"> #}
                    {# <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\"> #}
                    {# <button class=\"reg-button btn btn-primary btn-lg mt-4 mb-5\" #}
                    {# name=\"unregStudFromPoint\"> #}
                    {# Отменить регистрацию #}
                    {# </button> #}
                    {# </div> #}
                    {# {% else %} #}
                    {# <div class=\"text-center\"> #}
                    {# <input type=\"hidden\" name=\"pointId\" value=\"{{ point.getId }}\"> #}
                    {# <button class=\"reg-button btn btn-success btn-lg mt-4 mb-5\" #}
                    {# name=\"unregStudFromPoint\"> #}
                    {# Пройдено #}
                    {# </button> #}
                    {# </div> #}
                    {# {% endif %} #}
                    {# {% endif %} #}
                    {# </form> #}
                    {# {% endif %} #}
                    {# {% endif %} #}

                {% endfor %}
            {% endif %}


        </div>
    </div>

{% endblock %}", "eventPoints.twig", "/home/user/PhpstormProjects/hseEvents/templates/eventPoints.twig");
    }
}
