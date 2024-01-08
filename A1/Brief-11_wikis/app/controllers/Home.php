<?php
class Home
{
    use  Controller;
    public function index(...$arr)
    {
        $data['email'] = empty($_SESSION['USER']->email) ? 'NO USER' : $_SESSION['USER']->email;
        $this->view('home', $data);
    }
}
