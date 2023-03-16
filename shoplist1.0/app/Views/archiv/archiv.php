<h3>Gelöscht</h3>
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
            Laden
        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    //dnd($this->outputdata);

    if ($this->outputdata == false) {
        echo "<tr><td>Es gibt noch keine Einträge</tr></td>";
    } else {
        for ($i = 0; $i < count($this->outputdata)-1; $i++) { ?>
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
        <?php }
    }


    ?>


    </tbody>
</table></p>
<form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/archiv/deleteArchiv/2" method="post">
    <div class="col-4">
        <button type="submit" class="btn btn-primary mb-2">leeren</button></form></td></div>


<br/><br/>