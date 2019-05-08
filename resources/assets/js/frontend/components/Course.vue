<template>

    <div class="container">
        

		<div class="row">
			<div class="col-md-12" v-for="(course, index) in course">
				
				<!-- {{ course.title }} -->

			</div>
		</div>



    </div>

</template>

<script>

import { mapGetters } from 'vuex';

export default {

    data() {

        return {

            count: 6

        }
    
    },

    computed: {

        // Get Courses
        courses: function(){
            
        	return this.$store.getters.filteredCourse.slice(0, this.count);

        }

    }


};

</script>
