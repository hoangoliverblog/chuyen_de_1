<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="background-image : url('./public/lib/image/nhathuoc.jpg');background-size:cover">
<div class="container" style="margin-top: 40px">
    <div class="row">
        <div class="col-md-4" style="background-color:rgb(234,182,182);margin:0 auto;padding:2rem 1rem; box-shadow: 1px 5px 5px rgba(0,0,0,0.8)">
            <h1>Đăng ký người dùng</h1>
            <form action="Resgister/adduser" method="POST">
                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input type="text" name="name_user" class="form-control"  placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Tài khoản</label>
                    <input id="input_acount" type="text" name="acount_user" class="form-control"  placeholder="Acount" autocomplete="off">
                    <div id="check_user" style="padding-top: 5px"></div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass_user" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="old_pass_user" class="form-control"  placeholder="Old Password">
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="email" name="email_user" class="form-control" autocomplete="off" placeholder="Email">
                </div>    
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address_user" class="form-control" autocomplete="off" placeholder="Address">
                </div>    
                <button type="submit" class="btn btn-primary" name="btndangki">Đăng ký</button>
            </form>

        </div>
    </div>
</div>
<script src="./public/lib/vendor/jquery/jquery.min.js"></script>
<script src="./public/lib/vendor/bootstrap/js/ajax.js"></script>
</body>
</html>