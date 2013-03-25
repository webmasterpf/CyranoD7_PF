<!-- ************************ NODE.TPL POUR FICHE BTS *****************-->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
 <!-- ______________________ COLONNE GAUCHE _______________________ -->
<div id="colonne-1" class="col1_layout_315_650 ficheBts">

    <?php print render($title_prefix); ?>
    <?php if ($title): ?><h1 class="titre-fiche-bts"><?php print $title; ?></h1><?php endif; ?>
    <?php print render($title_suffix); ?>
    <br clear="all"/>

    <?php if (!empty($content['field_abreviation_bts'])): ?>
        <span id="abreviation-bts">
            <?php print render($content['field_abreviation_bts']); ?>
        </span>
    <?php endif; ?>
            
         
       <br clear="all"/>
      
      <?php if (!empty($content['field_complement_fiche_bts'])): ?>
           <span id="complement-bts">
               <?php print render($content['field_complement_fiche_bts']); ?>
           </span>
       <?php endif; ?>
    
      <br clear="all"/>
      <?php if (!empty($content['field_illus_fiche_bts'])): ?>
          <div id="illus-fiche-bts">
              <?php print drupal_render(field_view_field('node', $node, 'field_illus_fiche_bts', 'PF_illus_bts_290x150')); ?>
          </div>
      <?php endif; ?>

      <?php if (!empty($content['field_intro_fiche_bts'])): ?>
          <div id="intro-fiche-bts">
             <?php print render($content['field_intro_fiche_bts']); ?>
          </div>
      <?php endif; ?>
      
          <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_region_col_C1.php');
              ?>
 
      
         </div><!--_/C1_ -->
   <!--______________COLONNE CENTRALE________________ -->
   <div id="colonne-2" class="col2_layout_315_650 ficheBts border-L-anthracite">
   <?php print $user_picture; ?>
		    
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
    <?php endif; ?>
    <!-- Table infos pratiques -->  
      <table id="infos-pratiques-bts">
          <tbody>
              <tr>
                  <td class="col1">
                      <h4>Des liens...</h4>
                      <?php
 $theme_path = drupal_get_path('theme', 'cyranod7_pf');
 include ($theme_path.'/includes/inc_fiche_bts_liste_liens.php');
 ?>
                  </td>
                  <td class="col2">
         <h4>En détail...</h4>
         <?php if (!empty($content['field_detail_fiche_bts'])): ?>
        <div id="fiche-detaille-bts">
                <?php  print render ($content['field_detail_fiche_bts']);?>
        </div>
   <?php endif; ?>
                  </td>
<td class="col3">
    <h4>Utile...</h4>
    <div id="taxonomy">
        <ul>
            <li><?php
         $info = field_info_instance('node', 'taxonomy_vocabulary_2', 'fiche_bts');
         print $info['label'] .':'.print $node->taxonomy_vocabulary_2['und'][0]['taxonomy_term']->name;
         ?></li>                              
            <li><?php
                $tid = $node->taxonomy_vocabulary_3['und'][0]['tid'];
               
         ?></li>
            <li>  <?php
                print render($content['taxonomy_vocabulary_6']);
         ?></li>
        </ul>                          
    </div>
                          
                  </td>
              </tr>

          </tbody>

      </table>
<!-- ********* CONTENT ******** -->
    <div class="content bodyfield-content-bts">
                <?php 
  	    // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
       ?>
    
    </div>
   
     <?php
              $theme_path = drupal_get_path('theme', 'cyranod7_pf');
              include ($theme_path.'/includes/inc_region_col_C2.php');
              ?>
 <br clear="all"/>
 <?php if (!empty($content['field_info_plus_bts'])): ?>
  <div id="info-plus-fiche-bts">
      <h3>En savoir plus...</h3>
  <?php  print render ($content['field_info_plus_bts']);?>
  </div>
        <?php endif; ?> 
<!-- retour haut selon resolution de l'ecran -->
          <a href="#general" id="retour_haut">Haut de page</a>
          
   <?php if (!empty($content['links']['terms'])): ?>
      <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>
  	
    <?php if (!empty($content['links'])): ?>
	    <div class="links"><?php print render($content['links']); ?></div>
	  <?php endif; ?>
            
      </div>

  </div> <!-- /node-inner -->
</div> <!-- /node-->
<?php
//$theme_path = drupal_get_path('theme', 'cyranod7_pf');
//include ($theme_path . '/includes/inc_debug_theme.php');
?>