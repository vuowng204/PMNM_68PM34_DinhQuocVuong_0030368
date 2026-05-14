<?php
class sinhvien_ett{
    public $id;
    public $hoten;
    public $lop;

    public function __construct($id=null,$hoten=null,$lop=null){
        $this->id=$id;
        $this->hoten=$hoten;
        $this->lop=$lop;
    }
}
?>
