<h3>Gekauft</h3>
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
            Bearbeiten
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
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/toTruhe/<?php echo $this->outputdata[$i]['id']; ?>'><i
                            class='fas fa-box'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/archiv/deleteByID/<?php echo $this->outputdata[$i]['id']; ?>'><i
                        class='fas fa-trash'></i></a>
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
<form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/archiv/deleteArchiv/1" method="post">
    <div class="col-4">
        <button type="submit" class="btn btn-primary mb-2">leeren</button></form></td></div>


<br/><br/>