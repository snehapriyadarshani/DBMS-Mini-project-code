<?php

class User {
    private $id;
    private $username;
    private $password;
    private $role;

    public function __construct($id, $username, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function isAdmin() {
        return $this->role == 'admin';
    }

    public function isStudent() {
        return $this->role == 'student';
    }
}

class Exam {
    private $id;
    private $name;
    private $questions;

    public function __construct($id, $name, $questions) {
        $this->id = $id;
        $this->name = $name;
        $this->questions = $questions;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuestions() {
        return $this->questions;
    }
}

class Question {
    private $id;
    private $text;
    private $options;
    private $correctOption;

    public function __construct($id, $text, $options, $correctOption) {
        $this->id = $id;
        $this->text = $text;
        $this->options = $options;
        $this->correctOption = $correctOption;
    }

    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getOptions() {
        return $this->options;
    }

    public function getCorrectOption() {
        return $this->correctOption;
    }
}

class ExamSystem {
    private $users;
    private $exams;

    public function __construct() {
        $this->users = [];
        $this->exams = [];
    }

    public function addUser($user) {
        $this->users[] = $user;
    }

    public function addExam($exam) {
        $this->exams[] = $exam;
    }

    public function getUserById($id) {
        foreach ($this->users as $user) {
            if ($user->getId() == $id) {
                return $user;
            }
        }
        return null;
    }

    public function getExamById($id) {
        foreach ($this->exams as $exam) {
            if ($exam->getId() == $id) {
                return $exam;
            }
        }
        return null;
    }
}



$examSystem = new ExamSystem();

$user1 = new User(1, 'admin', 'admin123', 'admin');
$user2 = new User(2, 'student1', 'student123', 'student');
$user3 = new User(3, 'student2', 'student123', 'student');

$exam1 = new Exam(1, 'Math Exam', [
    new Question(1, 'What is 2 + 2?', ['A) 3', 'B) 4', 'C) 5', 'D) 6'], 'B) 4'),
    new Question(2, 'What is 3 * 4?', ['A) 9', 'B) 10', 'C) 11', 'D) 12'], 'D) 12'),
]);

$exam2 = new Exam(2, 'Science Exam', [
    new Question(1, 'What is the chemical symbol for water?', ['A) H2O', 'B) CO2', 'C) NaCl', 'D) HCl'], 'A) H2O'),
    new Question(2, 'What is the powerhouse of the cell?', ['A) Ribosome', 'B) Nucleus', 'C) Mitochondria', 'D) Golgi Apparatus'], 'C) Mitochondria'),
]);

$examSystem->addUser($user1);
$examSystem->addUser($user2);
$examSystem->addUser($user3);

$examSystem->addExam($exam1);
$examSystem->addExam($exam2);

?>
