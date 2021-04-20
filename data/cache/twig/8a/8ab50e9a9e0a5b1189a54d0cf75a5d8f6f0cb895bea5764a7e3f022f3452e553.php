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

/* checkIn.twig */
class __TwigTemplate_20f1ef5d73134cc9be95424c2170244341418f7f1804e9f456b2241680b975b7 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "checkIn.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        if (twig_test_empty(($context["validationErrors"] ?? null))) {
            // line 5
            echo "        <div class=\"alert alert-success text-center\" role=\"alert\">
            <p>Студент отмечен</p>
        </div>
    ";
        } else {
            // line 9
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "notRegistered", [], "any", false, false, false, 9));
            foreach ($context['_seq'] as $context["key"] => $context["err"]) {
                // line 10
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">
                <p>";
                // line 11
                echo twig_escape_filter($this->env, $context["err"], "html", null, true);
                echo "</p>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['err'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "checkIn.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 14,  67 => 11,  64 => 10,  59 => 9,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    {% if validationErrors is empty %}
        <div class=\"alert alert-success text-center\" role=\"alert\">
            <p>Студент отмечен</p>
        </div>
    {% else %}
        {% for key, err in validationErrors.notRegistered %}
            <div class=\"alert alert-danger text-center\" role=\"alert\">
                <p>{{ err }}</p>
            </div>
        {% endfor %}
    {% endif %}
{% endblock %}", "checkIn.twig", "/home/user/PhpstormProjects/hseEvents/templates/checkIn.twig");
    }
}
