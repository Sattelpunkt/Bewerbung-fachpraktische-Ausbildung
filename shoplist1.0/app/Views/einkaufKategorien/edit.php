<h2>Bearbeiten</h2>
<p> <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                          Name
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                       <form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/einkaufKategorien/update/<?php echo $this->outputdata[0]['id'] ?>" method="post">

						<tr>

						<td>


						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="name" value ="<?php echo $this->outputdata[0]['name'] ?>">
						</td>

						</tr>



                      </tbody>
                    </table>
					<div class="col-4">
                           <button type="submit" class="btn btn-primary mb-2">Ändern</button></form></td></div></p>
					<br />
					<hr />
					<br />
