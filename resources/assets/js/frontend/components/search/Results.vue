<template>

    <div v-if="showResult">
        
        <div class="block content-block search-results" data-aos="zoom-in" v-if="filteredCourse.length">

            <div class="container-fluid jobs px180 text-center">
                
                <h2 class="title text-nblue fs40 mb60 text-center">Search Results</h2>

                
                <div class="filter mb80">

                    <a href="#" class="btn" @click.prevent="type = 'all'" :class="type == 'all' ? 'active' : ''">
                        All
                    </a>
                    
                    <a href="#" class="btn" @click.prevent="type = 'Australia'" :class="type == 'Australia' ? 'active' : ''">
                        <img src="/svg/courses/aussie.svg" class="img-fluid mr10" alt="">
                        Australia
                    </a>
                    
                    <a href="#" class="btn" @click.prevent="type = 'Canada'" :class="type == 'Canada' ? 'active' : ''">
                        <img src="/svg/courses/canada.svg" class="img-fluid mr10" alt="">
                        Canada
                    </a>
                    
                    <a href="#" class="btn" @click.prevent="type = 'New Zealand'" :class="type == 'New Zealand' ? 'active' : ''">
                        <img src="/svg/courses/NZ.svg" class="img-fluid mr10" alt="">
                        New Zealand
                    </a>
                
                </div>

                <div class="row" v-for="(course, index) in courseDisplay">
                
                    <div class="col-sm-12 item mb30" data-aos="fade-up">

                        <div class="card text-left">
                        
                            <div class="card-header linear-gradient-teal">
                        
                                <h2 class="card-title fs18 text-white mb0">{{ course.title }}</h2>
                        
                            </div>
                        
                            <div class="card-body relative">
                                <div class="row course-info">
                                    <div class="col-sm-3 for-logo">

                                    </div>
                                    <div class="col-sm-8 for-desc">
                                        <p class="title fs18 text-black">About the course</p>
                                        <p class="basic fs15">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae odit cum ipsum quis ratione earum dolorem doloremque a perferendis eveniet.</p>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th class="title fs18 text-black">Carrer Opportunities</th>
                                                    <th class="title fs18 text-black">Duration</th>
                                                    <th class="title fs18 text-black">Availability</th>
                                                    <th class="title fs18 text-black"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="basic fs15">Enrolled Nurse (DIV2)</td>
                                                    <td class="basic fs15">58 Weeks</td>
                                                    <td class="basic fs15">Melbourne, Perth, Sydney</td>
                                                    <td class="basic fs15"><a href="#" class="btn btnread-more text-uppercase">Inquire now</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

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
