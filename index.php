<?php
$replacename=true;
$file="one";

$rowcount=array(
"one"=>10,
"four"=>16
);

$temp=file_get_contents("student.csv");
$temp=explode("\n",$temp);
foreach($temp as $temp2){
	$temp2=str_getcsv($temp2);
	if ($temp2[0] !== null) $studentlist[1*$temp2[0]][1*$temp2[1]]=$temp2[2];
}

$inputlist=file_get_contents($file.".csv");
$inputlist=str_replace(",",' ,',$inputlist);
$inputlist=explode("\n",$inputlist);
unset($inputlist[0]);


$output="";
$temp=file_get_contents($file."_head.txt");
$temp=str_replace("{rowcount}",$rowcount[$file]*count($inputlist),$temp);
$output.=$temp;
function num2chi($n){
	$chilist=["","一","二","三","四","五","六","七","八","九","十"];
	return $chilist[floor($n/10)*10].$chilist[$n%10];
}
function getno($n){
	if(is_numeric($n)){
		return "第".num2chi($n)."名";
	}else {
		return $n;
	}
}
function S_student($s){
	if($s=="")return "";
	else return "同學";
}
function S_score($s){
	if($s=="")return "";
	else return "成績";
}
function formatscore($n,$unit){
	$res="";
	if($unit=="time"){
		$a=floor($n/10000);
		$n%=10000;
		$b=floor($n/100);
		$n%=100;
		$c=$n;
		if($a!=0) $res.=$a."'";
		$res.=str_pad($b,2,"0",STR_PAD_LEFT)."\"".str_pad($c,2,"0",STR_PAD_LEFT);
	} else if($unit=="length"){
		$m=floor($n/100);
		$cm=$n%100;
		$res=$m."公尺".str_pad($cm,2,"0",STR_PAD_LEFT);
	}
	return $res;
}

foreach($inputlist as $input){
	$input=str_getcsv($input);
	if ($input[0] === null) continue;
	foreach($input as $index => $temp){
		$input[$index]=str_replace(" ","",$temp);
	}
	$temp=file_get_contents($file."_body.txt");
	$grade=$input[0][0];
	$class=$input[0][1].$input[0][2];
	$temp=str_replace("{grade}",num2chi($grade),$temp);
	$temp=str_replace("{class}",num2chi($class),$temp);
	if($file=="one"){
		if($replacename)$temp=str_replace("{name}",$studentlist[$input[0]][$input[1]],$temp);
		else $temp=str_replace("{name}",$input[1],$temp);
		$temp=str_replace("{S_student}",S_student($input[1]),$temp);
		$temp=str_replace("{schoolyear}",$input[2],$temp);
		$temp=str_replace("{game}",$input[3],$temp);
		$temp=str_replace("{no}",getno($input[4]),$temp);
		$temp=str_replace("{score}",formatscore($input[5],$input[6]),$temp);
		$temp=str_replace("{S_score}",S_score($input[5]),$temp);
		$temp=str_replace("{year}",$input[7],$temp);
		$temp=str_replace("{month}",$input[8],$temp);
		$temp=str_replace("{date}",$input[9],$temp);
	}else if($file=="four"){
		$temp=str_replace("{name1}",$input[1],$temp);
		$temp=str_replace("{name2}",$input[2],$temp);
		$temp=str_replace("{name3}",$input[3],$temp);
		$temp=str_replace("{name4}",$input[4],$temp);
		$temp=str_replace("{schoolyear}",$input[5],$temp);
		$temp=str_replace("{game}",$input[6],$temp);
		$temp=str_replace("{no}",getno($input[7]),$temp);
		$temp=str_replace("{score}",formatscore($input[8],$input[9]),$temp);
		$temp=str_replace("{year}",$input[10],$temp);
		$temp=str_replace("{month}",$input[11],$temp);
		$temp=str_replace("{date}",$input[12],$temp);
	}
	$output.=$temp;
}
$temp2="";
for($i=1;$i<count($inputlist);$i++){
	$temp3=file_get_contents($file."_rowbreak.txt");
	$temp3=str_replace("{rowbreak}",$rowcount[$file]*$i,$temp3);
	$temp2.=$temp3;
}
$temp=file_get_contents($file."_footer.txt");
$temp=str_replace("{rowbreakpart}",$temp2,$temp);;
$output.=$temp;
file_put_contents("output.xml",$output);
?>
