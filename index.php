<?php

class item {
    private $value;
    private $d = 0;
    function __construct($n){
        $this->value = $n;
        $this->d |= $n % 3 ? 0 : 1;
        $this->d |= $n % 5 ? 0 : 2;
    }
    function __toString(){
        $out = "";
        if ($this->d & 1){
            $out .= "CUBE";
        }
        if ($this->d & 2){
            $out .= "Systems";
        }
        if (!$out){
            $out = (string) $this->value;
        }
        return $out;
    }
}

class api {
    public $items = [];
    function __construct($n){
        for ($i = 1; $i <= $n; $i++){
            array_push($this->items, new item($i));
        }
    }
    function render($line_separator){
        $result = [];
        foreach ($this->items as $item){
            array_push($result, (string) $item);
        }
        echo implode($line_separator, $result);
    }
}

$api = new api(100);
$api->render("\n");
