<?php 
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '288342391335467',
		'secret' => 'ff94e4cf8543919e8f7f9feccff3b385'
	));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Friends List</title>
	<link rel="stylesheet" href="styles.css"/>
	<script type="text/javascript">

	function hideSources(){
		var elements = document.getElementsByClassName('title');
		for(var i =0; i< elements.length;i++){
			elements[i].style.top = "40px";
			if(elements[i].style.visibility=="hidden")
				elements[i].style.visibility="visible";
			else if(elements[i].style.visibility="visible")
				elements[i].style.visibility="hidden";

		}
	}

	function fundProject(){
		  $(document).ready(function(){
      		window.open(fundProject.php, "_blank"); // will open new tab on document ready
  	});
	}

	</script>
</head>
<body>
 
<!-- <button type="button" onclick="hideSources();">Different Version</button> -->

<!--<h2>Welcome to Friends Newsfeed app!</h2>-->

<?php

	$news = array(
		'0' => "A 750 mile Buddhist pilgrimage & all the things that went wrong on the way. It ain't Eat, Pray, Love,it's Starve, Pray, Fight",
 		'1' => "Handcrafted, organic, single-origin, bean-to-bar, dark chocolate. Like fine wine, the secret is in the terroir.", 
 		'2' => "Income generation in Tibetan communities: training and employing Tibetan villagers to produce accessories for American fiber boutiques.",
	);

	$titles = array(
			//'0'=>'<div class="box"><img src="https://s3.amazonaws.com/ksr/projects/1065975/photo-main.jpg?1404756467" height="‍500px" width="500px"></img></div>.',);
        '0' => "Fighting Monks and Burning Mountains: A Travel Memoir",
        '1' => "Meadowlands Chocolate",
        '2' => "Handcrafted Tibetan Stitch Markers",
    );
	$photos = array(
			//'0'=>'<div class="box"><img src="https://s3.amazonaws.com/ksr/projects/1065975/photo-main.jpg?1404756467" height="‍500px" width="500px"></img></div>.',);
        '0' => '<div class="box"><a href="www.kickstarter.com"><img src="https://s3.amazonaws.com/ksr/projects/1059938/photo-main.jpg?1403720339" height="‍500px" width="500px"></img></a></div>.',
        '1' => '<div class="box"><a href="www.kickstarter.com"><img src="https://s3.amazonaws.com/ksr/projects/1167013/photo-main.jpg?1405947447" height="‍500px" width="500px"></img></a></div>.',
        '2' => '<div class="box"><a href="www.kickstarter.com"><img src="https://s3.amazonaws.com/ksr/projects/1040613/photo-main.jpg?1403112573" height="‍500px" width="500px"></img></a></div>.',
    );

    $funding = array(
			//'0'=>'<div class="box"><img src="https://s3.amazonaws.com/ksr/projects/1065975/photo-main.jpg?1404756467" height="‍500px" width="500px"></img></div>.',);
        '0' => '<div class="box"><img src="111.tiff" width="300px"></img></div>.',
        '1' => '<div class="box"><img src="222.tiff" width="300px"></img></div>.',
        '2' => '<div class="box"><img src="333.tiff" width="300px"></img></div>.',
    );

	//get user from facebook object
	$user = $facebook->getUser();
	if ($user): //check for existing user id

		//$user_graph_me = $facebook->api('/me/picture/');
		//echo '<img class="profilepic" src="',$value['picture']['data']['url'],'"/>';
		

		$user_graph = $facebook->api('/me/taggable_friends/');
		echo '<ul class="lgrid group">';
		
		foreach ($user_graph['data'] as $key => $value) {
			$index = round(rand(0,2));
			echo '<div class="border"><img class="friendthumb" src = "',$value['picture']['data']['url'],'"/>
				  <h4>', $value['name'],'</h4>
				  <h7 class="title">', $titles[$index], '</h7>
			      <h5 class="news">', $news[$index], '</h5>
				  <h6 class="photo">', $photos[$index], '</h6>
				  <h6 class="button"><button onclick="hideSources();">Fund this project</button></h6>
				  <h6 class="fund">', $funding[$index], '</h6></div>';

		} //iterate through friends graph
		echo '</ul>';

	else: //user doesn't exist
		$loginUrl = $facebook->getLoginUrl(array(
			'diplay'=>'popup',
			'redirect_uri' => 'https://apps.facebook.com/friendsnewsfeed'
		));
		echo '<p><a href="', $loginUrl, '" target="_top">login</a></p>';
	endif; //check for user id
?>
</body>
</html>