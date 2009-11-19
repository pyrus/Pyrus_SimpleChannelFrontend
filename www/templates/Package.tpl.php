<?php
// Set the title for the main template
$parent->context->page_title = $context->name.' | '.pear2\SimpleChannelFrontend\Main::$channel->name;
?>
<div class="package">
    <div class="grid_8 left">
        <h2>Package :: <?php echo $context->name; ?></h2>
        <p>
            <?php
            echo nl2br(trim($context->description));
            ?>
        </p>
        <h3>Installation</h3>
        <ol class="instructions">
            <li><code>$>php pyrus.phar channel-discover <?php echo $context->channel; ?></code></li>
            <li><code>$>php pyrus.phar install <?php echo $context->channel . '/' . $context->name; ?></code></li>
        </ol>
    </div>
    <div class="grid_4 right">
        <h3>Releases</h3>
        <ul>
            <?php
             foreach ($context as $version => $release): ?>
            <li>
                <?php echo $version; ?> <span class="stability"><?php echo $release['stability']; ?></span>
                <abbr class="releasedate" title="<?php echo $context->date.' '.$context->time; ?>"><?php echo $context->date; ?></abbr>
                <a class="download" href="<?php echo $context->getDownloadURL('.tgz'); ?>">Download</a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
