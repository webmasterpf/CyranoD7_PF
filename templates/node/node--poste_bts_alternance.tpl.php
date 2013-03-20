<!--_________ NODE TEMPLATE POUR ANNONCE BTS -->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
       <!--______________COLONNE 1________________ -->
        <?php /* choix du layout selon nombre de colonne
         * Pour les colonnes : .col pour avoir la liste
         * 
         * Pour les border : .border- pour avoir la liste
         */?>
        <div id="colonne-1" class="col1_layout_175_490_270">

        <?php  print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="title rouge"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
            
            
             <?php
              $theme_path = drupal_get_path('theme', 'NOM_THEME');
              include ($theme_path.'/includes/inc_region_col_C1.php');
              ?>
        </div><!--_/C1_ -->
          <!--______________COLONNE 2________________ -->
         <!-- <pre> <?php //print_r($node); ?> </pre>-->   <!-- listage des variables du $content -->
        <div id="colonne-2" class="col2_layout_175_490_270 border-noir-vert">
   <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>

    <?php print $user_picture; ?>
		    
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
    <?php endif; ?>
      

  <!-- Tableau infos offre -->

       <table class="table-poste-bts">
           <tr class="line1">
               <td>  <?php  print $node->content['field_reference_pbts']['field']['#title']  ?></td>
               <td>  <?php  print render($content['field_reference_pbts']);?></td>

           </tr>
              <tr class="line2">
               <td>  <?php print $node->taxonomy_vocabulary_8['und'][0]['taxonomy_term']->vocabulary_name;?></td>
               <td>  <?php  print render($content['field_lieu_poste_bts']);?></td>
               
           </tr>
              <tr class="line1">
                 
                  <td> BTS associ&eacute;</td>
               <td><?php print $node->taxonomy_vocabulary_8['und'][0]['taxonomy_term']->name;?></td>
               
               
           </tr>
              <tr class="line2">
               <td>  <?php  print $node->content['field_domaine_activite_bts']['field']['#title'] ?></td>
               <td>  <?php  print render($content['field_domaine_activite_bts']);?></td>
               
           </tr>
             <tr class="line1">
               <td>  Etat du recrutement</td>
               <td class="etat"><?php print $node->taxonomy_vocabulary_7['und'][0]['taxonomy_term']->name;?></td>

           </tr>
            <tr class="line2">
               <td> Postuler à l'offre</td>
               <td> <?php print '<a href=/node/184?destinataire='.$node->field_centre_bts['und'][0]['value'].
                    '&ref_offre='.$node->field_reference_pbts['und'][0]['value'].'>ICI</a>';?></td>

           </tr>
          
       </table>
<!--______________ CONTENU ________________ -->
            <div class="content">
                <?php 
  	    // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
       ?>
            </div>

 <?php //region colonne C2
$theme_path = drupal_get_path('theme', 'cyranod7_pf');
include ($theme_path.'/includes/inc_region_col_C2.php');
?>
</div><!--_/C2_ -->
 <!--______________COLONNE 3________________ -->
        <div id="colonne-3" class="col3_layout_175_490_270">
    <?php //region colonne C3
$theme_path = drupal_get_path('theme', 'cyranod7_pf');
include ($theme_path.'/includes/inc_region_col_C3.php');
?>

            </div><!--_/C3_ -->
  <?php if (!empty($content['links']['terms'])): ?>
      <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>
  	
    <?php if (!empty($content['links'])): ?>
	    <div class="links"><?php print render($content['links']); ?></div>
	  <?php endif; ?>

  </div> <!-- /node-inner -->
</div> <!-- /node-->