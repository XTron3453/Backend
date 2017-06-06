<?php
	//Author: @XTron
	public class CaculateLife
		{
			$age;
			$amount;
			$expectedAge;
			$male = true;
	//Left two declarations blank for SQL use
			//private static const $filename = "insert name of file";
			//private static const $fullTable;
	//These arrays are for the values in the 2013 life table, 
	//they will be filled in when the SQL code is compelte
			private static $exactAge = array();
			private static $maleDeathProbability  = array();
			private static $malePopulationSurvival = array();
			private static $maleLife = array();
			private static $femaleDeathProbability = array();
			private static $femalePopulationSurvival = array();
			private static $femaleLife = array();
			
			$count = 0;
	//Contructor
			public function __construct($age, $discount, $amount, $male)
				{
					$this->age;
					$this->discount = 1 / (1 + $discount);
					$this->amount;
					$this->male;
					//setUpTable(); 
	//Life expectancy was left blank funbction was left blank for SQL incision 
					$expectedAge = lifeExpectancy();
					$price = calculatePrice();
					
					
				}
			
			public function SetUpTable()
				{
					/*Left Blank upon request*/
				}
				
			public function lifeExpectancy()
				{
					/*Left Blank upon request*/
				}
			
			public function calculatePrice()
				{
					$total = 0.0;
		//Checks gender so tale values dont get mixed up 
					if($male)
						{
		//Sets a counter from your age to 119 inclusive
							for($n = $age; $n < 120; $n++)
								{
		//Sums the Death Probability of ages through the counter above, 
		//the product of the deaths projected in 10000s, 
		//and the years since the insurance claim was requested until age 119 
									$total = ($maleDeathProbability[$n]) 
									* productofSurvival($n, $age) * ($n - $age);
								}
		//Returns sum
							return $total;
							
						}
		//Does the same thing above with female statistics
					else
						{
							for($n = $age; $n < 120; $n++)
								{
									$total = ($femaleDeathProbability[$n]) 
									* productofSurvival($n, $age) * ($n - $age);
								}
								
							return $total;	
						}					
				}
		//Function adds the products of all deaths projected for specific gender in the 10000s from the age of starting the insurance claim
		//to the current age being calculated (exclusive), and returns it
			public function productofSurvival($currentYearCalculating, $age)
				{
					$totalOfProducts = 1;
					if($male)
						{
							for($n = $currentYearCalculating - 1; $n >= $age; $n--)
								{
									$totalOfProducts = $totalOfProducts * malePopulationSurvival[$n];
								}
								
							
						}
						
					else
						{
							for($n = $currentYearCalculating - 1; $n >= $age; $n--)
								{
									$totalOfProducts = $totalOfProducts * femalePopulationSurvival[$n];
								}
								
							
						}
					
					return $totalOfProducts;
				}
			
			
			
		}
	



?>