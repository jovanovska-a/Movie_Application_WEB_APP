<form method = "POST">
    <input hidden name="action" value="edit_director"/>
    <input hidden name="directorID" value="<?php echo $director["CreativeDirectorID"] ?>"/>

    <label>Full Name</label>
    <input type="input" name="FullName" value = "<?php echo $director["FullName"] ?>"/>

    <label>Biography</label>
    <input type="input" name="Biography" value = "<?php echo $director["Biography"] ?>"/>

    <label>BirthDate</label>
    <input type="date" name="BirthDate" value = "<?php echo $director["BirthDate"] ?>"/>

    <label>Nationality</label>
    <input type="input" name="Nationality" value = "<?php echo $director["Nationality"] ?>"/>

    <label>ImageUrl</label>
    <input type="input" name="DirectorImageUrl" value = "<?php echo $director["DirectorImageUrl"] ?>"/>

    <button type="submit">Edit</button>
</form>