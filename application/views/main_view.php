<div id="wrap" class="container">
	<div class="row justify-content-md-center mt-4">
		<div class="col-md-7">
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
				    <tr v-for="product in products">
				      <th scope="row">{{ product.id }}</th>
				      <td>{{ product.title }}</td>
				      <td >{{ product.price * product.quantity }}$</td>
				      <td>{{ product.quantity }}</td>
				      <td class="form-group" >
				      	<div style="width: 100%">
				      		<input type="number" v-model="product.quantity" @change="changeProduct(product.id, product.quantity)"  style="width: 20%">
				      		<button @click="deleteProduct( product.id)" class="btn btn-danger">Удалить</button>
				      	</div>
				      </td>
				    </tr>
				  </tbody>
				</table>
					<div class="coll">
						<h3>Количество товаров: {{ counts() }}</h3>
						<h3>Общая стоимость: {{ sum() }}$</h3>
						<transition name="fade">
						    <div class="alert alert-success alert-dismissible fade show"  v-if="show" role="alert">
							  Заказ оформлен
							</div>					
						</transition>							
						<button @click="checkout" class="btn btn-warning">Оформить заказ</button>
					</div>
			</div>
		</div>
		<div class="col-md-3">
			<div id="form-product">
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
			</div>
		</div>
	</div>
</div>