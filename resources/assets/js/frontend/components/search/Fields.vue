<template>

	<div>
	    
		<div>

            <v-select :options="institutionsList" v-model="institution_name" label="title"></v-select>

		</div>

		<div>

            <v-select :options="areasList" v-model="area_name" label="title"></v-select>

		</div>
		
		<div>

			<input type="text" class="form-control" v-model="course_name">

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

        	
        }
    
    },    
    computed: {
        
        ...mapGetters(['institutionsList', 'areasList']),

	    course_name: {
	        
	        get() {

	            return this.$store.state.course_name;
	            
	        },
	        set (value){

	            this.$store.commit('updateCourseName', value)

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

   	mounted() {

        // Remit institutions / courses data in store
        this.$store.commit('institutions', this.institutions);

        // Remit areas data in store
        this.$store.commit('areas', this.areas);
        

   	}

};

</script>
