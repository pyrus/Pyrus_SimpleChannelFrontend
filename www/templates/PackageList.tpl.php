<?php
// Set the title for the main template
$parent->parent->context->page_title = 'Packages | '.pear2\SimpleChannelFrontend\Main::$channel->name;
?>
<div class="packagelist grid_8">
    <h1>Available Packages</h1>
    <ul>
    <?php
    foreach ($context->packages as $package) {
        echo '<li><a href="./?view=package&amp;package='.$package.'">'.$package.'</a></li>';
    }
    
    ?>
    </ul>
</div>