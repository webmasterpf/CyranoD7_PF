<?php
/**
 * Desormais les templates suggestions sont incluses dans le core donc voici comment cela fonctionne:
http://drupal.org/node/1089656
 *
 * Les fonctions de base sont issues de Basic.
 * penser à renommer avec le nom du theme.Nom du theme courant : cyranod7_pf

// */
?>
<?php

/*
 * Here we override the default HTML output of drupal.
 * refer to http://drupal.org/node/550722
 */

// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('clear_registry')) {
  // Rebuild .info data.
  system_rebuild_theme_data();
  // Rebuild theme registry.
  drupal_theme_rebuild();
}
// Add Zen Tabs styles
if (theme_get_setting('cyranod7_pf_tabs')) {
  drupal_add_css( drupal_get_path('theme', 'cyranod7_pf') .'/css/tabs.css');
}

function cyranod7_pf_preprocess_page(&$vars, $hook) {
  if (isset($vars['node_title'])) {
    $vars['title'] = $vars['node_title'];
  }
  // Adding a class to #page in wireframe mode
  if (theme_get_setting('wireframe_mode')) {
    $vars['classes_array'][] = 'wireframe-mode';
  }
  // Adding classes wether #navigation is here or not
  if (!empty($vars['main_menu']) or !empty($vars['sub_menu'])) {
    $vars['classes_array'][] = 'with-navigation';
  }
  if (!empty($vars['secondary_menu'])) {
    $vars['classes_array'][] = 'with-subnav';
  }
}

function cyranod7_pf_preprocess_node(&$vars) {
  // Add a striping class.
  $vars['classes_array'][] = 'node-' . $vars['zebra'];
}

function cyranod7_pf_preprocess_block(&$vars, $hook) {
  // Add a striping class.
  $vars['classes_array'][] = 'block-' . $vars['zebra'];
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function cyranod7_pf_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('cyranod7_pf_breadcrumb');
  if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {

    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('cyranod7_pf_breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }

    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $breadcrumb_separator = theme_get_setting('cyranod7_pf_breadcrumb_separator');
      $trailing_separator = $title = '';
      if (theme_get_setting('cyranod7_pf_breadcrumb_title')) {
        $item = menu_get_item();
        if (!empty($item['tab_parent'])) {
          // If we are on a non-default tab, use the tab's title.
          $title = check_plain($item['title']);
        }
        else {
          $title = drupal_get_title();
        }
        if ($title) {
          $trailing_separator = $breadcrumb_separator;
        }
      }
      elseif (theme_get_setting('cyranod7_pf_breadcrumb_trailing')) {
        $trailing_separator = $breadcrumb_separator;
      }

      // Provide a navigational heading to give context for breadcrumb links to
      // screen-reader users. Make the heading invisible with .element-invisible.
      $heading = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

      return $heading . '<div class="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb) . $trailing_separator . $title . '</div>';
    }
  }
  // Otherwise, return an empty string.
  return '';
}

/*
 * 	Converts a string to a suitable html ID attribute.
 *
 * 	 http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 * 	 valid ID attribute in HTML. This function:
 *
 * 	- Ensure an ID starts with an alpha character by optionally adding an 'n'.
 * 	- Replaces any character except A-Z, numbers, and underscores with dashes.
 * 	- Converts entire string to lowercase.
 *
 * 	@param $string
 * 	  The string
 * 	@return
 * 	  The converted string
 */


function cyranod7_pf_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
  // If the first character is not a-z, add 'n' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id'. $string;
  }
  return $string;
}

/**
 * Generate the HTML output for a menu link and submenu.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @return
 *   A themed HTML string.
 *
 * @ingroup themeable
 */

function cyranod7_pf_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  // Adding a class depending on the TITLE of the link (not constant)
  $element['#attributes']['class'][] = cyranod7_pf_id_safe($element['#title']);
  // Adding a class depending on the ID of the link (constant)
  $element['#attributes']['class'][] = 'mid-' . $element['#original_link']['mlid'];
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Override or insert variables into theme_menu_local_task().
 */
function cyranod7_pf_preprocess_menu_local_task(&$variables) {
  $link =& $variables['element']['#link'];

  // If the link does not contain HTML already, check_plain() it now.
  // After we set 'html'=TRUE the link will not be sanitized by l().
  if (empty($link['localized_options']['html'])) {
    $link['title'] = check_plain($link['title']);
  }
  $link['localized_options']['html'] = TRUE;
  $link['title'] = '<span class="tab">' . $link['title'] . '</span>';
}

/*
 *  Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */

function cyranod7_pf_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;

}
/**
     * Override or insert variables into the html template.Donne le page title
     */
    function cyranod7_pf_preprocess_html(&$vars) {
      global $theme_path;
      // Add conditional CSS for IE7 and below.
      drupal_add_css($theme_path . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
      $vars['head_title'] = implode(' | ', array(drupal_get_title(), variable_get('site_name'), variable_get('site_slogan')));  
    }


/*_______________FONCTIONS POUR ACTION SUR AGGREGATOR____________*/
/* modify link items in the aggregator to open in a new window and
suppress the "blog it" icon & links should the module ever be enabled.
(Code removed--not commented out--from this copy of the original function.)
 * drupal.org/node/573054 */
function Cyranod7_PF_aggregator_block_item($variables) {
  $link = check_url($variables['item']->link);
  $title = check_plain($variables['item']->title);

  // I prefer sprintf to string concatenation.
  return sprintf('<a target="feed-news" href="%s">%s</a>',
                 $link,
                 $title);
}
/**Enleve le lien en savoir plus - NE PAS OUBLIER DE CHANGER LE NOM DU THEME !!!___*/
function CyranoD7_PF_more_link ($url, $title) {
  if (stristr( $url, 'aggregator')) {
    return "";
  }
}
/* Fonction pour splitter le contenu de $body en plusieurs colonnes
 * S'utilise en insérant dans le node.tpl
 * $output = CyranoD7_PF_split_bodycontent ($content);
    print $output;
 * dans le node-custom.tpl et en ajoutant le tag <columns> dans le corps du node
 */
function CyranoD7_PF_split_bodycontent ($colcontent) {
    $coloutput =  "";
    $string = "<columns>";
    $columns = explode($string,$colcontent); // cut the text for splitting the body into columns

    $i = 0;
    foreach($columns as $cle=>$valeur) {   //go through the array and add div to contents when necessary

        if ($i == 0) {

            $coloutput .= $valeur;
            $i ++;

        }

        else if ($i == 1) {
            $coloutput .= "<div class=\"column_".$i."\">".$valeur."</div>";
            $i = 2;
        }

        else {
            $coloutput .= "<div class=\"column_".$i."\">".$valeur."</div>";
            $i = 1;
        }

    }

    return $coloutput;
}    