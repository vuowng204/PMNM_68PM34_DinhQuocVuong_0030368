<?php
require_once '../app/core/app.php';
session_start();
class middleware{
    public function checklogin(){
        $publicPages = [
            '/project/project1/public/home/login', 
            '/project/project1/public/auth/login',
            '/project/project1/public/sinhvien/index',
            '/project/project1/public/sinhvien/create',
            '/project/project1/public/sinhvien/store',
            '/project/project1/public/index.php'
        ];
        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if(!isset($_SESSION['username']) && !in_array($currentPath, $publicPages)){
            header('Location: /project/project1/public/home/login');
            exit();
        }
    }
}   
?>