<?php

class User
{
    use Model;
    protected $table = 'users';
    protected $order_by = "users_id";

    protected $columns = [
        'users_id',
        'users_uid',
        'pwd',
        'email'
    ];
}
