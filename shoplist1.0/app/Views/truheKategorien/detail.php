<h3><?php echo $this->outputdata['kategorie']; ?></h3>
  	<p> <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Anzahl
                          </th>
                          <th>
                            Was   <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truheKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/name/ASC'><i class="fas fa-chevron-up"></i></a>
                                  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truheKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/name/DESC'><i class="fas fa-chevron-down"></i></a>
                          </th>
                          <th>
                            reingelegt am <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truheKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/reingelegttimestamp/ASC'><i class="fas fa-chevron-up"></i></a>
                                  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truheKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/reingelegttimestamp/DESC'><i class="fas fa-chevron-down"></i></a>
                          </th>
						   <th>
                            läuft ab am<a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truheKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/abgelaufentimestamp/ASC'><i class="fas fa-chevron-up"></i></a>
                                  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truheKategorien/detail/<?php echo $this->outputdata['kategorie_id']; ?>/sort/abgelaufentimestamp/DESC'><i class="fas fa-chevron-down"></i></a>
                          </th>
						  <th>
                          Bearbeiten
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  if (!is_array($this->outputdata['data'])) { echo "<tr><td>Es gibt noch keine Einträge</tr></td>";} else{
            						for($i=0;$i<count($this->outputdata['data']); $i++) { ?>
						<td><?php echo $this->outputdata['data'][$i]['anzahl']; ?></td>
            <td><?php echo $this->outputdata['data'][$i]['name']; ?></td>
            <td><?php echo $this->outputdata['data'][$i]['reingelegt']; ?></td>
            <td><?php echo $this->outputdata['data'][$i]['abgelaufen']; ?></td>
            <td>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/edit/<?php echo $this->outputdata['data'][$i]['id']; ?>'> <i class='fas fa-pen'></i></a>
            &nbsp;&nbsp;&nbsp;
            <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/deleteByID/<?php echo $this->outputdata['data'][$i]['id']; ?>'><i class='fas fa-trash'></i></a>
          </td>
						  </tr>
            <?php } }?>

                      </tbody>
                    </table></p>
