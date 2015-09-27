<?php
include 'build.php';
include 'utils.php';

/**
* php appmanager.php --app Lottomatica -i --deliverable iOS --relName "Feature Visore" --relDir "dirrel" --relVersion 1.5.20 --relBranch trunk --relRevision 6509 --relDate "2015-09-13" --relTime "12:10:23" --tags "BU,ok" --buildName "Staging" --buildPath "Staging" 
**/

/*
php appmanager.php --app Better --deliverable Android --relName "Android Test x BU" --relDir "dirrel" --relVersion 1.5.20 --relBranch trunk --relRevision 6509 --relDate "2015-09-13" --relTime "12:10:23" --tags "BU,ok" --buildName "Staging2" --buildPath "Staging" 
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
	print "\nAdding new BUILD\n====\n";

	$appNode = $json_appz[$build->application];

	if($appNode!=null){
		print "App '".$build->application."'' found!\n";
		$deliverablesNode = $appNode["deliverables"];
		foreach ($deliverablesNode as $deliverableObject) {
			$deliverableNode = $deliverableObject[$build->deliverableType];
			if($deliverableNode!=null){
				print "DeliverableType '".$build->deliverableType."'' found!\n";
				$deliverableFound = true;
				$releasesNodes = $deliverableNode["releases"];
				$releaseFound = false;
				foreach ($releasesNodes as $releaseObject) {
					if($releaseObject["name"] == $build->releaseName){
						print "Release '".$build->releaseName."'' found!\n";
						$releaseFound = true;
						$builds = $releaseObject["builds"];
						$buildAlreadyExists = false;
						foreach ($builds as $buildObject) {
							if($buildObject["name"] == $build->buildName){
								print "Error!!! Build with name '".$build->buildName."'' Already Exists!\n";
								$buildAlreadyExists = true;
								break;
							}
						}
						if(!$buildAlreadyExists){
							print "Build needs to be created\n";
							print "TODO Complete creation process\n";
							//array_push($builds, $build->getBuildNode());
							//var_dump($json_appz[$build->application]["deliverables"][$build->deliverableType]["releases"] );
							//array_push(   , $build->getBuildNode());
						}
						break;
					}
				}
				if(!$releaseFound){
					print "Release needs to be created\n";
					print "TODO Release creation\n";						
				}
				break;
			}
		}
		if(!$deliverableFound){
				print "deliverableType needs to be created\n";
				print "TODO deliverableType creation\n";
		}
	}else{
		print "App needs to be created\n";
		print "TODO app creation\n";
	}

	file_put_contents("../data/appz_generated.json", json_encode($json_appz, JSON_PRETTY_PRINT));
}

?>

