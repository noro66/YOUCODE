<?php
class Login
{
    use Controller;
    public function index(...$arr)
    {
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User;
            if ($user->validate($_POST)) {
                $arr['email'] = $_POST['email'];
                $row = $user->first($arr);
                if ($row) {
                    if ($row->password == $_POST['password']) {
                        $_SESSION['USER'] = $row;
                        redirect('home');
                    } else {
                    }
                }
            }
            if (isset($user->errors['email']) || isset($user->errors['password'])) {
                $data['errors'] = $user->errors;
            } else {
                $user->errors['validate'] = "wrong Email or Pasword";
                $data['errors'] = $user->errors;
            }
        }
        $this->view('login', $data);
    }
}
