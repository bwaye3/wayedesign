<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/gavias_edupia/templates/block/commerce-cart-block.html.twig */
class __TwigTemplate_be0c8bbb2e279af76edcf8252832058a44a7665d8f287d5c6eb39e4cf6741977 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 3];
        $filters = ["escape" => 1, "t" => 16];
        $functions = ["path" => 17];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 't'],
                ['path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

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

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"title\"><a class=\"link-qc\" href=\"javascript:void(0);\"><span class=\"icon fa fa-shopping-cart\"></span><span class=\"cart-count\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count"] ?? null)), "html", null, true);
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
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null)), "html", null, true);
            echo "
      </div>
      <div class=\"cart-block-contents-links\">
        ";
            // line 10
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["links"] ?? null)), "html", null, true);
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
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Your cart is empty."));
            echo "</p>
      <p><strong><a href=\"";
            // line 17
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("<front>"));
            echo "\"><span class=\"text-theme\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Keep Shopping"));
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
        return array (  97 => 20,  89 => 17,  85 => 16,  82 => 15,  74 => 10,  68 => 7,  63 => 4,  61 => 3,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/block/commerce-cart-block.html.twig", "/Users/bradleywaye/Sites/local.wayedesigngroup.com/web/themes/gavias_edupia/templates/block/commerce-cart-block.html.twig");
    }
}
