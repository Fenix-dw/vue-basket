<div class="container">
	<div class="row justify-content-md-center mt-4">
		<div class="col-md-8">
			<div id="table">

				<h2>Корзина</h2>
				<table class="table">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col-1">#</th>
				      <th scope="col-2">Название</th>
				      <th scope="col-1">Цена</th>
				      <th scope="col-2">Количество</th>
				      <th scope="col-6">Действие</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				      <td>
				      		<input type="text" value="2" class="form-group">
				      		<button class="btn btn-danger">Удалить</button>
				      </td>
				    </tr>
				   
				  </tbody>
				</table>
			</div>
		</div>
		<div class="col-md-3">
			<div id="form-product">
			<button @click="getProducts">получить</button>
				
				<h2>Новый товар</h2>
				<form @submit.prevent="setProduct">
				  <div class="form-group mb-0">
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