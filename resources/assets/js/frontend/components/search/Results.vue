<template>

    <div v-if="showResult">
        
        <div class="block content-block search-results mb100" data-aos="zoom-in">

            <div class="container-fluid jobs px180 text-center">
                
                <h2 class="title text-nblue fs40 mb60 text-center">Search Results</h2>

                <ul class="nav nav-tabs filter mb80">

                    <li>
                        
                        <a data-toggle="tab" href="#all" class="btn mb30 default active show">
                            
                            All <span>({{ courses.length }})</span>

                        </a>
                        
                    </li>

                    <li>

                        <a data-toggle="tab" href="#australia" class="btn mb30">
                        
                            <img src="/svg/courses/aussie.svg" class="img-fluid mr10" alt=""> Australia <span>({{ australia.length }})</span>

                        </a>
                    
                    </li>

                    <li>
                    
                        <a data-toggle="tab" href="#canada" class="btn mb30">
                    
                            <img src="/svg/courses/canada.svg" class="img-fluid mr10" alt=""> Canada <span>({{ canada.length }})</span>
                    
                        </a>
                    
                    </li>

                    <li>
                    
                        <a data-toggle="tab" href="#new_zealand" class="btn mb30">
                    
                            <img src="/svg/courses/NZ.svg" class="img-fluid mr10" alt=""> New Zealand <span>({{ new_zealand.length }})</span>
                    
                        </a>
                    
                    </li>

                </ul>

                <div class="tab-content">
                    
                    <div id="all" class="mb50 tab-pane fade in active show">

                        <div class="row justify-content-center">

                            <div class="col-sm-4" v-for="(course, index) in all_courses">

                                <course-details :course="course"></course-details>

                            </div>

                        </div>

                        <div class="text-center mt50" v-if="! courses.length">
            
                            <img src="/svg/no-result.svg" class="img-fluid no-result-image mb30" alt="">
                            
                            <p class="title text-nblue fs24">No result</p>

                        </div>

                        <div class="text-center mt50" v-if="count_all < courses.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_all += 6">View more</button>

                        </div>

                    </div>

                    <div id="australia" class="mb50 tab-pane fade">
                    
                        <div class="row justify-content-center">

                            <div class="col-sm-4" v-for="(course, index) in australia_courses">

                                <course-details :course="course"></course-details>

                            </div>

                        </div>

                        <div class="text-center mt50" v-if="! australia_courses.length">
            
                            <img src="/svg/no-result.svg" class="img-fluid no-result-image mb30" alt="">

                            <p class="title text-nblue fs24">No result</p>

                        </div>

                        <div class="text-center mt50" v-if="count_australia < australia.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_australia += 6">View more</button>

                        </div>

                    </div>
                    
                    <div id="canada" class="mb50 tab-pane fade">

                        <div class="row justify-content-center">

                            <div class="col-sm-4" v-for="(course, index) in canada_courses">

                                <course-details :course="course"></course-details>

                            </div>

                        </div>

                        <div class="text-center mt50" v-if="! canada_courses.length">
            
                            <img src="/svg/no-result.svg" class="img-fluid no-result-image mb30" alt="">

                            <p class="title text-nblue fs24">No result</p>

                        </div>

                        <div class="text-center mt50" v-if="count_canada < canada.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_canada += 6">View more</button>

                        </div>

                    </div>
                    
                    <div id="new_zealand" class="mb50 tab-pane fade">

                        <div class="row justify-content-center">

                            <div class="col-sm-4" v-for="(course, index) in new_zealand_courses">

                                <course-details :course="course"></course-details>

                            </div>

                        </div>

                        <div class="text-center mt50" v-if="! new_zealand_courses.length">
            
                            <img src="/svg/no-result.svg" class="img-fluid no-result-image mb30" alt="">
                            
                            <p class="title text-nblue fs24">No result</p>

                        </div>

                        <div class="text-center mt50" v-if="count_new_zealand < new_zealand.length">
                                    
                            <button class="btn btnview-more text-uppercase mb30" @click="count_new_zealand += 6">View more</button>

                        </div>

                    </div>
                
                </div>
                
            </div>

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

            count_all: 6,

            count_australia: 6,
            
            count_canada: 6,
            
            count_new_zealand: 6,

            australia : [],

            canada : [],

            new_zealand : [],

        }
    
    },

    computed: {
        
        ...mapGetters(['suggestions', 'showResult', 'courses']),

        all_courses: function(){

            return this.courses.slice(0, this.count_all);

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

        courses(value){

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
                    
                    default:
                
                        new_zealand.push(element);
                }
            
            });

        }

    }

};

</script>
