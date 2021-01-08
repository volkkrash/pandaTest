<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<?if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'N'){?>
				<p class="alert text-danger">Неправильный логин или пароль.</p>
			<?}?>
			<form action="/login/index" method="post">
				<div class="form-group">
					<label for="login">Логин</label>
					<input type="login" class="form-control" id="login" name="login">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Пароль</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>