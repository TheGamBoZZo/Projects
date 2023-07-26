<?php 
// session_start();

include('functions/userFunctions.php');
include('includes/header.php');
include('includes/slider.php');


?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Trending Products</h4>
                <div class="underline mb-2"></div>
                <hr>
                <div class="owl-carousel">
                        <?php 
                            $trendingProducts = getAllTrending();
                            if(mysqli_num_rows($trendingProducts) > 0 )
                            {
                                foreach($trendingProducts as $item)
                                {
                                    ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<?= $item['slug'] ;?>">
                                            <div class="card shadow" >
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image'];?>" alt="Product Image" class="w-100 h-100">
                                                    <h4 class="text-center"><?= $item['name'];?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <?php
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Services</h4>
                <div class="underline mb-2"></div>
                <hr>
                <div class="owl-carousel">
                        <?php 
                            // $services = getAllServices();
                            // if(mysqli_num_rows($services) > 0 )
                            // {
                            //     foreach($services as $item)
                            //     {
                                    ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<//?= $item['slug'] ;?>">
                                            <div class="card shadow" >
                                                <div class="card-body">
                                                    <img src="uploads/<//?= $item['image'];?>" alt="Product Image" class="w-100 h-100">
                                                    <h4 class="text-center"><//?= $item['name'];?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <?php
                                //}
                            //}
                        ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center" id="aboutUs">About Us</h4>
                <div class="underline mb-2"></div>
                <hr>
                    <p>
                    Meet Ameer, your local barber with a big heart. For the past two years, he's been perfecting his craft and helping his community. Now, he's proud to open his own shop, The Community Cut. Experience more than just a haircut as Alex transforms lives and builds a stronger community, one snip at a time.                        <br>
                    </p>
                    <p>
                    Once upon a time, in a vibrant neighborhood filled with bustling streets and warm smiles, there lived a barber named Alex. For the past two years, he had dedicated himself to the art of cutting hair, tirelessly honing his skills and cultivating his passion. But for Alex, being a barber was about much more than simply crafting stylish haircuts—it was about making a meaningful difference in people's lives and giving back to the community he loved.
From the moment Alex picked up his first pair of scissors, he knew he had found his true calling. He believed that a haircut had the power to transform not only a person's appearance but also their confidence and self-esteem. Eager to share this belief with others, Alex began to seek out opportunities to make a positive impact in his community.                        </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">Ameer's Barber</h4>
                <hr>
                <a href="index.php" class="text-white"> <i class="fa fa-angle-right"></i> Home</a> <br>
                <a href="catergories.php" class="text-white"> <i class="fa fa-angle-right" ></i> Our Collections</a> <br>
                <a href="services.php" class="text-white"> <i class="fa fa-angle-right" ></i> Services</a> <br>
                <a href="calendar.php" class="text-white"> <i class="fa fa-angle-right" ></i> Appointments</a> <br>


            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                    <hr>
                <p class="text-white">
                    1234 Elmwood Avenue
                    Suite 5678
                    Anytown, XYZ 12345
                    United States
                </p>
                <a href="tel:+1(555)123-4567" class="text-white"> <i class="fa fa-phone"></i> +1(555)123-4567</a> <br>
                <a href="mailto:wanderlust@adventureseeker.com" class="text-white"> <i class="fa fa-envelope"></i> wanderlust@adventureseeker.com</a>
            </div>
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3575.0297177772727!2d127.78123407520819!3d26.3579007837135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDIxJzI4LjQiTiAxMjfCsDQ3JzAxLjciRQ!5e0!3m2!1sen!2sza!4v1686151348772!5m2!1sen!2sza" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-primary">
    <div class="text-center">
        <p class="mb-0 text-white" ><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-white" target="_blank"> All Rights and Lefts reserved. Copyright @  TheGamBoZZo </a>  <?= date('Y') ?> </p>
    </div>

</div>


<?php include('includes/footer.php') ?>

<script>
    $(document).ready(function()
    {
        $('.owl-carousel').owlCarousel
        ({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
        })
    })

</script>