<template>

    <div v-if="key">

        <div class="block content-block search-results" data-aos="zoom-in" v-if="courses.length">

            <div class="container-fluid jobs px475 text-center">
                
                <h2 class="title text-nblue fs40 mb60 text-center">Search Results</h2>
                
                <div class="row" v-for="(course, index) in courseDisplay">
                
                    <div class="col-sm-12 item mb30">

                        <div class="card text-left">
                        
                            <div class="card-header linear-gradient-teal">
                        
                                <h2 class="card-title fs18 text-white mb0">{{ course.title }}</h2>
                        
                            </div>
                        
                            <div class="card-body relative">

                                <div class="qualifications">
                                
                                    <p class="title fs18 text-black">Qualifications</p>
                                
                                    <ul>
                                    
                                        <li class="basic fs15">College Graduate</li>
                                    
                                        <li class="basic fs15">With good written and verbal communication skills</li>
                                    
                                    </ul>
                                
                                </div>

                                <a href="#" class="btn btnread-more text-uppercase">Apply</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="text-center" v-else>
                    
            <p class="basic text-muted">No result</p>

        </div>

        <div class="text-center" v-if="count < courses.length">
                    
            <button class="btn btnview-more text-uppercase mb30" @click="count += 6">View more</button>

        </div>
        <div class="text-center" v-else-if="count = courses.length">
                    
            <p class="basic text-muted">End of result</p>

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
        courses:  function(){

            return this.$store.getters.filteredCourse;

        },

        // Course to be display
        courseDisplay: function(){
            
            return this.courses.slice(0, this.count);

        },

        // Get Key
        key: function(){
            
            return this.$store.state.key;

        }

    },

    watch: {

    	key(){
    		this.count = 6;
    	}

    }


};

</script>
