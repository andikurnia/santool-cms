<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">

    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <div class="blog-image">
                    <div id="myCarousel" class="carousel slide" >
                      <!-- Carousel items -->
                      <div class="carousel-inner">
                        <div class="active item" >
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/dsc_0056.jpg" alt="Blog example image" />
                              <div class="carousel-caption" >
                                <h3>FORUM LLAJ WADAH KOORDINASI UNTUK MENYINERGIKAN PERMASALAHAN LLAJ</h3>
                                <p class="tags">Pagi ini Senin (17/12/1987) Forum LLAJ Balikpapan sebanyak 9 orang diantaranya terdiri dari Pemkot Balikpapan, Dishub Kota Balikpapan, Polrestabes Kota Balikpapan, dan Organda Balikpapan</p>
                              </div>                      
                        </div>
                        <div class="item" >
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/2ujiemisipegirian.jpg" alt="Blog example image" />
                         
                        </div>
                        <div class="item" >
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/1sosialisasiangkutanumum.jpg" alt="Blog example image"  />                        </div>

                      </div>
                      <!-- Carousel nav -->
                      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                    </div>  
                </div>
            </div> <!-- end span9 -->
            <div class="span3">
           	<h3 class="header">Sambutan
                <span class="header-line"></span> 
                </h3>
                <div class="blog-tags">
                Puji syukur kehadirat Allah SWT karena berkat limpahan Rahmat dan Hidayah-Nya, kami
                dapat menyusun website Dinas Perhubungan Kota Surabaya. Website ini bertujuan untuk memberikan
                informasi seluas-luasnya kepada masyarakat dengan memanfaatkan potensi yang tersedia. Hal tersebut
                bertujuan untuk memberikan pelayanan yang sebaik-baiknya dan bermanfaat bagi kita semua 
                dalam bekerja dan kita senantiasa mendapatkan perlindungan dari Allah SWT.
                
                <br />
                <b>KEPALA DINAS</b>
                <br />
                <b>Eddi, Amd LLAJ, S.Soes, MM</b>
                </div>
            </div> <!-- end span3 -->
        </div>
        
        <div class="row-fluid">
           <div class="span3">
                <!-- Require the left side content -->
                <?php require_once('left_side.php'); ?>
           </div>

           <div id="content" class="span6">
                <?php echo $content; ?>
           </div>

          <!-- Right Content -->
           <div class="span3">
                <!-- Require the right side content -->
                <?php require_once('right_side.php'); ?>
           </div>
          <!-- End Right Content -->

        </div><!--/row-fluid-->
    </div>
</section>
<?php $this->endContent(); ?>