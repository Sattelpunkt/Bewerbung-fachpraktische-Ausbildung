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
            Was <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index/sort/name/ASC'><i
                        class="fas fa-chevron-up"></i></a>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index/sort/name/DESC'><i
                        class="fas fa-chevron-down"></i></a
        </th>
        <th>
            Bearbeiten
        </th>
        <th>
            Kategorie
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index/sort/kategorie/ASC'><i
                        class="fas fa-chevron-up"></i></a>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index/sort/kategorie/DESC'><i
                        class="fas fa-chevron-down"></i></a
        </th>
        <th>
            Laden <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index/sort/shop/ASC'><i
                        class="fas fa-chevron-up"></i></a>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/index/sort/shop/DESC'><i
                        class="fas fa-chevron-down"></i></a
        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    //dnd($this->outputdata);
    if (array_key_exists('params', $this->outputdata)) {
        $urlpart = '/sort/' . $this->outputdata['params'][1] . '/' . $this->outputdata['params'][2];
        $minus = 2;
    } else {
        $urlpart = '';
        $minus = 1;
    }
    if ($this->outputdata == false) {
        echo "<tr><td>Es gibt noch keine Einträge</tr></td>";
    } else {
        for ($i = 0; $i < count($this->outputdata) - $minus; $i++) { ?>
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
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/edit/<?php echo $this->outputdata[$i]['id']; ?>'>
                    <i class='fas fa-pen'></i></a>
                &nbsp;&nbsp;&nbsp&nbsp;
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/toTruhe/<?php echo $this->outputdata[$i]['id']; ?>'><i
                            class='fas fa-box'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/buyByID/<?php echo $this->outputdata[$i]['id']; ?>'><i
                            class="fas fa-shopping-cart"></i></a>&nbsp;&nbsp&nbsp
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/deleteByID/<?php echo $this->outputdata[$i]['id']; ?>'><i
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
</table></p><br/><br/><a
        href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/print/index<?php echo $urlpart; ?>"
        class="btn btn-primary">Drucken</a>
