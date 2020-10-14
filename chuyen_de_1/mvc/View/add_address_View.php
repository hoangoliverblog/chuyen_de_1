<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="background-image : url('./public/lib/image/nhathuoc.jpg');background-size:cover">
<div class="container" style="margin-top: 40px" >
    <div class="row">
        <div class="col-md-4" style="background-color:rgb(234,182,182);margin:0 auto;padding:2rem 1rem; box-shadow: 1px 5px 5px rgba(0,0,0,0.8)">
            <h1>Thêm địa điểm</h1>
            <form action="./Add_map/add_address" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputAddress">Tên địa điểm</label>
                    <input type="text" name="name_map" class="form-control" id="inputAddress" placeholder="Tên địa điểm">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" name="address_map" class="form-control" id="inputAddress" placeholder="Địa chỉ">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Lat</label>
                        <input type="text" name="lat_map" class="form-control" id="inputEmail4" placeholder="Tọa đọa Lat">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Lng</label>
                        <input type="text" name="lng_map" class="form-control" id="inputEmail4" placeholder="Tọa đọa Lng">
                    </div>
                </div>  
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Loại địa điểm</label>
                        <input type="text" name="type_map" class="form-control" id="inputEmail4" placeholder="Ví dụ: Trường học , Hiệu thuốc">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Hình ảnh đính kèm</label>
                        <input type="file" name="img_map" id="inputCity">
                    </div>
                </div>
                <button type="submit" name="btn_add_address" class="btn btn-primary">Thêm mới</button>
                </form>
        </div>
    </div>
</div>

</body>
</html>