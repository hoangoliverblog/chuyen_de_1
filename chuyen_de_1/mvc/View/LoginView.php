<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="background-image : url('./public/lib/image/nhathuoc.jpg');background-size:cover">
<div class="container" style="margin-top: 100px">
    <div class="row">

        <div class="col-md-4" style="background-color:rgb(234,182,182);margin:0 auto;padding:2rem 1rem; box-shadow: 1px 5px 5px rgba(0,0,0,0.8)">
            <h1>Đăng nhập</h1>
            <form action="Login/checklogin" method="POST">
                <div class="form-group">
                    <label>username</label>
                    <input type="text" name="acount" class="form-control"  placeholder="Enter sername" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="enter password">
                </div>
                <div class="form-group form-check">
                    <p><a href="Resgister">Đăng ký</a></p>
                </div>
                <button type="submit" name="btnlogin" class="btn btn-primary">Đăng nhập</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>
