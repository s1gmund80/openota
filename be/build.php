
<?php
class Build { 
    public $application = ''; 
    public $deliverableType = ''; //eg Android, or iOS
    public $deliverableisIOs = false; //true or false
    public $releaseName = "";
    public $releaseDir = "";
    public $releaseVersion = "";
    public $releaseBranch = "";
    public $releaseRevision = "";
    public $releaseDate = "";
    public $releaseTime = "";
    public $tags = "";
    public $buildName = "";
    public $buildPath = "";
    
    function printBuild() { 
        echo "application " . $this->application . "\n"; 
		echo "deliverable ".$this->deliverableType."\n"; 
		echo "isIOs ". (($this->deliverableisIOs)?"true":"false")."\n"; 
		echo "relName ".$this->releaseName."\n"; 
		echo "relDir ".$this->releaseDir."\n"; 
		echo "relVersion ".$this->releaseVersion."\n"; 
		echo "relBranch ".$this->releaseBranch."\n"; 
		echo "relRevision ".$this->releaseRevision."\n"; 
		echo "relDate ".$this->releaseDate."\n"; 
		echo "relTime ".$this->releaseTime."\n"; 
		echo "tags ".$this->tags."\n"; 
		echo "buildName ".$this->buildName."\n"; 
		echo "buildPath ".$this->buildPath."\n"; 
    } 

    function getBuildNode() { 
        $buildNode = array(
            "name" => $this->buildName,
            "path" => $this->buildPath
        );
        return $buildNode;
    }

} 

?>