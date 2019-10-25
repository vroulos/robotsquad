<!DOCTYPE html>
<html>
<head>
	<title>robot squad</title>
</head>
<body>

	<form name="myform" action="" method="post">
		<label>insert the movement. Insert only M for move , R L for turn</label><br>
		<input type="text" name="instructions"><br>
		<label>insert x border . Number >0</label><br>
		<input type="number" name="border"><br>
		<label>insert the orientation of the robot (N , W, S, E)</label><br>
		<input type="text" name="orientation"><br>
		<input type="submit" value="Submit"><br>
	</form>

<?php 
	if (isset($_POST["instructions"])) {
		$instruction = $_POST["instructions"];
		echo $instruction."<br>";
	}
	if (isset($_POST["border"])) {
		$border = $_POST["border"];
		echo $border."<br>";
	}
	if (isset($_POST["orientation"])) {
		$orientation = $_POST["orientation"];
		echo $orientation."<br>";
	}

	
	//echo $instructions;
	getUpperRight(10,11);
	setTheMovement($instruction, $border , $border, $orientation);

	function setTheMovement($instructions ,$x , $y,$compass){
		$xborder = $x;
		$yborder = $y;

		$arrayinstructions = str_split($instructions);
		$i = 0;
		foreach ($arrayinstructions as  $value) {
			//turn 90 to the left
		if ($value == 'L') {	
			switch ($compass) {
				case 'N':
					$compass = 'W';
					break;
				case 'W':
					$compass = 'S';
					break;
				case  'S':
					$compass = 'E';
					break;
				case 'E':
					$compass = 'N';
					break;			
				
				default:
				echo "this id default";
					break;
			}
			}
			//turn right the robot
			if ($value == 'R') {	
			switch ($compass) {
				case 'N':
					$compass = 'E';
					break;
				case 'W':
					$compass = 'N';
					break;
				case  'S':
					$compass = 'W';
					break;
				case 'E':
					$compass = 'S';
					break;			
				
				default:
				echo "this id default";
					break;
			}
			}
			//move the robot
			if ($value == 'M') {
				switch ($compass) {
				case 'N':
					//check if the robot is in the map
					if ($y<$yborder) {
						$y = $y+1;
					}
					
					break;
				case 'W':
					if ($x>0) {
						$x = $x-1;
					}
					
					break;
				case  'S':
				if ($y>0) {
					$y = $y-1;
				}
					break;
				case 'E':
					//check if the robots is in the map
					if ($x<$xborder) {
						$x = $x+1;
					}
					
					break;			
				
				default:
				echo "this id default";
					break;
			}
			}


		
			//print 
			
				echo $x ." ".$y." ".$compass."</br>";
				
			
		}		
		
	}

	function getUpperRight($x, $y){
		echo $x.' '.$y."</br>";
	} 
?>

</body>
</html>




