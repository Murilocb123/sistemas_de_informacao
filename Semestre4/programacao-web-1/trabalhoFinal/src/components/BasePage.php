<?php

class BasePage  {

    private BodyPage $body;
    private $css = [];
    private $js = [];
    private $style;
    private $title;

    public function __construct() {
        $this->addCss('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        $this->addJs('jquery','<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>');
        $this->addJs('popper','<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>');
        $this->addJs('bootstrap','<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>');
        $this->body = new BodyPage();
    }

    public function renderHtml() {
        $html = '<!DOCTYPE html>';
        $html .= '<html>';
        $html .= $this->renderHead();
        $html .= $this->body->renderHtml();
        $html .= '</html>';
        return $html;

    }

    public function renderHead() {
        $head = '<head>';
        $head .= '<title>' . $this->title . '</title>';
        $head .= $this->renderCss();
        $head .= $this->renderJs();
        $head .= $this->renderStyle();
        $head .= '</head>';
        return $head;
    }

    public function renderCss() {
        $css = '';
        foreach ($this->css as $value) {
            $css .= '<link rel="stylesheet" href="' . $value . '">';
        }
        return $css;
    }

    public function renderJs() {
        $js = '';
        foreach ($this->js as $value) {
            $js .= $value;
        }
        return $js;
    }

    public function renderStyle() {
        $auxStyle = '<style>';
        $auxStyle .= $this->style;
        $auxStyle .= '</style>';
        return $auxStyle;
    }

    public function addCss($name, $css) {
        $this->css[$name] = $css;
    }
    
    public function addJs($name, $js) {
        $this->js[$name] = $js;
    }

    public function setBody(BodyPage $body) {
        $this->body = $body;
    }

    public function setStyle($sStyle){
        $this->style = $sStyle;
    }

    public function setTitle($sTitle){
        $this->title = $sTitle;
    }

}