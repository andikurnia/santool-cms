<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Berita terakhir
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
        <ul class="">
            <?php $latestNews = Berita::model()->getLatestNews(); ?>
            <?php foreach($latestNews as $data){ ?>
            <li>
                <?php echo CHtml::link($data['label'],array('post/id/'.$data['id'])); ?>
            </li>
            <?php } ?>
        </ul>    
    </div>
</div>

<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Link Website
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
        <ul class="nav" style="text-decoration: none; list-style: none;">
            <li class="" style="padding-bottom: 10px;">               
                <a href="http://www.surabaya.go.id/" class="">
                  <img src="http://www.dishubsurabaya.org/id/images/banners/surabaya.png" alt="">
                </a>
            </li>
            <li class="" style="padding-bottom: 10px;">
                <a href="http://bappeko.surabaya.go.id/web/index.php" class="">
                  <img src="http://www.dishubsurabaya.org/id/images/banners/bappeko2.png" alt="">
                </a>
            </li>
            <li class="" style="padding-bottom: 10px;">
                <a href="http://www.sparklingsurabaya.com/" class="">
                  <img src="http://www.dishubsurabaya.org/id/images/banners/sparkling%20surabaya.gif" alt="">
                </a>
            </li>
            <li class="" style="padding-bottom: 10px;">
                <a href="https://lpse.surabaya.go.id/eproc/app" class="">
                  <img src="http://www.dishubsurabaya.org/id/images/banners/lpse.png" alt="">
                </a>
            </li>
        </ul>    
    </div>
</div>

<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Google Map
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
<iframe width="230" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Universitas+Airlangga,+Indonesia&amp;aq=0&amp;oq=univer&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=Universitas+Airlangga,+Indonesia&amp;t=m&amp;ll=-7.26615,112.783595&amp;spn=0.003725,0.002468&amp;z=17&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Universitas+Airlangga,+Indonesia&amp;aq=0&amp;oq=univer&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=Universitas+Airlangga,+Indonesia&amp;t=m&amp;ll=-7.26615,112.783595&amp;spn=0.003725,0.002468&amp;z=17" style="color:#0000FF;text-align:left">View Larger Map</a></small>
    </div>
</div>

<div class="blog-item-container">
    <div class="blog-title">
     <h3 class="header">
         Statistik
         <span class="header-line"></span> 
     </h3>
    </div>
    <div class="blog-text">
    <?php
        Yii::import('ext.EGeoIP');
 
        $geoIp = new EGeoIP();
 
        $geoIp->locate('210.57.208.29'); // use your IP
    ?>
        <table class="tags">
            <tr>
                <td>City</td>
                <td><?php echo $geoIp->city; ?></td>
            </tr>
            <tr>
                <td>Region</td>
                <td><?php echo $geoIp->region; ?></td>
            </tr>
            <tr>
                <td>Area Code</td>
                <td><?php echo $geoIp->areaCode; ?></td>
            </tr>
            <tr>
                <td>DMA</td>
                <td><?php echo $geoIp->dma; ?></td>
            </tr>
            <tr>
                <td>Country Code</td>
                <td><?php echo $geoIp->countryCode; ?></td>
            </tr>
            <tr>
                <td>Country Name</td>
                <td><?php echo $geoIp->countryName; ?></td>
            </tr>
            <tr>
                <td>Continent Code</td>
                <td><?php echo $geoIp->continentCode; ?></td>
            </tr>
            <tr>
                <td>Latitude</td>
                <td><?php echo $geoIp->latitude; ?></td>
            </tr>
            <tr>
                <td>Longitude</td>
                <td><?php echo $geoIp->longitude; ?></td>
            </tr>
        </table>
    <table>
    <?php
        //echo 'Converting $10.00 to '.$geoIp->currencyCode.': <b>'.$geoIp->currencyConvert(10).'</b><br/>';
    ?>
    </table>
    </div>
</div>
