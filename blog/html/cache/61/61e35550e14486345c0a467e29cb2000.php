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

/* Blog/base.html.twig */
class __TwigTemplate_b920694ce3ca3786c143b8d5aca4ef56 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
<html lang=\"ru\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <style type=\"text/css\">
        * {
            box-sizing: border-box;
        }
        body, p, h1, ul, li {
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        li {
            list-style: none;
        }
        .button {
            width: 100px;
            height: 50px;
            border-radius: 5px;
            color:peru;
            border: 1px solid peru;
            font-size: 18px;
        }
        .container {
            max-width: 1200px;
            min-height: 100vh;
            margin: 0 auto;
            border: 1px solid peru;
            padding: 20px;
        }
        .user {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            margin-bottom: 50px;
        }
        .user__title {
            font-size: 40px;
            color:peru;
        }
        .form {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            color:peru;
        }
        .form__text {
            width: 600px;
            height: 100px;
            margin-bottom: 20px;
            resize: none
        }
        .posts {
            margin-bottom: 20px;
        }
        .posts__item {
            width: 600px;
            border-bottom: 1px solid peru;
            padding: 20px;
            text-align: right;
        }
        .post__item-user {
            color:darkgray;
        }
        .post__item-message {
            padding-top: 20px;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .post__item-image {
            margin-bottom: 20px;
        }
    </style>
    <title>";
        // line 79
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
<div class=\"container\">
    ";
        // line 83
        $this->displayBlock('content', $context, $blocks);
        // line 85
        echo "</div>
</body>
</html>";
    }

    // line 79
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 83
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 84
        echo "    ";
    }

    public function getTemplateName()
    {
        return "Blog/base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  144 => 84,  140 => 83,  134 => 79,  128 => 85,  126 => 83,  119 => 79,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Blog/base.html.twig", "C:\\OSPanel\\domains\\localhost\\less\\blog\\app\\View\\Blog\\base.html.twig");
    }
}
