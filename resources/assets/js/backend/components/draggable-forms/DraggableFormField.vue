<template>
  <div class="form-group">
    <div class="row" v-if="field.type === 'text'">
      <label class="col-md-2 col-lg-1 col-form-label">{{ field.name | titleCase }}</label>
      <div class="col-md-10 col-lg-11">
        <input type="text" class="form-control" v-model="field.value">
      </div>
    </div>
    <div class="row" v-if="field.type === 'textarea'">
      <label class="col-md-2 col-lg-1 col-form-label">{{ field.name | titleCase }}</label>
      <div class="col-md-10 col-lg-11">
        <vue-editor v-model="field.value"></vue-editor>
      </div>
    </div>
    <div class="row" v-if="field.type === 'image'">
      <label class="col-md-2 col-lg-1 col-form-label">{{ field.name | titleCase }}</label>
      <div class="col-md-10 col-lg-11">
        <div class="custom-file">
          <input type="file" class="custom-file-input" @change="onImageChange">
          <label class="custom-file-label" for="customFile">Choose image</label>
        </div>
      </div>
      <div class="col-lg-12 offset-lg-1 offset-md-2 mt-2" v-if="chosenImage || field.value">
        <img :src="chosenImage | fileObjectURl" class="img-fluid rounded" style="max-height: 250px" v-if="chosenImage">
        <img :src="field.value" class="img-fluid rounded" style="max-height: 250px" v-if="!chosenImage && field.value">
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
// import PictureInput from 'vue-picture-input'

export default {
  props: {
    field: {
      type: Object,
      required: true
    },
    index: {
      type: Number,
      required: true
    }
  },
  data: () => ({
      chosenImage: "",
      imageData: "",
  }),
  components: {
    VueEditor
  },
  filters: {
    fileObjectURl(value) {
      return URL.createObjectURL(value) || value;
    },
    titleCase: function (value) {
      if (!value) return ''
      value = value.toString()
      return value.charAt(0).toUpperCase() + value.slice(1)
    }
  },
  methods: {
    onImageChange() {
      this.chosenImage = event.target.files[0];
      this.field.value = event.target.files[0];
    }
  }
};
</script>
