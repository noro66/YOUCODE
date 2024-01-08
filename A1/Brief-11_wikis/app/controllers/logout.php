<?php
class logout
{
    use  Controller;
    public function index(...$arr)
    {
        if (!empty($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
        $this->view('home');
    }
}
