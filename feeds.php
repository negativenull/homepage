<?php
function displayFeed($name, $url) {
	$rss = new DOMDocument();
	$rss->load($url);
	$feed = array();
	
	$node = $rss->getElementsByTagName('link');
	$feedurl = $node->item(0)->nodeValue;

	sectionHeader($name,$feedurl);
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 5;
	for($x=0;$x<$limit;$x++) {

		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		if(empty($title)) continue;
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		if($name=='XKCD') {
			$descriptionFiltered = strip_tags($description,"<p><a><h1><h2><h3><h4><h5><h6><div><span><img>");
		} else {
			$descriptionFiltered = strip_tags($description,"<p><a><h1><h2><h3><h4><h5><h6><div><span>");
		}
		$description=$descriptionFiltered;
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		?>
		<div class="m-alert m-notice">
			<i class="fa fa-chevron-right"></i> 
			<a href="<?php echo $link;?>" title="<?php echo $title;?>" target="_blank"><?php echo $title;?></a>
			<?php readMore($link,$title,$description); ?>
		</div>
		<?php
		//readMore($link,$title,$description);
?>
		<hr/>
<?php
	}
	sectionFooter();
}

function readMore($link, $title, $description) {
$id=rand(1000,10000000);
?>
<br /><a href="#example-modal<?php echo $id;?>" data-toggle="modal" class="m-x-small"><sub><i class='fa fa-caret-up'></i>more</sub></a>
                    <div class="m-modal fade" id="example-modal<?php echo $id;?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labeledby="m-unique-modal-label">
                        <div class="m-header">
                            <i class="fa fa-info-circle"></i>
                            <?php echo '<h4 id="m-unique-modal-label"><a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></h4>';?>
                            <button data-dismiss="modal" class="m-close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="m-body">
                            <?php echo $description; ?>
                        </div>
                        <div class="m-footer m-text-right">
                            <button data-dismiss="modal" class="m-btn m-caution">Close</button>
                            <!--<button class="m-btn m-primary">Continue</button>-->
                        </div>
                    </div>
<?php
}

function sectionHeader($name,$feedurl) {
	?>
	<div class="m-col m-three m-padding-20 m-half">
		<h1><i class="fa fa-fw fa-rss"></i> <a href="<?php echo $feedurl;?>"><?php echo $name;?></a></h1>
	<?php
}

function sectionFooter() {
	?>
	</div>
	<?php
}
