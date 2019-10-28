<!DOCTYPE html>
<html>
<head>
	<title>robot squad</title>
</head>
<body>

	<!-- This is a form and you can use it if you want to set the instructions from keyboard -->

<!-- 	<form name="myform" action="" method="post">
		<label>insert the movement. Insert only M for move , R L for turn</label><br>
		<input type="text" name="instructions"><br>
		<label>insert x border . Number >0</label><br>
		<input type="number" name="border"><br>
		<label>insert the orientation of the robot (N , W, S, E)</label><br>
		<input type="text" name="orientation"><br>
		<label>insert the x starting potision of the robot</label><br>
		<input type="text" name="startX"><br>
		<label>insert the y starting potision of the robot</label><br>
		<input type="text" name="startY"><br>
		<input type="submit" value="Submit"><br>
	</form> -->



	<?php
	
	//check if the data is posted from form 
	if (isset($_POST["instructions"])) {
		$instruction = $_POST["instructions"];
		//echo $instruction."<br>";
	}
	if (isset($_POST["border"])) {
		$border = $_POST["border"];
		//echo $border."<br>";
	}
	if (isset($_POST["orientation"])) {
		$orientation = $_POST["orientation"];
		echo $orientation."<br>";
	}
	if (isset($_POST["startX"])) {
		$startX = $_POST["startX"];
		//echo $startX;
	}
	if (isset($_POST["startY"])) {
		$startY = $_POST["startY"];
		
	}

	/**
	 * 
	 */
	/**
	 * class Map that sets the map area . 
	 */
	class Map 
	{
		//declare static variables. Keyword static makes them accessible without needing an instantiation of the class.
		//so i can use them in Robot class immediatelly
		public static $borderX;
		public static $borderY;
		
		function __construct()
		{
			
		}
		//set the static variable
		public static function init() {
			self::$borderX= 10;
			self::$borderY = 10;
		}
	}

	class Robot
	{	
		//initial position of the robot
		public $x;
		public $y;
		//orientation of the robot
		public $orientation;
		//instructions movement
		public $instructions;
		//name of the robot
		public $name;
		
		function __construct($name, $positionX, $positionY, $orientation)
		{
			$this->name = $name;
			$this->x = $positionX;
			$this->y = $positionY;
			$this->orientation = $orientation;
			$instructions = null;
		}


		function move($instructions){

			//set the initial position from the robot to the variables x, y
			$x = $this->x;
			$y = $this->y;
			//get the borders from Map class as have set there as static variables
			$yborder = Map::$borderY;
			$xborder = Map::$borderX;
			//set the starting orientation of the robot
			$compass = $this->orientation;
			//put the instruction to this robot
			$this->instructions = $instructions;
			//str_split — Convert a string to an array
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
			}

			echo "OUTPUT"."<br>";
			echo $x." ".$y." ".$compass."<br><br>";
		}

		function printInput(){
			echo "INPUT ".$this->name."<br>";
			echo $this->x." ".$this->y." ".$this->orientation."<br>";
			echo $this->instructions."<br><br>";
		}
	}

	//run the init() funtion from the Map class so i can set the area
	Map::init();
	//create robot1
	$robot1 = new Robot('robot1', 16,16,'N');
	//move the robot1
	$robot1->move('LMRMMLMMMLMMRLLLMMMMRMMRMMMMMMMM');
	//print the output
	$robot1->printInput();
	
	$robot2 = new Robot('robot2', 16,16 ,'N');
	$robot2->move('LLMLMLMMRRLMRLRMRMRMRLRMRLRMRMRLMRLMRRMLRMRMLMRMMMMMLMMMMMMMRRMMMM');
	$robot2->printInput();
	?>

</body>
</html>




