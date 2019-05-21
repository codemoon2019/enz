<template>

    <div v-if="showResult">
        
        <div class="block content-block search-results" data-aos="zoom-in" v-if="filteredCourse.length">

            <div class="container-fluid jobs px180 text-center">
                
                <h2 class="title text-nblue fs40 mb60 text-center">Search Results</h2>

                <ul class="nav nav-tabs filter mb80">

                    <li>
                        
                        <a data-toggle="tab" href="#all" class="btn default active show">
                            
                            All
                            <br>
                            <span>({{ filteredCourse.length }})</span>

                        </a>
                        
                    </li>

                    <li>

                        <a data-toggle="tab" href="#australia" class="btn">
                        
                            <img src="/svg/courses/aussie.svg" class="img-fluid mr10" alt=""> Australia
                            <br>
                            <span>({{ australia.length }})</span>

                        </a>
                    
                    </li>

                    <li>
                    
                        <a data-toggle="tab" href="#canada" class="btn">
                    
                            <img src="/svg/courses/canada.svg" class="img-fluid mr10" alt=""> Canada
                            <br>
                            <span>({{ canada.length }})</span>
                    
                        </a>
                    
                    </li>

                    <li>
                    
                        <a data-toggle="tab" href="#new_zealand" class="btn">
                    
                            <img src="/svg/courses/NZ.svg" class="img-fluid mr10" alt=""> New Zealand
                            <br>
                            <span>({{ new_zealand.length }})</span>
                    
                        </a>
                    
                    </li>

                </ul>

                <div class="tab-content">
                    
                    <div id="all" class="tab-pane fade in active show">

                        <div class="row" v-for="(course, index) in all_courses">

                            <course-details :course="course"></course-details>

                        </div>

                        <div class="text-center" v-if="count_all < filteredCourse.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_all += 5">View more</button>

                        </div>

                    </div>

                    <div id="australia" class="tab-pane fade">
                    
                        <div class="row" v-for="(course, index) in australia_courses">

                            <course-details :course="course"></course-details>

                        </div>

                        <div class="noresult text-center" v-if="! australia_courses.length">
            
                            <p class="basic text-muted">No result</p>

                        </div>

                        <div class="text-center" v-if="count_australia < australia.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_australia += 5">View more</button>

                        </div>

                    </div>
                    
                    <div id="canada" class="tab-pane fade">

                        <div class="row" v-for="(course, index) in canada_courses">

                            <course-details :course="course"></course-details>

                        </div>

                        <div class="noresult text-center" v-if="! canada_courses.length">
            
                            <p class="basic text-muted">No result</p>

                        </div>

                        <div class="text-center" v-if="count_canada < canada.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_canada += 5">View more</button>

                        </div>

                    </div>
                    
                    <div id="new_zealand" class="tab-pane fade">

                        <div class="row" v-for="(course, index) in new_zealand_courses">

                            <course-details :course="course"></course-details>

                        </div>

                        <div class="noresult text-center" v-if="! new_zealand_courses.length">
            
                            <p class="basic text-muted">No result</p>

                        </div>

                        <div class="text-center" v-if="count_new_zealand < new_zealand.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_new_zealand += 5">View more</button>

                        </div>

                    </div>
                
                </div>
                
            </div>

        </div>

        <div class="noresult text-center" v-else>
            
            <p class="basic text-muted">No result</p>

        </div>

    </div>

</template>

<script>

import { mapGetters } from 'vuex';

import courseDetails from './CourseDetails.vue';

export default {

    components: { courseDetails },

    data() {

        return {

            count_all: 5,

            count_australia: 5,
            
            count_canada: 5,
            
            count_new_zealand: 5,

            australia : [],

            canada : [],

            new_zealand : [],

        }
    
    },

    computed: {
        
        ...mapGetters(['suggestions', 'showResult']),

        filteredCourse:  function(){

            return this.$store.getters.filteredCourse;

        },

        all_courses: function(){

            return this.filteredCourse.slice(0, this.count_all);

        },

        australia_courses: function(){

            return this.australia.slice(0, this.count_australia);

        },

        canada_courses: function(){

            return this.canada.slice(0, this.count_canada);

        },

        new_zealand_courses: function(){

            return this.new_zealand.slice(0, this.count_new_zealand);

        },


    },

    methods: {

        limit_text(data){
           
            return data.length > 400 ? data.substr(0, 400) + '...' : data;
       
        }

    },

    watch: {

        filteredCourse(value){

            let australia   = this.australia = [];
            
            let canada      = this.canada = [];
            
            let new_zealand = this.new_zealand = [];

            value.forEach(function(element) {

                switch(element.country) {
                    
                    case 'Australia':

                        australia.push(element);

                    break;
                    
                    case 'Canada':
                    
                        canada.push(element);
                    
                    break;
                    
                        new_zealand.push(element);
                    
                    default:
                
                }
            
            });

        }

    }

};

</script>
