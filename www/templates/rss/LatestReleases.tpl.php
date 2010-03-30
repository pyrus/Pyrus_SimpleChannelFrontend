<?php foreach($context as $package): ?>
<item rdf:about="<?php echo pear2\SimpleChannelFrontend\Main::getURL().$package->name.'-'.$package->version['release']; ?>">
 <title><?php echo $package->name.' '.$package->version['release']; ?></title>
 <link><?php echo pear2\SimpleChannelFrontend\Main::getURL().$package->name.'-'.$package->version['release']; ?></link>
 <content:encoded>
 <?php echo htmlspecialchars(nl2br($package->notes)); ?>
 </content:encoded>
 <dc:date><?php echo date('c', strtotime($package->date.' '.$package->time)); ?></dc:date>
</item>
<?php endforeach; ?>