<?php

/*
 * Tableau pour afficher les objectifs BTS (pdf) sans limite 
 * de nombre.
 */
?>
<?php
$rows = array();
foreach($node->field_fichier_joint_rp as $file) {
  if ($file['filename']) {
      $rows[] = array($file['filename']);
    }
}
$output = theme('table', array('rows' => $rows, 'attributes' => array('class' => 'table-fichier_joint_rp')));
print $output;
?>