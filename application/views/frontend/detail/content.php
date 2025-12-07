
        <!-- BODY START -->
        <div class="row">
          <div class="col-md-6">
            <span style="font-weight: 500;"><?= $detail[0]['id_categori'] == 1 ? "Man's" : "Woman's"; ?></span> 
          </div>
          <div class="col-md-6">
            <form action="#">
              <!-- <div class="select-box">
                <label for="select-box1" class="label select-box1"><span class="label-desc">Sort by Popularity</span> </label>
                <select id="select-box1" class="select">
                  <option value="1">Top</option>
                  <option value="2">Bottom</option>
                </select>
              </div> -->
            </form>  
          </div>
        </div>

        <section>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      
                      <div class="carousel-inner">
                          
                          <?php
                          $jumlah = count($img_product);
                          for($i=0;$i<$jumlah;$i++){
                          if($i == 0){
                          ?>
                          <div class="carousel-item active" style="width: 500px;">
                            <img class="d-block w-100" src="<?= $img_product[$i]['foto']; ?>" alt="Content 2">
                          </div>
                          <?php } else { ?>
                          <div class="carousel-item" style="width: 500px;">
                            <img class="d-block w-100" src="<?= $img_product[$i]['foto']; ?>" alt="Content 1">
                          </div>

                          <?php } } ?>

                        </div>
                        
                        
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>

                      </div>
                </div>
                <div class="col-md-6">
                    <h4><?= $detail[0]['name'];?></h4>
                    <p><?= $detail[0]['description'];?></p>
                    <p>IDR <?= number_format($detail[0]['price']);?></p><span>social media here</span>
                    <br><br><br>
                    <a style="background-color: #616161; color: white; padding: 10px 170px 10px 170px;" onclick="window.open('https://api.whatsapp.com/send?phone=6281927067602&text=Halo%20mau%20order%20gan','newWindow')">SHOP</a>
                </div>
            </div>
      </section>

      <section>
          <div class="row " style="padding-top: 20px;">
              <div class="col-md-6 text-center">
                <ul class="nav nav-pills " style="text-align:center;">
                    <li class="active" style="text-align: center; border-bottom: 1px solid #000; width:33%;"><a data-toggle="pill" href="#home" style="color: black; text-decoration: none;">Size Guide</a></li>
                    <li style="border-bottom:1px solid #000; width:33%"><a data-toggle="pill" href="#menu1" style="color: black; text-decoration: none;">Washing Instructions</a></li>
                    <li style="border-bottom:1px solid #000; width:33%"><a data-toggle="pill" href="#menu2" style="color: black; text-decoration: none;">Return & Exchange</a></li>
                    
                  </ul>
                  
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <p align="center">Available sizes : <?= empty($desc[0]['size']) ? "Size Kosong" : $desc[0]['size']; ?></p>
                      <p align="left"><?= empty($desc[0]['foto']) ? "Image Kosong" : "<img src='".$desc[0]['foto']."' width='100%'>";?></p>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <p align="left">this is a guide for washing</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                      <p align="left">this is a Return and Exchange</p>
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                <h4>Similar Picks</h4>
                <br>
                <div class="row">

                  <?php 
                    for($i=0;$i<3;$i++){
                  ?>
                    <div class="col-md-3" style="padding-bottom: 25px;">
                        <img src="<?= $product[$i]['foto'];?>" alt="" style="width: 100%;">
                        <h5 style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 500; font-size: 12pt;"><?= $product[$i]['name'];?></h5>
                        <p style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 100; font-size: 9pt;"><?= $product[$i]['id_categori'] == 1 ? "Man's" : "Woman's" ;?></p>
                        <p style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 100; font-size: 9pt;">IDR <?= $product[$i]['price'];?></p>
                      </div>
                   <?php } ?>
                </div>
            </div>
          </div>
      </section>
          
        <!-- BODY END -->

          <!-- Footer Start -->
          <div class="row" style="border-bottom: 1px solid black; width: 100%; margin: 0 auto;">
            &nbsp;
          </div>

          <section>
            <br>
            <div class="row">
              <div class="col-md-12" style="text-align: center;">
              <span style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 500; font-size: 12pt;">CUSTOMER SERVICE</span><br>
                <span style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 100; font-size: 9pt;"><a style="color:black;" href="<?= base_url('how-to-shop');?>">How to Shop</a></span><br>
                <span style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 100; font-size: 9pt;"><a style="color:black;" href="<?= base_url('return-exchange-policy');?>">Return & Exchange Policy</a></span><br>
                <span style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 100; font-size: 9pt;"><a style="color:black;" href="<?= base_url('shipping-policy');?>">Shipping Policy</a></span>
              </div>
            </div>
          </section>

    </div>
