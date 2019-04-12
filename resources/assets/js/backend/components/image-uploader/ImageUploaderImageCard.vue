<template>
  <div :class="outerClass" v-show="show">
    <div class="card caiu__card">
      <vue-element-loading color="#555" :active="loading"></vue-element-loading>
      <div class="caiu__card__status" v-if="status !== ''">
        <div class="caiu__card__status__text">
          <i :class="`fa fa-2x fa-${status === 'success' ? 'check' : 'times'} caiu__card__status__text--${status}`"></i>
        </div>
      </div>
      <img class="card-img-top caiu__card__image" :src="image | fileObjectURl" @mouseover="hovering = true" @mouseout="hovering = false">
      <div class="caiu__card__overlay" v-if="hovering" @mouseover="hovering = true" @mouseout="hovering = false">
        <div class="caiu__card__content--center">{{ image.name }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import VueElementLoading from "vue-element-loading";

export default {
  props: {
    image: {
      required: true
    },
    outerClass: {
      type: String,
      default: "col-sm-6 col-lg-4 col-xl-2"
    },
    uploadOnCreate: {
      type: Boolean,
      default: false
    },
    uploadUrl: {
      type: String
    },
    inputName: {
      type: String
    }
  },
  components: {
    VueElementLoading
  },
  filters: {
    fileObjectURl(value) {
      return URL.createObjectURL(value);
    }
  },
  data: () => ({
    show: true,
    loading: false,
    hovering: false,
    status: ""
  }),
  mounted() {
    if (this.uploadOnCreate) this.upload();
  },
  methods: {
    upload() {
      let data = new FormData();

      data.append(this.inputName, this.image);

      this.loading = true;

      axios.post(this.uploadUrl, data).then(
        response => {
          this.loading = false;
          this.status = "success";

          setTimeout(() => {
            this.$emit("uploaded", response.data.data);
            this.show = false;
          }, 1000);
        },
        error => {
          this.loading = false;
          this.status = "error";
        }
      );
    }
  }
};
</script>

<style>
.caiu__card__status {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.8);
  margin: 0;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  transition: opacity 0.3s;
}
.caiu__card__status__text {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
}
.caiu__card__status__text--success {
  color: #26a69a;
}
.caiu__card__status__text--error {
  color: #ef5350;
}
</style>
