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

/* themes/gavias_edupia/templates/block/commerce-cart-block.html.twig */
class __TwigTemplate_34e8423b0552093e63a6625988b32aeec01eed7c4c3a16d06a01eb43f8644540 extends \Twig\Template
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
        echo "<div class=\"title\"><a class=\"link-qc\" href=\"javascript:void(0);\"><span class=\"icon fa fa-shopping-cart\"></span><span class=\"cart-count\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count"] ?? null), 1, $this->source), "html", null, true);
        echo "</span></a></div>
<div class=\"content-inner\">
  ";
        // line 3
        if (($context["content"] ?? null)) {
            // line 4
            echo "  <div class=\"cart-contents\">
    <div class=\"cart-block-contents-inner\">
      <div class=\"cart-block-contents-items\">
        ";
            // line 7
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 7, $this->source), "html", null, true);
            echo "
      </div>
      <div class=\"cart-block-contents-links\">
        ";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["links"] ?? null), 10, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  </div>
  ";
        } else {
            // line 15
            echo "    <div class=\"cart-no-items\">
      <p>";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Your cart is empty."));
            echo "</p>
      <p><strong><a href=\"";
            // line 17
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
            echo "\"><span class=\"text-theme\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Keep Shopping"));
            echo "</span></a></strong></p>
    </div>
  ";
        }
        // line 20
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "themes/gavias_edupia/templates/block/commerce-cart-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 20,  73 => 17,  69 => 16,  66 => 15,  58 => 10,  52 => 7,  47 => 4,  45 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/block/commerce-cart-block.html.twig", "/Users/bradleywaye/Sites/local.wayedesigngroup.com/web/themes/gavias_edupia/templates/block/commerce-cart-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3);
        static $filters = array("escape" => 1, "t" => 16);
        static $functions = array("path" => 17);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 't'],
                ['path']
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
