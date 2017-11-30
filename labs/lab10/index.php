<?php
function displayImages(){
   
if(isset($_POST['submitForm'])){//checks whether the form has been submitted
 if ( $_FILES['myFile']['size'] >= 100000){
    echo "<h1>ERROR: FILE SIZE TOO BIG</h1>";
    }
    else {
print_r($_FILES);
// echo $_FILES['myFile']['name'];
// echo $_FILES['myFile']['size'];

move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
// echo "<img src='gallery/" . $_FILES['myFile']['name'] . "' width='35px'> <br>";
$files = scandir("gallery/", 1);
print_r($files);
for ($i = 0; $i < count($files)-2; $i++){
    echo "<img src='gallery/" . $files[$i] . "'>";
}
}//endIf

//if file size is more than 1 million bytes, error that file is to big

    
}

//click on image, and image should appear bigger
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lab 10 </title>
         <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <style type="text/css">
            

        </style>
    </head>
    <body>
<h1> Photo Gallery </h1>
<form method="POST" enctype="multipart/form-data">
    Upload file:
    <input type="file" name="myFile" multiple/>
    <input type="submit" name="submitForm" value="Upload"/>
    
</form>
<br />
<?=displayImages()?>
<script>
    $(function ()
{
    $('img').on('click', function ()
    {
        $(this).width(1000);
    });
});
</script>
    </body>
</html>