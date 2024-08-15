<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #108d6f;
            box-shadow: none;
            outline: none;
            color: #007b5e;
            border-color: #007b5e;
        }
        .btn-primary {
            color: #fff;
            background-color: #007b5e;
            border-color: #007b5e;
        }
        section {
            padding: 60px 0;
        }
        section .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 30px;
            text-transform: uppercase;
        }
        #team .card {
            border: none;
            background: #eee;
        }
        .frontside {
            position: relative;
            -webkit-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            z-index: 2;
            margin-bottom: 35px;
        }
        .frontside .card {
            min-height: 400px;
        }
        .frontside .card .card-title {
            color: #007b5e !important;
        }
        .frontside .card .card-body img {
            width: 170px; 
            height: 220px; 
            border-radius: 50%;
        }
        .search-forms {
            display: flex;
            align-items: center;
        }
        .search-bar input, .search-bar select {
            margin-right: 5px; 
        }
        .search-bar {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <?php 
        require("../View/navBar.php");
    ?>
    <div style="display: flex; justify-content: space-between; padding-top: 2%; padding-left: 10%; padding-right: 10%; height: 9%;">
        <form method="GET" class="search-bar">
            <input type="input" placeholder="Search actors" name="search" value ="<?php echo $search ?>" class="form-control"/>
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </form>
        <a href="?action=show_add_form" class="btn btn-primary">Add Actor</a>
    </div>
    <section id="team" class="py-3">
        <div class="container">
            <h3 class="section-title h3">ACTORS</h3>
            <div class="row">
                <?php foreach($actors as $actor) : ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid" src="<?php echo $actor["ActorImageUrl"] ?>" alt="card image"></p>
                                <h4 class="card-title"><?php echo $actor["FullName"] ?></h4>
                                <p class="card-text">Nationality: <?php echo $actor["Nationality"]?></p>
                                <a href="?action=details&actorID=<?php echo $actor["ActorID"] ?>" class="btn btn-primary btn-sm">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
</html>

