<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_9ebf4de891ea405a5450c9257f633f1a919e2f2dd4c4d634cecafcec1a5ec0e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f7ded868949d541a100a556883da5fa8d02730ffbff0a30669e97c2e96ce4b1d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f7ded868949d541a100a556883da5fa8d02730ffbff0a30669e97c2e96ce4b1d->enter($__internal_f7ded868949d541a100a556883da5fa8d02730ffbff0a30669e97c2e96ce4b1d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f7ded868949d541a100a556883da5fa8d02730ffbff0a30669e97c2e96ce4b1d->leave($__internal_f7ded868949d541a100a556883da5fa8d02730ffbff0a30669e97c2e96ce4b1d_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_86cfda0f01651d3637022798669de31c009e2452e9627e00126a388eb76319dd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_86cfda0f01651d3637022798669de31c009e2452e9627e00126a388eb76319dd->enter($__internal_86cfda0f01651d3637022798669de31c009e2452e9627e00126a388eb76319dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_86cfda0f01651d3637022798669de31c009e2452e9627e00126a388eb76319dd->leave($__internal_86cfda0f01651d3637022798669de31c009e2452e9627e00126a388eb76319dd_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_ca8e293a586efb2b8312d289e4ae2d21ed7c4ec2b84d30f462be966d84520a06 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ca8e293a586efb2b8312d289e4ae2d21ed7c4ec2b84d30f462be966d84520a06->enter($__internal_ca8e293a586efb2b8312d289e4ae2d21ed7c4ec2b84d30f462be966d84520a06_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_ca8e293a586efb2b8312d289e4ae2d21ed7c4ec2b84d30f462be966d84520a06->leave($__internal_ca8e293a586efb2b8312d289e4ae2d21ed7c4ec2b84d30f462be966d84520a06_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_7022d15d55110580a78bc8a27ba32bf6c5a9ca657253c8cce67caadd4d6fc97b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7022d15d55110580a78bc8a27ba32bf6c5a9ca657253c8cce67caadd4d6fc97b->enter($__internal_7022d15d55110580a78bc8a27ba32bf6c5a9ca657253c8cce67caadd4d6fc97b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_7022d15d55110580a78bc8a27ba32bf6c5a9ca657253c8cce67caadd4d6fc97b->leave($__internal_7022d15d55110580a78bc8a27ba32bf6c5a9ca657253c8cce67caadd4d6fc97b_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
";
    }
}
