import "./fonts";

import "./custom";

import "./fullpage";

import "./jquery.lazy.min";

import Vue from "vue";

import News from './components/News.vue';

const app = new Vue({

  el: "#app",
  
  components: {

  	News

  }

});