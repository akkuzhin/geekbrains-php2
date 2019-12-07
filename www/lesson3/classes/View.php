<?php

class View
{
    protected $data = [];

    public function assing($name, $value)
    {
        $this->data[$name] = $value;

    }

    public function display($template)
    {

        include $template;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }
}