<!-- ******* TEMPLATE DE NODE POUR PAGE BTS ET ENTREPRISE *********************** -->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">

      <!--_______________________ COLONNE 1 __________________ -->
      <div id="colonne-1" class="col1_layout_550_405 pageBTS border-R-vert">
      <?php  print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="title"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>   


 <?php if (!$page): ?>
      <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
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
           

         <?php/*
          * Le code PHP est remplacé par une vue de type bloc
          * insérée via l'UI avec une restriction d'affichage 
          * sur le node/111
          */
        ?>
       
        <?php
 $theme_path = drupal_get_path('theme', 'cyranod7_pf');
 include ($theme_path.'/includes/inc_region_col_C1.php');
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
     </div><!-- /Col1 -->

<!--_______________________ COLONNE 2 __________________ -->
      <div id="colonne-2" class="col2_layout_550_405 pageBTS">
         
<?php
 $theme_path = drupal_get_path('theme', 'cyranod7_pf');
 include ($theme_path.'/includes/inc_objectif_bts.php');
 ?>

  <?php
 $theme_path = drupal_get_path('theme', 'cyranod7_pf');
 include ($theme_path.'/includes/inc_region_col_C2.php');
 ?>

      </div><!-- /Col2 -->
  </div> <!-- /node-inner -->
</div> <!-- /node-->