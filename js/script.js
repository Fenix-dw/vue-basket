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