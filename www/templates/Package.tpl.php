<?php
// Set the title for the main template
$parent->parent->context->page_title = $context->package->name.' | '.pear2\SimpleChannelFrontend\Main::$channel->name;
?>
<div class="package">
    <div class="grid_8 left">
        <h2>Package :: <?php echo $context->package->name; ?></h2>
        <p>
            <?php
            echo nl2br(trim($context->package->description));
            ?>
        </p>
        <h3>Installation</h3>
        <ol class="instructions">
            <li><code>$>php pyrus.phar channel-discover <?php echo $context->package->channel; ?></code></li>
            <li><code>$>php pyrus.phar install <?php echo $context->package->channel . '/' . $context->package->name; ?></code></li>
        </ol>
    </div>
    <div class="grid_4 right">
        <h3>Releases</h3>
        <ul>
            <?php
             foreach ($context->package as $version => $release): ?>
            <li><?php echo $version; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>