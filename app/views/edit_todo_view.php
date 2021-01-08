<form method="POST" action="/todo/update/?id=<?=$data['id']?>">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body"><!-- Начало текстового контента -->
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">Основные данные</a>
              </li>
            </ul>
            <br>
            <div class="tab-content">
              <div id="home" class="container tab-pane active"><br>
                <div class="form-group">
                  <p class="">Имя: <?= $data['name'] ?></p>
                </div>

                <div class="form-group">
                  <p class="">Email: <?= $data['email'] ?></p>
                </div>

                <div class="form-group">
                  <label for="description">Описание</label>
                  <textarea name='description'
                   id='description'
                   class="form-control"
                   rows="3"><?= $data['text'] ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
            <a href="/" class="btn btn-block btn-primary">Назад</a>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-body">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="task_status" <?=($data["status"] === '1') ? "checked":"";?>> отметить как выполненное</label>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
</form>