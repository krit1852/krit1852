<link rel="stylesheet" href="css/side-nav-bar.css">
<nav class="navbar navbar-light " style="background-color: #006666;">
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="admin_table.php">รายการคำขอยืม</a>
            <a href="manage_book.php">จัดการหนังสือ</a>
            <a style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 1.25rem; color: #818181; display: block; transition: 0.3s;">แบบฟอร์ม Book Delivery</a>
                    <ul>
                        <a href="docx/Book_Delivery-0.docx" style="padding:10px; font-size: 1rem;">  หน้าซองพัสดุ</a>

                        <a href="docx/Book_Delivery-1.docx" style="padding:10px; font-size: 1rem;">  ส่งภายในวิทยาเขต</a>

                        <a href="docx/Book_Delivery-2.docx" style="padding:10px; font-size: 1rem;">  ส่งหอพักนอกวิทยาเขต</a>

                        <a href="docx/Book_Delivery-3.docx" style="padding:10px; font-size: 1rem;">  ส่งต่างจังหวัด</a>
                    </ul>
            <a href="price.php">บันทึกข้อมูลการเงิน</a>
            <a href="recommand_book.php">หนังสือยอดนิยม</a>
            <?php 
            require('connect.php');
            if(isset($_SESSION['super_admin_login']))
            { 
                ?>
                <a href="manage_admin.php">จัดการผู้ดูแลระบบ</a> 
            <?php }
            ?>
            <a href="admin.php">สถิติ</a>
        </div>
        <div id="main">
            <button style="font-size: 30px; background-color: #006666;" class="openbtn" onclick="openNav()">☰</button>
        </div>
        <a href="index.php"style="text-decoration:none;"><span class="navbar-brand-center">Book Delivery</span></a>
        <a href="logout.php" class="navbar-brand-left">ออกจากระบบ</a>

    </nav>

        <!-- nav side script -->
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "400px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("mySidebar").style.display = "block";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("mySidebar").style.display ="none";
        }
    </script>