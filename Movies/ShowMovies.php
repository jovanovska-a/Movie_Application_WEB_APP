<h1> Movies </h1>

<ul>
    <?php foreach($movies as $movie) : ?>
    <li><?php echo $movie["Title"] ?></li>
    <li><?php echo $movie["FullName"] ?></li>
    <li><img src="<?php echo $movie["MovieImageUrl"]?>"></li>
    <li><img src="<?php echo $movie["DirectorImageUrl"]?>"></li>
    <?php endforeach; ?>
</ul>