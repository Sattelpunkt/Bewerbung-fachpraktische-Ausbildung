<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Einkaufszettel</title>
</head>
<body onLoad="window.print()">

<h3>Einkaufzettel</h3>
<p>
<table class="table table-striped">
    <thead>
    <tr>
        <th>
            Anzahl
        </th>
        <th>
            Gebinde
        </th>
        <th>
            Was
        </th>

        <th>
            Kategorie

        </th>
        <th>

        </th>
    </tr>
    </thead>
    <tbody>

    <?php

    //dnd($this->outputdata);
    if (array_key_exists('params', $this->outputdata)) {
        $urlpart = '/sort/' . $this->outputdata['params'][1] . '/' . $this->outputdata['params'][2];
        unset($this->outputdata["params"]);
    } else {
        $urlpart = '';
    }
    if ($this->outputdata == false) {
        echo "<tr><td>Es gibt noch keine Einträge</tr></td>";
    } else {
        for ($i = 0; $i < count($this->outputdata); $i++) { ?>
            <td>
                <?php echo $this->outputdata[$i]['anzahl']; ?>
            </td>
            <td>
                <?php echo $this->outputdata[$i]['gebinde']; ?>

            </td>
            <td>
                <?php echo $this->outputdata[$i]['name']; ?>
            </td>


            <td>
                <?php echo $this->outputdata[$i]['kategorie']; ?>
            </td>
            <td>
                <?php echo $this->outputdata[$i]['shop']; ?>
            </td>


            </tr>
            <?php


        }
    } ?>


    </tbody>
</table>
<br/><br/><a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index<?php echo $urlpart; ?>" class="btn btn-primary">Zurück</a>
</p></body>
</html>

