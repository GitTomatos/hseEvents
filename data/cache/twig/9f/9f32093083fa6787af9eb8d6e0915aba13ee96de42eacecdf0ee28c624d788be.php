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

/* error.twig */
class __TwigTemplate_11d105afaa969a8726a5507fef67b0bbe922c5fd21ebf1e2911857958e5bba28 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
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
        $this->parent = $this->loadTemplate("layout.twig", "error.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    Error
";
    }

    // line 7
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "<body>
<p>
    Message:
    ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getMessage", [], "any", false, false, false, 14), "html", null, true);
        echo "
</p>


<p>
    Code:
    ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getCode", [], "any", false, false, false, 20), "html", null, true);
        echo "
</p>

<p>
    File name:
    ";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getFile", [], "any", false, false, false, 25), "html", null, true);
        echo "
</p>
<p>
    Line:
    ";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getLine", [], "any", false, false, false, 29), "html", null, true);
        echo "
</p>
<p>
    Trace:
    ";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getTraceAsString", [], "any", false, false, false, 33), "html", null, true);
        echo "
</p>


";
        // line 37
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getPrevious", [], "any", false, false, false, 37))) {
            // line 38
            echo "    <p>
        Previous:

    <p>
        Message:
        ";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getPrevious", [], "any", false, false, false, 43), "getMessage", [], "any", false, false, false, 43), "html", null, true);
            echo "
    </p>

    <p>
        Code:
        ";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getPrevious", [], "any", false, false, false, 48), "getCode", [], "any", false, false, false, 48), "html", null, true);
            echo "
    </p>

    <p>
        File name:
        ";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getPrevious", [], "any", false, false, false, 53), "getFile", [], "any", false, false, false, 53), "html", null, true);
            echo "
    </p>
    <p>
        Line:
        ";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getPrevious", [], "any", false, false, false, 57), "getLine", [], "any", false, false, false, 57), "html", null, true);
            echo "
    </p>
    <p>
        Trace:
        ";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["e"] ?? null), "getPrevious", [], "any", false, false, false, 61), "getTraceAsString", [], "any", false, false, false, 61), "html", null, true);
            echo "
    </p>

";
        }
        // line 65
        echo "
";
    }

    public function getTemplateName()
    {
        return "error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 65,  149 => 61,  142 => 57,  135 => 53,  127 => 48,  119 => 43,  112 => 38,  110 => 37,  103 => 33,  96 => 29,  89 => 25,  81 => 20,  72 => 14,  67 => 11,  63 => 10,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.twig' %}

{% block title %}
    Error
{% endblock %}

{% block header %}
{% endblock %}

{% block content %}
<body>
<p>
    Message:
    {{ e.getMessage }}
</p>


<p>
    Code:
    {{ e.getCode }}
</p>

<p>
    File name:
    {{ e.getFile }}
</p>
<p>
    Line:
    {{ e.getLine }}
</p>
<p>
    Trace:
    {{ e.getTraceAsString }}
</p>


{% if e.getPrevious is not empty %}
    <p>
        Previous:

    <p>
        Message:
        {{ e.getPrevious.getMessage }}
    </p>

    <p>
        Code:
        {{ e.getPrevious.getCode }}
    </p>

    <p>
        File name:
        {{ e.getPrevious.getFile }}
    </p>
    <p>
        Line:
        {{ e.getPrevious.getLine }}
    </p>
    <p>
        Trace:
        {{ e.getPrevious.getTraceAsString }}
    </p>

{% endif %}

{% endblock %}
", "error.twig", "/home/user/PhpstormProjects/hseEvents/templates/error.twig");
    }
}
