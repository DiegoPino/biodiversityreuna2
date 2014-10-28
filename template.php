<?php

/**
 * @file
 * template.php
 */
//Add search icon to islandora solr simple search submit
//global $theme;
//dpm($theme)
function biodiversityreuna2_form_islandora_solr_simple_search_form_alter(&$form, &$form_state, $form_id)
	{	
		
		//$form['class'][]='form-horizontal';
		$form['simple']['submit']['#value'] = '<i class="fa fa-search fa-2x"></i>';
		$form['simple']['submit']['#attributes']=array('title' => t('Search'));
		$form['simple']['submit']['#attributes']['class']=array('btn-sm');
		$form['simple']['islandora_simple_search_query']['#attributes']=array('placeholder'=>t('Search our repository'));
		//$form['simple']['submit']['prefix']="<i class='icon-search' title='Search'></i>";
	}
	
/*	function locale_block_view($type) {
	  if (drupal_multilingual()) {
	    $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
	    $links = language_negotiation_get_switch_links($type, $path);

	    if (isset($links->links)) {
	      drupal_add_css(drupal_get_path('module', 'locale') . '/locale.css');
	      $class = "language-switcher-{$links->provider}";
	      $variables = array('links' => $links->links, 'attributes' => array('class' => array($class)));
	      $block['content'] = theme('links__locale_block', $variables);
	      $block['subject'] = t('Languages');
	      return $block;
	    }
	  }
	}*/
	
	
	
	function biodiversityreuna2_links__locale_block(&$variables) {
		
	    $links = $variables['links'];
		
		$variables['attributes']['class'][]='nav';
		$variables['attributes']['class'][]='pull-right';
		
	     $attributes = $variables['attributes'];
	     $heading = $variables['heading'];
	     global $language_url;
		 global $language;
	     $output = '';

	     if (count($links) > 0) {
	       // Treat the heading first if it is present to prepend it to the
	       // list of links.
	       if (!empty($heading)) {
	         if (is_string($heading)) {
	           // Prepare the array that will be used when the passed heading
	           // is a string.
	           $heading = array(
	             'text' => $heading,
          
	             // Set the default level of the heading.
	             'level' => 'h2',
	           );
	         }
	         $output .= '<' . $heading['level'];
	         if (!empty($heading['class'])) {
	           $output .= drupal_attributes(array('class' => $heading['class']));
	         }
	         $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
	       }

	       $output .= '<ul' . drupal_attributes($attributes) . '>';
		   $output .= '<li' . drupal_attributes(array('class' => array('dropdown','menu-item'))). '>';
           $output .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag"></i> '.$language->language.'</a>';
		    $output .= '<ul class="dropdown-menu">';
	       $num_links = count($links);
	       $i = 1;

	       foreach ($links as $key => $link) {
	         $class = array($key);
            
	         // Add first, last and active classes to the list of links to help out themers.
	         if ($i == 1) {
	           $class[] = 'first';
	         }
	         if ($i == $num_links) {
	           $class[] = 'last';
	         }
	         if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page())) && (empty($link['language']) || $link['language']->language == $language_url->language)) {
	           $class[] = 'active';
	         }
	         $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';
            
	         if (isset($link['href'])) {
	           // Pass in $link as $options, they share the same keys.
	           $output .= l($link['title'], $link['href'], $link);
	         }
	         elseif (!empty($link['title'])) {
	           // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
	           if (empty($link['html'])) {
	             $link['title'] = check_plain($link['title']);
	           }
	           $span_attributes = '';
	           if (isset($link['attributes'])) {
	             $span_attributes = drupal_attributes($link['attributes']);
	           }
	           $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
	         }

	         $i++;
	         $output .= "</li>\n";
	       }
		   $output .= '</ul>';
		   $output .= "</li>\n";
	       $output .= '</ul>';
	     }

	     return $output;
		
		
		
		
		
		/*$links = array();

	    foreach($variables['links'] as $link)
	    {
	        $link['title'] = $link['language']->language;
	        $links[] = $link;
	    }

	    $variables['links'] = $links;

	    $content = theme_links($variables);
		
	    <ul id="" class="nav pull-right">
	        <li class="dropdown menu-item">  
	         <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.strtoupper(ICL_LANGUAGE_CODE).'</a>
	          <ul class="dropdown-menu">';
        
	           $languages = icl_get_languages('skip_missing=0&orderby=code');
	           if(!empty($languages)){
	                   foreach($languages as $l){   
	                       echo ($l['active'] == 0 ? "<li><a href='".$l['url']."'>" . strtoupper($l['language_code']) ."</a></li>" : NULL);
	                   }
	           }   
	       echo '
	          </ul>
	        </li>
	       </ul>
		*/
		
		
		
		
	    
	}
	
	function biodiversityreuna2_menu_local_task($variables) {
		
		$link = $variables['element']['#link'];
		  $link_text = $link['title'];
          
		  if (!empty($variables['element']['#active'])) {
		    // Add text to indicate active tab for non-visual users.
		    $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

		    // If the link does not contain HTML already, check_plain() it now.
		    // After we set 'html'=TRUE the link will not be sanitized by l().
		    if (empty($link['localized_options']['html'])) {
		      $link['title'] = check_plain($link['title']);
		    }
		    $link['localized_options']['html'] = TRUE;
		    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
		  }
		  
          //Customize for Islandora
		  $fontawesome_icon="";
		  if (isset($link['page_callback']))
		  	{
		  		switch($link['page_callback'])
					{
						case 'islandora_view_object':
						 $link['localized_options']['html'] = TRUE;
						 $fontawesome_icon='<i class="fa fa-eye"></i>';
						break;
						case 'islandora_manage_overview_object':
						 $link['localized_options']['html'] = TRUE;
						 $fontawesome_icon='<i class="fa fa-cogs"></i>';
						break;
						case 'islandora_red_biodiversidad_map_display':
						 $link['localized_options']['html'] = TRUE;
						 $fontawesome_icon='<i class="fa fa-map-marker"></i>';
						break;
						case 'islandora_red_biodiversidad_dw_related_display':
						 $link['localized_options']['html'] = TRUE;
						 $fontawesome_icon='<i class="fa fa-sitemap"></i>';
						 break;
					}
		  	}
		  // if $link['islandora_view_object']['element'][
		  
		  
		   
		  return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>'.  l($fontawesome_icon.' '.$link_text, $link['href'], $link['localized_options']) . "</li>\n";
	}

function biodiversityreuna2_menu_local_tasks_alter(&$data, $router_item, $root_path) {
		
	  if (strpos($root_path, 'islandora/object/%') === 0) {
	    if (isset($data['tabs'][0]['output'])) {
	      foreach ($data['tabs'][0]['output'] as $key => &$tab) {
	        if ($tab['#link']['path'] == 'islandora/object/%/print_object') {
	          if ($root_path == 'islandora/object/%') {
	            $islandora_path = drupal_get_path('module', 'islandora');
	            $tab['#theme'] = 'menu_local_task';
	            $tab['#link']['title'] = '<i class="fa fa-print"></i>Print';
	            $tab['#link']['href'] = "{$router_item['href']}/print_object";
	            $tab['#link']['localized_options'] = array(
					'html' => TRUE,
					'attributes' => array(
					          'title' => t('Print'),
							   
					        ),
	             
	            );
	          }
	          else {
	            unset($data['tabs'][0]['output'][$key]);
	            break;
	          }
	        }
	      }
	    }
	  }
	}	
	