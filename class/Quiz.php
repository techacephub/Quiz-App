<?php
/*
@Author : Omolewa Stephen Ayobami 
@Link : https://about.me/omolewastephen
*/
class Quiz{

	private $db;
	private $msg;
	private $query;
	private $result;
	private $error;
	private $rowCount;
	private $loggedUserID;
	private $loggedUsername;
	private $loggedPassword;

	function __construct(){
		try {
			$this->db = new PDO('mysql:host=localhost;dbname=quiz','root','');
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Error Connecting to DB");
		}
	}

	function LoadQuestion($question_id){
		$this->query = $this->db->query("SELECT * FROM quiz_question WHERE quiz_pack_id = '{$quiz_question}' ");
		$this->rowCount = $this->query->rowCount();
		if($this->rowCount > 1){
			$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
		}

		return $this->result;
	}

	function quizPack(){
		return $this->query = $this->db->query("SELECT * FROM quiz_pack ");
	}

	function getQuiz($id){
		$this->query = $this->db->query("SELECT * FROM quiz_pack WHERE id = '{$id}' ");
		$this->result = $this->query->fetch(PDO::FETCH_OBJ);
		return $this->result;
	}

	function getAllQuestionID($id){
		$this->query = $this->db->query("SELECT quiz_pack_id,ques_id,answered FROM quiz_question WHERE quiz_pack_id = '{$id}' ");
		$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
		return $this->result;
	}

	function getAllQuestion($id,$qid){
		$this->query = $this->db->query("SELECT * FROM quiz_question WHERE quiz_pack_id = '{$id}' AND ques_id = '{$qid}' ");
		$this->result = $this->query->fetch(PDO::FETCH_OBJ);
		return $this->result;
	}

	function do_login($post){
		if(is_array($post)){
			$this->loggedUsername = filter_var($post['username'],FILTER_SANITIZE_STRING);
			$this->loggedPassword = sha1($post['password']);

			$this->query = $this->db->query("SELECT * FROM quiz_admin WHERE username = '{$this->loggedUsername}' AND password = '{$this->loggedPassword}' LIMIT 1 ");
			if($this->query->rowCount() == 1){
				$this->result = $this->query->fetch(PDO::FETCH_OBJ);
				$this->loggedUserID = $this->result->user_id;
				return true;
			}else{
				$this->error = "Invalid login credentials";
				return false;
			}
		}
	}

	function createQuiz($table,$data){
		$columns = implode(',', array_keys($data));
		$values = "'" .implode("', '", array_values($data)) . "'" ;
		$sqlTemp = "INSERT INTO $table($columns)VALUES($values)";
		$this->query = $this->db->query($sqlTemp);
		if($this->query){
			$this->msg = "Quiz Package created successfully";
			return true;
		}

		return false;
	}

	function getContestant($quiz_pack_id){
		$this->query = $this->db->query("SELECT contestants FROM quiz_pack WHERE id = '{$quiz_pack_id}' ");
		$this->result = $this->query->fetch(PDO::FETCH_OBJ);
		return $this->result;
	}

	function getQuizTimer($quiz_pack_id){
		$this->query = $this->db->query("SELECT timer FROM quiz_pack WHERE id = '{$quiz_pack_id}' ");
		$this->result = $this->query->fetch(PDO::FETCH_OBJ);
		return $this->result->timer;
	}

	function QuizRound($quiz_pack_id){
		$this->query = $this->db->query("SELECT * FROM quiz_question WHERE quiz_pack_id = '{$quiz_pack_id}' ");
		$questionCount = $this->query->rowCount();
		$this->query = $this->db->query("SELECT num_contestant FROM quiz_pack WHERE id = '{$quiz_pack_id}' ");
		$this->result = $this->query->fetch(PDO::FETCH_OBJ);
		$contestants = $this->result->num_contestant;
		$rounds = ($questionCount)/($contestants);
		return $rounds;
	}

	function updateAsAnswered($ques_id,$quiz_pack_id){
		$this->query = $this->db->query("UPDATE quiz_question SET answered = 1 WHERE ques_id = '{$ques_id}' AND quiz_pack_id = '{$quiz_pack_id}' ");
		return true;
	}

	function getUserID(){
		return $this->loggedUserID;
	}

	function alertError(){
		return $this->error;
	}

	function alertMessage(){
		return $this->msg;
	}

	function scoreCont($qp,$cl){
			$this->query = $this->db->query("INSERT INTO tbl_scoreboard(quiz_pack_id,contestant,score)VALUES('{$qp}','{$cl}',5)");
			exit();
			return true;

	}

	function scoreAsZero($qp,$cl){
			$this->query = $this->db->query("INSERT INTO tbl_scoreboard(quiz_pack_id,contestant,score)VALUES('{$qp}','{$cl}',0)");
			exit();
			return true;
	}

	function scoreboard($quiz_pack){
		$this->query = $this->db->query("SELECT * FROM tbl_scoreboard WHERE quiz_pack_id = '{$quiz_pack}' ");
		$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
		return $this->result;
	}

	function getScore($cl){
		$this->query = $this->db->query("SELECT * FROM tbl_scoreboard WHERE contestant = '{$cl}' ");
		$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
		return $this->result;
		
	}

	function getScoreCount(){
		$this->query = $this->db->query("SELECT * FROM tbl_scoreboard ");
		return $this->query->rowCount();
	}


}