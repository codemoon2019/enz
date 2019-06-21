<template>

    <div class="item mb50" data-aos="fade-up">

        <div class="svg-holder mx-auto">

            <img class="img-fluid mb30" :src="course.institution_logo" alt="">

        </div>

        <div class="title-holder">

            <h2 class="card-title fs18 text-black text-center mb30">{{ course.title }}</h2>

        </div>

        <div class="text-center">
            
            <button type="button" class="btn btnread-more text-uppercase btn-course-inquire" :data-school="course.institution.title"  :data-course="course.title">Inquire now</button>

        <!--     <a href="javascript:;" class="modal-trigger btn btnread-more text-uppercase btn-course-inquire" :data-school="course.institution.title"  :data-course="course.title">Inquire now</a> -->

        </div>
        
    </div>

        <!-- <div class="card text-left">
        
            <div class="card-header linear-gradient-teal">
        
        
            </div>
        
            <div class="card-body relative">
                <div class="svg-holder mb20 mx-auto"> -->
                


                <!-- <div class="row course-info">
                
                    <div class="col-sm-3 for-logo text-center align-self-center">


                    </div>
                
                    <div class="col-sm-8 for-desc">
                
                        <p class="title fs18 text-black">About the course</p>
                
                        <p class="basic fs15">{{ limit_text(course.description) }}</p>

                        <div class="table-responsive">
                            
                            <table class="table table-borderless">
                
                                <thead>
                    
                                    <tr>
                    
                                        <th class="title fs18 text-black">Career Opportunities</th>
                    
                                        <th class="title fs18 text-black">Duration</th>
                    
                                        <th class="title fs18 text-black">Availability</th>
                    
                                        <th class="title fs18 text-black"></th>
                    
                                    </tr>
                    
                                </thead>
                    
                                <tbody>
                    
                                    <tr>
                    
                                        <td class="basic fs15">{{ course.career_opportunities }}</td>
                    
                                        <td class="basic fs15">{{ course.duration }}</td>
                    
                                        <td class="basic fs15">{{ course.availability }}</td>
                    
                                        <td class="basic fs15">


                                        </td>
                    
                                    </tr>
                    
                                </tbody>
                
                            </table>

                        </div>
                
                    </div>
                
                </div> -->

            </div>

        </div>

    </div>

</template>

<script>

export default {

	props: ['course'],

    methods: {

        limit_text(data){
           
            return data.length > 400 ? data.substr(0, 400) + '...' : data;
       
        }

    },

};

</script>
