<h3><?php echo $this->outputdata['shop'];

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
        <th>
            Was
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/detail/<?php echo $this->outputdata['shop_id']; ?>/sort/name/ASC'><i
                        class="fas fa-chevron-up"></i></a>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/detail/<?php echo $this->outputdata['shop_id']; ?>/sort/name/DESC'><i
                        class="fas fa-chevron-down"></i></a>
        </th>
        <th>
            Bearbeiten
        </th>
        <th>
            Kategorie <a
                    href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/detail/<?php echo $this->outputdata['shop_id']; ?>/sort/kategorie/ASC'><i
                        class="fas fa-chevron-up"></i></a>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/detail/<?php echo $this->outputdata['shop_id']; ?>/sort/kategorie/DESC'><i
                        class="fas fa-chevron-down"></i></a>
        </th>

    </tr>
    </thead>
    <tbody>

    <?php

    if (array_key_exists('params', $this->outputdata)) {
        $urlpart = '/sort/' . $this->outputdata['params'][2] . '/' . $this->outputdata['params'][3];
        $minus = 2;
    } else {
        $urlpart = '';
        $minus = 1;
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
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/edit/<?php echo $this->outputdata['data'][$i]['id']; ?>'>
                    <i class='fas fa-pen'></i></a>
                &nbsp;&nbsp;&nbsp;

                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/toTruhe/<?php echo $this->outputdata['data'][$i]['id']; ?>'><i
                            class='fas fa-box'></i></a>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp
                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/buyByID/<?php echo $this->outputdata['data'][$i]['id']; ?>/<?php echo $this->outputdata['shop_id']; ?>'><i
                            class="fas fa-shopping-cart"></i></a>&nbsp;&nbsp&nbsp

                <a href='http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/shop/deleteArtikelbyid/<?php echo $this->outputdata['data'][$i]['id']; ?>/<?php echo $this->outputdata['shop_id']; ?>'><i
                            class='fas fa-trash'></i></a>

            </td>

            <td>
                <?php echo $this->outputdata['data'][$i]['kategorie']; ?>
            </td>


            </tr>
        <?php }
    } ?>


    </tbody>
</table></p><a
        href="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/print/shop/<?php echo $this->outputdata['shop_id']; ?><?php echo $urlpart; ?>"
        class="btn btn-primary">Drucken</a>
