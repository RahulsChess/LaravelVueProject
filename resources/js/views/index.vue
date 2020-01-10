<template>
	<div class="b-row">
		<ul>
			<li v-for="(link, index) in links" :key="index">
				<a :class="{active: link.link === currentComponent}" @click="setCurrentComponent(link.link)">{{ link.label }}</a>
			</li>
		</ul>
		<component :is="currentComponent"></component>
	</div>
</template>

<script>
import AllProducts from '@/components/AllProducts'
import AddProducts from '@/components/AddProducts'
import ProductDetail from '@/components/ProductDetail'
	export default {
		components: {
			AllProducts,
			AddProducts,
			ProductDetail
		},
		data() {
			return {
				currentComponent: '',
				title: 'Home',
				links: [
					{ 'link': 'ProductDetail', 'label': 'Product Detail' },
					{ 'link': 'AddProducts', 'label': 'Add Products' },
					{ 'link': 'AllProducts', 'label': 'All Products' }
				]
			}
		},
		methods: {
			setCurrentComponent(currentTab) {
				this.currentComponent = currentTab
			}
		}
	}
</script>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  color: white;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
li .active {
  background-color: #111;
}
</style>
