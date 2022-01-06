<?php
require_once 'model/Monhoc.php';
class monhocController {
    
    //Hiển thị các dữ liệu có trong hệ thống
    public function index() {
        echo "
        <div class='container'>
            <div class='col-md-12' style='display: flex; justify-content:center'>
                <h1>DANH SÁCH CÁC GIẢNG VIÊN TRONG TRƯỜNG</h1>
            </div>
        </div>";

        //khai báo biến gọi hàm từ class Book của Model
        $monhoc = new Monhoc();
        $monhocs = $monhoc->index(); //chứa DL

        require_once 'view/Monhocs/index.php'; //gọi view
    }

    public function add() {
        $error = '';
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $tenmh = $_POST['tenmh'];
            $sotienchi = $_POST['sotienchi']; 
            $sotiet_It = $_POST['sotiet_It'];
            $sotiet_bt = $_POST['sotiet_bt'];
            $sotiet_thtn = $_POST['sotiet_thtn'];
            $sogio_th = $_POST['sogio_th'];

//xứ lý dữ liệu trống báo lỗi và không cho submit form
            if (empty($tenmh) || empty($sotienchi) || empty($sotiet_It)
                || empty($sotiet_bt) || empty($sotiet_thtn) || empty($coquan) || empty($sogio_th)) {
                $error = "Không được để trống thông tin nào";
            }
            else {
                //gọi model để insert dữ liệu vào database
                $monhoc = new monhoc();
                
                //tạo mảng để lưu DL tạm thời
                $monhocArr = [
                    'tenmh' => $tenmh,
                    'sotienchi' => $sotienchi,
                    'sotiet_It' => $sotiet_It,
                    'sotiet_bt' => $sotiet_bt,
                    'sotiet_thtn' => $sotiet_thtn,
                    'sogio_th' => $sogio_th,
                ];
                //khai báo biến gọi hàm bên model
                $isInsert = $monhoc->insert($monhocArr);
                if ($isInsert) {
                    $_SESSION['success'] = "Thêm mới thành công";
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
                header("Location: index.php?controller=monhoc&function=index");
                exit();
            }
        }
        //gọi view
        require_once 'views/Monhocs/add.php';
    }

    public function edit() {
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=monhoc&function=index");
            return;
        }
        if (!is_numeric($_GET['id'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=monhoc&function=index");
            return;
        }
        $id = $_GET['id'];
        //gọi model để lấy ra đối tượng sách theo id
        $monhocModel = new monhoc();
        $monhoc = $monhocModel->getGVById($id);

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $tenmh = $_POST['tenmh'];
            $sotienchi = $_POST['sotienchi'];     
            $sotiet_It = $_POST['sotiet_It'];
            $sotiet_bt = $_POST['sotiet_bt'];
            $sotiet_thtn = $_POST['sotiet_thtn'];
            $sogio_th = $_POST['sogio_th'];
            //check validate dữ liệu
            if (empty($tenmh)) {
                $error = "Không được để trống thông tin nào";
            }
            else {
                //xử lý update dữ liệu vào hệ thống
                $monhocModel = new monhoc();
                $monhocArr = [
                    'mamh' => $id,
                    'tenmh' => $tenmh,
                    'sotienchi' => $sotienchi,
                    'sotiet_It' => $sotiet_It,
                    'sotiet_bt' => $sotiet_bt,
                    'sotiet_thtn' => $sotiet_thtn,
                    'sogio_th' => $sogio_th,
                ];
                $isUpdate = $monhocModel->update($monhocArr);
                if ($isUpdate) {
                    $_SESSION['success'] = "Update môn học mã #$id thành công";
                }
                else {
                    $_SESSION['error'] = "Update Môn học mã #$id thất bại";
                }
                header("Location: index.php?controller=monhoc&function=index");
                exit();
            }
        }
        
        //truyền ra view
        require_once 'view/Monhocs/edit.php';
    }

    public function delete() {
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header("Location: index.php?controller=monhoc&function=index");
            exit();
        }

        $monhoc = new Monhoc();
        $isDelete = $monhoc->delete($id);

        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $_SESSION['success'] = "Xóa Môn học mã #$id thành công";
        }
        else {
            //báo lỗi
            $_SESSION['error'] = "Xóa Môn học mã #$id thất bại";
        }
        header("Location: index.php?controller=monhoc&function=index");
        exit();
    }
}