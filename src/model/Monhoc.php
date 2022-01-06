<?php
require_once 'configs/database.php';
class monhoc {
    public $id;
    public $name;

    public function index() { //truy vấn cho hiển thị dữ liệu 
        $connection = $this->connectDb();
        //truy vấn
        $querySelect = "SELECT * FROM monhoc";
        $results = mysqli_query($connection, $querySelect);
        //tạo mảng lữu trữ DL vừa lấy
        $monhocs = [];
        if (mysqli_num_rows($results) > 0) {
            $monhocs = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeDb($connection);

        return $monhoc;
    }

    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO monhoc(ten_mh, sotienchi, sotiet_It, sotiet_bt, sotiet_thtn, sogio_tuhoc) 
                        VALUES ('{$param['ten_mh']}', '{$param['sotienchi']}',
                    '{$param['sotiet_It']}', '{$param['sotiet_bt']}', '{$param['sotiet_thtn']}', '{$param['sogio_tuhoc']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }

    public function getGVById($id = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM monhoc WHERE mamh=$id";
        $results = mysqli_query($connection, $querySelect);
        $monhoc = [];
        if (mysqli_num_rows($results) > 0) {
            $monhocs = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $monhoc = $monhocs[0];
        }
        $this->closeDb($connection);

        return $monhoc;
    }
    public function update($monhoc = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE monhoc
                        SET mamh = '{ten_mh = '{$monhoc['ten_mh']}',
                            sotienchi = '{$monhoc['sotienchi']}', sotiet_It = '{$monhoc['sotiet_It']}',
                            sotiet_bt = '{$monhoc['sotiet_bt']}', sotiet_thtn = '{$monhoc['sotiet_thtn']}',
                            sogio_tuhoc = '{$monhoc['sogio_tuhoc']}'
                        WHERE magv = {$monhoc['magv']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }

    public function delete($id = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM monhoc WHERE magv = $id";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }

//Tạo hàm kết nối tới CSDL
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }

    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
}