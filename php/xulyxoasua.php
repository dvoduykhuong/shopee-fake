<?php
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die('Không thể kết nối hệ quản trị ' . mysqli_error($conn));
}

if (!mysqli_select_db($conn, "qlbh-php")) {
    die('Không thể kết nối hệ quản trị ' . mysqli_error($conn));
}
$sql = "select * from mathang order by mahh DESC";
$kq = (mysqli_query($conn, $sql));
if (mysqli_num_rows($kq) <> 0) {
    echo "<table width='auto' heigth='25px' border='0'>";
    echo "<tr>";
    echo "<td align='center'><h2><b>Danh sách hàng hóa</b></h2></td>";
    echo "</tr>";
    echo "</table>";
    echo "<table width='auto' heigth='25px' border='1'>";

    echo "<tr>";
    echo "<td width='44' height='23' align='center'>Mã hàng hóa</td>";
    echo "<td width='44' height='23' align='center'>Tên hàng hóa</td>";
    echo "<td width='44' height='23' align='center'>Giá cũ</td>";
    echo "<td width='44' height='23' align='center'>Giá mới</td>";
    echo "<td width='44' height='23' align='center'>Số lượng</td>";
    echo "<td width='44' height='23' align='center'>Nguồn Gốc</td>";
    echo "<td width='50' height='60' align='center'>Hình ảnh</td>";
    echo "<td width='44' height='23' align='center'>Xóa / Sửa</td>";
    echo "</tr>";
    while ($row = mysqli_fetch_row($kq)) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td width='200px' height='200px'>
          <div style='background-image: url(./assets/img/home/" . $row[6] . ");
            padding-top: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;'>
          </div>
          </td>";
          echo "<td>
                    <button type='subbmit' style='width:100px;'>Xóa</button>
                    <button type='subbmit' style='width:100px;'>Sửa</button>
                </td>";
    }
    echo "</table>";
    echo "<table width='500' height='20' border='0'>";
    echo "<tr>";
    echo "<td align='right'>Tổng số hàng có là: " . mysqli_num_rows($kq) . "</td>";
    echo "</tr>";
    echo "</table>";
}
?>