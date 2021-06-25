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

/* themes/gavias_edupia/templates/views/views-view-gvaportfolio.html.twig */
class __TwigTemplate_40b90bad1ddb247ea47708ec47dde1a1294799fb6321290f005d553c71b20e44 extends \Twig\Template
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
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["attributes"] ?? null)) {
            // line 2
            echo "<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 2, $this->source), "html", null, true);
            echo ">
";
        }
        // line 4
        echo "   
   ";
        // line 5
        if (($context["header"] ?? null)) {
            // line 6
            echo "    <header>
      ";
            // line 7
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null), 7, $this->source), "html", null, true);
            echo "
    </header>
  ";
        }
        // line 10
        echo "
   ";
        // line 11
        if (($context["title"] ?? null)) {
            // line 12
            echo "      <h3>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 12, $this->source), "html", null, true);
            echo "</h3>
   ";
        }
        // line 14
        echo "  
  <nav class=\"portfolio-filter\">
    <ul class=\"nav nav-tabs\">
      ";
        // line 17
        if (($context["show_all"] ?? null)) {
            // line 18
            echo "        <li><a class=\"btn-filter ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pid"] ?? null), 18, $this->source), "html", null, true);
            echo " all active\" href=\"#\" data-filter=\"*\"><span>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("All"));
            echo "</span></a></li>
      ";
        }
        // line 20
        echo "
      ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["terms"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["term"]) {
            // line 22
            echo "        <li class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["term"], "tid", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
            echo "\"><a href=\"#\" class=\"btn-filter ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pid"] ?? null), 22, $this->source), "html", null, true);
            echo "\" data-filter=\".";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["term"], "tid", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
            echo "\"><span>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["term"], "name", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
            echo "</span></a></li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['term'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    </ul> 
  </nav>   

  <div class=\"gva-portfolio-items clearfix\">
    <div class=\"row\">
      <div class=\"isotope-items view-portfolio\" data-pid=\"";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pid"] ?? null), 29, $this->source), "html", null, true);
        echo "\" data-drupal-views-infinite-scroll-content-wrapper-gvaloadmore>
        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 31
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 31), 31, $this->source));
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "      </div>
    </div>
  </div>  
   
";
        // line 37
        if (($context["attributes"] ?? null)) {
            // line 38
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/gavias_edupia/templates/views/views-view-gvaportfolio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 38,  139 => 37,  133 => 33,  124 => 31,  120 => 30,  116 => 29,  109 => 24,  94 => 22,  90 => 21,  87 => 20,  79 => 18,  77 => 17,  72 => 14,  66 => 12,  64 => 11,  61 => 10,  55 => 7,  52 => 6,  50 => 5,  47 => 4,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/views/views-view-gvaportfolio.html.twig", "/Users/bradleywaye/Sites/local.wayedesigngroup.com/web/themes/gavias_edupia/templates/views/views-view-gvaportfolio.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "for" => 21);
        static $filters = array("escape" => 2, "t" => 18, "raw" => 31);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 't', 'raw'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
