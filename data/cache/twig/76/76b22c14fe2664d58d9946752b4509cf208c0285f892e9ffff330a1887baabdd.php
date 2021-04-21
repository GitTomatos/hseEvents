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

/* complexEventPoints.twig */
class __TwigTemplate_f37d5a6de3dbb374b77d261e829632be5d826ffadbd65064c57f3a07934c8e34 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "complexEventPoints.twig", 1);
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
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('outputPointInfo')->getCallable(), [$context["point"]]), "html", null, true);
                echo "
                    ";
                // line 31
                if ((0 === twig_compare(($context["userPermission"] ?? null), 2))) {
                    // line 32
                    echo "                        ";
                    $context["regedComplexPoint"] = twig_get_attribute($this->env, $this->source,                     // line 33
($context["studentRepository"] ?? null), "getRegedComplexEventPoint", [0 => twig_get_attribute($this->env, $this->source,                     // line 35
($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 35), 1 => twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 35)], "any", false, false, false, 33);
                    // line 37
                    echo "                        ";
                    if ((twig_test_empty(($context["regedComplexPoint"] ?? null)) || (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["regedComplexPoint"] ?? null), "getName", [], "any", false, false, false, 37), twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 37))))) {
                        // line 38
                        echo "                            ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('outputButton')->getCallable(), [($context["studentRepository"] ?? null), ($context["currentUser"] ?? null), $context["point"]]), "html", null, true);
                        echo "
                        ";
                    }
                    // line 40
                    echo "                    ";
                }
                // line 41
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "            ";
        }
        // line 44
        echo "

        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "complexEventPoints.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 44,  143 => 43,  136 => 41,  133 => 40,  127 => 38,  124 => 37,  122 => 35,  121 => 33,  119 => 32,  117 => 31,  113 => 30,  110 => 29,  105 => 28,  103 => 27,  100 => 26,  96 => 24,  90 => 21,  87 => 20,  85 => 19,  82 => 18,  76 => 15,  73 => 14,  71 => 13,  68 => 12,  65 => 11,  62 => 10,  60 => 9,  57 => 8,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
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

                    {{ outputPointInfo(point) }}
                    {% if (userPermission == 2) %}
                        {% set regedComplexPoint = attribute (
                            studentRepository,
                            'getRegedComplexEventPoint',
                            [currentUser.getId, point.getId]
                        ) %}
                        {% if regedComplexPoint is empty or regedComplexPoint.getName == point.getName %}
                            {{ outputButton(studentRepository, currentUser, point) }}
                        {% endif %}
                    {% endif %}

                {% endfor %}
            {% endif %}


        </div>
    </div>

{% endblock %}", "complexEventPoints.twig", "/home/user/PhpstormProjects/hseEvents/templates/complexEventPoints.twig");
    }
}
