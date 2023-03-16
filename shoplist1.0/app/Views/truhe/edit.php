<?php //dnd($this->outputdata);?>
<h2>Bearbeiten</h2>
<p> <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           Anzahl
                          </th>
                          <th>
                           Inhalt
                          </th>
						  <th>
                          reingelegt
						  </th>
						   <th>
                          läuft ab am
						  </th>
						    <th>
                          Kategorie
						  </th>
                        </tr>
                      </thead>
                      <tbody>
                       <form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/update/<?php echo $this->outputdata['byID'][0]['id']; ?>" method="post">

						<tr>

						<td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="" name="anzahl" value="<?php echo $this->outputdata['byID'][0]['anzahl']; ?>">
						</td>
						<td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name" name="name"value="<?php echo $this->outputdata['byID'][0]['name']; ?>">
						</td>
            <td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="" name="reingelegt" value="<?php echo $this->outputdata['byID'][0]['reingelegt']; ?>">
						</td>
						<td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name" name="abgelaufen"value="<?php echo $this->outputdata['byID'][0]['abgelaufen']; ?>">
						</td>
						<td>
						<select class="form-control" id="exampleFormControlSelect1" name="kategorie">

						<option><?php echo $this->outputdata['byID'][0]['kategorie']; ?></option>
						 <?php  for ($i=0;$i<count($this->outputdata['navi']['truheKategorien']);$i++) {?>
							<option><?php echo $this->outputdata['navi']['truheKategorien'][$i]['name']; ?></option>
						 <?php } ?>

						</select>
						</td>


						</tr>


                      </tbody>
                    </table>
					<div class="col-4">
                           <button type="submit" class="btn btn-primary mb-2">Ändern</button></form></td></div></p>
					<br />
					<hr />
					<br />
