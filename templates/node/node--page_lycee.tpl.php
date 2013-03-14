<!-- ************************ NODE.TPL POUR PAGE LYCEE *****************-->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
 <!-- ______________________ COLONNE GAUCHE _______________________ -->


 <div id="colonne-1" class="col1_layout_340_305_300 pageLycee border-R-orangePF">
            
<?php if (!empty($content['field_lycee_logocoordtxt'])): ?>
       <span id="lycee-coordlogo">
<?php print render($content['field_lycee_logocoordtxt']);?>
         </span>
<?php endif; ?>
              
       <br clear="all"/>      
       
<?php if (!empty($content['field_lycee_form'])): ?>
   <span id="lycee-formation">
<?php print render($content['field_lycee_form']);?>
      </span>
<?php endif; ?>

    
<?php
$theme_path = drupal_get_path('theme', 'cyranod7_pf');
include ($theme_path.'/includes/inc_region_col_C1.php');
?>
             
         
        </div><!-- /col-1 -->
		
   <!--______________COLONNE CENTRALE________________ -->
 <div id="colonne-2" class="col2_layout_340_305_300 pageLycee">

      <?php  print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="titre-fiche-bts"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
    <?php print $user_picture; ?>
		    
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
    <?php endif; ?>
      
     
      <br clear="all"/>

       <div class="content">
                <?php 
  	    // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
       ?>
 </div>
    <?php if (!empty($content['links']['terms'])): ?>
      <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>
  	
    <?php if (!empty($content['links'])): ?>
	    <div class="links"><?php print render($content['links']); ?></div>
	  <?php endif; ?>
           
<!-- retour haut selon resolution de l'ecran -->
          <a href="#general" id="retour_haut">Haut de page</a>

   
      </div><!-- /col-2 -->
<!-- ______________________ COLONNE DROITE _______________________ -->

<div id="colonne-3" class="col3_layout_340_305_300 pageLycee">
                    
<?php if (!empty($content['field_diapo_lycee_type'])): ?>
      <span id="diapo-lycee">
<?php print render($content['field_diapo_lycee_type']);?>
         </span>
<?php endif; ?>
    
             
             
       <br clear="all"/>         
           
       <?php if (!empty($content['field_lycee_gmap'])): ?>
      <span id="gmap-lycee">
<?php print render($content['field_lycee_gmap']);?>
         </span>
<?php endif; ?>
 
    
  <?php
$theme_path = drupal_get_path('theme', 'cyranod7_pf');
include ($theme_path.'/includes/inc_region_col_C3.php');
?>

    
  <br clear="all"/>
    
</div><!-- /col-3 -->
  </div> <!-- /node-inner -->
</div> <!-- /node-->