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

/* Blog/index.html.twig */
class __TwigTemplate_edcb2a9dd6b63660cb40e4298c6cc364 extends \Twig\Template
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
        return "Blog/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("Blog/base.html.twig", "Blog/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Блог";
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"user\">
    <h1 class=\"user__title\">Вы вошли как ";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 5), "html", null, true);
        echo "</h1>
    <form class=\"user__exit\" action=\"/user/logout\">
        <input class=\"user__exit-button button\" type=\"submit\" value=\"Выйти\">
    </form>
</div>
<ul class=\"posts\">
    ";
        // line 11
        if (($context["posts"] ?? null)) {
            // line 12
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 13
                echo "    <li class=\"posts__item\">
        <span class=\"post__item-user\">Сообщение от пользователя <b>";
                // line 14
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "name", [], "any", false, false, false, 14), "html", null, true);
                echo "</b> отправлено ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "date", [], "any", false, false, false, 14), "html", null, true);
                echo "</span>
        <div class=\"post__item-message\">";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "message", [], "any", false, false, false, 15), "html", null, true);
                echo "</div>
        ";
                // line 16
                if (twig_get_attribute($this->env, $this->source, $context["post"], "fileContent", [], "any", false, false, false, 16)) {
                    // line 17
                    echo "        <img class=\"post__item-image\" alt=\"слишком большая картинка\" src=\"/images/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "fileContent", [], "any", false, false, false, 17), "html", null, true);
                    echo "\">
        ";
                }
                // line 19
                echo "        ";
                if (($context["admin"] ?? null)) {
                    // line 20
                    echo "        <div class=\"admin\">
            <a class=\"admin__button\" href=\"/admin/delete/?id=";
                    // line 21
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 21), "html", null, true);
                    echo "\">Удалить</a>
        </div>
        ";
                }
                // line 24
                echo "    </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "    ";
        } else {
            // line 27
            echo "        <span>Нет сообщений</span>
    ";
        }
        // line 29
        echo "</ul>
<form class=\"form\" enctype=\"multipart/form-data\" action=\"/blog/send\" method=\"post\">
    <label>
        <textarea class=\"form__text\" name=\"message\"></textarea>
    </label>
    <input class=\"form__file\" name=\"userfile\" type=\"file\"/><br>
    <input class=\"form__button button\" type=\"submit\" value=\"Отправить\">
</form>
";
    }

    public function getTemplateName()
    {
        return "Blog/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 29,  120 => 27,  117 => 26,  110 => 24,  104 => 21,  101 => 20,  98 => 19,  92 => 17,  90 => 16,  86 => 15,  80 => 14,  77 => 13,  72 => 12,  70 => 11,  61 => 5,  58 => 4,  54 => 3,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Blog/index.html.twig", "C:\\OSPanel\\domains\\localhost\\less\\blog\\app\\View\\Blog\\index.html.twig");
    }
}
