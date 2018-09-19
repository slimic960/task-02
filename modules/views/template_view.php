<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>    
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <title>Главная</title>
    </head>
    <body>
        <?php include 'modules/views/header_view.php' ?>
        <section id="siteContent">
            <div class="container">
                <div class="row align-items-center">        
                    <div class="col-lg-12 order-lg-1">
                        <div class="p-5">
                            <?php include 'modules/views/' . $content_view; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'modules/views/footer_view.php' ?>
    </body>
</html>