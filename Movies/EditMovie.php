<div id="main">
    <h1>Edit Movie</h1>
    <form action="index.php" method="post" id="ediy_movie">
        <input type="hidden" name="action" value="edit_movie" />
        <input hidden name="id" value="<?php echo $movie["MovieID"] ?>"/>
        <label>Genres for this movie:</label>
        <?php foreach ($movie_genres as $genre) : ?>
          <?php echo $genre['Name']; ?>
        <?php endforeach; ?>
        <br />
        <label for="genres">Choose new genres:</label>
        <select name="genre_ids[]" id="genres" multiple>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['GenreID']; ?>">
                    <?php echo $genre['Name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Actors in this movie:</label>
        <?php foreach ($movie_actors as $actor) : ?>
          <?php echo $actor['FullName']; ?>
        <?php endforeach; ?>
        <br />
        <label for="actors">Choose new actors:</label>
        <select name="actor_ids[]" id="actors" multiple>
            <?php foreach ($actors as $actor) : ?>
                <option value="<?php echo $actor['ActorID']; ?>">
                    <?php echo $actor['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Creative Director for this movie: </label>
        <span><?php echo $movie['DirectorName'] ?></span>
        <br />
        <label for="creative_director">Choose new creative Director:</label>
        <select name="director_id" id="creative_director">
            <?php foreach ($creative_directors as $director) : ?>
                <option value="<?php echo $director['CreativeDirectorID']; ?>">
                    <?php echo $director['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Title</label>
        <input type="input" name="title" value="<?php echo $movie["Title"] ?>"/>
        <br />
        <label>Duration</label>
        <input type="input" name="duration" value="<?php echo $movie["Duration"] ?>"/>
        <br />
        <label>Description</label>
        <input type="input" name="description" value="<?php echo $movie["Description"] ?>"/>
        <br />
        <label>Price</label>
        <input type="input" name="price" value="<?php echo $movie["Price"] ?>"/>
        <br />
        <label>Publication Date</label>
        <input type="date" name="publication_date" value="<?php echo $movie["PublicationDate"] ?>"/>
        <br />
        <label>Image Url</label>
        <input type="input" name="image_url" value="<?php echo $movie["MovieImageUrl"] ?>"/>
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Edit" />
        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="../Movies" class="text-decoration-none">Go Back</a></button>
        <br />
    </form>
</div>