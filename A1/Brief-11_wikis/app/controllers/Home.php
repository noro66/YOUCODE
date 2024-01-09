<?php
class Home
{
    use  Controller;
    public function index(...$arr)
    {
        $data['email'] = $_SESSION['USER']->email;
        $this->view('home', $data);
    }
}
