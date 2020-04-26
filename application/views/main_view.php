<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-4">
			<div id="wrap">
				<form @submit.prevent="setProduct">
					<h2>Новый товар</h2>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Название</label>
				    <input type="text" class="form-control" v-model="title" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Цена</label>
				    <input type="text" class="form-control" v-model="price" required>
				  </div>
				  <button type="submit" class="btn btn-success">Добавить товар</button>
				</form>
				<div class="col mt-3">
					<transition name="fade">
					    <div class="alert alert-success alert-dismissible fade show"  v-if="show" role="alert">
						  {{ response }}
						  <button type="button" class="close" @click="[show = !show]" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>					
					</transition>
				</div>
			</div>
		</div>
	</div>
</div>