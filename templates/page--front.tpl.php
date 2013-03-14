<?php
$theme_path = drupal_get_path('theme', 'cyranod7_pf');
include ($theme_path.'/includes/inc_header.php');
?>
<!-- ______________________ LAYOUT HOMEPAGE _______________________ -->
 
<!-- ______________________ CONTENU _______________________ -->
    
	<div id="mainPage">
	
      <div id="contentHome">
   

           <?php if ($page ['content_top']): ?>
            <div id="content-top">
              <?php print render ($page ['content_top']); ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>

          <?php if ($page['annonceImg']): ?>
            <div id="content-areaHaut">
     <div id="annonceImg"><?php print render ($page['annonceImg']); ?></div>
            </div> <!-- /#content-areaHaut -->
          <?php endif; ?>

                 <?php if ($page['blocLycee']): ?>
                 <div id="blocLycee"><?php print render ($page['blocLycee']); ?></div>
              <?php endif; ?>
                

          </div><!-- /contentHome -->
		  
		  
	  
	  
	   <!-- ______________________ EDITO DROITE _______________________ -->
      
	  
	  <div id="contentAnim"> 		
        <?php if ($page['Anim']): ?>
            <div id="textAnim"><?php print render ($page['Anim']); ?></div><!-- /#textAnim -->
        <?php endif; ?>
		
      </div><!-- /#contentAnim -->
	  
   
	<br clear="all"/>
	<!-- ______________________ CONTENU BAS _______________________ -->
 <?php if ($page ['content_bottom_home']): ?>
    <div id="content-bottom-home">
      <?php print render ($page ['content_bottom_home']); ?>
         <?php print $feed_icons; ?>
    </div><!-- /#content-bottom -->
    <?php endif; ?>
    
    <?php if ($page ['content_bottom']): ?>
            <div id="content-bottom">
              <?php print ($page ['content_bottom']); ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>
        
	
	 </div> <!-- /mainPage -->

<?php
$theme_path = drupal_get_path('theme', 'cyranod7_pf');
include ($theme_path.'/includes/inc_footer.php');
?>
 