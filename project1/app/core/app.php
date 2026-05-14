<?php

    class app 
    {
        public function __construct(){
            $url=$this->Urlprocess();
            var_dump($url);
         
        }
        public function Urlprocess() {
            if(isset($_GET['url'])){
                return explode('/',trim(filter_var(trim($_GET['url'],'/'))));
                
            }
            else{
                echo"khong co gi ca";
            }
            
        }
    }
?>