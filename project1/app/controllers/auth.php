<?php
class auth{
    
    protected $user = [
        '1'=>'1',
        'vuongqp'=>'123456'
    ];
    public function login(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            if(isset($this->user[$username]) && $this->user[$username] == $password){
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['username'] = $username;
                header('Location: /project/project1/public/home/index');
                exit();
            }else{
                header('Location: /project/project1/public/home/login');
                exit();
            }
        }
    }
}
?>