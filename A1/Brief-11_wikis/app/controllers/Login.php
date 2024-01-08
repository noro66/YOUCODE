<?php
class Login
{
    use Controller;
    public function index(...$arr)
    {
        $this->view('Login');
    }
}
