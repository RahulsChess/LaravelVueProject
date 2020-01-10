<template>
<div>
    <Header></Header>
    <Content  :content="details" ></Content>

    <Footer></Footer>


</div>

</template>

<script>
import Header from './Header';
import Content from './Content';
import Footer from './Footer';


export default {
    props:['details'],
    components:{
        Header,Content,Footer
    },
    data:function(){
        return {
               Active:true,

        }
    }


}
</script>

<style>

</style>
