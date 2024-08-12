<div id="main">
    <h1>Add Movie</h1>
    <form action="index.php" method="post" id="add_movie">
        <input type="hidden" name="action" value="add_movie" />
        <label for="genres">Genres:</label>
        <select name="genre_ids[]" id="genres" multiple>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['GenreID']; ?>">
                    <?php echo $genre['Name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label for="genres">Actors:</label>
        <select name="actor_ids[]" id="genres" multiple>
            <?php foreach ($actors as $actor) : ?>
                <option value="<?php echo $actor['ActorID']; ?>">
                    <?php echo $actor['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label for="creative_director">Creative Director:</label>
        <select name="director_id" id="creative_director">
            <?php foreach ($creative_directors as $director) : ?>
                <option value="<?php echo $director['CreativeDirectorID']; ?>">
                    <?php echo $director['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Title</label>
        <input type="input" name="title"/>
        <br />
        <label>Duration</label>
        <input type="input" name="duration"/>
        <br />
        <label>Description</label>
        <input type="input" name="description"/>
        <br />
        <label>Price</label>
        <input type="input" name="price"/>
        <br />
        <label>Publication Date</label>
        <input type="date" name="publication_date"/>
        <br />
        <label>Image Url</label>
        <input type="input" name="image_url"/>
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add" />
        <br />
    </form>
</div>