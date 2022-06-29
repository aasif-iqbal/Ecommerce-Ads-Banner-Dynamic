<!DOCTYPE html>
<html>
    <head>
        <title>E-Store</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <style>
.carousel-control-next, 
.carousel-control-prev {
    position: absolute;
    top: 0;
    bottom: 0;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 5%;
    color: #fff;
    text-align: center;
    opacity: .1;
    transition: opacity .15s ease;
    height: 30vw;
}
 
#showImg{
  height: 30vw;
}
/* img{
  height: 30vw;
} */
</style>             
    </head>
    <body>
      <!-- nav bar -->
    <nav class="navbar navbar-light bg-light">

    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="<?= base_url('assets/img/undraw_rocket.svg'); ?>" alt="" width="30" height="24" class="d-inline-block align-text-top">
        E-Store
        </a>        
    </div>
    </nav>
    <!-- nav bar ends -->

    <!-- carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" id="showImg">
   <!-- img -->
  </div>
 <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
  <!-- carousel  ends-->



   
 
    </body>
    <script>

var images="";
<?php for($i=0; $i<count($img_path); $i++){ ?>
// for(let i=0;i< <//?php echo count($img_path);?>; i++ ){

  // console.log('<//?php echo $img_path[$i]['img_path'];?>');
  // console.log('<br>');

  <?php if($i==0){ ?>
    images+='<div class="carousel-item active">';
    images+='<img src="'+'<?php echo base_url('images/'.$img_path[$i]['img_path']);?>'+'" class="d-block w-100" alt="...">';
    images+='</div>';

  <?php }else{ ?>
    images+='<div class="carousel-item">';
    images+='<img src="'+'<?php echo base_url('images/'.$img_path[$i]['img_path']);?>'+'" class="d-block w-100" alt="...">';
    images+='</div>';
<?php }} ?>
 
// document.getElementsById('showImg').innerHTML=images;
document.getElementById('showImg').innerHTML = images;
// console.log(images);

$('.carousel').carousel({
  interval: 2000
})
 
</script>
</html>