<h3><?php echo $this->outputdata['kategorie'];
    //dnd($this->outputdata);
?>
</h3>
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
        </th>
        <th>
            Was

            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/name/ASC'><i
                        class="fas fa-chevron-up"></i></a>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/name/DESC'><i
                        class="fas fa-chevron-down"></i></a>
        </th>
        <th>
            Bearbeiten
        </th>
        <th>
            Shop
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/shop_id/ASC'><i
                        class="fas fa-chevron-up"></i></a>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/shop_id/DESC'><i
                        class="fas fa-chevron-down"></i></a
        </th>
        </th>

        </th>
    </tr>
    </thead>
    <tbody>

    <?php if (!is_array($this->outputdata['data'])) {
        echo "<tr><td>Es gibt noch keine Einträge</tr></td>";
    } else {
        for ($i = 0; $i < count($this->outputdata['data']); $i++) { ?>
            <td>
                <?php echo $this->outputdata['data'][$i]['anzahl']; ?>
            </td>
            <td> <?php echo $this->outputdata['data'][$i]['gebinde']; ?>

            </td>
            <td>
                <?php echo $this->outputdata['data'][$i]['name']; ?>
            </td>

            <td>
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/edit/<?php echo $this->outputdata['data'][$i]['id']; ?>'>
                    <i class='fas fa-pen'></i></a>
                &nbsp; &nbsp;&nbsp;
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/toTruhe/<?php echo $this->outputdata[$i]['id']; ?>'><i
                            class='fas fa-box'></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/buyByID/<?php echo $this->outputdata['data'][$i]['id']; ?>/<?php echo $this->outputdata['kategorie_id']; ?>'><i class="fas fa-shopping-cart"></i></a>&nbsp;&nbsp&nbsp
                    <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/einkaufKategorien/deleteArtikelbyid/<?php echo $this->outputdata['data'][$i]['id']; ?>/<?php echo $this->outputdata['kategorie_id']; ?>'><i
                                class='fas fa-trash'></i></a>

            </td>

            <td>
                <?php echo $this->outputdata['data'][$i]['shop']; ?>
            </td>


            </tr>
        <?php }
    } ?>


    </tbody>
</table></p>
