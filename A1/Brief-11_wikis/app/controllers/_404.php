<?php
class _404
{
    use Controller;
    public function index(...$arr)
    {
        $this->view('_404');
    }
}
