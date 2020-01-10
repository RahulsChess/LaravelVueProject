<template>
	<div class="pagination" >
	  <a class="page-link" @click.prevent="next(paginate.currentPage - 1)">
            &laquo;
        </a>
	  <a v-for="(index in (products.length / paginate.limit)" v-if="index <= paginate.limit" href="#" @click.prevent="next(index)" :class="{'active' : index === paginate.currentPage}">
            {{ index }}
        </a>
	  <a class="page-link" @click.prevent="next(paginate.currentPage + 1)">
            &raquo;
        </a>
	</div>
</template>

<script>
	export default {
		name: 'pagination',
		props: ['paginate', 'products'],
		methods: {
			next(page) {
				this.$emit('pagination', page)
			}
		}
	}
</script>
<style scoped>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
</style>
