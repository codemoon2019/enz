import "./fonts";

import "./custom";

import "./fullpage";
import "./jquery.lazy.min";

import Vue from "vue";

import News from './components/News.vue';
require('../../../../node_modules/aos/dist/aos');


import AOS from 'aos';
AOS.init();

const app = new Vue({

  el: "#app",
  
  components: {

  	News

  }

});