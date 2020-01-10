<template>
  <div>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a  :title-link-class="linkClass(0)"  tabindex="0"  class="nav-link" href="#" @click="changeTab">Product Details</a>
      </li>

      <li class="nav-item">
                  <a :title-link-class="linkClass(1)" tabindex="1" class="nav-link"  @click="changeTab" href="#">Price</a>
    </li>
      <li class="nav-item">
        <a :title-link-class="linkClass(2)" tabindex="2" class="nav-link"  @click="changeTab" href="#">Images</a>
      </li>
    </ul>
  </div>
  <div class="card-body" >

    <div class="container">
		<div class="card">
			<div class="container-fliud">
                <div class="wrapper" v-if="component=='Price'">

                    <Price :content="content"></Price>

                </div>
                <div class="wrapper" v-if="component=='Images'">

                    <ProductImage :content="content"></ProductImage>

                </div>
				<div class="wrapper row" v-if="component=='Product Details'">
					<div class="preview col-md-6">

						<div class="preview-pic tab-content">
						  <div class="tab-pane active"  :id="imageId">

<img v-if="image != ''" v-bind:src="image" />
<img v-else v-bind:src="url+content.product_images[0].image" />


                          </div>

						</div>
						<ul class="preview-thumbnail nav nav-tabs navi" >
						  <li class="active"><a style="margin-left: 20px;" v-for="(image , key) in content.product_images" data-toggle="tab" :key="++key" :data-target="id+key"  @click="changeImage"   >

                              <img :src="url+image.image" />

                              </a></li>

						</ul>

					</div>
					<div class="details col-md-6">
					  <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <a data-toggle="modal" data-target="#myModal">	<h3 v-if="name" class="product-title text-danger">{{name}}</h3>
                <h3 v-else class="product-title text-danger">{{content.name}}</h3>
            </a>
        </div>
    </div>








<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          </div>
          <div class="modal-body">
            <strong class="text-info">Product Name</strong>  <input type="text" v-model="name"  name="name" @keyup.enter="changeName" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="myBtn" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>




						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<!-- <span class="review-no">41 reviews</span> -->

						</div>
						<p class="product-description">{{content.desc}}.</p>

						<!-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> -->



							<h4 class="price">Size: <span class="size" v-for="(prices , key)  in content.product_prices" :key="key" data-toggle="tooltip" title="small"><input class="col-md-2 text-info" type="text" name="size[]" disabled :value="prices.size"></span></h4>
                            <h4 class="price"> price: <span class="size" v-for="(prices , key)  in content.product_prices" :key="key"> <input class="col-md-2 text-success" disabled type="text" name="price[]" :value="prices.price">$</span></h4>
						<h4 class="price"> Qty: <span class="size"><input class="col-md-2 text-danger" type="text" disabled  name="qty" :value="content.qty"> </span></h4>

						<!-- <h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5> -->
						<!-- <div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div> -->















					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>




  </div>
</template>

<script>
import Price from './Price';
import ProductImage from './ProductImage';
export default {
    props:['content','show'],
       components:{
           Price,ProductImage
    },
       template: '#bs-modal',

    data:function(){
        return {
            url:'http://localhost:8000/',
        tabIndex: 0,
            id:"#pic-",
            imageId:'',
            image:'',
            component:'Product Details',
            demo:'nav-link',
            isActive:true,
              hasError: false,
                    name:''
        }
    },

    mounted(){
         this.name=this.content.name
    },

    methods:{
        changeImage:function(event){
          this.image=event.target.src;
          //alert(window.location);
          console.log(this.$route);
        },
  linkClass(idx) {

        if (this.tabIndex === idx) {
          return ['bg-primary', 'text-light']
        } else {
          return ['bg-light', 'text-info']
        }
      },

        changeTab:function(event){
            this.demo="nav-link";
            if(event.target.text){
 this.component=event.target.text;



                }



        },

          changeName: function () {

               let formData = new FormData();
         formData.append('name', event.target.value);
     formData.append('id', this.content.id);
          axios.post('/formSubmitUpdate', formData)
                .then(function (response) {
                    this.content=response.data.data

    document.getElementById("myBtn").click();

})
      // Some save logic goes here...

      alert("shubham is Great")
    }
    }

}
</script>

<style scoped>

/*****************globals*************/

.navi li {
  display: inline-flex;
flex-grow: 1;

}
body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: capitalize;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: capitalize;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }
            a:active {
    color: blue;

}
a[tabindex]:focus {
    color:gray;
    outline: none;
    background-color:white;
}

/*# sourceMappingURL=style.css.map */
</style>
