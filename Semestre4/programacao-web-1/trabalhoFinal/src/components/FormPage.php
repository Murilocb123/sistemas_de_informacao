<?php

require_once 'HtmlElement.php';

class FormPage extends HtmlElement {

    private $imputs = [];
    private $action;
    private $from;
    private $to;
    private $mainAction;

    private $method;

    public function __construct() {
        $this->setStyle('');
    }

    public function addImput(HtmlElement $imput) {
        $this->imputs[] = $imput;
    }

    public function renderHtml() {
        $this->addClass('form');
        $form = '<form '.$this->getClass().' '. $this->getStyle().' '.$this->getId().' ';
        if($this->from != null && $this->to != null && $this->mainAction != null){
            $form .= 'action="'.$this->getAction().'?from='.$this->getFrom().'&to='.$this->getTo().'&action='.$this->getMainAction().'"';
        }
        else{
            $form .= 'action="'.$this->getAction().'"';
        }
        $form .= 'method="'.$this->getMethod().'">';
        $form .= '<h3 class="text-center text-info">'.$this->getName().'</h3>';
        foreach ($this->imputs as $imput) {
            $form .= $imput->renderHtml();
        }
        $form .= '</form>';
        return $form;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setMethod($method) {
        $this->method = $method;
    }

    public function getAction() {
        return $this->action;
    }

    public function getMethod() {
        return $this->method;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function setMainAction($mainAction) {
        $this->mainAction = $mainAction;
    }

    public function getFrom() {
        return $this->from;
    }

    public function getTo() {
        return $this->to;
    }

    public function getMainAction() {
        return $this->mainAction;
    }

}

?>