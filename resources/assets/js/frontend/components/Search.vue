<template>

    <div class="container">
        
        <input type="text" class="form-control" v-model="key">

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
