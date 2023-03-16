<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Einkaufszettel</title>
</head>
<body onLoad="window.print()">
<h3><?php echo $this->outputdata['shop']; ?></h3>
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

    </tr>
    </thead>
    <tbody>

    <?php
    //dnd($this->outputdata);
    if (array_key_exists('params', $this->outputdata)) {
        if(isset($this->outputdata['params'][1]) AND $this->outputdata['params'][1] == "sort") {
            $urlpart = '/sort/' . $this->outputdata['params'][2] . '/' . $this->outputdata['params'][3];
        } else {
            $urlpart = '';
        }
        unset($this->outputdata["params"]);
    } else {
        $urlpart = '';
    }
    if (!is_array($this->outputdata['data'])) {
        echo "<tr><td>Es gibt noch keine Einträge</tr></td>";
    } else {
        for ($i = 0; $i < count($this->outputdata['data']); $i++) { ?>
            <td>
                <?php echo $this->outputdata['data'][$i]['anzahl']; ?>
            </td>
            <td>
                <?php echo $this->outputdata['data'][$i]['gebinde']; ?>

            </td>
            <td>
                <?php echo $this->outputdata['data'][$i]['name']; ?>
            </td>


            <td>
                <?php echo $this->outputdata['data'][$i]['kategorie']; ?>
            </td>


            </tr>
        <?php }
    } ?>


    </tbody>
</table>
</p><br/><br/><a
        href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/detail/<?php echo $this->outputdata['shop_id']; ?><?php echo $urlpart; ?>"
        class="btn btn-primary">Zurück</a>
</body>
</html>
