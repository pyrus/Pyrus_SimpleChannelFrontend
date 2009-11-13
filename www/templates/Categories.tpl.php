<?php
$parent->parent->context->page_title = 'Categories | '.pear2\SimpleChannelFrontend\Main::$channel->name; ?>

<div class="grid_8 left">
<div class="packages-header">
 <h2 class="category-title">Categories</h2>
</div>
<?php
if (count($context->categories)) : ?>
<ul class="categories">
<?php 
    foreach ($context->categories as $category) : ?>
    <li id="category-1" class="category category-clear">
        <h3><a href=""><span class="category-title"><?php echo $category->name; ?></span> <span class="category-count"><?php echo count($category);?></span></a></h3>
        <div><?php foreach ($category as $package) echo '<a href="./?view=package&amp;package='.$package->name.'">'.$package->name.'</a>'; ?></div>
    </li>
    <?php
    endforeach; ?>
</ul>
<?php
endif;
?>
</div>
