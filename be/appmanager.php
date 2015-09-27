<?php
include 'build.php';
include 'utils.php';

/**
* php appmanager.php --app Lottomatica -i --deliverable iOS --relName "Feature Visore" --relDir "dirrel" --relVersion 1.5.20 --relBranch trunk --relRevision 6509 --relDate "2015-09-13" --relTime "12:10:23" --tags "BU,ok" --buildName "Staging" --buildPath "Staging" 
**/

$opts = getoptreq('i', array('app:', 'deliverable:', 'relName:', 'relDir:', 'relVersion:', 
	'relBranch:', 'relRevision:', 'relDate:', 'relTime:', 'tags:', 'buildName:', 'buildPath:'));
//var_dump($opts);

$build = createBuild($opts);
$build->printBuild();

addBuild($build);

function addBuild($build){
	$string = file_get_contents("../data/appz.json");
	$json_appz = json_decode($string, true);

	$appFound = false;
	$deliverableFound = false;
	foreach ($json_appz as $app_name => $app_obj) {
	    echo "Scansione app: ".$app_name."\n";
	    if ($app_name == $build->application){
	    	$appFound = true;
	    	print "App found! let's go insied"."\n";
	    	$deliverables =  $app_obj['deliverables'];
	    	foreach ($deliverables as $deliverable_name => $deliverable_obj) {
			    echo "Scansione deliverable: ".$deliverable_name;
			    if ($deliverable_name == $build->deliverableType){
			    	$deliverableFound = true;
			    	print "Deliverable found! let's go insied"."\n";
			    	$releases =  $deliverable_obj['releases'];
			    } 
			}
	    } 
	}
	if($appFound==false){
		print "App need to be created\n";
	}else if($deliverableFound==false){
		print "Deliverable need to be created\n";
	}

	file_put_contents("../data/appz_generated.json", json_encode($json_a, JSON_PRETTY_PRINT));
}

?>

