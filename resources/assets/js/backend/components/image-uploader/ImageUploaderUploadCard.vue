<template>
  <div :class="outerClass" v-show="show">
    <div class="card caiu__card">
      <vue-element-loading color="#555" :active="loading"></vue-element-loading>
      <img class="card-img-top caiu__card__image" :src="image.thumbnail" @mouseover="hovering = true" @mouseout="hovering = false">
      <div class="caiu__card__overlay" v-if="hovering" @mouseover="hovering = true" @mouseout="hovering = false">
        <div class="btn-group caiu__card__content--left">
          <button class="btn btn-sm btn-dark" @click.prevent="showProperties = true">
            <i class="fa fa-plus"></i>
          </button>
        </div>
        <div class="caiu__card__content--center">{{ image.name }}</div>
        <div class="btn-group caiu__card__content--right">
          <button class="btn btn-sm btn-dark" @click.prevent="remove()">
            <i class="fa fa-trash"></i>
          </button>
          <button class="btn btn-sm btn-dark" @click.prevent="showImage = true">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </div>
    <image-uploader-image-preview v-if="showImage" :image="image" @close="showImage = false"></image-uploader-image-preview>
    <image-uploader-image-property-form v-if="showProperties" :properties="image.properties" :update-url="image.updatePropertyUrl" @updated="property => $emit('property-updated', index, property)" @close="showProperties = false"></image-uploader-image-property-form>
  </div>
</template>

<script>
import VueElementLoading from "vue-element-loading";
import ImageUploaderImagePreview from "./ImageUploaderImagePreview";
import ImageUploaderImagePropertyForm from "./ImageUploaderImagePropertyForm";

export default {
  props: {
    image: {
      required: true
    },
    index: {
      type: Number,
      required: true
    },
    outerClass: {
      type: String,
      default: "col-sm-6 col-lg-4 col-xl-2"
    }
  },
  components: {
    VueElementLoading,
    ImageUploaderImagePreview,
    ImageUploaderImagePropertyForm
  },
  data: () => ({
    show: true,
    showImage: false,
    showProperties: false,
    loading: false,
    hovering: false
  }),
  methods: {
    remove() {
      let confirmed = confirm("Are you sure you want to remove this image?");

      if (confirmed) {
        this.loading = true;

        axios.delete(this.image.deleteUrl).then(
          response => {
            this.$emit("removed", this.index);
            this.loading = false;
            this.show = false;
          },
          error => {
            if (this.$toasted) {
              this.$toasted.error(`Failed to delete ${this.image.name}.`, {
                icon: { name: "fa-check" }
              });
            } else {
              alert(`Failed to delete ${this.image.name}.`);
            }
            this.loading = false;
          }
        );
      }
    }
  }
};
</script>
