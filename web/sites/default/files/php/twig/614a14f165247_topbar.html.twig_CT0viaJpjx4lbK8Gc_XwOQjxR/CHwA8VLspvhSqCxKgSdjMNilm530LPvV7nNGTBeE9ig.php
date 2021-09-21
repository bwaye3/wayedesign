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

/* themes/gavias_edupia/templates/page/parts/topbar.html.twig */
class __TwigTemplate_71e786ee1808738171aefd729f7623c433b4eceabf757754c15d97df89f5a3d3 extends \Twig\Template
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
        echo "<div class=\"topbar\">
  <div class=\"container\">
    <div class=\"topbar-inner\">
      <div class=\"row\">
        
        <div class=\"topbar-left col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-6\">
          ";
        // line 7
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topbar", [], "any", false, false, true, 7)) {
            // line 8
            echo "          <div class=\"topbar-left-content\">
            ";
            // line 9
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topbar", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 12
        echo "        </div>

        <div class=\"topbar-right col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-6\">
          
          <div class=\"gva-user-region user-region\">
            <div class=\"user-top\">
              ";
        // line 18
        if (($context["custom_account"] ?? null)) {
            // line 19
            echo "                <span class=\"account-name\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["custom_account"] ?? null), 19, $this->source));
            echo "</span>
              ";
        }
        // line 21
        echo "              <span class=\"icon\">
                ";
        // line 22
        if (($context["user_picture"] ?? null)) {
            // line 23
            echo "                  <img src=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 23, $this->source)]), "html", null, true);
            echo "\" alt=\"\"/>
                ";
        } else {
            // line 24
            echo "  
                  <i class=\"fa fa-user\"></i>
                ";
        }
        // line 27
        echo "              </span>
            </div>  
            <div class=\"user-content\">  
              ";
        // line 30
        if (($context["custom_account"] ?? null)) {
            // line 31
            echo "                <div class=\"account-message\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["custom_account"] ?? null), 31, $this->source));
            echo "</div>
              ";
        }
        // line 32
        echo "  
              <ul class=\"user-links\">
                ";
        // line 34
        if (($context["custom_account"] ?? null)) {
            // line 35
            echo "                  <li><a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.page"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("+ My Account"));
            echo "</a></li>
                  <li><a href=\"";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.logout"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("+ Logout"));
            echo "</a></li>
                ";
        } else {
            // line 38
            echo "                  <li><a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.login"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("+ Login"));
            echo "</a></li>
                  <li><a href=\"";
            // line 39
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.register"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("+ Register"));
            echo "</a></li>
                ";
        }
        // line 40
        echo "  
              </ul>
            </div>  
          </div>

        </div>

      </div>
    </div>  
  </div>  
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/gavias_edupia/templates/page/parts/topbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 40,  130 => 39,  123 => 38,  116 => 36,  109 => 35,  107 => 34,  103 => 32,  97 => 31,  95 => 30,  90 => 27,  85 => 24,  79 => 23,  77 => 22,  74 => 21,  68 => 19,  66 => 18,  58 => 12,  52 => 9,  49 => 8,  47 => 7,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/page/parts/topbar.html.twig", "/Users/bradleywaye/Sites/local.wayedesigngroup.com/web/themes/gavias_edupia/templates/page/parts/topbar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 7);
        static $filters = array("escape" => 9, "raw" => 19, "t" => 35);
        static $functions = array("file_url" => 23, "path" => 35);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'raw', 't'],
                ['file_url', 'path']
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
