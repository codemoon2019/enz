<template>

	<div class="container-fluid px180 pt30 mb80">
		<h1 class="title text-nblue mb30">Courses</h1>
		<div class="row">
			<div class="col-sm-4">
				<h2 class="title fs18">Institution</h2>
				<v-select class="" :options="institutionsList" v-model="institution_name" label="title"></v-select>

			</div>

			<div class="col-sm-4">
				<h2 class="title fs18">Area of Study</h2>
				<v-select class="" :options="areasList" v-model="area_name" label="title"></v-select>

			</div>
			
			<div class="col-sm-4">
				<h2 class="title fs18">Course Title</h2>
				<input type="text" class="form-control" v-model="course_name">

				<div class="mt20" v-if="course_name != '' && showSuggestions">

					<ul class="list-unstyled">

						<li class="cursor-pointer" v-for="(suggestion, key) in suggestions" @click="suggestionClick(suggestion.title)">{{ suggestion.title }}</li>
					
					</ul>
					
				</div>
			</div>


		</div>
	    

	</div>

</template>

<script>

import vSelect from 'vue-select'

import { mapGetters } from 'vuex';

export default {

    props: ['institutions', 'areas'],

    components:{

        vSelect

    },

    data() {

        return {

        	showSuggestions: true

        }
    
    },    
    computed: {
        
        ...mapGetters(['institutionsList', 'areasList', 'suggestions']),

	    course_name: {
	        
	        get() {

	            return this.$store.state.course_name;
	            
	        },
	        set (value){

	            this.$store.commit('updateCourseName', value);

	            this.showSuggestions = true;

	        }
	    },

	    institution_name: {
	        
	        get() {

	            return this.$store.state.institution_name;
	            
	        },
	        set (value){

	            this.$store.commit('updateInstitutionName', value)

	        }
	    },

	    area_name: {
	        
	        get() {

	            return this.$store.state.area_name;
	            
	        },
	        set (value){

	            this.$store.commit('updateAreaName', value)

	        }
	    }

	},

	methods: {

		suggestionClick(course_name){

			this.course_name = course_name;

			this.showSuggestions = false;

		}

	},

   	mounted() {

        // Remit institutions / courses data in store
        this.$store.commit('institutions', this.institutions);

        // Remit areas data in store
        this.$store.commit('areas', this.areas);
        
   	}

};

</script>
