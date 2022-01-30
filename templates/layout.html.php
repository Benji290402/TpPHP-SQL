<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MBC - <?= $pageTitle ?></title>
    <link rel="stylesheet" href="./templates/css/style.css">
    <script src="assets/js/HomePage.js" defer></script>
    <script src="assets/js/scroll.js" defer></script>
    <script src="assets/js/product.js" defer></script>
    <script src="assets/js/cart.js" defer></script>
    <script src="https://kit.fontawesome.com/8ccb279da9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require("templates/components/header.html.php"); ?>
        <button id="toTop" onclick="toTop()">
            <svg viewBox="0 0 384 512">
                <path fill="ivory" d="M24 32h336c13.3 0 24 10.7 24 24v24c0 13.3-10.7 24-24 24H24C10.7 104 0 93.3 0 80V56c0-13.3 10.7-24 24-24zm232 424V320h87.7c17.8 0 26.7-21.5 14.1-34.1L205.7 133.7c-7.5-7.5-19.8-7.5-27.3 0L26.1 285.9C13.5 298.5 22.5 320 40.3 320H128v136c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24z"></path>
            </svg>
        </button>
    <?= $pageContent ?>
</body>

</html>