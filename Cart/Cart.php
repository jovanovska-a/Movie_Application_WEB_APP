<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .cart-item img {
            max-width: 100px;
            height: auto;
        }

        .quantity-input {
            width: 50px;
        }

        .cart-summary {
            background-color: white;
            border-radius: 10px;
        }

        .btn-custom {
            background-color: #b2ebeb;
            padding: 5px;
            border: 0.6px solid black;
        }

        .btn-custom:hover {
            background-color: #8de0e0;
            border: 0.6px solid black;
        }

        .btn-continue-shopping {
            color: #fff;
            background-color: #007b5e;
            border-color: #007b5e;
        }
        .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .btn-continue-shopping:hover,
        .btn-continue-shopping:focus {
            background-color: #108d6f;
            box-shadow: none;
            outline: none;
            color: #007b5e;
            border-color: #007b5e;
        }
    </style>
</head>
<body>

<?php 
    require("../View/navBar.php");
    $total_price = 0;
    $total_items = 0;
?>
<div class="container py-5">
<h4 class="section-title mb-4" style="background-color: #eaf5f2; color: #007b5e;">Your Shopping Cart</h4>
    <?php if(!isset($_SESSION["logged_in"])) :  ?>
        <div class="col-md-12 text-center" style="margin-top: 30px;">
        <h4 class="section-title" style="font-size: 1.4rem;">You are not logged in</h4>
        <p>Please log in to see your movies.</p>
                </div>
    <?php 
        $_SESSION["current_page"] = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER['PHP_SELF'];
        die();
        endif; 
    ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4" style="width: 580px;">
                <div class="card-body" style="padding-bottom: 0.2rem;">
                <?php foreach($items as $item) : ?>
                    <div class="row cart-item mb-1" style="margin-top: 0.2rem; display: flex; justify-content: space-between;">
                        <div class="col-md-1">
                            <img src="<?php echo $item["MovieImageUrl"] ?>" style="height: 80px; width: 70px" alt="Product 1">
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 1rem;"><?php echo $item["Title"] ?></h5>
                        </div>
                        <div class="col-md-2 text-end" style="display: flex; justify-content: space-between;">
                            <p class="">$<?php echo $item["Price"]?></p>
                            <form action="index.php" method="POST" id="delete_form">
                                    <input hidden name="action" value="remove_item" />
                                    <input hidden name="ID" value="<?php echo $item["ID"] ?>" />
                                    <button class="btn btn-sm btn-outline-danger submit_form_button" style="height: 28px;" id="submit_button">
                                        <i class="bi bi-trash"></i>
                                    </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                <?php 
                    $total_price+=$item["Price"];
                    $total_items++;
                    endforeach; 
                ?>
                </div>
            </div>
            <!-- Continue Shopping Button -->
            <div class="text-start mb-4">
                <a href="../Movies/" style="font-size: 0.8rem;" class="btn btn-continue-shopping">
                    <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Cart Summary -->
            <div class="card cart-summary">
                <div class="card-body">
                    <h5 class="card-title mb-3" style="font-size: 1.05rem">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-size: 0.9rem">Products</span>
                        <span style="font-size: 0.8rem"><?php echo $total_items ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong style="font-size: 0.9rem">Total</strong>
                        <strong style="font-size: 0.8rem">$<?php echo $total_price ?></strong>
                    </div>
                    <a href="?action=buy_movies" class="btn btn-custom w-100 " style="font-size: 1rem;">Buy</a>
                </div>
            </div>
            <!-- Promo Code -->
            <div class="card mt-4">
                <div class="card-body" style=" background-color: #e0f7f7;">
                    <h5 class="card-title mb-3" style="font-size: 1rem; ">Apply Promo Code</h5>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" style="font-size: 0.9rem;" placeholder="Enter promo code">
                        <button class="btn btn-outline-secondary" style="font-size: 0.9rem; color: black; background-color: #b2ebeb;" type="button">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function(){
        $(".submit_form_button").click(function(){
            $("#delete_form").submit();
        });
    });
</script>
</html>
