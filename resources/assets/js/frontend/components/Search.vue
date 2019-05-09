<template>

	<div class="search-courses">

	    <div class="container-fluid intro px180">

	        <div class="clearfix"></div>
			<img data-src="svg/courses/papers.svg" class="img-fluid img-papers" alt="">


	        <h1 class="title text-white fs40 mb30">Search Courses</h1>

	        <div class="form-group w-100">

	          <input type="text" class="form-control course-search" aria-describedby="helpId" v-model="key">

	        </div>

			<img data-src="svg/courses/bookshelf.svg" class="img-fluid img-book" alt="">
	    </div>

	</div>

</template>

<script>

import { mapGetters } from 'vuex';

export default {

	props: ['courses'],

    computed: {

	    ...mapGetters(['filteredCourse']),

	    key: {
	        
	        get() {

	            return this.$store.state.key;
	            
	        },
	        set (value){

	            this.$store.commit('updateKey', value)

	        }
	    }

	},

   	mounted() {
        
        this.$store.commit('courses', this.courses);

   	}

   

};
</script>
