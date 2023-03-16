<?php //dnd($this->outputdata);?>
<h2>Ab in die Truhe</h2>
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
                       <form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/newFromEinkauf/<?php echo $this->outputdata[0]['id']; ?>" method="post">

						<tr>

						<td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="" name="anzahl" value="<?php echo $this->outputdata[0]['anzahl']; ?>">
						</td>
						<td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name" name="name"value="<?php echo $this->outputdata[0]['name']; ?>">
						</td>
            <td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="" name="reingelegt" value="<?php echo $this->outputdata[0]['heute']; ?>">
						</td>
						<td>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="01.99" name="abgelaufen" value="01.99">
						</td>
						<td>
						<select class="form-control" id="exampleFormControlSelect1" name="kategorie">


						 <?php  for ($i=0;$i<count($this->outputdata['navi']['truheKategorien']);$i++) {?>
							<option><?php echo $this->outputdata['navi']['truheKategorien'][$i]['name']; ?></option>
						 <?php } ?>

						</select>
						</td>


						</tr>


                      </tbody>
                    </table>
					<div class="col-4">
                           <button type="submit" class="btn btn-primary mb-2">in die Truhe</button></form></td></div></p>
					<br />
					<hr />
					<br />
