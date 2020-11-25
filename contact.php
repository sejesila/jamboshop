<?php
include("includes/header.php")
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">We would like to hear from you!</h1>
        <p class="lead text-muted mb-0">Bonga Nasi!</p>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container p-4">
    <div class="row">
        <div class="col-sm-8">
            <form action="contact.php" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="emailHelp" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
<!--            --><?php
//            if(isset($_POST['submit'])){
//                //admin receives message using this code
//                $sender_name = $_POST['name'];
//                $sender_email = $_POST['email'];
//                $message = $_POST['message'];
//                $admin_mail = "azdak099@gmail.com";
//                mail($admin_mail,$sender_name,$message,$sender_email);
//                //auto reply code
//                $email = $_POST['email'];
//                $subject = "Welcome to my website";
//                $msg = "Thank you for contacting us. We will get back to you soon";
//                $from = "azdak099@gmail.com";
//                mail($email,$subject,$msg,$from);
//                echo "<h2> Your message has been sent successfully </h2>";
//            }
//            ?>
            < </div>
                <div class="col-sm-4">
                    <div class="form-group bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address
                        </div>
                        <div class="card-body" >
                            <p>Moi Avenue</p>
                            <p>00100 Nairobi</p>
                            <p>Kenya</p>
                            <p>Email : <a href="#">sales@jamboshop.co.ke</a> </p>
                            <p>Tel. +254 710 022 393</p>

                        </div>

                    </div>
                </div>
        </div>
    </div>
    <?php
include("includes/footer.php");
?>