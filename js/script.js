new Vue({
		el: "#form-product",
		data: {
			show: false,
			title: "",
			price: "",
			response: '',
			url: "/inc/ajax.php"
		},
		methods: {
			setProduct() {
				const params = new URLSearchParams();
				params.append("title", this.title);
				params.append("price", this.price);
				params.append("action", "setProduct");

				axios.post(this.url, params).then((response) => {
				  this.response = response.data;
				  this.show = true;
				  this.title = "";
				  this.price = "";
	            });
			},
		}
	});

new Vue({
	el: "#table",
	data: {
		url: "/inc/ajax.php",
		data: [],
	},
	methods: {
		getProducts() {
			const params = new URLSearchParams();
			params.append("action", "getProducts");
			
			axios.post(this.url).then((response) => {
				
				response.data = this.data;
			});
		},
	}
});