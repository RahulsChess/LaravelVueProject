<template>
<div>
    <div class="row ">
        <div class="col-md-3"><h1>Products Images</h1></div>
        <div class="col-md-3 zoom" v-for="(image , key) in content.product_images" :key="key">

            <img class="img-thumbnail" :src="url+image.image">
        </div>
    </div>

</div>
</template>

<script>
export default {
 props:['content'],

    data:function(){
        return {
            url:'http://localhost:8000/',

            id:"#pic-",
            imageId:'',
            image:'',
            component:'Product Details'
        }
    }
}
</script>

<style scoped>
.zoom {
  padding: 50px;
  background-color:wheat;
  transition: transform .2s; /* Animation */
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
