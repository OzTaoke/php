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

/* User/base.html.twig */
class __TwigTemplate_cdf3c3ba0bd368f034dc63d80347338a extends \Twig\Template
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
        body, p, h2, ul, li {
            margin: 0;
            padding: 0;
            color:peru;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        li {
            list-style: none;
        }
        input {
            width: 600px;
            height: 50px;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 48px;
        }
        .button {
            height: 50px;
            border-radius: 5px;
            color:peru;
            border: 1px solid peru;
            font-size: 18px;
        }
        .container {
            max-width: 1200px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 0 auto;
            border: 1px solid peru;
            padding: 20px;
        }
    </style>
    <title>";
        // line 47
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
<div class=\"container\">
    ";
        // line 51
        $this->displayBlock('content', $context, $blocks);
        // line 53
        echo "</div>
</body>
</html>";
    }

    // line 47
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 51
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 52
        echo "    ";
    }

    public function getTemplateName()
    {
        return "User/base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  112 => 52,  108 => 51,  102 => 47,  96 => 53,  94 => 51,  87 => 47,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "User/base.html.twig", "C:\\OSPanel\\domains\\localhost\\less\\blog\\app\\View\\User\\base.html.twig");
    }
}
