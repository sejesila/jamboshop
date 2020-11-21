<?php
include("includes/header.php");
?>
<div class="row">
    <div class="col-md-3 pt-4">
        <?php
        include("includes/sidebar.php");
        ?>
    </div>
    <div class="col-md-9">

        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="images/slider1.jpg" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="images/slider2.jpg" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="images/slider3.jpg" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="images/slider4.jpg" alt="Slide 4">
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php
    include("includes/footer.php");
    ?>
    </body>
    </html>