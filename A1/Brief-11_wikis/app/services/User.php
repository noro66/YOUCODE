<?php

class User
{
    use Model;

    protected $table = 'user';
    // protected $order_by = "users_id";

    // protected $columns = [
    //     'users_id',
    //     'users_uid',
    //     'pwd',
    //     'email'
    // ];

    public function validate($data)
    {

        $this->errors = [];
        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required !";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['password'] = "Email is not valde !";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "password is required !";
        }

        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}
