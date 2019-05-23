<template>

	<div class="search-courses">

		<div class="container-fluid px180 pt30 mb80 relative">
    
        	<img data-src="svg/courses/papers.svg" class="img-fluid img-papers" alt="">
	
			<h1 class="title text-white mb30">Courses</h1>
    
        	<img data-src="svg/courses/bookshelf.svg" class="img-fluid img-book" alt="">

			<div class="row">
	
				<div class="col-sm-4 mb30">
	
					<h2 class="title text-white fs18">Area of Study</h2>
	
					<v-select class="" :options="areasList" v-model="area_name" label="title"></v-select>

				</div>
				
				<div class="col-sm-4 mb30">
	
					<h2 class="title text-white fs18">Institution</h2>
	
					<v-select class="" :options="institutionsList" v-model="institution_name" label="title"></v-select>

				</div>
				
				<div class="col-sm-4 mb30">
	
					<h2 class="title text-white fs18">Course Title</h2>
	
					<input type="text" v-click-outside="hide" class="form-control course-search" v-model="course_name">

					<div class="suggestions bg-white" v-if="course_name != '' && showSuggestions">

						<ul class="list-unstyled" v-if="filteredCourse.length">

							<li class="cursor-pointer" v-for="(suggestion, key) in suggestions" @click="suggestionClick(suggestion.title)">{{ suggestion.title }}</li>
						
						</ul>

						<ul class="list-unstyled" v-else>

							<li class="not-allowed">Invalid Course Title</li>
						
						</ul>
						
					</div>

				</div>

			</div>

		</div>
		
	</div>

</template>

<script>

import ClickOutside from 'vue-click-outside'

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
        
        ...mapGetters(['institutionsList', 'areasList', 'suggestions', 'filteredCourse']),

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

		},
	 
	    hide () {
	    	
	    	this.showSuggestions = false;
	    }

	},

	directives: {
	
		ClickOutside
	
	},

   	mounted() {

        // Remit institutions / courses data in store
        this.$store.commit('institutions', this.institutions);

        // Remit areas data in store
        this.$store.commit('areas', this.areas);
        
   	},  

};

</script>
