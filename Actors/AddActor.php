<form action="index.php" method = "POST">
    <input hidden name="action" value="add_actor"/>

    <label>Full Name</label>
    <input type="input" name="FullName"/>

    <label>Biography</label>
    <input type="input" name="Biography"/>

    <label>BirthDate</label>
    <input type="date" name="BirthDate"/>

    <label>Nationality</label>
    <input type="input" name="Nationality"/>

    <label>ImageUrl</label>
    <input type="input" name="ActorImageUrl"/>

    <button type="submit">Add</button>
</form>