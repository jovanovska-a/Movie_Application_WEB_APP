<h1> Movies </h1>

<ul>
    <?php foreach($actors as $actor) : ?>
    <li><a href = "?action=details&actorID=<?php echo $actor["ActorID"] ?>">
         <?php echo $actor["FullName"] ?> 
        </a> 
    </li>
    <li><img src=<?php echo $actor["ActorImageUrl"] ?> width = "30px" height = "30px"></li>
    <?php endforeach; ?>
</ul>