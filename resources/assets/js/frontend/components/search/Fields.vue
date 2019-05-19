<template>

	<div>
	    
		<div>
			<p>Institution</p>
            <v-select :options="institutionsList" v-model="institution_name" label="title"></v-select>

		</div>

		<div>
			<p>Area of Study</p>
            <v-select :options="areasList" v-model="area_name" label="title"></v-select>

		</div>
		
		<div>
			<p>Course Title</p>
			<input type="text" class="form-control" v-model="course_name">

		</div>

		<div v-if="course_name != '' && showSuggestions">

			<ul>

				<li v-for="(suggestion, key) in suggestions" @click="suggestionClick(suggestion.title)">{{ suggestion.title }}</li>
			
			</ul>
			
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
