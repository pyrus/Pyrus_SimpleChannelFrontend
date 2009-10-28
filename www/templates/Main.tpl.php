<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="search" title="search packages" type="application/opensearchdescription+xml" href="?view=searchdefinition">
    <link rel="alternate" title="My Channel Latest Releases" type="application/atom+xml" href="?view=latest" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/960.css" />
    <link rel="stylesheet" href="css/text.css" />
    <title>page title | <?php echo $context::$channel->name; ?></title>
  </head>
  <body>
    <div class="container_12">
        <h1><?php echo $context::$channel->summary; ?></h1>
        <ul class="navigation">
            <li><a href="?view=news">Home</a></li>
            <li><a href="?view=packages">Packages</a></li>
        </ul>
        <?php echo $savant->render($context->page_content); ?>
    </div>
  </body>
</html>
