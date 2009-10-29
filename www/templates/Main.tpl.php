<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="search" title="search packages" type="application/opensearchdescription+xml" href="?view=searchdefinition">
    <link rel="alternate" title="My Channel Latest Releases" type="application/atom+xml" href="?view=latest" />
    <link rel="stylesheet" href="css/all.css" />
    <title>page title | <?php echo pear2\SimpleChannelFrontend\Main::$channel->name; ?></title>
  </head>
  <body>
    <div class="container_12">
        <div class="header">
            <h1><?php echo pear2\SimpleChannelFrontend\Main::$channel->summary; ?></h1>
            <ul class="navigation">
                <li><a href="<?php echo pear2\SimpleChannelFrontend\Main::getURL('pear2\SimpleChannelFrontend\News'); ?>">Home</a></li>
                <li><a href="<?php echo pear2\SimpleChannelFrontend\Main::getURL('pear2\SimpleChannelFrontend\PackageList'); ?>">Packages</a></li>
            </ul>
        </div>
        <div class="content">
            <?php echo $savant->render($context->page_content); ?>
        </div>
        <div class="footer">This is a PEAR channel running PEAR2_SimpleChannelFrontend</div>
    </div>
  </body>
</html>
