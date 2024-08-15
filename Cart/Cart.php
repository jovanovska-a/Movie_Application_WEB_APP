
<?php 
    require("../View/navBar.php");

    $totalPrice = 0;
?>

<h1> <?php if(isset($_SESSION["UserID"])) echo base64_decode($_SESSION["UserID"]); ?> </h1>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .cart-item img {
        max-width: 100px;
        height: auto;
    }

    .quantity-input {
        width: 50px;
    }

    .cart-summary {
        background-color: #f8f9fa;
        border-radius: 10px;
    }
</style>
<div class="container py-5">
    <h1 class="mb-5">Your Shopping Cart</h1>
    <div class="row">
        <div class="col-lg-8">
            <!-- Cart Items -->
            <div class="card mb-4">
                <div class="card-body">
                <?php foreach($items as $item) : ?>
                    <div class="row cart-item mb-3">
                        <div class="col-md-3">
                            <img src="<?php echo $item["MovieImageUrl"] ?>" style="height: 100px; width:100px" alt="Product 1">
                        </div>
                        <div class="col-md-5">
                            <h5 class="card-title"><?php echo $item["Title"] ?></h5>
                            <p class="text-muted">Genres:</p>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                <input style="max-width:100px" type="text" class="form-control  form-control-sm text-center quantity-input" value="1">
                                <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <p class="fw-bold">$<?php echo $item["Price"]?></p>
                            <button class="btn btn-sm btn-outline-danger">
                                <form action="index.php" method="POST" id="delete_form">
                                    <input hidden name="action" value="remove_item" />
                                    <input hidden name="ID" value="<?php echo $item["ID"] ?>" />
                                    <i class="bi bi-trash" id="submit"></i>
                                </form>
                            </button>
                        </div>
                    </div>
                    <hr>
                <?php 
                    $totalPrice+=$item["Price"];
                    endforeach; 
                ?>
                </div>
            </div>
            <!-- Continue Shopping Button -->
            <div class="text-start mb-4">
                <a href="#" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Cart Summary -->
            <div class="card cart-summary">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Products</span>
                        <span>3</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span>$10.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong>$<?php echo $totalPrice ?></strong>
                    </div>
                    <a href="?action=buy_movies" class="btn btn-primary w-100">Buy</a>
                </div>
            </div>
            <!-- Promo Code -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Apply Promo Code</h5>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter promo code">
                        <button class="btn btn-outline-secondary" type="button">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            $("#delete_form").submit();
        });
    });
</script>