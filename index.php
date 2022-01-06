<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
session_start();

//http://localhost?controller=book&function=index
//lấy ra controller
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'monhoc';
//lấy ra function
$function = isset($_GET['function']) ? $_GET['function'] :'index';

//Viết hoa chữ đầu
$controller = ucfirst($controller);

//nối chuỗi Controller.php để thành tên 1 file
$fileController = $controller . "Controller.php";

//Khai báo đường link
$pathController = "controllers/$fileController";


//tương đương với trang Not found
if (!file_exists($pathController)) {
    die("Trang bạn tìm không tồn tại");
}
require_once "$pathController";

//Gọi class và khai báo biến mới của nó
$classController = $controller."Controller";
$object = new $classController();

if (!method_exists($object, $function)) {
    die("Phương thức $function
     không tồn tại trong class $classController");
}
$object->$function();
?>
</body>
</html>