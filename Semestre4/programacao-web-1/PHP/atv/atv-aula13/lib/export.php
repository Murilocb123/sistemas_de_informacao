<?php
    namespace app\lib;

    class export {
        public function toJson(){
            return json_encode(get_object_vars($this));
        }
    }
?>