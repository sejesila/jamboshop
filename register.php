<?php
include("includes/header.php")
?>

    <div class="p-4 d-flex  justify-content-center">

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading ">
                    <h1>Create Account</h1>
                </div>
                <div class="panel-body">
                    <form action="">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input required type="text" class="form-control" placeholder="Enter First Name" id="firstName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input required type="text" class="form-control" placeholder="Enter Last Name" id="lastName">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="email" class="form-control" placeholder="Enter Email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required type="text" class="form-control" id="password">
                        </div>

                        <button type="submit" class=" btn btn-warning">Create Account</button>
                       

                    </form>

                </div>

                <div class="panel-footer">

                </div>

            </div>
        </div>
    </div>


<?php
include("includes/footer.php")
?>