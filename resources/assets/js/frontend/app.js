import Vue from "vue";

import store from './store/index';

import Fields from './components/search/Fields.vue';

import Results from './components/search/Results.vue';

const app = new Vue({

  el: "#app",
  
  store,
  
  components: {

    Fields,

    Results,

  }

});