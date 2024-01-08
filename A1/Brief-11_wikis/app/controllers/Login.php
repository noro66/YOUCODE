<?php
class Login
{
    use Controller;
    public function index(...$arr)
    {
        if (isset($_POST)) {
            show($_POST);
        }
        $this->view('Login');
    }
}
