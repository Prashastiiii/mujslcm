<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placements</title>
    <link rel="stylesheet" href="HomeStyles.css">
    <link rel="stylesheet" href="secondaryStyle.css">
    
</head>
 
<div class="banner">
        <div class="navigation-container">
        <nav class="header-nav">
            <a href="HomePage.php"><img src="images/MUJ logo.png"></a>
            <a href="Placement.php"><p>Placements</p></a>
            <a href="PhotoGallery.html"><p>Photo Gallery</p></a>
            <a href="./new/index.php"><p>Student Login</p></a>
            <a href="./teacherlogin/index.php"><p>Teacher Login</p></a>
        </nav>
        </div>
    </div>

<div class="event-container center"><a href=""><h1 class="shadow" onclick="loadContent('default.php')">PLACEMENTS</a></h1></div>

<div class="main-display">
    <div >
        <nav class="branch-nav">
            <a href="" onclick="loadContent('BusinessCommerce.php');event.preventDefault();">Faculty of Management and Commerce</a>
            <a href="" onclick="loadContent('FOScience.php');event.preventDefault();"> Faculty of Sciences</a>
            <a href="" onclick="loadContent('Engineering.php');event.preventDefault();"> Faculty of Computer Science Engineering</a>
            <a href="" onclick="loadContent('FOArts.php');event.preventDefault();">Faculty of Arts</a>
            <a href="" onclick="loadContent('BJMC.php');event.preventDefault();">Journalism and Communication</a>
            <a href="" onclick="loadContent('law.php');event.preventDefault();">Faculty of Law</a>
        </nav>
    </div>
    <div class="content center">
        <iframe class="content-frame" frameborder="0" src="placementbranches/default.php">
            
        </iframe>
    </div>
</div>
<script>
    function loadContent(pageUrl) {
    var iframe = document.querySelector('.content-frame');
    iframe.src = "placementbranches/"+pageUrl;
    
}

</script>
</body>
</html>