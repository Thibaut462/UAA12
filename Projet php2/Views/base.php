<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="..//Assets/Css/Base.css">
    <link rel ="stylesheet" href="..//Assets/Css/animation.css">
    <link rel ="stylesheet" href="..//Assets/Css/flex.css">
    <link rel ="stylesheet" href="..//Assets/Css/form.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class ="nav">
            <?php require_once ("Components/navbar.php");?>
        </div>
    </header>
    <main>
        <div class="template">
            <?php require_once($template);?>
            <img src="https://Assets/Image/Century.jpg" alt="Chrome">
        </div>
    </main>
    <footer>
        <div class ="Components">
            <?php require_once("Components/footer.php");?>
        </div>
    </footer>
</body>
</html>