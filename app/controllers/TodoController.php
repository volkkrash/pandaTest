<?php

class TodoController extends Controller {

  function index() { 
    $currentPage = $_GET['page'] ?? 1;

    $model = new TodoModel();
    $data = $model->pageData(PAGINATION_COUNT , $currentPage);
    $data["nav"] =  $model->pageLinks(PAGINATION_COUNT, $currentPage);

    $this->view->generate('index_todo_view.php', 'layout.php', $data);
  }

  function create() { 
    $this->view->generate('create_todo_view.php', 'layout.php');
  }

  function store() { 
  	$model = new TodoModel();
    $result = $model->insert();

    if($result)
      $msg = "Успешно сохранено";
    else 
      $msg = "Ошибка сохранения";

    $this->view->generate('404_view.php', 'layout.php', $msg);
  }

  function edit() { 
    if(!isAdmin()) header('Location:/');

    $model = new TodoModel();
    $data = $model->getById();
    
    $this->view->generate('edit_todo_view.php', 'layout.php', $data);
  }

  function update() { 
    if(!isAdmin()) header('Location:/');

    $model = new TodoModel();
    $result = $model->update();
    if($result) {
      $msg = "Успешно сохранено";
    } else {
      $msg = "Ошибка сохранения";
    }
    
    $this->view->generate('404_view.php', 'layout.php', $msg);
  }
}