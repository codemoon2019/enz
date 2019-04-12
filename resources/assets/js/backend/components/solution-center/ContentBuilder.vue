<template>
	<div>
		<!-- <div class="text-xs-right">
			<v-btn @click="addBlock()">Add New</v-btn>
		</div> -->
		<v-expansion-panel v-model="panel" expand>
			<draggable  style="width:100%">
		    <v-expansion-panel-content v-for="(item,i) in items" :key="i">
		    	<v-icon slot="actions" color="error">$vuetify.icons.expand</v-icon>
		    	<!-- <v-icon slot="actions" @click.native.stop="deleteItem(item)">clear</v-icon> -->
		      <div slot="header">
						<b>{{ item.title || 'Header' }}</b>
		      </div>
		      <v-card>
		      	<v-container>
		      		<!-- <input type="text" v-model="item.title" class="form-control article-heading" placeholder="Header"> -->
		        	<vue-editor v-model="item.content" :editorToolbar="customToolbar" placeholder="Content..."></vue-editor>
		        	<div class="text-xs-right">
		        		<template v-if="item.id">
			        		<v-btn @click="updateItem(item)">Update</v-btn>
		        		</template>
		        		<template v-else>
			        		<v-btn @click="addItem(item)">Save</v-btn>
		        		</template>
		        	</div>
		      	</v-container>
		      </v-card>
		    </v-expansion-panel-content>
		  </draggable>
	  </v-expansion-panel>
	</div>
</template>

<script>
	import draggable from 'vuedraggable'
	import { VueEditor } from 'vue2-editor'

	export default {
		components: {
			draggable,
			VueEditor
		},
		props: {
			data: { type: Array },
		},
		data() {
			return {
				items: this.data,
				panel: [],
				valid: true,
				customToolbar: [
					['bold', 'italic', 'underline', 'strike'],        // toggled buttons
					['blockquote', 'link', 'code-block'],

					[{ 'header': 1 }, { 'header': 2 }],               // custom button values
					[{ 'list': 'ordered'}, { 'list': 'bullet' }],
					[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
					[{ 'direction': 'rtl' }],                         // text direction

					[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
					[{ 'align': [] }],

					['clean']                                         // remove formatting button
				]
			}
		},
		methods: {
			addBlock() {
				this.items.push({
					title: '',
					content: ''
				})
			},
			addItem(item) {
				this.validate(item);
				if (this.valid == true) {
					axios.post('add-article', {item}).then((response) => {
						console.log(response);
						this.refreshItems();
						this.closePanel();
						this.$toasted.success('Article created.', {icon :{ name: 'check'}}).goAway(1500);
					});
				}
			},
			updateItem(item) {
				this.validate(item);
				if (this.valid == true) {
					axios.post('update-article', {item}).then((response) => {
						console.log(response);
						this.refreshItems();
						this.closePanel();
						this.$toasted.success('Changes have been saved.', {icon :{ name: 'check'}}).goAway(1500);
					});
				}
			},
			deleteItem(item) {
				axios.post('delete-article', {item}).then((response) => {
					this.refreshItems();
					this.$toasted.error('The item has been deleted.', {icon :{ name: 'warning'}}).goAway(1500);
				});
			},
			refreshItems() {
				axios.get('get-article').then((response) => {
					this.items = response.data;
					console.log(response);
				});
			},
			closePanel() {
				this.panel = [];
			},
			validate(item) {
				if(!item.title) {
					this.$toasted.error('Heading is Required.', {icon :{ name: 'warning'}}).goAway(1500);

					return this.valid = false;
				}
				if(item.title.length <= 3) {
					this.$toasted.error('The header may not be less than 3 characters.', {icon :{ name: 'warning'}}).goAway(1500);

					return this.valid = false;
				}
				if(!item.content) {
					this.$toasted.error('Content is Required.', {icon :{ name: 'warning'}}).goAway(1500);

					return this.valid = false;
				}
				if(item.content.length <= 3) {
					this.$toasted.error('The content may not be less than 3 characters.', {icon :{ name: 'warning'}}).goAway(1500);

					return this.valid = false;
				}

				return this.valid = true;
			}
		}
	};
</script>

<style>
	.article-heading {
		margin-bottom: 15px;
	}
</style>