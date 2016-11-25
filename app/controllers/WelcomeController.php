<?php 

class WelcomeController
{
    public function __construct()
    {
        echo 'constructor ' . PHP_EOL;
    }

    public function index()
    {
        echo 'index';
    }

    public function list()
    {
        echo 'list';
    }
}