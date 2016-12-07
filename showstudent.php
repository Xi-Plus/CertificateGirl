<h2>
<?php
$temp=file_get_contents("student.csv");
$temp=explode("\n",$temp);
foreach($temp as $temp2){
	$temp2=str_getcsv($temp2);
	$studentlist[$temp2[0]][$temp2[1]]=$temp2[2];
}
$class=substr($_GET["q"],0,3);
$name=substr($_GET["q"],3,3);
foreach($studentlist[$class] as $namelist){
	if(substr($namelist,0,3)==$name){
		echo $namelist."<br>";
	}
}
?>
</h2>