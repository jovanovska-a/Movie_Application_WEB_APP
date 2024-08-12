<form method = "POST">
    <input hidden name="action" value="edit_actor"/>
    <input hidden name="actorID" value="<?php echo $actor["ActorID"] ?>"/>

    <label>Full Name</label>
    <input type="input" name="FullName" value = "<?php echo $actor["FullName"] ?>"/>

    <label>Biography</label>
    <input type="input" name="Biography" value = "<?php echo $actor["Biography"] ?>"/>

    <label>BirthDate</label>
    <input type="date" name="BirthDate" value = "<?php echo $actor["BirthDate"] ?>"/>

    <label>Nationality</label>
    <input type="input" name="Nationality" value = "<?php echo $actor["Nationality"] ?>"/>

    <label>ImageUrl</label>
    <input type="input" name="ActorImageUrl" value = "<?php echo $actor["ActorImageUrl"] ?>"/>

    <button type="submit">Edit</button>
</form>