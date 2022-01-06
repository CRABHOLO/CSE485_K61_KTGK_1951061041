<div class='container'>
    <div class='col-md-12' style='display: flex; justify-content:center'>
        <h1>SỬA THÔNG TIN MON HOC</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12" style="display:flex; align-items: center; justify-content:center">
        <div style="color: red">
                <?php echo $error ?>
        </div>
    </div>
</div>

<div class="container">
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Môn học</label>
            <input type="text" name="tenmh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            value="<?php echo isset($_POST['tenmh']) ? $_POST['tenmh'] : $monhoc['tenmh']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tín chỉ</label>
            <input type="text" name="sotienchi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            value="<?php echo isset($_POST['sotienchi']) ? $_POST['sotienchi'] : $monhoc['sotienchi']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tiết lý thuyết</label>
            <input type="text" name="sotiet_It" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            value="<?php echo isset($_POST['sotiet_It']) ? $_POST['sotiet_It'] : $monhoc['sotiet_It']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tiết bài tập</label>
            <input type="text" name="sotiet_bt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            value="<?php echo isset($_POST['sotiet_bt']) ? $_POST['sotiet_bt'] : $monhoc['sotiet_bt']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">số tiết thực hành – thí nghiệm</label>
            <input type="text" name="sotiet_thtn" class="form-control" id="exampleInputPassword1"
            value="<?php echo isset($_POST['sotiet_thtn']) ? $_POST['sotiet_thtn'] : $monhoc['sotiet_thtn']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Số giờ tự học</label>
            <input type="text" name="sogio_th" class="form-control" id="exampleInputPassword1"
            value="<?php echo isset($_POST['sogio_th']) ? $_POST['sogio_th'] : $monhoc['sogio_th']?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>