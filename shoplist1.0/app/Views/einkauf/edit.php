<?php
//dnd($this->outputdata);
?>
<h2>Bearbeiten</h2>
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
    <form action="http://<?php echo $_SERVER['HTTP_HOST'] . '/' . PN; ?>/home/update/<?php echo $this->outputdata[0]['id']; ?>"
          method="post">

        <tr>

            <td>


                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder=""
                       name="anzahl" value="<?php echo $this->outputdata[0]['anzahl']; ?>">
            </td>
            <td>

                <select class="form-control" id="exampleFormControlSelect1" name="gebinde">
                    <option><?php echo $this->outputdata[0]['gebinde']; ?></option>
                    <?php for ($i = 0; $i < count($this->outputdata['gebindeAll']); $i++) { ?>
                        <option><?php echo $this->outputdata['gebindeAll'][$i]['name']; ?></option>
                    <?php } ?>

                </select>


            </td>
            <td>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name"
                       name="name" value="<?php echo $this->outputdata[0]['name']; ?>">
            </td>
            <td>
                <select class="form-control" id="exampleFormControlSelect1" name="kategorie">

                    <option><?php echo $this->outputdata[0]['kategorie']; ?></option>
                    <?php for ($i = 0; $i < count($this->outputdata['storeKategorie']["kategorie"]); $i++) { ?>
                        <option><?php echo $this->outputdata['storeKategorie']["kategorie"][$i]['name']; ?></option>
                    <?php } ?>

                </select>
            </td>
            <td>
                <select class="form-control" id="exampleFormControlSelect1" name="shop">

                    <option><?php echo $this->outputdata[0]['shop']; ?></option>
                    <?php for ($i = 0; $i < count($this->outputdata['storeKategorie']["shop"]); $i++) { ?>
                        <option><?php echo $this->outputdata['storeKategorie']["shop"][$i]['name']; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>


            </td>
        </tr>


    </tbody>
</table>
<div class="col-4">
    <button type="submit" class="btn btn-primary mb-2">Ändern</button>
    </form></td></div></p>
<br/>
<hr/>
<br/>
