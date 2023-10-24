<?php
       $conn = mysqli_connect("localhost", "root", "");
       if (!$conn) {
           die('Không thể kết nối hệ quản trị ' . mysqli_error($conn));
       }

       if (!mysqli_select_db($conn, "qlbh-php")) {
           die('Không thể kết nối hệ quản trị ' . mysqli_error($conn));
       }
       $sql = "select* from mathang order by mahh";
       $kq = (mysqli_query($conn, $sql));
       if (mysqli_num_rows($kq) <> 0) {
           while ($row = mysqli_fetch_row($kq)) {
               echo "<div class='col l-2-4 m-3 c-6 home-product-item'>
                   <a class='home-product-item-link' href='#'>
                       <div class='home-product-item__img'
                           style='background-image: url(./assets/img/home/" . $row[6] . ");'></div>
                       <div class='home-product-item__info'>
                           <h4 class='home-product-item__name'>" . $row[1] . "</h4>
                           <div class='home-product-item__price'>
                               <p class='home-product-item__price-old'>" . $row[2] . "</p>
                               <p class='home-product-item__price-new'>" . $row[3] . "</p>
                               <i class='home-product-item__ship fas fa-shipping-fast'></i>
                           </div>
                           <div class='home-product-item__footer'>
                               <div class='home-product-item__save'>
                                   <input type='checkbox' name='save-check' id='heart-save'>
                                   <label for='heart-save' class='far fa-heart'></label>
                               </div>
                               <div class='home-product-item__rating-star'>
                                   <i class='star-checked far fa-star'></i>
                                   <i class='star-checked far fa-star'></i>
                                   <i class='star-checked far fa-star'></i>
                                   <i class='star-checked far fa-star'></i>
                                   <i class='star-checked far fa-star'></i>
                               </div>
                               <div class='home-product-item__saled'>" . $row[4] . "</div>
                           </div>
                           <div class='home-product-item__origin'>" . $row[5] . "</div>
                           <div class='home-product-item__favourite'>
                               Yêu thích
                           </div>
                           <div class='home-product-item__sale-off'>
                               <div class='home-product-item__sale-off-value'>40%</div>
                               <div class='home-product-item__sale-off-label'>GIẢM</div>
                           </div>
                       </div>
                       <div class='home-product-item-footer'>Tìm sản phẩm tương tự</div>
                   </a>
               </div>";
           }
       }
?>