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
class __TwigTemplate_00efaa847bba3d2c0e8e36ccd95210f0b1c6e5a4a9c3ec959fb3d868288ea2d6 extends Template
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
            echo "
                </div>
            </div>

        ";
        }
        // line 57
        echo "

        ";
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
        echo "        ";
        // line 66
        echo "

        ";
        // line 69
        echo "        ";
        // line 70
        echo "        ";
        // line 71
        echo "        ";
        // line 72
        echo "        ";
        // line 73
        echo "        ";
        // line 74
        echo "        ";
        // line 75
        echo "

        ";
        // line 77
        if ((0 === twig_compare(($context["userPermission"] ?? null), 3))) {
            // line 78
            echo "
            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <input type=\"text\" name=\"eventName\" placeholder=\"Название мероприятия\"
                               value=\"";
            // line 83
            ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 83)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventName", [], "any", false, false, false, 83), "html", null, true))) : (print (null)));
            echo "\">

                        ";
            // line 85
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "name", [], "any", false, false, false, 85))) {
                // line 86
                echo "                            <div>
                                ";
                // line 87
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "name", [], "any", false, false, false, 87));
                foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                    // line 88
                    echo "                                    <p>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 90
                echo "                            </div>
                        ";
            }
            // line 92
            echo "

                        <input type=\"text\" name=\"eventDescription\" placeholder=\"Описание мероприятия\"
                               value=\"";
            // line 95
            ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 95)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "eventDescription", [], "any", false, false, false, 95), "html", null, true))) : (print (null)));
            echo "\">

                        ";
            // line 97
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "description", [], "any", false, false, false, 97))) {
                // line 98
                echo "                            <div>
                                ";
                // line 99
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["eventValidationErrors"] ?? null), "description", [], "any", false, false, false, 99));
                foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                    // line 100
                    echo "                                    <p>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 102
                echo "                            </div>
                        ";
            }
            // line 104
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
            // line 116
            if ( !(null === ($context["events"] ?? null))) {
                // line 117
                echo "                <div>
                    <form action=\"\" method=\"post\">
                        <div class='login-fields'>
                            <select name=\"eventId\">
                                ";
                // line 121
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                    // line 122
                    echo "                                    <option value=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 122), "html", null, true);
                    echo ">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 122), "html", null, true);
                    echo "</option>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 124
                echo "                            </select>

                            <input type=\"text\" name=\"pointName\" placeholder=\"Название этапа\"
                                   value=\"";
                // line 127
                ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointName", [], "any", false, false, false, 127)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointName", [], "any", false, false, false, 127), "html", null, true))) : (print (null)));
                echo "\">

                            ";
                // line 129
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "name", [], "any", false, false, false, 129))) {
                    // line 130
                    echo "                                <div>
                                    ";
                    // line 131
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "name", [], "any", false, false, false, 131));
                    foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                        // line 132
                        echo "                                        <p>";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 134
                    echo "                                </div>
                            ";
                }
                // line 136
                echo "

                            <input type=\"text\" name=\"pointDescription\" placeholder=\"Описание этапа\"
                                   value=\"";
                // line 139
                ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointDescription", [], "any", false, false, false, 139)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pointDescription", [], "any", false, false, false, 139), "html", null, true))) : (print (null)));
                echo "\">

                            ";
                // line 141
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "description", [], "any", false, false, false, 141))) {
                    // line 142
                    echo "                                <div>
                                    ";
                    // line 143
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pointValidationErrors"] ?? null), "description", [], "any", false, false, false, 143));
                    foreach ($context['_seq'] as $context["key"] => $context["error"]) {
                        // line 144
                        echo "                                        <p>";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 146
                    echo "                                </div>
                            ";
                }
                // line 148
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
            // line 160
            echo "
            <div>
                <form action=\"\" method=\"post\">
                    <div class='login-fields'>
                        <select name=\"eventId\">
                            ";
            // line 165
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["event"]) {
                // line 166
                echo "                                <option value=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "any", false, false, false, 166), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getName", [], "any", false, false, false, 166), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 168
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
            // line 187
            echo "
                        <select name=\"pointId\">
                            ";
            // line 189
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["points"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["point"]) {
                // line 190
                echo "                                <option value=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getId", [], "any", false, false, false, 190), "html", null, true);
                echo ">(";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getEventId", [], "any", false, false, false, 190), "html", null, true);
                echo ") -> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["point"], "getName", [], "any", false, false, false, 190), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 192
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
        // line 205
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
        return array (  450 => 205,  435 => 192,  422 => 190,  418 => 189,  414 => 187,  398 => 168,  387 => 166,  383 => 165,  376 => 160,  362 => 148,  358 => 146,  349 => 144,  345 => 143,  342 => 142,  340 => 141,  335 => 139,  330 => 136,  326 => 134,  317 => 132,  313 => 131,  310 => 130,  308 => 129,  303 => 127,  298 => 124,  287 => 122,  283 => 121,  277 => 117,  275 => 116,  261 => 104,  257 => 102,  248 => 100,  244 => 99,  241 => 98,  239 => 97,  234 => 95,  229 => 92,  225 => 90,  216 => 88,  212 => 87,  209 => 86,  207 => 85,  202 => 83,  195 => 78,  193 => 77,  189 => 75,  187 => 74,  185 => 73,  183 => 72,  181 => 71,  179 => 70,  177 => 69,  173 => 66,  171 => 65,  169 => 64,  167 => 63,  165 => 62,  163 => 61,  161 => 60,  157 => 57,  150 => 52,  147 => 51,  137 => 47,  132 => 46,  129 => 44,  124 => 43,  121 => 42,  119 => 41,  109 => 34,  103 => 31,  97 => 28,  91 => 25,  85 => 22,  79 => 19,  73 => 16,  67 => 13,  61 => 10,  56 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
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
{#                        <select name=\"eventId\">#}
{#                            {% for key, event in events %}#}
{#                                <option value={{ event.getId }}>{{ event.getName }}</option>#}
{#                            {% endfor %}#}
{#                        </select>#}

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
