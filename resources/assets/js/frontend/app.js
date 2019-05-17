import "./fonts";

import "./custom";

import "./fullpage";

import "./jquery.lazy.min";

import Vue from "vue";

import store from './store/index';

import News from './components/News.vue';

import Search from './components/Search.vue';

import Course from './components/Course.vue';

import Fields from './components/search/Fields.vue';

import Results from './components/search/Results.vue';

const app = new Vue({

  el: "#app",
  
  store,
  
  components: {

    News,

    Search,

    Course,

    Fields,

    Results,

  }

});