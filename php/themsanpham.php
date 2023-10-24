<?php
    $conn = mysqli_connect("localhost", "root", "");
    if (!$conn) {
        die('Không thể kết nối hệ quản trị ' . mysqli_error($conn));
    }
    if (!mysqli_select_db($conn, "qlbh-php")) {
        die('Không thể kết nối hệ quản trị ' . mysqli_error($conn));
    }
?>
<div style="height: auto; background:#fb5533; margin: auto; width: 100%;" >
    <form style="display: flex;flex-direction: column;width: 500px; margin: auto; font-size: 14px; align-items: center;"
        action="../shopeebootstrap+php/index.php" method="POST" enctype="multipart/form-data">
        <label for="" style="margin: 0 auto;padding: 10px;font-weight: bold; font-size: 24px;margin-top: 20px;">
            Thêm Sản Phẩm
        </label>
        <table class="items-insertform">
            <tr>
                <td>
                    Mã Sản Phẩm :
                </td>
                <td>
                    <input type="text" name="txtma">
                </td>
            </tr>
            <tr>
                <td>
                    Tên Sản Phẩm :
                </td>
                <td>
                    <input type="text" name="txtten">
                </td>
            </tr>
            <tr>
                <td>
                    Giá cũ :
                </td>
                <td>
                    <input type="text" name="txtgiacu">
                </td>
            </tr>
            <tr>
                <td>
                    Giá mới :
                </td>
                <td>
                    <input type="text" name="txtgiamoi">
                </td>
            </tr>
            <tr>
                <td>
                    Số lượng :
                </td>
                <td>
                    <input type="text" name="txtsl">
                </td>
            </tr>
            <tr>
                <td>
                    Nguồn gốc :
                </td>
                <td>
                    <input type="text" name="txtnguongoc">
                </td>
            </tr>
            <tr>
                <td>
                    Thêm ảnh :
                </td>
                <td>
                    <input type="file" name="hinhanh" id="">
                </td>
            </tr>
        </table>
        <input style="width: 140px; margin: auto;margin-top: 5px;" type="submit" value="Thêm Sản Phẩm">
        <input style="width: 100px; margin: auto;margin-top: 5px; margin-bottom: 30px;" type="submit" value="Reset">
    </form>
</div>

<?php
if (isset($_POST['txtma'])) {
    $txtma = $_POST['txtma'];
    $txtten = $_POST['txtten'];
    $txtgiacu = $_POST['txtgiacu'];
    $txtgiamoi = $_POST['txtgiamoi'];
    $txtsl = $_POST['txtsl'];
    $txtnguongoc = $_POST['txtnguongoc'];

    // xử lý hình ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    $sql_them = "Insert into mathang values('" . $txtma . "','" . $txtten . "', '" . $txtgiacu . "','" . $txtgiamoi . "','" . $txtsl . "','" . $txtnguongoc . "','" . $hinhanh . "')";

    mysqli_query($conn, $sql_them);
    mysqli_close($conn);
    echo "$sql_them";
}
?>