<h3>Archiv</h3>
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

                        </tr>
                      </thead>
                      <tbody>
              <?php for($i=0;$i<count($this->outputdata)-1; $i++) { ?>
						<td><?php echo $this->outputdata[$i]['anzahl']; ?></td>
            <td><?php echo $this->outputdata[$i]['name']; ?></td>
            <td><?php echo $this->outputdata[$i]['reingelegt']; ?></td>
            <td><?php echo $this->outputdata[$i]['abgelaufen']; ?></td>


						  </tr>
            <?php } ?>

                      </tbody>
                    </table></p>
                    <form action="http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truheArchiv/delete" method="post">
                      <div class="col-4">
                                       <button type="submit" class="btn btn-primary mb-2">Archiv löschen</button></form></td></div>
