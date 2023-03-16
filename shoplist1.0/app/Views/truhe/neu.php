<h2>Was gibt es neues in der Truhe</h2>
<p> <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           Anzahl
                          </th>
                          <th>
                          Was
                          </th>
						  <th>
                          reingelegt am
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
                       <form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/insertNeu" method="post">
						<?php for ($k=0;$k<=6;$k++ ) {?>
						<tr>

						<td>


						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="" name="anzahl<?php echo $k; ?>">
						</td>
						<td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name" name="name<?php echo $k; ?>">
						</td>
            <td>
            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name" name="reingelegt<?php echo $k; ?>" value="<?php echo $this->outputdata['heute']; ?>">
            </td>
            <td>
            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="01.99" name="abgelaufen<?php echo $k; ?>" value="01.99">
            </td>
						<td>
						<select class="form-control" id="exampleFormControlSelect1" name="kategorie<?php echo $k; ?>">
						<?php for($i=0; $i<count($this->outputdata['kategorien']) ;$i++)  {?>
						<option><?php echo $this->outputdata['kategorien'][$i]['name']; ?></option>
						<?php } ?>
						</select>
						</td>


						</tr>
						<?php  }?>


                      </tbody>
                    </table>
					<div class="col-4">
                           <button type="submit" class="btn btn-primary mb-2">Erstellen</button></form></td></div></p>
					<br />
					<hr />
					<br />
