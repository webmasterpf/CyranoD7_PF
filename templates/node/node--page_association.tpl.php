<?php
/* Ce template permet la création d'un layout multicolonne pour le spages de base, en permettant la disposition facile
 * des champs CCK custom, si nécessaires pour une page de base.
*/?>
<!--______________NODE TPL POUR PAGE.TPL ASSOCIATION CUSTOM________________ -->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
	<div class="node-inner">
        <!--______________COLONNE 1________________ -->
      
        <div id="colonne-1" class="col1_layout_185_560_200 pageAssociation">

        <?php  print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="title-association"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
            
            
             <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_region_col_C1.php');
              ?>
        </div><!--_/C1_ -->
      
  
      
        <!--______________COLONNE 2________________ -->
         <!-- <pre> <?php //print_r($node); ?> </pre>-->   <!-- listage des variables du $content -->
        <div id="colonne-2" class="col2_layout_185_560_200 pageAssociation border-L-bleu">
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
              <?php if (!empty($page['centralBloc'])): ?>
                <div id="middleGalerie"><?php print render ($page['centralBloc']); ?></div>
              <?php endif; ?>

                <?php if (!empty($page['centre_partenaire'])): ?>
         <div id="centre-asso">
            <?php print render ($page['centre_partenaire']); ?>
          </div>
             <?php endif; ?>
          
                 <?php //region colonne C2
$theme_path = drupal_get_path('theme', 'cyranod7_pf');
include ($theme_path.'/includes/inc_region_col_C2.php');
?>      
                
                <!-- retour haut selon resolution de l'ecran -->
          <a href="#general" id="retour_haut">Haut de page</a>
            </div>

        </div><!--_/C2_ -->

        <!--______________COLONNE 3________________ -->
        <div id="colonne-3" class="col3_layout_185_560_200 pageAssociation">
           

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