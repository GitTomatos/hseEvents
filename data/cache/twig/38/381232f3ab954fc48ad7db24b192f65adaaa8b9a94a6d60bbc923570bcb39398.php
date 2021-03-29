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

/* registration.twig */
class __TwigTemplate_a401a0d09094817aff3b4669a0d480a9ea91b2565d2dc59e58b72f1e037f1034 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "registration.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"container d-flex align-items-center\">
        <div class=\"reg-background\">
            <div class=\"reg-text text-center\">
                <h1> Регистрация</h1>
            </div>


            <form name=\"formName\" class=\"needs-validation\" method=\"post\" action=\"\" novalidate>


                <div class=\"mb-3\">
                    <label for=\"lastName\" class=\"form-label\">Фамилия*</label>
                    <input type=\"text\" class=\"form-control\" id=\"lastName\" name=\"lastName\"
                           value=\"";
        // line 17
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "lastName", [], "any", false, false, false, 17)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "lastName", [], "any", false, false, false, 17), "html", null, true))) : (print (null)));
        echo "\" maxlength=\"30\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Фамилию
                    </div>

                    <div>
                        ";
        // line 23
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "lastName", [], "any", false, false, false, 23))) {
            // line 24
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "lastName", [], "any", false, false, false, 24));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 25
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                        ";
        }
        // line 28
        echo "                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"exampleInputPassword1\" class=\"form-label\">Имя*</label>
                    <input type=\"text\" class=\"form-control\" name=\"firstName\"
                           value=\"";
        // line 35
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "firstName", [], "any", false, false, false, 35)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "firstName", [], "any", false, false, false, 35), "html", null, true))) : (print (null)));
        echo "\" maxlength=\"30\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Имя
                    </div>

                    <div>
                        ";
        // line 41
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "firstName", [], "any", false, false, false, 41))) {
            // line 42
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "firstName", [], "any", false, false, false, 42));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 43
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "                        ";
        }
        // line 46
        echo "                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"patronymic\" class=\"form-label\">Отчество</label>
                    <input type=\"text\" class=\"form-control\" id=\"patronymic\" maxlength=\"30\" name=\"patronymic\"
                           value=\"";
        // line 53
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "patronymic", [], "any", false, false, false, 53)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "patronymic", [], "any", false, false, false, 53), "html", null, true))) : (print (null)));
        echo "\">
                </div>

                <div class=\"mb-3\">
                    <label for=\"university\" class=\"form-label\">Вуз*</label>
                    <input type=\"text\" id=\"university\" class=\"form-control\" maxlength=\"30\" name=\"university\"
                           value=\"";
        // line 59
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "university", [], "any", false, false, false, 59)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "university", [], "any", false, false, false, 59), "html", null, true))) : (print (null)));
        echo "\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Вуз
                    </div>

                    <div>
                        ";
        // line 65
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "university", [], "any", false, false, false, 65))) {
            // line 66
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "university", [], "any", false, false, false, 66));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 67
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "                        ";
        }
        // line 70
        echo "                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"speciality\" class=\"form-label\">Специальность*</label>
                    <input type=\"text\" id=\"speciality\" class=\"form-control\" maxlength=\"30\" name=\"speciality\"
                           value=\"";
        // line 77
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "speciality", [], "any", false, false, false, 77)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "speciality", [], "any", false, false, false, 77), "html", null, true))) : (print (null)));
        echo "\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Специальность
                    </div>

                    <div>
                        ";
        // line 83
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "speciality", [], "any", false, false, false, 83))) {
            // line 84
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "speciality", [], "any", false, false, false, 84));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 85
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "                        ";
        }
        // line 88
        echo "                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"studyYear\" class=\"form-label\">Курс*</label>
                    <input type=\"number\" id=\"studyYear\" class=\"form-control\" name=\"studyYear\"
                           value=\"";
        // line 95
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "studyYear", [], "any", false, false, false, 95)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "studyYear", [], "any", false, false, false, 95), "html", null, true))) : (print (null)));
        echo "\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Курс
                    </div>

                    <div>
                        ";
        // line 101
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "year", [], "any", false, false, false, 101))) {
            // line 102
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "year", [], "any", false, false, false, 102));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 103
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            echo "                        ";
        }
        // line 106
        echo "                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"phone\" class=\"form-label\">Телефон*</label>
                    <input type=\"text\" id=\"phone\" class=\"form-control\" maxlength=\"12\" name=\"phone\"
                           value=\"";
        // line 113
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "phone", [], "any", false, false, false, 113)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "phone", [], "any", false, false, false, 113), "html", null, true))) : (print (null)));
        echo "\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Телефон
                    </div>

                    <div>
                        ";
        // line 119
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "phone", [], "any", false, false, false, 119))) {
            // line 120
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "phone", [], "any", false, false, false, 120));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 121
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            echo "                        ";
        }
        // line 124
        echo "                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"email\" class=\"form-label\">Почта*</label>
                    <input type=\"email\" id=\"email\" class=\"form-control\" maxlength=\"255\" name=\"email\"
                           value=\"";
        // line 131
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "email", [], "any", false, false, false, 131)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "email", [], "any", false, false, false, 131), "html", null, true))) : (print (null)));
        echo "\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Почту
                    </div>

                    <div id=\"invalidCheck3Feedback\" class=\"invalid-feedback\">
                        Некорректная почта
                    </div>

                    <div>
                        ";
        // line 141
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "email", [], "any", false, false, false, 141))) {
            // line 142
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "email", [], "any", false, false, false, 142));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 143
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 145
            echo "                        ";
        }
        // line 146
        echo "                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"pass\" class=\"form-label\">Пароль*</label>
                    <input type=\"password\" id=\"pass\" class=\"form-control\" name=\"pass\" maxlength=\"255\"
                           value=\"";
        // line 153
        ((twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pass", [], "any", false, false, false, 153)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["postData"] ?? null), "pass", [], "any", false, false, false, 153), "html", null, true))) : (print (null)));
        echo "\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Пароль
                    </div>

                    <div>
                        ";
        // line 159
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "password", [], "any", false, false, false, 159))) {
            // line 160
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["validationErrors"] ?? null), "password", [], "any", false, false, false, 160));
            foreach ($context['_seq'] as $context["key"] => $context["valErr"]) {
                // line 161
                echo "                                ";
                echo twig_escape_filter($this->env, $context["valErr"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['valErr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            echo "                        ";
        }
        // line 164
        echo "                    </div>

                </div>


                <!--            <div class=\"form-check mt-5\">-->
                <!--                <input class=\"form-check-input\" type=\"checkbox\" name=\"pers_info_handling\" id=\"pers_info_handling\">-->
                <!--                <label for=\"pers_info_handling\">-->
                <!--                    Согласен(на) на обработку персональных данных-->
                <!--                </label>-->
                <!--            </div>-->


                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckChecked\" required>
                    <label class=\"form-check-label\" for=\"flexCheckChecked\">
                        Согласен(на) на обработку персональных данных
                    </label>
                    <div class=\"invalid-feedback\">
                        Необходимо согласие на обработку персональных данных
                    </div>
                </div>

                <div class=\"text-center\">
                    <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"addStudent\"
                            value=\"Register\">Регистрация
                    </button>
                </div>

            </form>

        </div>


    </div>


    <script src=\"/assets/js/registrationValidation.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "registration.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  365 => 164,  362 => 163,  353 => 161,  348 => 160,  346 => 159,  337 => 153,  328 => 146,  325 => 145,  316 => 143,  311 => 142,  309 => 141,  296 => 131,  287 => 124,  284 => 123,  275 => 121,  270 => 120,  268 => 119,  259 => 113,  250 => 106,  247 => 105,  238 => 103,  233 => 102,  231 => 101,  222 => 95,  213 => 88,  210 => 87,  201 => 85,  196 => 84,  194 => 83,  185 => 77,  176 => 70,  173 => 69,  164 => 67,  159 => 66,  157 => 65,  148 => 59,  139 => 53,  130 => 46,  127 => 45,  118 => 43,  113 => 42,  111 => 41,  102 => 35,  93 => 28,  90 => 27,  81 => 25,  76 => 24,  74 => 23,  65 => 17,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
    <div class=\"container d-flex align-items-center\">
        <div class=\"reg-background\">
            <div class=\"reg-text text-center\">
                <h1> Регистрация</h1>
            </div>


            <form name=\"formName\" class=\"needs-validation\" method=\"post\" action=\"\" novalidate>


                <div class=\"mb-3\">
                    <label for=\"lastName\" class=\"form-label\">Фамилия*</label>
                    <input type=\"text\" class=\"form-control\" id=\"lastName\" name=\"lastName\"
                           value=\"{{ postData.lastName ?: null }}\" maxlength=\"30\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Фамилию
                    </div>

                    <div>
                        {% if validationErrors.lastName is not null %}
                            {% for key, valErr in validationErrors.lastName %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"exampleInputPassword1\" class=\"form-label\">Имя*</label>
                    <input type=\"text\" class=\"form-control\" name=\"firstName\"
                           value=\"{{ postData.firstName ?: null }}\" maxlength=\"30\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Имя
                    </div>

                    <div>
                        {% if validationErrors.firstName is not null %}
                            {% for key, valErr in validationErrors.firstName %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"patronymic\" class=\"form-label\">Отчество</label>
                    <input type=\"text\" class=\"form-control\" id=\"patronymic\" maxlength=\"30\" name=\"patronymic\"
                           value=\"{{ postData.patronymic ?: null }}\">
                </div>

                <div class=\"mb-3\">
                    <label for=\"university\" class=\"form-label\">Вуз*</label>
                    <input type=\"text\" id=\"university\" class=\"form-control\" maxlength=\"30\" name=\"university\"
                           value=\"{{ postData.university ?: null }}\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Вуз
                    </div>

                    <div>
                        {% if validationErrors.university is not null %}
                            {% for key, valErr in validationErrors.university %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"speciality\" class=\"form-label\">Специальность*</label>
                    <input type=\"text\" id=\"speciality\" class=\"form-control\" maxlength=\"30\" name=\"speciality\"
                           value=\"{{ postData.speciality ?: null }}\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Специальность
                    </div>

                    <div>
                        {% if validationErrors.speciality is not null %}
                            {% for key, valErr in validationErrors.speciality %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"studyYear\" class=\"form-label\">Курс*</label>
                    <input type=\"number\" id=\"studyYear\" class=\"form-control\" name=\"studyYear\"
                           value=\"{{ postData.studyYear ?: null }}\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Курс
                    </div>

                    <div>
                        {% if validationErrors.year is not null %}
                            {% for key, valErr in validationErrors.year %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"phone\" class=\"form-label\">Телефон*</label>
                    <input type=\"text\" id=\"phone\" class=\"form-control\" maxlength=\"12\" name=\"phone\"
                           value=\"{{ postData.phone ?: null }}\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Телефон
                    </div>

                    <div>
                        {% if validationErrors.phone is not null %}
                            {% for key, valErr in validationErrors.phone %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"email\" class=\"form-label\">Почта*</label>
                    <input type=\"email\" id=\"email\" class=\"form-control\" maxlength=\"255\" name=\"email\"
                           value=\"{{ postData.email ?: null }}\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Почту
                    </div>

                    <div id=\"invalidCheck3Feedback\" class=\"invalid-feedback\">
                        Некорректная почта
                    </div>

                    <div>
                        {% if validationErrors.email is not null %}
                            {% for key, valErr in validationErrors.email %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>

                <div class=\"mb-3\">
                    <label for=\"pass\" class=\"form-label\">Пароль*</label>
                    <input type=\"password\" id=\"pass\" class=\"form-control\" name=\"pass\" maxlength=\"255\"
                           value=\"{{ postData.pass ?: null }}\" required>
                    <div class=\"invalid-feedback\">
                        Необходимо указать Пароль
                    </div>

                    <div>
                        {% if validationErrors.password is not null %}
                            {% for key, valErr in validationErrors.password %}
                                {{ valErr }}
                            {% endfor %}
                        {% endif %}
                    </div>

                </div>


                <!--            <div class=\"form-check mt-5\">-->
                <!--                <input class=\"form-check-input\" type=\"checkbox\" name=\"pers_info_handling\" id=\"pers_info_handling\">-->
                <!--                <label for=\"pers_info_handling\">-->
                <!--                    Согласен(на) на обработку персональных данных-->
                <!--                </label>-->
                <!--            </div>-->


                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"flexCheckChecked\" required>
                    <label class=\"form-check-label\" for=\"flexCheckChecked\">
                        Согласен(на) на обработку персональных данных
                    </label>
                    <div class=\"invalid-feedback\">
                        Необходимо согласие на обработку персональных данных
                    </div>
                </div>

                <div class=\"text-center\">
                    <button class=\"reg-button btn btn-primary btn-lg mt-5\" type=\"submit\" name=\"addStudent\"
                            value=\"Register\">Регистрация
                    </button>
                </div>

            </form>

        </div>


    </div>


    <script src=\"/assets/js/registrationValidation.js\"></script>

{% endblock %}
", "registration.twig", "/srv/www/hse_events/templates/registration.twig");
    }
}
