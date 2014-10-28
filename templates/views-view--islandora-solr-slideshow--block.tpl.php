<?php if (!empty($title)): ?>	
<h3><?php print $title; ?></h3>
<?php endif; ?>
<div id="carousel-repository-taxons" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<?php foreach ($view->result as $id => $row): ?>
		<li data-target="#carousel-repository-taxons" data-slide-to="<?php print $id; ?>"
			<?php if ($id == 0) { print ' class="active"'; } ?>
		</li>
<?php endforeach; ?>
</ol>
	<div class="carousel-inner">
<?php print $rows; ?>
</div>	
	<a class="left carousel-control" href="#carousel-repository-taxons"  role="button" data-slide="prev"><span class="fa-stack fa-lg">
        <i class="fa fa-square-o fa-stack-2x"></i>
        <i class="fa fa-angle-left fa-stack-1x"></i>
    </span> </a>
	<a class="right carousel-control" href="#carousel-repository-taxons"  role="button" data-slide="next"><span class="fa-stack fa-lg">
        <i class="fa fa-square-o fa-stack-2x"></i>
        <i class="fa fa-angle-right fa-stack-1x"></i>
    </span></a>
</div>

