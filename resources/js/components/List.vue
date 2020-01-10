<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Product Details </h1></div>
                <div class="form-group">
                           <br><br>
                   <input style="margin:20px;" class=" text-success "  type="search" name="search" placeholder="Search" v-model="search" v-on:keyup="searchFilter">


                </div>
                    <div class="card-body">


                               <table class="table">
                                   <tr>
                                       <th>#</th>
                                       <th>
                                          Product Name
                                           </th>

                                           <th>
                                               Description
                                           </th>
                                           <th>
                                               Product Image
                                           </th>
                                       </tr>

                                       <tr v-for="list in products" :key="list.id">

                                             <td>
                                                 {{ list.id }}</td>

                                         <td class="text-info">  <a  v-bind:href="`products/${list.id}`">{{ list.name }}</a></td>

                                                  <td>{{ list.desc}}</td>
  <td><img v-bind:src= "list.product_images[0].image" width="100px" height="100px"></td>

                                           </tr>                                   </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


















<script>
    export default {
        props:['lists'],
        data() {
            return {
                    search:'',
                products: []


            }
        },
        mounted() {
            this.products = this.lists;
        },

   computed:{

   },
        methods:{

                searchFilter:function(){
                        if(this.search)
                        {
 axios.get(`/search/${this.search}`).then(response => (this.products = response.data))
                        }else
                        {
                            this.products = this.lists;
                        }

               }


        }
        }


</script>
