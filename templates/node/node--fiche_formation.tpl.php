<!--______________NODE TPL POUR FICHE FORMATION CUSTOM________________ -->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
	<div class="node-inner">
        <!--______________COLONNE 1________________ -->
        <?php /* choix du layout selon nombre de colonne
         * Pour les colonnes : .col pour avoir la liste
         * 
         * Pour les border : .border- pour avoir la liste
         */?>
        <div id="colonne-1" class="col1_layout_305_650 ficheFormation">

                <?php if ($page ['decoTitre']): ?>
            <div id="decoTitreImg">
              <?php print render ($page ['decoTitre']); ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>

                
    <?php  print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="title rouge"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
            
                
  <?php if (!empty($content['field_complement_info_formation'])): ?>
<div class="complement_titre_fiche">
    <?php  (print render ($content['field_complement_info_formation'])); /*Info complementaire sur formation*/ ?>
</div>
   <?php endif; ?>
            
             <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_region_col_C1.php');
              ?>
        </div><!--_/C1_ -->
      
 
      
        <!--______________COLONNE 2________________ -->
   <div id="colonne-2" class="col2_layout_305_650 ficheFormation border-L-bleu">
   <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>

    <?php print $user_picture; ?>
		    
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
    <?php endif; ?>
      
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

       
      <?php if (!empty($content['links']['terms'])): ?>
      <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>
  	
    <?php if (!empty($content['links'])): ?>
	    <div class="links"><?php print render($content['links']); ?></div>
	  <?php endif; ?>

    </div> <!-- /node-inner -->
</div> <!-- /node-->
