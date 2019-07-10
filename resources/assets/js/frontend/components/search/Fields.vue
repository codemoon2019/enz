<template>

	<div class="search-courses">

		<div class="container-fluid px180 pt30 mb80 relative">
    
        	<!-- <img data-src="svg/courses/papers.svg" class="img-fluid img-papers" alt=""> -->
	
			<h1 class="title text-white mb30">Courses</h1>
    
        	<!-- <img data-src="svg/courses/bookshelf.svg" class="img-fluid img-book" alt=""> -->

			<div class="row">
	
				<div class="col-lg-4 mb30">
	
					<h2 class="title text-white fs18">Area of Study</h2>

					<v-select class="" :options="areasList" v-model="area_name" disabled label="title" placeholder="Select area of study" v-if="area == 'true'"></v-select>

					<v-select class="" :options="areasList" v-model="area_name" label="title" placeholder="Select area of study" v-else></v-select>

				</div>
				
				<div class="col-lg-4 mb30">
	
					<h2 class="title text-white fs18">Institution</h2>
	
					<v-select class="" :options="institutionsList" v-model="institution_name" label="title"  placeholder="Select institution"></v-select>

				</div>
				
				<div class="col-lg-4 mb30">
	
					<h2 class="title text-white fs18">Course Title</h2>

					<div class="input-group mb-3">
						<input type="text" class="form-control course-search" v-model="local_course_name" placeholder="Enter course title">
						<div class="input-group-append" @click="searchCourseName">
							<button class="btn btnview-more btnsearch" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> 
						</div>
					</div>

				</div>

			</div>

		</div>
		
	</div>

</template>

<script>

// import ClickOutside from 'vue-click-outside'

import vSelect from 'vue-select'

import { mapGetters } from 'vuex';

export default {

    props: ['institutions', 'areas', 'area'],

    components:{

        vSelect

    },

    data() {

        return {

        	local_course_name: '',

        }
    
    },    
    computed: {
        
        ...mapGetters(['institutionsList', 'areasList', 'courses']),

	    course_name: {
	        
	        get() {

	            return this.$store.state.course_name;
	            
	        },
	        set (value){

	            this.$store.commit('updateCourseName', value);

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
	    },

	},

	methods: {

		suggestionClick(course_name){

			this.course_name = course_name;

		},

		searchCourseName(){

        	this.$store.commit('updateCourseName', this.local_course_name);

		},

	},

	watch: {
		
		area_name: function (value) {
			
   			this.$store.dispatch('getCourses')
		
		},
		
		institution_name: function (value) {
			
   			this.$store.dispatch('getCourses')
		
		},
		
		course_name: function (value) {
			
   			this.$store.dispatch('getCourses')
		
		},
		
		local_course_name: function (value) {

			if (value == '' || value == null) {

        		this.$store.commit('updateCourseName', this.local_course_name);

   				this.$store.dispatch('getCourses')
				
			}
		
		},

	},

	// directives: {
	
	// 	ClickOutside
	
	// },

   	mounted() {

        // Remit institutions / courses data in store
        this.$store.commit('institutions', this.institutions);

        // Remit areas data in store
        this.$store.commit('areas', this.areas);

        if (this.area == 'true') {

	        this.$store.commit('updateAreaName', JSON.parse(this.areas)[0])
        
        }
        
   	},  

};

</script>
