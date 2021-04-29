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
class __TwigTemplate_7a12f21e030cd438a8166c481cff4f8125d24110f5a4df8641e6a38b19e99555 extends Template
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

        ";
        // line 6
        if ((0 === twig_compare(($context["userPermission"] ?? null), 2))) {
            // line 7
            echo "            <div class=\"my-info\">

                <p class=\"text-center\">
                    ID: ";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 10), "html", null, true);
            echo "
                </p>
                <p class=\"text-center\">
                    Email: ";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getEmail", [], "any", false, false, false, 13), "html", null, true);
            echo "
                </p>
                <p class=\"text-center\">
                    Фамилия: ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getLastName", [], "any", false, false, false, 16), "html", null, true);
            echo "
                </p>
                <p class=\"text-center\">
                    Имя: ";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getFirstName", [], "any", false, false, false, 19), "html", null, true);
            echo "
                </p>
                <p class=\"text-center\">
                    Отчество: ";
            // line 22
            ((twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getPatronymic", [], "any", false, false, false, 22)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getPatronymic", [], "any", false, false, false, 22), "html", null, true))) : (print ("Не указано")));
            echo "
                </p>
                <p class=\"text-center\">
                    Университет: ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getUniversity", [], "any", false, false, false, 25), "html", null, true);
            echo "
                </p>
                <p class=\"text-center\">
                    Специальность: ";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getSpeciality", [], "any", false, false, false, 28), "html", null, true);
            echo "
                </p>
                <p class=\"text-center\">
                    Курс: ";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getYear", [], "any", false, false, false, 31), "html", null, true);
            echo "
                </p>
                <p class=\"text-center\">
                    Телефон: ";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getPhone", [], "any", false, false, false, 34), "html", null, true);
            echo "
                </p>
            </div>

            <div class=\"after-info\">
                <div class=\"my-events\">
                    <p>Мои мероприятия:</p>

                    ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["registeredEvents"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 43
                echo "                        <p>";
                echo twig_escape_filter($this->env, $context["event"], "html", null, true);
                echo "</p>
                        ";
                // line 44
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "simple", [], "any", false, false, false, 44));
                foreach ($context['_seq'] as $context["_key"] => $context["point"]) {
                    // line 45
                    echo "                            <a href=\"/view-point/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 45), "html", null, true);
                    echo "\">
                                <p>";
                    // line 46
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 46), "html", null, true);
                    echo "</p>
                            </a>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['point'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 49
                echo "
                        <p>";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_array_keys_filter(twig_get_attribute($this->env, $this->source, $context["event"], "complex", [], "any", false, false, false, 50)), 0, [], "any", false, false, false, 50), "html", null, true);
                echo "</p>
                        ";
                // line 51
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "complex", [], "any", false, false, false, 51));
                foreach ($context['_seq'] as $context["key"] => $context["point"]) {
                    // line 52
                    echo "                            <a href=\"/view-point/13/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 52), "html", null, true);
                    echo "\">
                                <pre>   - ";
                    // line 53
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 53), "html", null, true);
                    echo "</pre>
                            </a>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "                </div>

                ";
            // line 60
            echo "                ";
            // line 61
            echo "                ";
            // line 62
            echo "
                ";
            // line 64
            echo "                ";
            // line 65
            echo "                ";
            // line 66
            echo "                ";
            // line 67
            echo "                ";
            // line 68
            echo "                ";
            // line 69
            echo "                ";
            // line 70
            echo "                ";
            // line 71
            echo "                ";
            // line 72
            echo "
            </div>

        ";
        }
        // line 76
        echo "

        ";
        // line 79
        echo "        ";
        // line 80
        echo "        ";
        // line 81
        echo "        ";
        // line 82
        echo "        ";
        // line 83
        echo "        ";
        // line 84
        echo "        ";
        // line 85
        echo "

        ";
        // line 88
        echo "        ";
        // line 89
        echo "        ";
        // line 90
        echo "        ";
        // line 91
        echo "        ";
        // line 92
        echo "        ";
        // line 93
        echo "        ";
        // line 94
        echo "

        ";
        // line 96
        if ((0 === twig_compare(($context["userPermission"] ?? null), 3))) {
            // line 97
            echo "
            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <input type=\"text\" name=\"eventName\" placeholder=\"Название мероприятия\"
                               value=\"";
            // line 102
            ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 102)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 102), "html", null, true))) : (print (null)));
            echo "\">

                        ";
            // line 104
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "name", [], "any", false, false, false, 104))) {
                // line 105
                echo "                            <div>
                                ";
                // line 106
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "name", [], "any", false, false, false, 106));
                foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                    // line 107
                    echo "                                    <p>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 109
                echo "                            </div>
                        ";
            }
            // line 111
            echo "

                        <input type=\"text\" name=\"eventDescription\" placeholder=\"Описание мероприятия\"
                               value=\"";
            // line 114
            ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 114)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 114), "html", null, true))) : (print (null)));
            echo "\">

                        ";
            // line 116
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "description", [], "any", false, false, false, 116))) {
                // line 117
                echo "                            <div>
                                ";
                // line 118
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "description", [], "any", false, false, false, 118));
                foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                    // line 119
                    echo "                                    <p>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 121
                echo "                            </div>
                        ";
            }
            // line 123
            echo "

                    </div>
                    <div class=\"text-center\">
                        <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"addEvent\">Добавить
                            мероприятие
                        </button>
                    </div>
                </form>
            </div>


            ";
            // line 135
            if ( !(null === ($context["events"] ?? null))) {
                // line 136
                echo "                <div>
                    <form action=\"\" method=\"post\">
                        <div class='login-fields'>
                            <select name=\"eventId\">
                                ";
                // line 140
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                    // line 141
                    echo "                                    <option value=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 141), "html", null, true);
                    echo ">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 141), "html", null, true);
                    echo "</option>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 143
                echo "                            </select>

                            <input type=\"text\" name=\"pointName\" placeholder=\"Название этапа\"
                                   value=\"";
                // line 146
                ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointName", [], "any", false, false, false, 146)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointName", [], "any", false, false, false, 146), "html", null, true))) : (print (null)));
                echo "\">

                            ";
                // line 148
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "name", [], "any", false, false, false, 148))) {
                    // line 149
                    echo "                                <div>
                                    ";
                    // line 150
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "name", [], "any", false, false, false, 150));
                    foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                        // line 151
                        echo "                                        <p>";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 153
                    echo "                                </div>
                            ";
                }
                // line 155
                echo "

                            <input type=\"text\" name=\"pointDescription\" placeholder=\"Описание этапа\"
                                   value=\"";
                // line 158
                ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointDescription", [], "any", false, false, false, 158)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointDescription", [], "any", false, false, false, 158), "html", null, true))) : (print (null)));
                echo "\">

                            ";
                // line 160
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "description", [], "any", false, false, false, 160))) {
                    // line 161
                    echo "                                <div>
                                    ";
                    // line 162
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "description", [], "any", false, false, false, 162));
                    foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                        // line 163
                        echo "                                        <p>";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 165
                    echo "                                </div>
                            ";
                }
                // line 167
                echo "

                        </div>
                        <div class=\"text-center\">
                            <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"addPoint\">
                                Добавить
                                этап
                            </button>
                        </div>
                    </form>
                </div>
            ";
            }
            // line 179
            echo "
            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <select name=\"eventId\">
                            ";
            // line 184
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                // line 185
                echo "                                <option value=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 185), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 185), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 187
            echo "                        </select>

                    </div>
                    <div class=\"text-center\">
                        <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"deleteEvent\">
                            Удалить мероприятие
                        </button>
                    </div>
                </form>
            </div>

            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        ";
            // line 202
            echo "                        ";
            // line 203
            echo "                        ";
            // line 204
            echo "                        ";
            // line 205
            echo "                        ";
            // line 206
            echo "
                        <select name=\"pointId\">
                            ";
            // line 208
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["points"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["point"]) {
                // line 209
                echo "                                <option value=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 209), "html", null, true);
                echo ">(";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getEventId", [], "any", false, false, false, 209), "html", null, true);
                echo ") -> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 209), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 211
            echo "                        </select>

                    </div>
                    <div class=\"text-center\">
                        <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"deletePoint\">
                            Удалить этап
                        </button>
                    </div>
                </form>
            </div>


        ";
        }
        // line 224
        echo "
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
        return array (  512 => 224,  497 => 211,  484 => 209,  480 => 208,  476 => 206,  474 => 205,  472 => 204,  470 => 203,  468 => 202,  452 => 187,  441 => 185,  437 => 184,  430 => 179,  416 => 167,  412 => 165,  403 => 163,  399 => 162,  396 => 161,  394 => 160,  389 => 158,  384 => 155,  380 => 153,  371 => 151,  367 => 150,  364 => 149,  362 => 148,  357 => 146,  352 => 143,  341 => 141,  337 => 140,  331 => 136,  329 => 135,  315 => 123,  311 => 121,  302 => 119,  298 => 118,  295 => 117,  293 => 116,  288 => 114,  283 => 111,  279 => 109,  270 => 107,  266 => 106,  263 => 105,  261 => 104,  256 => 102,  249 => 97,  247 => 96,  243 => 94,  241 => 93,  239 => 92,  237 => 91,  235 => 90,  233 => 89,  231 => 88,  227 => 85,  225 => 84,  223 => 83,  221 => 82,  219 => 81,  217 => 80,  215 => 79,  211 => 76,  205 => 72,  203 => 71,  201 => 70,  199 => 69,  197 => 68,  195 => 67,  193 => 66,  191 => 65,  189 => 64,  186 => 62,  184 => 61,  182 => 60,  178 => 57,  172 => 56,  163 => 53,  158 => 52,  154 => 51,  150 => 50,  147 => 49,  138 => 46,  133 => 45,  129 => 44,  124 => 43,  120 => 42,  109 => 34,  103 => 31,  97 => 28,  91 => 25,  85 => 22,  79 => 19,  73 => 16,  67 => 13,  61 => 10,  56 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container\">

        {% if userPermission == 2 %}
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

                    {% for event in registeredEvents %}
                        <p>{{ event }}</p>
                        {% for point in event.simple %}
                            <a href=\"/view-point/{{ point.getId }}\">
                                <p>{{ point.getName }}</p>
                            </a>
                        {% endfor %}

                        <p>{{ (event.complex | keys).0 }}</p>
                        {% for key, point in event.complex %}
                            <a href=\"/view-point/13/{{ point.getName }}\">
                                <pre>   - {{ point.getName }}</pre>
                            </a>
                        {% endfor %}
                    {% endfor %}
                </div>

                {# <div> #}
                {# <p>Оставить фидбэк</p> #}
                {# </div> #}

                {# <div> #}
                {# <div class='text-center'> #}
                {# <button class='reg-button btn btn-primary btn-lg mb-5'> #}
                {# <a href='/getDiplom/{{ currentUser.getId }}/{{ point.getEventId }}'> #}
                {# <p>Получить диплом</p> #}
                {# </a> #}
                {# </button> #}
                {# </div> #}
                {# </div> #}

            </div>

        {% endif %}


        {# <div class=\"my-qr\"> #}
        {# #}{# <?php \$imgSrc = ('https://api.qrserver.com/v1/create-qr-code/?data=' . \$currentUser->getId() . #}
        {# #}{# '&size=150x150') ?> #}
        {# #}{# <img src=\"<?php echo \$imgSrc ?>\" alt=\"qr-code\"/> #}
        {# <img src=\"https://api.qrserver.com/v1/create-qr-code/?data={{ currentUser.getId }}&size=150x150\" #}
        {# alt=\"qr-code\"/> #}
        {# </div> #}


        {# <div class='qr-decoder'> #}
        {# <form enctype=\"multipart/form-data\" action=\"\" method=\"POST\"> #}
        {# <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1048576\"/> #}
        {# Расшифровать QR-код: <input name=\"file\" type=\"file\"/> #}
        {# <input type=\"submit\" name=\"readQr\" value=\"Read QR code\"/> #}
        {# </form> #}
        {# </div> #}


        {% if userPermission == 3 %}

            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <input type=\"text\" name=\"eventName\" placeholder=\"Название мероприятия\"
                               value=\"{{ postData.eventName ?: null }}\">

                        {% if eventValidationErrors.name is not empty %}
                            <div>
                                {% for key, error in eventValidationErrors.name %}
                                    <p>{{ error }}</p>
                                {% endfor %}
                            </div>
                        {% endif %}


                        <input type=\"text\" name=\"eventDescription\" placeholder=\"Описание мероприятия\"
                               value=\"{{ postData.eventDescription ?: null }}\">

                        {% if eventValidationErrors.description is not empty %}
                            <div>
                                {% for key, error in eventValidationErrors.description %}
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


            {% if events is not null %}
                <div>
                    <form action=\"\" method=\"post\">
                        <div class='login-fields'>
                            <select name=\"eventId\">
                                {% for key, event in events %}
                                    <option value={{ event.getId }}>{{ event.getName }}</option>
                                {% endfor %}
                            </select>

                            <input type=\"text\" name=\"pointName\" placeholder=\"Название этапа\"
                                   value=\"{{ postData.pointName ?: null }}\">

                            {% if pointValidationErrors.name is not empty %}
                                <div>
                                    {% for key, error in pointValidationErrors.name %}
                                        <p>{{ error }}</p>
                                    {% endfor %}
                                </div>
                            {% endif %}


                            <input type=\"text\" name=\"pointDescription\" placeholder=\"Описание этапа\"
                                   value=\"{{ postData.pointDescription ?: null }}\">

                            {% if pointValidationErrors.description is not empty %}
                                <div>
                                    {% for key, error in pointValidationErrors.description %}
                                        <p>{{ error }}</p>
                                    {% endfor %}
                                </div>
                            {% endif %}


                        </div>
                        <div class=\"text-center\">
                            <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"addPoint\">
                                Добавить
                                этап
                            </button>
                        </div>
                    </form>
                </div>
            {% endif %}

            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <select name=\"eventId\">
                            {% for key, event in events %}
                                <option value={{ event.getId }}>{{ event.getName }}</option>
                            {% endfor %}
                        </select>

                    </div>
                    <div class=\"text-center\">
                        <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"deleteEvent\">
                            Удалить мероприятие
                        </button>
                    </div>
                </form>
            </div>

            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        {# <select name=\"eventId\"> #}
                        {# {% for key, event in events %} #}
                        {# <option value={{ event.getId }}>{{ event.getName }}</option> #}
                        {# {% endfor %} #}
                        {# </select> #}

                        <select name=\"pointId\">
                            {% for key, point in points %}
                                <option value={{ point.getId }}>({{ point.getEventId }}) -> {{ point.getName }}</option>
                            {% endfor %}
                        </select>

                    </div>
                    <div class=\"text-center\">
                        <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"deletePoint\">
                            Удалить этап
                        </button>
                    </div>
                </form>
            </div>


        {% endif %}

    </div>

{% endblock %}", "account.twig", "/home/user/PhpstormProjects/hseEvents/templates/account.twig");
    }
}
