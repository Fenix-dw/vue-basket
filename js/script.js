var app = new Vue({
	el: "#wrap",
	data: {
		show: false,
		title: "",
		price: "",
		response: '',
		products: [],
		url: "/inc/ajax.php"
	},
	methods: {
		checkout() {
			const params = new URLSearchParams();
			params.append("action", "checkout");
			params.append("products", JSON.stringify(this.products));
			axios.post(this.url, params).then((response) => {
				this.show = true;
				this.deleteProducts();
				setTimeout(() => this.show = false ,2000)
			});

		},
		setProduct() {
			const params = new URLSearchParams();
			params.append("title", this.title);
			params.append("price", this.price);
			params.append("action", "setProduct");

			axios.post(this.url, params).then((response) => {
			  this.response = response.data;
			  this.getProducts();
			  this.title = "";
			  this.price = "";
            });
		},
		getProducts() {
			const params = new URLSearchParams();
			params.append("action", "getProducts");
			
			axios.post(this.url, params).then((response) => {
				console.log(response.data);
				this.products = response.data;

			});
		},
		deleteProduct(id) {
			const params = new URLSearchParams();
			params.append("action", "deleteProduct");
			params.append("id", id);

			axios.post(this.url, params).then((response) => {
				this.getProducts();
			});						
		},
		deleteProducts() {
			const params = new URLSearchParams();
			params.append("action", "deleteProducts");

			axios.post(this.url, params).then((response) => {
				this.getProducts();
			});						
		},
		changeProduct(id, quantity) {
			const params = new URLSearchParams();
			params.append("action", "changeProduct");
			params.append("id", id);
			params.append("quantity", quantity);

			axios.post(this.url, params).then((response) => {
				this.getProducts();
			});						
		},
		counts(){
	      var result = 0;
	      this.products.forEach(el=> result += Number(el.quantity));
	      return result;
	    },
	    sum(){
	      var result = 0;
	      this.products.forEach(el=> result += el.quantity*el.price);
	      return result;
	    },			
	},
	created: function() {
		this.getProducts();
	}
});