<?php
class Home
{
    use  Controller;
    public function index(...$arr)
    {
        $this->view('home');
    }
}
