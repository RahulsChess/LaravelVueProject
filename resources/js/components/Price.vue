<template>
<div>
<div class="row">
 <div class="col-md-6"><h3>Products Price And  Size</h3></div>
<div class="col-md-6"> <table class="table">
    <tr>
        <th>Size</th><th>Price</th>
    </tr>
    <tr v-for="(price , key) in content.product_prices" :key="key" class="text-danger" :id="price.price">
        <td>{{price.size}}</td><td><input type="checkbox" name="Price[]" v-model="checkedNumbers"  :value="price.price" @click="totalPrice(price.price)">{{price.price}}</td>
    </tr>
      <tr  class="text-info">
        <td>Total</td><td>  {{sum }}  </td>
          <br>

  <br>

    </tr>
    </table></div>

</div>

</div>
</template>

<script>
export default {
    props:['content'],
    data:function(){
        return {
       checkedNumbers: []

        }
    },
  computed: {
  	sum() {

    	return this.checkedNumbers.reduce(function (a, b) {
      	return parseInt(a) + parseInt(b);
      }, 0);
    }
  },
    methods:{
    totalPrice:function(value){
        value=parseInt(value);
       this.result+=value

    }
    }


}
</script>

<style>

</style>
