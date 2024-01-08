<?php
class Home
{
    use  Controller;
    public function index(...$arr)
    {
        $data['email'] = empty($_SESSION['USER']) ? 'NO USER' : $_SESSION['USER'];
        $this->view('home', $data);
    }
}
