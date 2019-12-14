<?php

class View
    implements Iterator
{

    protected $data = [];
    protected $position = 0;

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

    public function rewind() //вызывается первым. Перемотать итератор на первый элемент.
    {
        $this->position = 0;
    }

    public function next() //Переход к следующему элементу. Метод вызывается после каждой итерации foreach
    {
        ++$this->position;
    }
    public function valid()
    {
        return isset($this->data[$this->position]);
    }
    public function current() //Возврат текущего элемента
    {
        return $this->data[$this->position];
    }
    public function key() //Возврат ключа текущего элемента
    {
        return $this->position;
    }

}