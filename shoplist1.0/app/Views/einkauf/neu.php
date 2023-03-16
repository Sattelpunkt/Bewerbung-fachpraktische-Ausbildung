<h2>Neuer Einkauf</h2>
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
            Inhalt
        </th>
        <th>
            Kategorie
        </th>
        <th>
            Shop
        </th>
    </tr>
    </thead>
    <tbody>
    <form action="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/insertNeu" method="post">
        <?php for ($k = 0; $k <= 6; $k++) { ?>
            <tr>

                <td>


                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder=""
                           name="anzahl<?php echo $k; ?>">
                </td>
                <td>

                    <select class="form-control" id="exampleFormControlSelect1" name="gebinde<?php echo $k; ?>">

                        <?php for ($i = 0; $i < count($this->outputdata['gebindeAll']); $i++) { ?>
                            <option><?php echo $this->outputdata['gebindeAll'][$i]['name']; ?></option>
                        <?php } ?>

                    </select>
                </td>
                <td>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name"
                           name="name<?php echo $k; ?>">
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" name="kategorie<?php echo $k; ?>">
                        <?php for ($i = 0; $i < count($this->outputdata['kategorie']); $i++) { ?>
                            <option><?php echo $this->outputdata['kategorie'][$i]['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <select class="form-control" id="exampleFormControlSelect1" name="shop<?php echo $k; ?>">

                        <?php for ($i = 0; $i < count($this->outputdata['shop']); $i++) { ?>
                            <option><?php echo $this->outputdata['shop'][$i]['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        <?php } ?>


    </tbody>
</table>
<div class="col-4">
    <button type="submit" class="btn btn-primary mb-2">Erstellen</button>
    </form></td></div></p>
<br/>
<hr/>
<br/>