<template>

    <div class="container-fluid px83 mb150">

        <div class="block blog-block mb150">
        
            <div class="clearfix"></div>

                <div class="row">
                
                    <div class="col-sm-4 mb200 item" v-for="news in newsList">

                        <div class="wrapper relative">

                            <div class="img-holder relative">
                                
                                <img :src="news.featured_image" class="img-fluid" alt="">
                            
                            </div>
                            
                            <div class="hoverable">
                            
                                <p class="blog-date text-uppercase">{{ news.published }}</p>
                            
                                <h3 class="blog-title text-black text-capitalize">{{ news.title }}</h3>
                            
                                <div class="tohide">
                            
                                    <div class="blog-intro basic black-text mb30">
                            
                                        {{ news.description }}
                            
                                    </div>
                            
                                    <a class="basic btn btngreen-custom small text-uppercase mb30" :href="'/news/' + news.slug">Read more</a>
                            
                                </div>
                            
                            </div>
                        
                        </div>
                    
                    </div>

                </div>
                
            </div>

            <div class="load-more text-center" v-if="count < parseNews.length">

                <a href="javascript:;" class="btn btngreen text-uppercase" @click="count+=3">
                
                    View more 
                
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.18 7.09">
                
                        <g id="Layer_2" data-name="Layer 2">
                
                            <polygon class="cls-1" points="5.59 7.09 0 0.66 0.76 0 5.59 5.57 10.42 0 11.18 0.66 5.59 7.09"/>
                
                        </g>
                
                    </svg>
                
                </a>
          
            </div>

        </div>

    </div>

</template>

<script>

export default {

    props: ['news'],

    data() {

        return {

            count: 3

        }
    
    },

    computed: {
        
        parseNews: function(){

            return Object.values(JSON.parse(this.news));

        },

        newsList:  function(){

            return this.parseNews.slice(0, this.count);

        }

    },

    mounted(){

        console.log(this.parseNews);

    }

};

</script>
