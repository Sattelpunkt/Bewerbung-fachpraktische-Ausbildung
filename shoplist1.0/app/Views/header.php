<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/app/Views/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Leichenhalle</title>
</head>
<body>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">


            <h5>Einkaufen</h5>

        </div>


        <ul class="list-unstyled components">

            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index">Übersicht</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/neu">Neu</a>
            </li>
            <li>
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">Kategorien</a>
                <ul class="collapse list-unstyled" id="homeSubmenu1">
                    <?php for ($i = 0; $i < count($this->outputdata['navi']['einkaufKategorien']); $i++) { ?>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/detail/<?php echo $this->outputdata['navi']['einkaufKategorien'][$i]['id']; ?>"><?php echo $this->outputdata['navi']['einkaufKategorien'][$i]['name']; ?></a>
                    <?php } ?>

                </ul>
            </li>
            <li>
                <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Shop</a>
                <ul class="collapse list-unstyled" id="homeSubmenu2">
                    <?php for ($i = 0; $i < count($this->outputdata['navi']['shop']); $i++) { ?>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/detail/<?php echo $this->outputdata['navi']['shop'][$i]['id']; ?>"><?php echo $this->outputdata['navi']['shop'][$i]['name']; ?></a>
                    <?php } ?>

                </ul>

                <hr color="white"/>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/archiv/home">Gekauft</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/archiv/archiv">Archiv</a>
            </li>
            <hr color="white"/>
            <li>
                <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Einstellungen</a>
                <ul class="collapse list-unstyled" id="homeSubmenu4">
                    <li>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/index">Kategorien</a>
                    </li>
                    <li>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/index">Shops</a>
                    </li>
                    <li>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/gebinde/home">Gebinde</a>
                    </li>
                </ul>

            </li>


        </ul>
        <div class="sidebar-header">
            <h5>Truhe</h5>

        </div>

        <ul class="list-unstyled components">

            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/truhe/index">Übersicht</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/truhe/neu">Neu</a>
            </li>
            <li>
                <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">Kategorien</a>
                <ul class="collapse list-unstyled" id="homeSubmenu3">
                    <?php for ($i = 0; $i < count($this->outputdata['navi']['truheKategorien']); $i++) { ?>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/truheKategorien/detail/<?php echo $this->outputdata['navi']['truheKategorien'][$i]['id']; ?>"><?php echo $this->outputdata['navi']['truheKategorien'][$i]['name']; ?></a>
                    <?php } ?>

                </ul>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/truheArchiv/index">Archiv</a>
            </li>
            <hr color="white"/>
            <li>
                <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">Einstellungen</a>
                <ul class="collapse list-unstyled" id="homeSubmenu5">

                    <li>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/truheKategorien/index">Kategorien</a>
                    </li>
                </ul>
            </li>


        </ul>




    </nav>
    <div class="container-fluid">
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-align-justify"></i> <span></span>
                </button>
            </nav>
