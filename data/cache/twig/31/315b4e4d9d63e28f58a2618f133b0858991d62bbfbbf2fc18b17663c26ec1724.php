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
            // line 41
            $context["userEvents"] = twig_get_attribute($this->env, $this->source, ($context["studentRepository"] ?? null), "getEvents", [0 => twig_get_attribute($this->env, $this->source, ($context["currentUser"] ?? null), "getId", [], "any", false, false, false, 41)], "any", false, false, false, 41);
            // line 42
            echo "                    ";
            if ( !twig_test_empty(($context["userEvents"] ?? null))) {
                // line 43
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["userEvents"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                    // line 44
                    echo "                            <p>
                                ";
                    // line 46
                    echo "                                <a href=\"./view-event/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 46), "html", null, true);
                    echo "\">
                                    ";
                    // line 47
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 47), "html", null, true);
                    echo "
                                </a>
                            </p>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                echo "                    ";
            }
            // line 52
            echo "                </div>

";
            // line 57
            echo "
";
            // line 67
            echo "
            </div>

        ";
        }
        // line 71
        echo "

        ";
        // line 74
        echo "        ";
        // line 75
        echo "        ";
        // line 76
        echo "        ";
        // line 77
        echo "        ";
        // line 78
        echo "        ";
        // line 79
        echo "        ";
        // line 80
        echo "

        ";
        // line 83
        echo "        ";
        // line 84
        echo "        ";
        // line 85
        echo "        ";
        // line 86
        echo "        ";
        // line 87
        echo "        ";
        // line 88
        echo "        ";
        // line 89
        echo "

        ";
        // line 91
        if ((0 === twig_compare(($context["userPermission"] ?? null), 3))) {
            // line 92
            echo "
            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <input type=\"text\" name=\"eventName\" placeholder=\"Название мероприятия\"
                               value=\"";
            // line 97
            ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 97)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 97), "html", null, true))) : (print (null)));
            echo "\">

                        ";
            // line 99
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "name", [], "any", false, false, false, 99))) {
                // line 100
                echo "                            <div>
                                ";
                // line 101
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "name", [], "any", false, false, false, 101));
                foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                    // line 102
                    echo "                                    <p>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 104
                echo "                            </div>
                        ";
            }
            // line 106
            echo "

                        <input type=\"text\" name=\"eventDescription\" placeholder=\"Описание мероприятия\"
                               value=\"";
            // line 109
            ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 109)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 109), "html", null, true))) : (print (null)));
            echo "\">

                        ";
            // line 111
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "description", [], "any", false, false, false, 111))) {
                // line 112
                echo "                            <div>
                                ";
                // line 113
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "description", [], "any", false, false, false, 113));
                foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                    // line 114
                    echo "                                    <p>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 116
                echo "                            </div>
                        ";
            }
            // line 118
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
            // line 130
            if ( !(null === ($context["events"] ?? null))) {
                // line 131
                echo "                <div>
                    <form action=\"\" method=\"post\">
                        <div class='login-fields'>
                            <select name=\"eventId\">
                                ";
                // line 135
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                    // line 136
                    echo "                                    <option value=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 136), "html", null, true);
                    echo ">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 136), "html", null, true);
                    echo "</option>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 138
                echo "                            </select>

                            <input type=\"text\" name=\"pointName\" placeholder=\"Название этапа\"
                                   value=\"";
                // line 141
                ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointName", [], "any", false, false, false, 141)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointName", [], "any", false, false, false, 141), "html", null, true))) : (print (null)));
                echo "\">

                            ";
                // line 143
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "name", [], "any", false, false, false, 143))) {
                    // line 144
                    echo "                                <div>
                                    ";
                    // line 145
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "name", [], "any", false, false, false, 145));
                    foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                        // line 146
                        echo "                                        <p>";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 148
                    echo "                                </div>
                            ";
                }
                // line 150
                echo "

                            <input type=\"text\" name=\"pointDescription\" placeholder=\"Описание этапа\"
                                   value=\"";
                // line 153
                ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointDescription", [], "any", false, false, false, 153)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointDescription", [], "any", false, false, false, 153), "html", null, true))) : (print (null)));
                echo "\">

                            ";
                // line 155
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "description", [], "any", false, false, false, 155))) {
                    // line 156
                    echo "                                <div>
                                    ";
                    // line 157
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "description", [], "any", false, false, false, 157));
                    foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                        // line 158
                        echo "                                        <p>";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 160
                    echo "                                </div>
                            ";
                }
                // line 162
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
            // line 174
            echo "
            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <select name=\"eventId\">
                            ";
            // line 179
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                // line 180
                echo "                                <option value=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 180), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 180), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
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
            // line 197
            echo "                        ";
            // line 198
            echo "                        ";
            // line 199
            echo "                        ";
            // line 200
            echo "                        ";
            // line 201
            echo "
                        <select name=\"pointId\">
                            ";
            // line 203
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["points"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["point"]) {
                // line 204
                echo "                                <option value=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 204), "html", null, true);
                echo ">(";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getEventId", [], "any", false, false, false, 204), "html", null, true);
                echo ") -> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 204), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 206
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
        // line 219
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
        return array (  464 => 219,  449 => 206,  436 => 204,  432 => 203,  428 => 201,  426 => 200,  424 => 199,  422 => 198,  420 => 197,  404 => 182,  393 => 180,  389 => 179,  382 => 174,  368 => 162,  364 => 160,  355 => 158,  351 => 157,  348 => 156,  346 => 155,  341 => 153,  336 => 150,  332 => 148,  323 => 146,  319 => 145,  316 => 144,  314 => 143,  309 => 141,  304 => 138,  293 => 136,  289 => 135,  283 => 131,  281 => 130,  267 => 118,  263 => 116,  254 => 114,  250 => 113,  247 => 112,  245 => 111,  240 => 109,  235 => 106,  231 => 104,  222 => 102,  218 => 101,  215 => 100,  213 => 99,  208 => 97,  201 => 92,  199 => 91,  195 => 89,  193 => 88,  191 => 87,  189 => 86,  187 => 85,  185 => 84,  183 => 83,  179 => 80,  177 => 79,  175 => 78,  173 => 77,  171 => 76,  169 => 75,  167 => 74,  163 => 71,  157 => 67,  154 => 57,  150 => 52,  147 => 51,  137 => 47,  132 => 46,  129 => 44,  124 => 43,  121 => 42,  119 => 41,  109 => 34,  103 => 31,  97 => 28,  91 => 25,  85 => 22,  79 => 19,  73 => 16,  67 => 13,  61 => 10,  56 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
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
                    {% set userEvents = attribute(studentRepository, 'getEvents', [currentUser.getId]) %}
                    {% if userEvents is not empty %}
                        {% for key, event in userEvents %}
                            <p>
                                {# <a href=\"./view-event?eventId={{ event.getId }}\"> #}
                                <a href=\"./view-event/{{ event.getId }}\">
                                    {{ event.getName }}
                                </a>
                            </p>
                        {% endfor %}
                    {% endif %}
                </div>

{#                <div>#}
{#                    <p>Оставить фидбэк</p>#}
{#                </div>#}

{#                <div>#}
{#                    <div class='text-center'>#}
{#                        <button class='reg-button btn btn-primary btn-lg mb-5'>#}
{#                            <a href='/getDiplom/{{ currentUser.getId }}/{{ point.getEventId }}'>#}
{#                                <p>Получить диплом</p>#}
{#                            </a>#}
{#                        </button>#}
{#                    </div>#}
{#                </div>#}

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
