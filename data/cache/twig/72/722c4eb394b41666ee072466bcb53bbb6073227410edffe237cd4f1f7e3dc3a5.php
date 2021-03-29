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

/* account.twig */
class __TwigTemplate_a3ce112377a30f1cb0a636b32e7702fe6e3a14b3383236238850c83fe0ac5706 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "account.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"container\">
        <div class=\"my-info\">

            <p class=\"text-center\">
                ID: ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 8), "html", null, true);
        echo "
            </p>
            <p class=\"text-center\">
                Email: ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getEmail", [], "any", false, false, false, 11), "html", null, true);
        echo "
            </p>
            <p class=\"text-center\">
                Фамилия: ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getLastName", [], "any", false, false, false, 14), "html", null, true);
        echo "
            </p>
            <p class=\"text-center\">
                Имя: ";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getFirstName", [], "any", false, false, false, 17), "html", null, true);
        echo "
            </p>
            <p class=\"text-center\">
                Отчество: ";
        // line 20
        ((twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getPatronymic", [], "any", false, false, false, 20)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getPatronymic", [], "any", false, false, false, 20), "html", null, true))) : (print ("Не указано")));
        echo "
            </p>
            <p class=\"text-center\">
                Университет: ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getUniversity", [], "any", false, false, false, 23), "html", null, true);
        echo "
            </p>
            <p class=\"text-center\">
                Специальность: ";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getSpeciality", [], "any", false, false, false, 26), "html", null, true);
        echo "
            </p>
            <p class=\"text-center\">
                Курс: ";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getYear", [], "any", false, false, false, 29), "html", null, true);
        echo "
            </p>
            <p class=\"text-center\">
                Телефон: ";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getPhone", [], "any", false, false, false, 32), "html", null, true);
        echo "
            </p>
        </div>

        <div class=\"after-info\">
            <div class=\"my-events\">
                <p>Мои мероприятия:</p>
                ";
        // line 39
        $context["userEvents"] = twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "getEvents", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 39)], "any", false, false, false, 39);
        // line 40
        echo "                ";
        if ( !twig_test_empty(($context["userEvents"] ?? null))) {
            // line 41
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["userEvents"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                // line 42
                echo "                        <p>
                            <a href=\"./view-event?eventId=";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 43), "html", null, true);
                echo "\">
                                ";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 44), "html", null, true);
                echo "
                            </a>
                        </p>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "                ";
        }
        // line 49
        echo "
            </div>
            ";
        // line 52
        echo "            ";
        // line 53
        echo "            ";
        // line 54
        echo "            ";
        // line 55
        echo "        </div>


        ";
        // line 59
        echo "        ";
        // line 60
        echo "        ";
        // line 61
        echo "        ";
        // line 62
        echo "        ";
        // line 63
        echo "        ";
        // line 64
        echo "        ";
        // line 65
        echo "

        <div>


            <form action=\"\" method=\"post\">
                <div class='login-fields'>
                    <input type=\"text\" name=\"eventName\" placeholder=\"Название мероприятия\"
                           value=\"";
        // line 73
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 73)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 73), "html", null, true))) : (print (null)));
        echo "\">

                    ";
        // line 75
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "name", [], "any", false, false, false, 75))) {
            // line 76
            echo "                        <div>
                            ";
            // line 77
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "name", [], "any", false, false, false, 77));
            foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                // line 78
                echo "                                <p>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</p>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo "                        </div>
                    ";
        }
        // line 82
        echo "

                    <input type=\"text\" name=\"eventDescription\" placeholder=\"Описание мероприятия\"
                           value=\"";
        // line 85
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 85)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 85), "html", null, true))) : (print (null)));
        echo "\">

                    ";
        // line 87
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "description", [], "any", false, false, false, 87))) {
            // line 88
            echo "                        <div>
                            ";
            // line 89
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "description", [], "any", false, false, false, 89));
            foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                // line 90
                echo "                                <p>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</p>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "                        </div>
                    ";
        }
        // line 94
        echo "

                </div>
                <div class=\"text-center\">
                    <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"addEvent\">Добавить
                        мероприятие
                    </button>
                </div>
            </form>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "account.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 94,  236 => 92,  227 => 90,  223 => 89,  220 => 88,  218 => 87,  213 => 85,  208 => 82,  204 => 80,  195 => 78,  191 => 77,  188 => 76,  186 => 75,  181 => 73,  171 => 65,  169 => 64,  167 => 63,  165 => 62,  163 => 61,  161 => 60,  159 => 59,  154 => 55,  152 => 54,  150 => 53,  148 => 52,  144 => 49,  141 => 48,  131 => 44,  127 => 43,  124 => 42,  119 => 41,  116 => 40,  114 => 39,  104 => 32,  98 => 29,  92 => 26,  86 => 23,  80 => 20,  74 => 17,  68 => 14,  62 => 11,  56 => 8,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container\">
        <div class=\"my-info\">

            <p class=\"text-center\">
                ID: {{ currentUser.getId }}
            </p>
            <p class=\"text-center\">
                Email: {{ currentUser.getEmail }}
            </p>
            <p class=\"text-center\">
                Фамилия: {{ currentUser.getLastName }}
            </p>
            <p class=\"text-center\">
                Имя: {{ currentUser.getFirstName }}
            </p>
            <p class=\"text-center\">
                Отчество: {{ currentUser.getPatronymic ?: \"Не указано\" }}
            </p>
            <p class=\"text-center\">
                Университет: {{ currentUser.getUniversity }}
            </p>
            <p class=\"text-center\">
                Специальность: {{ currentUser.getSpeciality }}
            </p>
            <p class=\"text-center\">
                Курс: {{ currentUser.getYear }}
            </p>
            <p class=\"text-center\">
                Телефон: {{ currentUser.getPhone }}
            </p>
        </div>

        <div class=\"after-info\">
            <div class=\"my-events\">
                <p>Мои мероприятия:</p>
                {% set userEvents = attribute(studentRepository, 'getEvents', [currentUser.getId]) %}
                {% if userEvents is not empty %}
                    {% for key, event in userEvents %}
                        <p>
                            <a href=\"./view-event?eventId={{ event.getId }}\">
                                {{ event.getName }}
                            </a>
                        </p>
                    {% endfor %}
                {% endif %}

            </div>
            {# <div class=\"my-qr\"> #}
            {# <?php \$imgSrc = ('https://api.qrserver.com/v1/create-qr-code/?data=' . \$currentUser->getId() . '&size=150x150') ?> #}
            {# <img src=\"<?php echo \$imgSrc ?>\" alt=\"qr-code\"/> #}
            {# </div> #}
        </div>


        {# <div class='qr-decoder'> #}
        {# <form enctype=\"multipart/form-data\" action=\"\" method=\"POST\"> #}
        {# <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1048576\"/> #}
        {# Расшифровать QR-код: <input name=\"file\" type=\"file\"/> #}
        {# <input type=\"submit\" name=\"readQr\" value=\"Read QR code\"/> #}
        {# </form> #}
        {# </div> #}


        <div>


            <form action=\"\" method=\"post\">
                <div class='login-fields'>
                    <input type=\"text\" name=\"eventName\" placeholder=\"Название мероприятия\"
                           value=\"{{ postData.eventName ?: null }}\">

                    {% if validationErrors.name is not empty %}
                        <div>
                            {% for key, error in validationErrors.name %}
                                <p>{{ error }}</p>
                            {% endfor %}
                        </div>
                    {% endif %}


                    <input type=\"text\" name=\"eventDescription\" placeholder=\"Описание мероприятия\"
                           value=\"{{ postData.eventDescription ?: null }}\">

                    {% if validationErrors.description is not empty %}
                        <div>
                            {% for key, error in validationErrors.description %}
                                <p>{{ error }}</p>
                            {% endfor %}
                        </div>
                    {% endif %}


                </div>
                <div class=\"text-center\">
                    <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"addEvent\">Добавить
                        мероприятие
                    </button>
                </div>
            </form>
        </div>

    </div>

{% endblock %}", "account.twig", "/srv/www/hse_events/templates/account.twig");
    }
}
