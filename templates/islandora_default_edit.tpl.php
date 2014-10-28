<?php

/**
 * @file
 * The default manage datastreams view for objects.
 *
 * islandora_object is a fedora tuque Object
 *    $object->label
 *    $object->id
 * to get the contents of a datastream
 *    $object['dsid']->content
 *
 * $dublin_core is a DublinCore object
 * which is an array of elements, such as dc.title
 * and each element has an array of values.
 * dc.title can have none, one or many titles
 * this is the case for all dc elements.
 *
 * Modified by Diego Pino to use more standard and themable theme('table') instead of theme_table
 * Oct 2014

*/
?>
<?php print theme('table',$variables['datastream_table']); ?>
