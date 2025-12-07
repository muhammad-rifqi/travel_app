          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php
            $jumlah = count($slide);
            for($i=0;$i<$jumlah;$i++){
              if($slide[$i]['id'] == '2'){
              ?>
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?= $slide[$i]['foto'];?>" alt="Content 1">
              </div>
              <?php }else{
              ?>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?= $slide[$i]['foto'];?>" alt="Content 2">
              </div>
            <?php
            }} ?>
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
          <div class="clearfix"></div>
          <div class="row" style="padding-top: 35px;">
              <div class="col-md-6">
                  <img src="<?= base_url();?>assets/frontend/img/Featured Item_1.png" alt="" style="width: 100%; height: 590px;">
              </div>
              <div class="col-md-6" style="padding-top: 9px;">
                  <div class="col-md-12">
                    <img src="<?= base_url();?>assets/frontend/img/Featured Item_2.png" alt="" style="width: 100%;">
                  </div>
                  <br>
                  <br>
                  <div class="col-md-12">
                    <img src="<?= base_url();?>assets/frontend/img/Featured Item_3.png" alt="" style="width: 100%;">
                  </div>
              </div>
          </div>

          <br>
          <br>

          <section>
              <h2 style="text-align: center; font-style: italic;">T O P&nbsp;&nbsp;&nbsp;&nbsp;P I C K S</h2>
              <br>
              
              <?php
              $chunk = array_chunk($product,2);
              $ju = count($chunk);
              for($i=0;$i<2;$i++){
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
              <div class="row">
                <a href="<?= base_url('user/product');?>" style="margin: 0 auto; color: black; background-color: white; color: black; border: 1px solid black; padding: 5px 25px 5px 25px; font-family: 'Roboto', sans-serif; text-decoration: none; font-weight: 100;">VIEW ALL</a>
              </div>
          </section>