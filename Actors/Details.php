<h1>          <?php echo $actor["FullName"] ?> 
</h1>

<ul>
    <?php foreach($movies as $movie) : ?>
    <li> <?php echo $movie["Title"] ?> </li>

    <?php endforeach ?>
</ul>

<form method="POST">
    <input hidden value="delete_actor" name="action"/>
    <input hidden value="<?php echo $actor["ActorID"] ?>" name="actorID"/>

    <button type="submit">Delete</button>
</form>

<form method="GET">
    <input hidden value="show_edit_form" name="action"/>
    <input hidden value="<?php echo $actor["ActorID"] ?>" name="actorID"/>

    <button type="submit">Edit</button>
</form>