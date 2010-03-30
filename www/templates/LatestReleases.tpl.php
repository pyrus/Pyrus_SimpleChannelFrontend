<?php
// Set the title for the main template
$parent->context->page_title = 'Latest Releases | '.pear2\SimpleChannelFrontend\Main::$channel->name;
?>
<div class="packagelist grid_8">
    <h1>Latest Releases</h1>
    <ul>
    <?php
    foreach ($context as $date=>$info) {
        $package = $info['package'];
        $version = $info['version'];
        echo '<li>'.$date.' <a href="'.pear2\SimpleChannelFrontend\Main::getURL().$package->name.'-'.$version.'">'.$package->name.'-'.$version.'</a></li>';
    }?>
    </ul>
</div>