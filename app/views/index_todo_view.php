<section class="section-task-list">
  <div class="container">
    <div class="row">
      <div class="section-top mb-3 col-12 d-flex justify-content-between">
        <h1 class="section-title">Список задач</h1>
        <a href="/todo/create" class="btn btn-primary">Добавить новую</a>
      </div>
    </div>

    <?if(isset($data['sort'])) {?>
    <div class="row">
      <div class="sort-container p-3">
        <div class="sort-body border p-3">
          <div class="sort-top">
            <h6>Сортировать:</h6>
          </div>
          <form action="">
            <div class="sort-select-container form-group d-flex">
              <div class="group-item mx-2">
                <select class="form-control" name="sortBy" id="">
                  <?foreach ($data['sort'] as $sortItem) {?>
                    <option value="<?=$sortItem['name']?>" <?=($sortItem['selected']) ? 'selected' : '';?>><?=$sortItem['text']?></option>
                  <?}?>
                </select>
              </div>
              <button type="submit" class="btn btn-secondary">Применить</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?}?>

    <div class="row">
      <div class="col-12 task-list-container">
        <?
        if(isset($data['items']) && !empty($data['items'])) {
          foreach ($data['items'] as $todoItem) {?>
            <div class="list-item">
              <div id="item_<?=$todoItem['id']?>" class="task-card border p-3 mb-3 bg-light">
                  <div class="card-top d-flex justify-content-between px-3 py-1 border-bottom">
                    <h4 class="card-creator-name"><?=$todoItem["name"];?> <span class="card-email text-muted"> - <?=$todoItem["email"];?></span></h4>
                    <p class="card-status <?=($todoItem["status"] === "1") ? 'text-success' : 'text-muted';?>"><?=($todoItem["status"] === "1") ? 'Выполнено' : 'В работе';?></p>
                  </div>
                  <div class="card-body">
                    <p class=""><?=$todoItem["text"];?></p>
                  </div>
                  <div class="card-bottom d-flex justify-content-between text-secondary px-3 align-items-center">
                  <?if(isAdmin()) {?>
                    <a class="btn btn-outline-secondary btn-sm" href="/todo/edit/?id=<?=$todoItem['id']?>">редактировать</a>
                  <?}?>
                  <?if($todoItem["changed"]) {?>
                    <p>отредактировано администратором</p>
                  <?}?>
              
                  </div>
              </div>
            </div>
          <?}
        }?>

      </div>
    </div>
    <?if($data['nav']){?>
    <div class="row justify-content-center">
        <div class="col-md-9">
          <nav>
              <?=$data['nav'];?>
          </nav>
        </div>
    </div>
    <?};?>
  </div>        
</section>
