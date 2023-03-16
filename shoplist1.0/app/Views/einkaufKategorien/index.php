<p><h4>Kategorien</h4> <table class="table table-striped">
                      <thead>
                        <tr><th>
                           Name
                          </th>
                          <th>
                            Bearbeiten
                          </th>

                        </tr>
                      </thead>
                      <tbody>

						<?php

						if ($this->outputdata == false) { echo "<tr><td>Es gibt noch keine Einträge</tr></td>";} else{
						for($i=0;$i<count($this->outputdata)-1; $i++)
						{
							echo "<td>".$this->outputdata[$i]['name']."</td>";
							if($i !== 0){?>
							<td>
							<a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/einkaufKategorien/edit/<?php echo $this->outputdata[$i]['id']; ?>'> <i class='fas fa-pen'></i></a>
							&nbsp;&nbsp;&nbsp;
							<a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/einkaufKategorien/deleteByID/<?php echo $this->outputdata[$i]['id']; ?>'><i class='fas fa-trash'></i></a>
							</td>
							<?php
							}else {echo "<td></td>";}
							echo "</tr>";

						}
						}

						?>

                      </tbody>
                    </table></p>
					<br />
					<hr />
					<br />

					<h3>neue Kategorie</h3>

					<form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/einkaufKategorien/neu" method="post">
					<div class="row"><div class="col-5">
                      <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name" name="name" required="true">
               </div>


                          <div class="col-4">
                           <button type="submit" class="btn btn-primary mb-2">Erstellen</button></form></td></div>
                      </p>
