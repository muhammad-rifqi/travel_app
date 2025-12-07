<script>
function ganti(){
  var data =  document.getElementById("select-box1").value;
  if(data == 1){
      window.location.href="<?= base_url('user/sort_date')?>";
  }

  if(data == 2){
    window.location.href="<?= base_url('user/popular')?>";
  }

  if(data == 3){
    window.location.href="<?= base_url('user/low_high')?>";
  }

  if(data == 4){
    window.location.href="<?= base_url('user/high_low')?>";
  }
}
</script>
<body>
    <div class="container">
        <div class="row">
            <img src="<?= base_url();?>assets/frontend/img/logo.png" alt="Toya" width="200" style="margin: auto; padding-top: 20px; cursor:pointer" onclick="window.location.href='<?= base_url();?>'">
        </div>
        <div class="row" style="border-bottom: 1px solid black; width: 100%; margin: 0 auto;">
            &nbsp;
        </div>
        <br>
        <div class="row">
            <ul style="list-style: none; font-weight: 600;">
                <li style="float: left; margin-right: 50px; margin-left: 325px;"><a style="color:black" href="<?= base_url('user/productsale');?>">SALE</a></li>
                <li style="float: left; margin-right: 50px;"><a style="color:black" href="<?= base_url('user/category_product/1');?>">MEN'S</a></li>
                <li style="float: left; margin-right: 50px;"><a style="color:black" href="<?= base_url('user/category_product/2');?>">WOMEN'S</a></li>
                <li style="float: left; margin-right: 50px;"><a style="color:black" href="<?= base_url('user/contact');?>">CONTACT US</a></li>
            </ul>
        </div>
        <div class="row">
          <!--ul style="list-style: none; font-weight: 400; color: #6d6d6d;">
              <li style="float: left; margin-right: 50px; margin-left: 385px;">Tops</li>
              <li style="float: left; margin-right: 50px;">Bottoms</li>
              <li style="float: left; margin-right: 50px;">Accessories</li>
          </ul-->
          <br>
      </div>
        <div class="clearfix"></div>
        <!-- HEADER END -->

        <!-- BODY START -->
        <div class="row">
          <div class="col-md-6">
            <span style="font-weight: 500;">All Product's</span> 
          </div>
          <div class="col-md-6">
              <div class="select-box">
                <label for="select-box1" class="label select-box1"><span class="label-desc">Sort by Popularity</span> </label>
                <select id="select-box1" class="select" onChange="ganti()">
                  <option>Options</option>
                  <option value="1">Date Add</option>
                  <option value="2">Popularity</option>
                  <option value="3">Price Low to High</option>
                  <option value="4">Price High to Low</option>
                </select>
              </div>
          </div>
        </div>

        <section>
          <br>
          <br>
            <?php
              $chunk = array_chunk($product,5);
              $ju = count($chunk);
              for($i=0;$i<$ju;$i++){
              ?>
              <div class="row">
                  <div class="col-md-1">&nbsp;</div>

                  <?php $ab = count($chunk[$i]); for($j=0;$j<$ab; $j++) {
                    ?>
                  <div class="col-md-2" style="padding-bottom: 25px;">
                    <a href="<?= base_url('user/detail_product/'.$chunk[$i][$j]['id_product'])?>"><img src="<?= $chunk[$i][$j]['foto'];?>" alt="" style="width: 100%;"></a>
                    <h5 style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 500; font-size: 12pt;"><?= $chunk[$i][$j]['name'];?></h5>
                    <p style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 100; font-size: 9pt;"> <?= $chunk[$i][$j]['id_categori'];?> </p>
                    <p style="padding: 0; margin: 0; font-family: 'Roboto', sans-serif; font-weight: 100; font-size: 9pt;">IDR <?= number_format($chunk[$i][$j]['price']);?></p>
                  </div>

                  <?php   
                  }?>

              </div>
              <?php } ?>
      </section>
      <div class="row">
        <div class="col-md-6">
          &nbsp;
        </div>
        <div class="col-md-6">
            <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
          
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