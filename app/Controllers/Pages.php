<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        $data = [
            'page_title' => "Home"
        ];

        return view('pages/home', $data);
    }

    public function about(): string
    {
        $data = [
            'page_title' => "About Me"
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'page_title' => "Contact Us"
        ];

        return view("pages/contact", $data);
    }
}
