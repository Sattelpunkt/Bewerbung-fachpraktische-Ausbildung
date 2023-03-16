<h3>Truhe</h3>
<?php //dnd($this->outputdata); ?>
  	<p> <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Anzahl
                          </th>
                          <th>
                            Was <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/name/ASC'><i class="fas fa-chevron-up"></i></a>
                                  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/name/DESC'><i class="fas fa-chevron-down"></i></a>
                          </th>
                          <th>
                            reingelegt am <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/reingelegttimestamp/ASC'><i class="fas fa-chevron-up"></i></a>
                                  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/reingelegttimestamp/DESC'><i class="fas fa-chevron-down"></i></a>
                          </th>
						   <th>
                            läuft ab am  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/abgelaufentimestamp/ASC'><i class="fas fa-chevron-up"></i></a>
                                  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/abgelaufentimestamp/DESC'><i class="fas fa-chevron-down"></i></a>
                          </th>
						  <th>
                            Kategorie  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/kategorie/ASC'><i class="fas fa-chevron-up"></i></a>
                                  <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/index/sort/kategorie/DESC'><i class="fas fa-chevron-down"></i></a>
                          </th>
						  <th>
                          Bearbeiten
                          </th>
                        </tr>
                      </thead>
                      <tbody>
              <?php for($i=0;$i<count($this->outputdata)-1; $i++) { ?>
						<td><?php echo $this->outputdata[$i]['anzahl']; ?></td>
            <td><?php echo $this->outputdata[$i]['name']; ?></td>
            <td><?php echo $this->outputdata[$i]['reingelegt']; ?></td>
            <td><?php echo $this->outputdata[$i]['abgelaufen']; ?></td>
            <td><?php echo $this->outputdata[$i]['kategorie']; ?></td>
            <td>
            <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/edit/<?php echo $this->outputdata[$i]['id']; ?>'> <i class='fas fa-pen'></i></a>
            &nbsp;&nbsp;&nbsp;
            <a href='http://<?php echo $_SERVER['HTTP_HOST'].'/'.PN; ?>/truhe/deleteByID/<?php echo $this->outputdata[$i]['id']; ?>'><i class='fas fa-trash'></i></a>
          </td>
						  </tr>
            <?php } ?>

                      </tbody>
                    </table></p>
