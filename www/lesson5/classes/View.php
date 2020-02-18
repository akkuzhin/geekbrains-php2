<?php

class View
{

    protected $data = [];
    public function __set($name, $value) //магия
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        $this->data[$name];
    }

    public function display($template)
    {
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }
        include __DIR__ . '/../views/' . $template;
    }

    public function render($template)
    {
        ob_start();
        include __DIR__ . '/../views/' . $template;
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

}