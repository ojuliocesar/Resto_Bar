<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restô Bar - Admin</title>
    <link rel="stylesheet" href="../../css/admin.css" />
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Permanent+Marker|Raleway:400,700" rel="stylesheet">
    <script src="js/vendor/modernizr.js"></script>
</head>

<body>

<header class="main-header">
    <a href="../../"><h1 class="main-title">Restô Bar</h1></a>

    <ul class="header-item">
        <?php if (file_exists('cadastro.php')): ?>
            <a class="item-wrapper" href="cadastro.php"><li>Create</li></a>
        <?php endif ?>
        <a class="item-wrapper" href="listar.php"><li>List</li></a>
        <a class="item-wrapper" href="../"><li>Painel</li></a>
    </ul>

</header>