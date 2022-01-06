<?php
//file hiển thị thông báo lỗi
require_once 'view/message/message.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 ms-auto" style="display:flex; justify-content:flex-end">
            <a href="index.php?controller=monhoc&function=add">
                <button>
                Thêm môn học
                </button>
            </a>
        </div>
        <div class="col-md-12" style="display:flex; align-items: center; justify-content:center">
        <table class="table table-striped" style="border:1px"  cellspacing="0" cellpadding="8">
            <tr class="table-success">
                <th>ID</th>
                <th>Tên môn học</th>
                <th>Số tiến chỉ</th>
                <th>Số tiết lý thuyết</th>
                <th>Số tiết bài tập</th>
                <th>Số tiết thực hành – thí nghiệm</th>
                <th>Số giờ tự học</th>
                
            </tr>
    <?php if (!empty($monhocs)): ?>
        <?php foreach ($monhocs AS $monhoc) : ?>
                    <tr>
                        <td><?php echo $monhoc['mamh'] ?></td>
                        <td><?php echo $monhoc['tenmh'] ?></td>
                        <td><?php echo $monhoc['sotienchi'] ?></td>
                        <td><?php echo $monhoc['sotiet_It'] ?></td>
                        <td><?php echo $monhoc['sotiet_bt'] ?></td>
                        <td><?php echo $monhoc['sotiet_thtn'] ?></td>
                        <td><?php echo $monhoc['sogio_th'] ?></td>
                        <td>
                            <?php
                            //khai báo biến sửa, xóa
                            $urlEdit =
                                "index.php?controller=monhoc&function=edit&id=" . $monhoc['mamh'];
                            $urlDelete =
                                "index.php?controller=monhoc&function=delete&id=" . $monhoc['mamh'];
                            ?>
                            <a href="<?php echo $urlEdit?>">Sửa</a> &nbsp;
                            <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                            href="<?php echo $urlDelete?>">
                                Xóa
                            </a>
                        </td>
                    </tr>
        <?php endforeach; ?>
        </div>
    </div>
</div>
    <?php else: ?>
        <tr>
            <td colspan="2">KHông có dữ liệu</td>
        </tr>
    <?php endif; ?>
</table>