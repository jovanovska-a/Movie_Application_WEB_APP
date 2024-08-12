<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style> 

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
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
    margin-bottom: 50px;
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
    margin-bottom: 30px;
}

.frontside .card {
    min-height: 312px;
}


.frontside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}

</style>

<a href="?action=show_add_form" class="btn btn-primary">Add Actor</a>

<form method="GET">

    <input type="input" placeholder="Search actors" name="search" value ="<?php echo $search ?>"/>

    <button type="submit">Search</button>
</form>

<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">ACTORS</h5>
        <div class="row">
            <!-- Team member -->
            <?php foreach($actors as $actor) : ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="frontside">
                    <div class="card">
                        <div class="card-body text-center">
                            <p><img class=" img-fluid" src="<?php echo $actor["ActorImageUrl"] ?>" alt="card image"></p>
                            <h4 class="card-title"><?php echo $actor["FullName"] ?></h4>
                            <p class="card-text">Nationality: <?php echo $actor["Nationality"]?></p>
                            <p class="card-text">Date of birth: <?php echo $actor["BirthDate"]?></p>
                            <a href="?action=details&actorID=<?php echo $actor["ActorID"] ?>" class="btn btn-primary btn-sm">View more</i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
