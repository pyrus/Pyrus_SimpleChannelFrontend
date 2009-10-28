<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="search" title="search packages" type="application/opensearchdescription+xml" href="?view=searchdefinition">
    <link rel="alternate" title="My Channel Latest Releases" type="application/atom+xml" href="?view=latest" />
    <title>page title | <?php echo $context::$channel->name; ?></title>
  </head>
  <body>
    <h1><?php echo $context::$channel->name; ?></h1>
    <ul class="navigation">
        <li><a href="./">Home</a></li>
        <li><a href="./?view=packages">Packages</a></li>
    </ul>
    <?php echo $savant->render($context->page_content); ?>
  </body>
</html>
