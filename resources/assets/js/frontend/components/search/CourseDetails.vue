<template>

    <div class="col-sm-12 item mb30" data-aos="fade-up">

        <div class="card text-left">
        
            <div class="card-header linear-gradient-teal">
        
                <h2 class="card-title fs18 text-white mb0">{{ course.title }}</h2>
        
            </div>
        
            <div class="card-body relative">

                <div class="row course-info">
                
                    <div class="col-sm-3 for-logo text-center align-self-center">

                        <img class="img-fluid" :src="course.institution_logo" alt="">

                    </div>
                
                    <div class="col-sm-8 for-desc">
                
                        <p class="title fs18 text-black">About the course</p>
                
                        <p class="basic fs15">{{ limit_text(course.description) }}</p>
                
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
                
                                    <td class="basic fs15">{{ course.career_opportunities }}</td>
                
                                    <td class="basic fs15">{{ course.duration }}</td>
                
                                    <td class="basic fs15">{{ course.availability }}</td>
                
                                    <td class="basic fs15"><a href="#" class="btn btnread-more text-uppercase">Inquire now</a></td>
                
                                </tr>
                
                            </tbody>
                
                        </table>
                
                    </div>
                
                </div>

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
