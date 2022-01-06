<div class='container'>
    <div class='col-md-12' style='display: flex; justify-content:center'>
        <h1>THÊM MON HOC</h1>
    </div>
</div>

<!--</form>-->
<div class="row">
    <div class="col-md-12" style="display:flex; align-items: center; justify-content:center">
        <div style="color: red">
                <?php echo $error ?>
        </div>
    </div>
</div>
<!-- <form method="post" action="">
    Name :
    <input type="text" name="name" value="" />
    <br />
    <input type="submit" name="submit" value="Save" />
</form> -->
<div class="container">
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Môn học</label>
            <input type="text" name="tenmh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tín chỉ</label>
            <input type="text" name="sotienchi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tiết lý thuyết</label>
            <input type="text" name="sotiet_It" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tiết bài tập</label>
            <input type="text" name="sotiet_bt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">số tiết thực hành – thí nghiệm</label>
            <input type="text" name="sotiet_thtn" class="form-control" id="exampleInputPassword1" value="">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">số giờ tự học</label>
            <input type="text" name="sogio_th" class="form-control" id="exampleInputPassword1" value="">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>