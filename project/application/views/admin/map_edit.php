  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

      <div id="mapid"></div>
      <div id="textId"></div>
      <div class="container">
          <div class="row mt-3">
              <div class="col">
                  <?php echo $this->session->flashdata('message'); ?>
                  <form action="<?= base_url("admin/edit_map/") . $map["id"] ?>" method="POST">
                      <div class="form-group">
                          <label for="datalat">Latidude Dan Longitude</label>
                          <input type="text" class="form-control" id="geodata" name="geo" value="<?= $map["location"] ?>">
                          <?php echo form_error('geo', '<small class="text-danger pl-2">', '</small>') ?>
                      </div>
                      <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
              </div>
          </div>
      </div>

      <script src="<?= base_url("assets/js/jquery.js"); ?>"></script>
      <script>
          var mymap = L.map('mapid').setView([-6.990496, 110.42293], 13);
          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              maxZoom: 18,
              id: 'mapbox/streets-v11',
              tileSize: 512,
              zoomOffset: -1,
              accessToken: 'pk.eyJ1IjoiemlzbmFudG8iLCJhIjoiY2s4bjVvZWhpMDV0bTNlbHZsM240NmllNSJ9.yLOnOIce4kIDV_nAGoZ9qQ'
          }).addTo(mymap);

          var polygon = L.polygon([
              [-6.957099, 110.358009],
              [-7.048424, 110.42942],
              [-6.937674, 110.459976]
          ], {
              color: 'red',
          }).addTo(mymap);

          var popup = L.popup();

          function onMapClick(e) {
              popup
                  .setLatLng(e.latlng)
                  .setContent("Kamu klik di " + e.latlng.toString())
                  .openOn(mymap);
              var text = document.getElementById("geodata");
              text.value = e.latlng.toString();
          }

          mymap.on('click', onMapClick);


          let xhr = new XMLHttpRequest;
          xhr.open('GET', 'https://api.airvisual.com/v2/nearest_city?lat=-6.994926&lon=110.466843&key=c36c9b4f-706a-4b41-91f6-fc0866f8c635', true)
          xhr.onload = function() {
              if (this.status === 200) {
                  console.log(JSON.parse(this.responseText));
              }
          }
          //call send
          xhr.send();
      </script>

  </div>
  </div