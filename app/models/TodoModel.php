<?php


class TodoModel extends Model
{
	public function __construct() {
		parent::__construct();

	}

	public function pageData($count,int $from) {
		$data = [];
		$sort = new Sort();
		$sortParams = $sort->getItems();
		$isSorted = false;

		if(isset($_GET['sortBy'])) {
			$sortVals = explode('_', $_GET['sortBy']);
			foreach ($sortParams as $key => $arSort) {
				if($arSort['name'] == $_GET['sortBy']) {
					
					$sortParams[$key]['selected'] = true;
				}
			}
			
			$isSorted = true;
		}
		$data['sort'] = $sortParams;

		$query = "SELECT * FROM `todo_list` ORDER BY ";
		
		if($isSorted) {
			foreach ($sortParams as $colName => $arSort) {
				
				if($arSort['selected'] == true) {
					
					$query .= "`".$arSort['row_name']."` ".$arSort['sort'].' ';
				}
			}
		} else {
			$query .= "`id` DESC ";
		}


		$limit = "LIMIT $count";
		
		if ( $from > 1)
		{
			$from = --$from*$count;
			$limit = "LIMIT $from, $count";
		}
		$query .= $limit;
		$result = $this->query($query, PDO::FETCH_ASSOC) ?? '';
		
		while($row = $result->fetch()) {
			$data["items"][] = [
				'id' => $row['id'],
				'name' => $row['name'],
				'text' => $row['text'],
				'email' => $row['email'],
				'status' => $row['status'],
				'changed' => $row['changed']
			];
		}
		
		return $data;
	}

	public function pageLinks($limit, $currentPage) {
		$total =  $this->getCount('todo_list');
		if ($total <= $limit) return false;

		$paginator = new Pagination($total, $currentPage, $limit, '?page=');

		return $paginator->links();
	}
	
	public function insert() {
		$name 	= $_POST['name']; 
		$email 	= $_POST['email']; 
		$text 	= $_POST['description'];
		
		if(!empty($name) && !empty($email) && !empty($text)) {
			$query = "INSERT INTO `todo_list`(`name`, `email`, `text`) VALUES ('$name', '$email', '$text')";
			$result = $this->query($query) ?? '';

			return $result;
		} else {
			return '';
		}
		
	}

	public function getById() {
		$id = $_GET['id'];

		$query = "SELECT * FROM `todo_list` WHERE id=$id";
		$result = $this->query($query) ?? '';

		$row = $result->fetch();
		return $row;
	}

	public function update() {
		$id = $_GET['id'];
		$text = $_POST['description'];

		$status = (isset($_POST['task_status']) == true) ? intval(1) : intval(0) ; 
		
		$query = "UPDATE `todo_list` SET `text`='$text',`status`=$status,`changed`=1 WHERE id=$id";
		$result = $this->query($query) ?? '';
		
		return $result;
	}

	public function getCount($table) {
		$query = "SELECT COUNT( `id` ) as 'count' FROM $table WHERE 1";
		$result = $this->query($query) ?? '';
		$row = $result->fetch();

		return $row[0]; 
	}
}
