<?php
function displayImages(){
   
if(isset($_POST['submitForm'])){//checks whether the form has been submitted
 if ( $_FILES['myFile']['size'] >= 100000){
    echo "<h1>ERROR: FILE SIZE TOO BIG</h1>";
    }
    else {
// print_r($_FILES);
// echo $_FILES['myFile']['name'];
// echo $_FILES['myFile']['size'];

move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
// echo "<img src='gallery/" . $_FILES['myFile']['name'] . "' width='35px'> <br/>";
$files = scandir("gallery/", 1);
// print_r($files);
for ($i = 0; $i < count($files)-2; $i++){
    echo "<div id='gallery'>";
    echo "<img class='images' src='gallery/" . $files[$i] . "'width='35' id='img' . $i . onclick=imgSize(' . $i . ')  >";
    echo "</div>";
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
      <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
<h1> Photo Gallery </h1>
<form method="POST" enctype="multipart/form-data">
    Upload file:
    <input type="file" name="myFile" multiple/>
    <input type="submit" name="submitForm" value="Upload"/>
    
</form>
<br />

<!--<img id="mrbean" src="http://2.bp.blogspot.com/-C6KY8tsc8Fw/T-SVFnncxjI/AAAAAAAAANw/FMiNzA8Zecw/s640/mr.bean.jpg" width="50" height="50" />-->

<!--<input type="button" value="Increase image size" />-->
<script>
// $(".images").click(function(){
//   $(this).animate({ 
//     width: 400,
//     height: 400
//   }, 3000 );
// });
// // JavaScript
// $(".images").click(function() {
//     var img = $("#mrbean");

//     if (img.width() < 200)
//     {
//         img.animate({width: "200px", height: "200px"}, 1000);
//     }
//     else 
//     {
//         img.animate({width: img.attr("width"), height: img.attr("height")}, 1000);
//     }
// });
</script>
<?=displayImages()?>
 <script>
 $(document).ready(function(){
     $('img').click(function(){
        $('img').css("width", "");
        $(this).css("width", "300px");
     });
 });
//     $(function ()
// {
//     var img = $("img");
//     $('.images').on('click', function (){
//     // {
//     //     // $(this).width(1000);
//     //     $(this).animate(1000);
    
//     if (img.width() < 2000)
//     {
//         img.animate({width: "200px", height: "200px"}, 1000);
//     }
//     else if (img.width() >= 200)
//     {
//         // img.animate({width: img.attr("width"), height: img.attr("height")}, 1000);
//         img.animate({width: "200px", height: "200px"}, 1000);
//     }
   
// });
//     if ($(e.target).hasClass('expanded')) {
//     $(".images").removeClass('expanded').stop().animate({
//         width: 280,
//         height: 187
//     }, 200);
// } else {
//     $('#gallery').find('img').fadeTo(0, 1);
//     $(".images").addClass('expanded').stop().animate({
//         width: 800,
//         height: 533
//     }, 200);
// }
// });
 </script>
    </body>
</html>