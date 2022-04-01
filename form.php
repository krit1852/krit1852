<!DOCTYPE html>
<html>
    <head>
    <link rel = "icon" href = "img/index_icon.jpg">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.multifield.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <link href="http://fonts.cdnfonts.com/css/lucida-sans" rel="stylesheet">
    <link rel="stylesheet" href="css/form_style.css">
    <script src="js/form.js"></script>
    </head>
    <body>
    <form action = "DB_form.php" method = "POST" >
    <div id="svg_wrap"></div>

        <h1>BOOK DELIVERY</h1>
        <section>
            <h4>ข้อมูลส่วนตัว (Personal Information)</h4>
            <select name="title">
                    <option value="นิสิต">นิสิต (Students)</option>
                    <option value="บุคลากรภายในมหาวิทยาลัย">บุคลากรภายในมหาวิทยาลัย (University Personnel)</option>
                    <option value="ประชาชนทั่วไป">ประชาชนทั่วไป (General Public)</option>
            </select>
            <input type="text" placeholder="ชื่อ* (Name*)" name="name" required/>
            <input type="text" placeholder="นามสกุล* (Surname*)"  name="surname" required/>
            
            <input type="text" placeholder="รหัสนิสิต (Student ID)" name="stdID" maxlength="10"/>
            <input type="text" placeholder="คณะ / สำนัก (Faculty / Office)" name="faculty"/>
            <input type="text" placeholder="ภาควิชา / ฝ่าย / กอง (Department)" name="department"/>
            <input type="email" placeholder="อีเมล* (Email*)" name="email" required/>
            <input type="text" placeholder="เบอร์โทรศัพท์* (Phone Number*)"  name="tel" maxlength="10" required/>
            <input type="text" placeholder="ไลน์ไอดี (Line ID)"  name="lineID"/>
        </section>

        <section>
        <p><h3>ค้นหาหนังสือ (Find Books)</h3>
        <h4>ค้นหาหนังสือที่ต้องการยืมจากฐานข้อมูลทรัพยากรห้องสมุด OPAC <a href="http://158.108.80.5/" target="_blank" style="color: #1cc88a">ที่นี่ (Here)</a></h4></p>
            <div id="duplicate">
                <div>
		            <div><button type="button" id="btnAdd" class="book_button">เพิ่มหนังสือ (Add Book)</button></div>
	            </div>
                <div class="group group_style">
                    <div>
                        <input type ="text" placeholder="ชื่อหนังสือ* (Title*)" name="book_title[]" required><br>
                        <input type ="text" placeholder="เลขหมู่หนังสือ* (Call Numbers*)" name="book_call[]" required><br>
                        <input type ="text" placeholder="ชื่อผู้แต่ง (Author)" name="book_author[]"><br>
                        <input type ="text" placeholder="หมายเหตุ (Note)" name="book_comment[]"><br>
                    </div>
                    <div>
			            <button type="button" class="btnRemove book_button">ลบหนังสือ (Delete Book)</button>
		            </div>
                </div>
            </div>
        </section>

        <section>
            <p><h3>รายละเอียดการจัดส่ง (Location for Receiving)</h3></p>
            <select name="sendOption">
                <option value="รับด้านหน้าหอสมุด">รับด้านหน้าหอสมุด (Pick up at The Library)</option>
                <option value="ส่งคณะ / ภาควิชาในวิทยาเขตกำแพงแสน">ส่งคณะ / ภาควิชาในวิทยาเขตกำแพงแสน (Send to Faculty)</option>
                <option value="ส่งหอพักนอกวิทยาเขตกำแพงแสน">ส่งหอพักนอกวิทยาเขตกำแพงแสน (Sent to Outside KU)</option>
                <option value="ส่งต่างจังหวัด">ส่งต่างจังหวัด (Sent to Other Provinces)</option>
            </select>
            <input type="text" placeholder="ข้อมูลการจัดส่ง*" name="address" required/>
            <h4><p style="font-size:15px;">หมายเหตุ</p></h4>
            <h4><p style="font-size:15px;">รับด้านหน้าหอสมุดกำแพงแสน:ระบุวันและเวลารับเอกสาร</p></h4>
            <h4><p style="font-size:15px;">ส่งคณะในวิทยาเขตกำแพงแสน:ระบุชื่อคณะ</p></h4>
            <h4><p style="font-size:15px;">ส่งหอพักนอกวิทยาเขตกำแพงแสน:ระบุชื่อหอพัก</p></h4>
            <h4><p style="font-size:15px;">ส่งต่างจังหวัด:ระบุที่อยู่</p></h4>
        </section>
        
        <button class="button" id="prev">&larr; Previous</button>
        <button class="button" id="next">Next &rarr;</button>
        <button id="submit" type='submit' >Submit</button>
        
    </form>
    </body>
    <script>
        $('#duplicate').multifield({
	    section: '.group',
	    btnAdd:'#btnAdd',
	    btnRemove:'.btnRemove',
	    max: 20
        });
    </script>
</html>