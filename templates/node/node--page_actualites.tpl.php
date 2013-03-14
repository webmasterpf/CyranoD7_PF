<?php
/* Template pour la page actualité - redesign façon newspaper/magazine
 * Start Juillet 2011
 */?>
<!-- ************ NODE TEMPLATE PAGE ACTU REDESIGN ****************** -->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
         <?php  print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="title"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
<!-- ______________________ COLONNE REVUE PRESSE _______________________ -->
<div id="colonne-1" class="col1_layout_375_375_220 rp_actu_globale">
     <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_vue_actu_globale_rp.php');
              ?>
   
    <br clear="all"/>
    <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_vue_actu_globale_rp_petit.php');
              ?>
    
    <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_region_col_C1.php');
              ?>
    
</div>
<!-- ______________________ COLONNE ACTUS ASSO _______________________ -->
<div id="colonne-2" class="col2_layout_375_375_220 actu_asso_actu_globale">

    <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_vue_actu_globale_actuasso.php');
              ?>
     
     <br clear="all"/>
     <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_vue_actu_globale_actuasso_petit.php');
              ?>
     
     
     <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_region_col_C2.php');
              ?>
        
</div>
<!-- ______________________ COLONNE INFOS FIXES RSS _______________________ -->
<div id="colonne-3" class="col3_layout_375_375_220 infos_fixes_actu_globale border-L-bleu pageActu">

       <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_region_col_C3.php');
              ?>
    
         <div class="content">
                <?php 
  	    // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
       ?>
            </div>

</div>
<br clear="all"/>

  <?php print $user_picture; ?>
		    
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
    <?php endif; ?>


    <?php if (!empty($content['links']['terms'])): ?>
    <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>
  	
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

  </div> <!-- /node-inner -->
</div> <!-- /node-->