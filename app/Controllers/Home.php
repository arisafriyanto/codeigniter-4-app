<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function coba(): void
    {
        echo "Hello world";
    }
}
