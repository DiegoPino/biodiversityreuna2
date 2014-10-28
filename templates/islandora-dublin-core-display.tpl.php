<?php
/**
* @file
* This is the template file for the object page for large image
*
* Available variables:
* - $islandora_object: The Islandora object rendered in this template file
* - $islandora_dublin_core: The DC datastream object
* - $dc_array: The DC datastream object values as a sanitized array. This
* includes label, value and class name.
* - $islandora_object_label: The sanitized object label.
*
* @see template_preprocess_islandora_dublin_core_display()
* @see theme_islandora_dublin_core_display()
*/
?>
  <div class="panel panel-default">
 	  <div class="panel-heading">
 	        <h4 class="panel-title">
 	          <a data-toggle="collapse" data-parent="#accordion" href="#collapseDC">
 	            <i class="fa fa-code fa-x2"></i>
 				<?php print t('Dublin Core for this object'); ?>
 	          </a>
 	        </h4>
 	      </div>
  <div id="collapseDC" class="panel-collapse collapse">
        <div class="panel-body">
   <dl xmlns:dcterms="http://purl.org/dc/terms/" class="dl-horizontal">
     <?php $row_field = 0; ?>
     <?php foreach($dc_array as $key => $value): ?>
       <dt property="<?php print $value['dcterms']; ?>" content="<?php print filter_xss(htmlspecialchars($value['value'], ENT_QUOTES, 'UTF-8')); ?>" class="<?php print $row_field == 0 ? ' first' : ''; ?>">
         <?php print filter_xss($value['label']); ?>
       </dt>
       <dd class="<?php print $row_field == 0 ? ' first' : ''; ?>">
         <?php print filter_xss($value['value']); ?>
       </dd>
       <?php $row_field++; ?>
     <?php endforeach; ?>
   </dl>
 	</div>
 </div>
 </div>    



 
   

