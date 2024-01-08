<?php
class Signup
{
    use Controller;
    public function index(...$arr)
    {
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User;
            if ($user->validate($_POST) && isset($_POST['terms'])) {
                $user->insert($_POST);
                redirect('login');
            }
            if (empty($_POST['terms'])) {
                $user->errors['terms'] = "accept terms  is required !";
            }
            $data['errors'] = $user->errors;
        }
        $this->view('signup', $data);
    }
}
