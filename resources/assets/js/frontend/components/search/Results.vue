<template>

    <div v-if="showResult">
        
        <div class="block content-block search-results" data-aos="zoom-in" v-if="filteredCourse.length">

            <div class="container-fluid jobs px475 text-center">
                
                <h2 class="title text-nblue fs40 mb60 text-center">Search Results</h2>

                
                <div>

                    <div @click="type = 'all'" :class="type == 'all' ? 'active' : ''">All</div>
                    
                    <div @click="type = 'Australia'" :class="type == 'Australia' ? 'active' : ''">Australia</div>
                    
                    <div @click="type = 'Canada'" :class="type == 'Canada' ? 'active' : ''">Canada</div>
                    
                    <div @click="type = 'New Zealand'" :class="type == 'New Zealand' ? 'active' : ''">New Zealand</div>
                
                </div>

                <div class="row" v-for="(course, index) in courseDisplay">
                
                    <div class="col-sm-12 item mb30" data-aos="fade-up">

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

        <div class="text-center" v-if="count < filteredCourse.length">
                    
            <button class="btn btnview-more text-uppercase mb30" @click="count += 5">View more</button>

        </div>

    </div>

</template>

<script>

import { mapGetters } from 'vuex';

export default {

    data() {

        return {

            count: 5,

            type: 'all'

        }
    
    },

    computed: {
        
        ...mapGetters(['suggestions', 'showResult']),


        // Get Courses
        filteredCourse:  function(){

            return this.$store.getters.filteredCourse;

        },

        // courses: function(){

        //     if (this.type == 'Australia') {

        //     }else if(this.type == 'Canada'){
                
        //     }else if(this.type == 'New Zealand'){
                
        //     }else{

        //     }


        // },

        // Course to be display
        courseDisplay: function(){

            if (this.type == 'Australia') {

                return this.filteredCourse.filter(function(course){

                    return course.country == 'Australia';

                });

            }else if(this.type == 'Canada'){

                return this.filteredCourse.filter(function(course){

                    return course.country == 'Canada';

                });
                
            }else if(this.type == 'New Zealand'){

                return this.filteredCourse.filter(function(course){

                    return course.country == 'New Zealand';

                });
                
            }else{

                return this.filteredCourse.slice(0, this.count);

            }


            // console.log(this.filteredCourse);
            
            // return this.filteredCourse.slice(0, this.count);

        },

    },


};

</script>
