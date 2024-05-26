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

/* User/index.html.twig */
class __TwigTemplate_51e43c28e238ef6409cb5f168d3faa1b extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "User/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("User/base.html.twig", "User/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Блог: регистрация и вход";
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        if (($context["error"] ?? null)) {
            // line 5
            echo "    <span style=\"color: red\">";
            echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
            echo "</span>
    ";
        }
        // line 7
        echo "    <h2>Регистрация</h2><br>
    <form action=\"/user/register\" method=\"post\">
        <label>Имя:<br>
            <input type=\"text\" name=\"name\"><br>
        </label>
        <label>Email:<br>
            <input type=\"text\" name=\"email\"><br>
        </label>
        <label>Пароль:<br>
            <input type=\"password\" name=\"password\"><br>
        </label>
        <label>Повторите пароль:<br>
            <input type=\"password\" name=\"passwordRepeat\"><br>
        </label>
        <input class=\"button\" type=\"submit\" value=\"Зарегистрироваться\">
    </form>
    <br>
    <br>

    <h2>Вход</h2><br>
    <form action=\"/user/login\" method=\"post\">
        <label>Email:<br>
            <input type=\"text\" name=\"email\"><br>
        </label>
        <label>Пароль:<br>
            <input type=\"password\" name=\"password\"><br>
        </label>
        <input class=\"button\" type=\"submit\" value=\"Войти\">
    </form>
    <br>
    <br>
";
    }

    public function getTemplateName()
    {
        return "User/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 7,  61 => 5,  58 => 4,  54 => 3,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "User/index.html.twig", "C:\\OSPanel\\domains\\localhost\\less\\blog\\app\\View\\User\\index.html.twig");
    }
}
