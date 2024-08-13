<h1>          
  <?php echo $director["FullName"] ?> 
</h1>

<ul>
    <?php foreach($movies as $movie) : ?>
    <li> <?php echo $movie["Title"] ?> </li>
    <?php endforeach ?>
</ul>

<form method="post">
    <input hidden value="delete_director" name="action"/>
    <input hidden value="<?php echo $director["CreativeDirectorID"] ?>" name="id"/>
    <button type="submit">Delete</button>
</form>

<form method="get">
    <input hidden value="show_edit_form" name="action"/>
    <input hidden value="<?php echo $director["CreativeDirectorID"] ?>" name="id"/>
    <button type="submit">Edit</button>
</form>
