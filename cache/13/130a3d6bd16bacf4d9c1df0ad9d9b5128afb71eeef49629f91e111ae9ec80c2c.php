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

/* temp.twig */
class __TwigTemplate_4d1ebfe55045d32e7759d8ac50ba3d580e16adf842b4d8b4d67d81c34aab0886 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <title>My Webpage</title>
</head>
<body>
    <h1>My Webpage</h1>
    ";
        // line 8
        echo twig_escape_filter($this->env, ($context["herbalism"] ?? null), "html", null, true);
        echo "
    <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad animi consequuntur culpa debitis dolore ea earum enim expedita fuga illum impedit itaque nisi nulla officia quibusdam, quod tempora!</span><span>A amet at beatae dolor eaque error expedita ipsa ipsam ipsum labore maiores maxime modi molestiae mollitia nesciunt odit officiis porro quae quas, qui quo rem, tempora, temporibus voluptatem voluptatibus.</span><span>Cupiditate deserunt et excepturi in molestias mollitia nihil nobis officiis, pariatur quos sapiente, voluptates voluptatibus voluptatum? Atque, delectus eius facere hic in necessitatibus odio, qui rem, repellendus veniam veritatis voluptatum.</span></p>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "temp.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temp.twig", "D:\\Softwares\\laragon\\www\\OpenClassrooms\\MyBlog\\View\\temp.twig");
    }
}
