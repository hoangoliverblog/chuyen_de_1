<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <link rel="stylesheet" href="./public/lib/vendor/bootstrap/css/bootstrap.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
       #data{
         display: none;
       }
       #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel {
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select,
      #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }

      #right-panel {
        height: 100%;
        float: right;
        width: 390px;
        overflow: auto;
        display: none;
      }

      #map {
        margin-right: 0px;
      }

      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }

      @media print {
        #map {
          height: 100%;
          margin: 0;
        }

        #right-panel {
          float: none;
          width: auto;
          display: none;
        }
      }
      
    </style>
  </head>
  <body>
    <div id="data">
    <?php
      print_r($data['data']);
    ?>
    </div>
    <div id="floating-panel">
      <input type="text" id="txtmy"> 
      <strong>đến hiệu thuốc:</strong>
      <select id="end">
              <?php 
                    $list = $data['map_data'];
                    $resp = new stdClass;
                    $resp->id = $list;
                    foreach($resp->id as $value)
                    {
              ?>

        <option value="<?php echo $value->address_map?>"><?php echo $value->name_map?></option>

                <?php
                    }
                ?>
      </select>
    </div>
    <div id="right-panel"></div>
    <div id="map"></div>
    <div class="search" style="position: fixed;top:1.5%; left:16%">
      <div class="form-row">
        <div class="form-group col-md-12">
          <form action="" method="get">
            <input type="text" class="form-control" id="search" placeholder="Nhập khu vực tìm kiếm">
          </form>
        </div>
      </div>
    </div>
    <div style="position: fixed;bottom:5%; right:5%">
      <button class="btn btn-dark" onclick="getLocation()">Vị trí của tôi</button>
    </div>
    <script>
      var myLatlng ;// thằng MyLatlng là vị trí hiện tại của mày
      var pic = [] ; 
      var txt = [] ; 
      var marker =[] ; 
      var map_data = document.getElementById('data').innerHTML; 
      var h = map_data.length; 
      let map ; 
      map_data = JSON.parse(map_data);
      
      for(let j = 0 ; j < map_data.length ; j++)
      {
        map_data[j].lat = parseFloat(map_data[j].lat);
        map_data[j].lng = parseFloat(map_data[j].lng);
      }
      
      for(let m = 0; m < map_data.length ; m++)
      {
        txt[m] = map_data[m].name_map ;
      }
      
      for(let m = 0; m < map_data.length ; m++)
      {
        pic[m] = map_data[m].img_map ;
      }

      function Load_Map() {

        var strong = [] ; 
        var div = [] ; 
        var img = [] ; 

        var infoWindow = new google.maps.InfoWindow; 

        map = new google.maps.Map(document.getElementById("map"), {
          center: map_data[0],
          zoom: 8,
        });
      
        for (let i = 0; i <= h; i++) {

              div[i] = document.createElement('div');

              strong[i] = document.createElement('strong');

              strong[i].style.display = 'block';

              strong[i].style.padding = '0 0 0 0.5rem';

              img[i] = document.createElement('img');

              img[i].src = './public/lib/image/' + pic[i];

              img[i].style.width = '20rem';

              img[i].style.padding = '0.3rem 1rem 0.3rem 0.5rem';

              div[i].appendChild(img[i]);

              strong[i].textContent = txt[i];

              div[i].appendChild(strong[i]);

              marker[i] = new google.maps.Marker({
              position: map_data[i],
              map:map,
              //animation: google.maps.Animation.BOUNCE,
              icon:{
                url:'./public/lib/image/icon_new.png',
                scaledSize :{width:30,height:54},
                //anchor:{x:2,y:10}  
              }
          });  

          marker[i].addListener('click', function() {

                infoWindow.setContent(div[i]);
                infoWindow.open(map, marker[i]);
          });

          
    }
        
        // *********** Search điểm đến ****************

        var search = new google.maps.places.Autocomplete(document.getElementById('search'));

        search.addListener('place_changed',function(){

        var place = search.getPlace();

        //map.setCenter(place.geometry.location);
        map.fitBounds(place.geometry.viewport);
        console.log(place);
        //marker.setPosition(place.geometry.location);


      });

      
        // ------------------------------Driection------------------------------------------
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const directionsService = new google.maps.DirectionsService();
        directionsRenderer.setMap(map);
        directionsRenderer.setPanel(document.getElementById("right-panel"));
        const control = document.getElementById("floating-panel");
        control.style.display = "block";
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        const onChangeHandler = function () {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        };
        // document.getElementById("start").addEventListener("change", onChangeHandler);
        document.getElementById("txtmy").addEventListener("change", onChangeHandler);
        document.getElementById("end").addEventListener("change", onChangeHandler);

        // ------------------------------Driection------------------------------------------

      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        // const start = document.getElementById("start").value;
        const txtmy = document.getElementById("txtmy").value;
        const end = document.getElementById("end").value;
        directionsService.route(
          {
            origin: txtmy,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING,
          },
          (response, status) => {
            if (status === "OK") {
              directionsRenderer.setDirections(response);
            } else {
              // window.alert("Directions request failed due to " + status);
              console.log(status);
            }
          }
        );
      }

    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc563n4ko5g3-1Hjw1aC7dh71_vsU43es&libraries=places&callback=Load_Map"
      defer
    ></script>
    <script>
    
    function getLocation() {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setPosition);
            } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function setPosition(position) {
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
          myLatlng = new google.maps.LatLng(latitude,longitude);

          var mark = new google.maps.Marker({
              position: myLatlng,
              map:map,
              icon:{
                url:'./public/lib/image/icon_mylatlng.png',
                scaledSize :{width:30,height:54},
              }
          });  
        }
    </script>
  </body>
</html>