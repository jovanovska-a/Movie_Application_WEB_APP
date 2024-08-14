
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<style>
    #dropzone-upload{
        width: 200px;
        height: 200px;
    }
</style>


<form action="index.php" method = "post" enctype="multipart/form-data" id="addForm">
    <input hidden name="action" value="add_director"/>
    
    <input type="hidden" name="ImageUrl" id="imageUrl"/>
    <div id="dropzone-upload" class="dropzone"></div>

    <label>Full Name</label>
    <input type="input" name="FullName"/>

    <label>Biography</label>
    <input type="input" name="Biography"/>

    <label>BirthDate</label>
    <input type="date" name="BirthDate"/>

    <label>Nationality</label>
    <input type="input" name="Nationality"/>

    <button type="submit">Add</button>
</form>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    Dropzone.options.dropzoneUpload = {
        url: "../upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        maxFiles:1,
        acceptedFiles: "image/*",
        autoProcessQueue: false,
        init: function(){
            var myDropzone = this;
            this.on("maxfilesexceeded", function(file){
               this.removeAllFiles();
               this.addFile(file);
            });
            document.getElementById("addForm").addEventListener("submit", function(e){
                e.preventDefault();

                if(myDropzone.getQueuedFiles().length > 0){
                    myDropzone.processQueue();
                }else{
                    document.getElementById("addForm").submit() // ako nema slika prikacheno kje napravem submit i kje pokazhe error deka nema ImageUrl
                }
            });
            this.on("success", function (file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById("imageUrl").value = jsonResponse.ImageUrl;
                    document.getElementById("addForm").submit();
                }else{
                    console.error(jsonResponse.error);
                }
            });
        }
    }

</script>