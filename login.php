<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <form method="POST" action="handlers/users/login_user.php" class="form border my-2 p-3">
                <div class="mb-3">
                <label>Email:</label><br>
                <input type="email" name="email"class="form-control"><br><br>
               </div>
                <div class="mb-3">
                <label>Password:</label><br>
                <input type="password" name="password"class="form-control"><br><br>
                </div>
                
                        <div class="mb-3">
                            <input type="submit"name="login" value="login" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>
    