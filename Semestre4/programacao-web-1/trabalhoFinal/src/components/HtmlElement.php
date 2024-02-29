<?php

    abstract class HtmlElement {

        private $name;
        private $id;
        private $style;
        private $class;

        public function getName() {
            return $this->name;
        }

        public function setName($sName) {
            $this->name = $sName;
        }

        public function getId() {
            return 'id="'.$this->id.'"';
        }

        public function setId($sId) {
            $this->id = $sId;
        }

        public function addClass($sClass) {
            $this->class .= ' ' . $sClass;

        }

        public function getStyle() {
            if(isset($this->style) && $this->style != '') {
                return 'style="' . $this->style . '"';
            }
            return '';
        }

        public function setStyle($sStyle) {
            $this->style = $sStyle;
        }

        public function getClass() {
            if(isset($this->class) && $this->class != '') {
                return 'class="'. $this->class.'"';
            }
            return '';
        }


        abstract function renderHtml();

    }

?>