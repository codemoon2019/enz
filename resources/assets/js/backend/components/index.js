/**
 * Your Components
 */
import ImageUploader from "./image-uploader/ImageUploader";
Vue.component("image-uploader", ImageUploader);

import DraggableForms from "./draggable-forms/DraggableForms";
Vue.component("draggable-forms", DraggableForms);

import InputTags from "./input/InputTags";
Vue.component("input-tags", InputTags);

import ContentBuilder from "./solution-center/ContentBuilder";
Vue.component("content-builder", ContentBuilder);


/**
 * External Components. eg. Packages
 */
import VoerroTagsInput from "@voerro/vue-tagsinput";
Vue.component("voerro-tags-input", VoerroTagsInput);
require("@voerro/vue-tagsinput/dist/style.css");

// import Vuetify from 'vuetify'
import Toasted from 'vue-toasted'
Vue.use(Toasted, {
	position: "top-center",
	theme: "outline",
	duration: 2000,
	action: [
	  {
		text: "close",
		onClick: (e, toastObject) => {
		  toastObject.goAway(0);
		}
	  }
	],
	iconPack: "fontawesome"
  });