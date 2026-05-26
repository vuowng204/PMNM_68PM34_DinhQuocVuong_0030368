<?php

class Controller {

    public function model($model) {
        require_once "../app/models/" . $model . ".php";
        return new $model();
        // Có thể thêm các thuộc tính hoặc phương thức chung cho tất cả controller ở đây
    }
    public function view($view, $data = []) {
        extract($data);
        require_once "../app/views/" . $view . ".php";
        // Có thể thêm logic để truyền dữ liệu vào view nếu cần
    }
    // Base controller class
}
?>