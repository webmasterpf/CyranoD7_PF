<?php
/* 
 * Le header du site.Vient se placer aprés le <head>
 * 
 */

?>
  <div id="general">
 <!-- ______________________ PAGE TOP BANDEAU _______________________ -->
<?php if (!empty($page['bandeau1'])): ?>
<div id="bandeau-pagetop">
          <?php print render ($page['bandeau1']); ?>
         </div>
<?php endif; ?>
    <!-- ______________________ HEADER  CUSTOM_______________________ -->
	 <div id="header">

		<div id="header-inner">

        <div id="headHaut">

          <div id="logoHead">
	           <?php if (!empty($logo)): ?>
		           <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/></a>
	          <?php endif; ?>
	       </div>

         <div id="menuImg">
              <?php if (!empty($page ['navStatic'])): ?>
		           <?php print render ($page ['navStatic']); ?>
	          <?php endif; ?>
          </div>

          </div><!-- /headHaut -->
		 <div id="headBas">

	<?php if (!empty($page['site_slogan'])): ?>
          <div id="site-slogan">  <?php print render ($page['site_slogan']); ?></div>
        <?php endif; ?>

          


            <div id="headSearch">
		  <?php if (!empty($page ['search_box'])): ?>
		  <?php print render ($page ['search_box']); ?>
		  <?php endif; ?>
		  </div><!-- /recherche -->

                  <br clear="all">
          <div id="menuHead">
              

	        <?php if (!empty($page ['menu_dyn'])): ?>
			   <?php print render ($page ['menu_dyn']); ?>
            <?php endif; ?>

          </div><!-- /menuHead -->


		</div><!-- /headBas -->






	  </div> <!-- /header-inner -->
        
   </div> <!-- /header -->
