<?php

/*
 * Tableau pour afficher les objectifs BTS (pdf) sans limite 
 * de nombre.
 */
?>
<?php
$rows = array();
foreach($node->field_fichier_joint_rp as $file) {
  if ($file['und']['0']['value']) {
      $rows[] = array($file['view']['0']['value']);
    }
}
$output = theme('table', array('rows' => $rows, 'attributes' => array('class' => 'table-fichier_joint_rp')));
print $output;
?>