<?php
// Set the title for the main template
$parent->parent->context->page_title = 'News | '.pear2\SimpleChannelFrontend\Main::$channel->name;
?>
<div id="news">
    <div class="grid_8 left">
    <h2>Latest News</h2>
    <p>Welcome to the next generation of PEAR channels.</p>
    <p>
      This website provides packages available for you to install using the pyrus package installer.
      With pyrus you can install all the packages available on this channel, as well as any PEAR
      compatible package from a large number of repositories.</p>
    <p>Users can get started by reading
    <a href="http://pear.php.net/manual/en/installationpyrus.introduction.php">the introduction</a>.</p>
    </div>
    <div class="grid_4 right">
        <h3>Download Pyrus</h3>
        <a href="http://svn.php.net/viewvc/pear2/Pyrus/trunk/pyrus.phar?view=co">Download pyrus.phar</a>
    </div>
</div>