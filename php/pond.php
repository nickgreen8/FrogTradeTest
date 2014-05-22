<?php
// Containing pond manager
class Pond
{
    protected $frogs;

    function __construct()
    {
        $this->frogs = array();
    }

    function add($frogs)
    {
        if(!is_array($frogs))
            $frogs = array($frogs);
        foreach($frogs as $f) {
            $this->addFrog($f);
        }
    }

    function display()
    {
        $output = array('<div>');
        $output[] = '<ul class="frogs">';
        foreach($this->frogs as $f) {
            $output[] = '<li class="'.$f->gender.'">'.$f->name.'</li>';
        }
        $output[] = '</ul>';
        echo implode(PHP_EOL, $output) . PHP_EOL;
    }

    protected function addFrog($frog)
    {
        $f = new Frog($frog);
        $f->setId(count($this->frogs) ? $this->frogs[count($this->frogs)-1]->getId()+1 : 1);
        $this->frogs[] = $f;
    }





	public function moveFrogsIn($noOfFrogs = 5) {
		//Create array of new frogs
		$newFrogs = array(
				'{ "name" : "Mike",		"gender" : "m" }',
				'{ "name" :	"Alice",	"gender" : "f" }',
				'{ "name" :	"Billy",	"gender" : "m" }',
				'{ "name" :	"Julie",	"gender" : "f" }',
				'{ "name" :	"Jeff",		"gender" : "m" }',
				'{ "name" :	"Kath",		"gender" : "f" }',
				'{ "name" :	"Martin",	"gender" : "m" }',
				'{ "name" :	"Poppy",	"gender" : "f" }',
				'{ "name" :	"Colin",	"gender" : "m" }',
				'{ "name" :	"Daisy",	"gender" : "f" }'
			);

		//Get the frogs to add
		$frogs = array_rand($newFrogs, $noOfFrogs);

		//Add each frog
		foreach($frogs as $f) {
			//Add new frog
			$this->add($newFrogs[$f]);
		}
	}

	public function killFrogs($noOfFrogs = 3) {
		//Get dying frogs
		$frogs = array_rand($this->frogs, $noOfFrogs);
		//Kill each frog
		foreach(((!is_array($frogs)) ? array($frogs) : $frogs) as $f) {
			//Set the frogs gender to dead
			$this->frogs[$f]->gender = "d";
		}
	}

	public function matingSeason($noOfFrogs = 3) {
		//Create an array of male and female frogs
		$male = array();
		$female = array();

		//Add frogs into relevant arrays
		foreach($this->frogs as $f) {
			//Check the frogs gender
			if($f->gender === "m") {
				//Add frog to male array
				array_push($male, $f);
			} elseif($f->gender === "f") {
				//Add frog to female array
				array_push($female, $f);
			}
		}

		//Check that there are both male and female frogs in the pond
		if(count($male) > 0 && count($female) > 0) {
			//Create array of new frogs
			$newFrogs = array(
					'{ "name" : "Callum",	"gender" : "m" }',
					'{ "name" :	"Danielle",	"gender" : "f" }',
					'{ "name" :	"Richard",	"gender" : "m" }',
					'{ "name" :	"Tess",		"gender" : "f" }',
					'{ "name" :	"Harry",	"gender" : "m" }',
					'{ "name" :	"Eliza",	"gender" : "f" }',
					'{ "name" :	"David",	"gender" : "m" }',
					'{ "name" :	"Isabelle",	"gender" : "f" }',
					'{ "name" :	"Robert",	"gender" : "m" }',
					'{ "name" :	"Maisie",	"gender" : "f" }'
				);

			//Get baby frogs
			for($i = 0; $i < $noOfFrogs; $i++) {
				//Get new frog
				$babyFrog = rand(0, count($newFrogs) - 1);

				//Add new frog
				$this->add($newFrogs[$babyFrog]);

				//Output birth
				echo "<p>" . $male[rand(0, count($male) - 1)]->name . " and " . $female[rand(0, count($female) - 1)]->name . " created " . $this->frogs[count($this->frogs) - 1]->name . "</p>";
			}
		}
	}
}

