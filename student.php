<?php

    class Student
    {
        public const STATUS = ['freshman', 'sophomore', 'junior', 'senior'];
        public $firstname;
        public $lastname;
        public $gender;
        public $status;
        public $gpa;

        public function __construct($FirstName, $LastName, $Gender, $Status, $Gpa) {
            $this->firstname = $FirstName;
            $this->lastname = $LastName;
            if ($Gender !== 'male' && $Gender !== 'female') {
                exit(''.PHP_EOL);
            } else {
                $this->gender = $Gender;
            }
            if (!in_array($Status, Student::STATUS)) {
                exit(''.PHP_EOL);
            } else {
                $this->status = $Status;
            }
            if (!is_numeric($Gpa) || $Gpa < 0 || $Gpa > 4) {
                exit(''.PHP_EOL);
            } else {
                $this->gpa = $Gpa;
            }
        }


        public function showMyself()
        {
            echo 'Firstname: ' . $this->firstname . PHP_EOL;
            echo 'Lastname: ' . $this->lastname . PHP_EOL;
            echo 'Gender: ' . $this->gender . PHP_EOL;
            echo 'Status: ' . $this->status . PHP_EOL;
            echo 'Gpa: ' . $this->gpa . PHP_EOL;
        }

        public function studyTime($study_time)
        {
            if(empty($study_time) || $study_time < 0) {
                exit('study_time must be positive and integer!');
            }
            if($this->gpa + log($study_time) > 4) {
                $this->gpa = 4.0;
            }
            else {
                $this->gpa += log($study_time);
            }
        }
    }

    function showInfo($studentsArr)
    {
        foreach ($studentsArr as $students) {
            $students->showMyself();
            echo PHP_EOL ;
        }
    }

    $studentList = [
        ['Mike', 'Barnes', 'male', 'freshman', 4],
        ['Jim', 'Nickerson', 'male', 'sophomore', 3],
        ['Jack', 'Indabox', 'male', 'junior', 2.5],
        ['Jane', 'Miller', 'female', 'senior', 3.6],
        ['Mary', 'Scott', 'female', 'senior', 2.7]
    ];

    for ($i=0; $i < count($studentList); $i++) {
        $student[$i] = new Student($studentList[$i][0],
        $studentList[$i][1],
        $studentList[$i][2],
        $studentList[$i][3],
        $studentList[$i][4]);
    }
    showInfo($student);



