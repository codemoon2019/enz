<template>
  <div class="custom-file">
    <input ref="fileInput" type="file" :name="inputName" class="custom-file-input" @change="onFileChange" :disabled="disabled" :accept="acceptedMimeTypes.join(',')" multiple v-if="multiple">
    <input ref="fileInput" type="file" :name="inputName" class="custom-file-input" @change="onFileChange" :disabled="disabled" :accept="acceptedMimeTypes.join(',')" v-else>
    <label class="custom-file-label" for="customFile">Choose image</label>
  </div>
</template>

<script>
export default {
  props: {
    inputName: {
      type: String,
      default: "image"
    },
    multiple: {
      type: Boolean,
      default: false
    },
    disabled: {
      type: Boolean,
      default: false
    },
    acceptedMimeTypes: {
      type: Array,
      default: function() {
        return ["image/jpeg", "image/png"];
      }
    },
    maxFileSize: {
      type: Number,
      default: 3
    }
  },
  methods: {
    onFileChange(event) {
      let files = event.target.files;

      // check if mime type is valid
      for (let x = 0; x < files.length; x++) {
        let mimeType = files[x].type;

        if (mimeType === "image/vnd.microsoft.icon") mimeType = "image/x-icon";

        if (!this.acceptedMimeTypes.includes(mimeType)) {          
          if (this.$toasted) {
            this.$toasted.error("Invalid image type.", {
              icon: { name: "fa-check" }
            });
          } else {
            alert("Invalid image type.");
          }
          this.clear();
          return false;
        }
      }

      // check if file size is valid
      for (let x = 0; x < files.length; x++) {
        let fileSize = files[x].size / 1024 / 1024;

        if (this.maxFileSize <= fileSize) {
          if (this.$toasted) {
            this.$toasted.error(`Image may not be greater than ${this.maxFileSize} megabytes.`, {
              icon: { name: "fa-check" }
            });
          } else {
            alert(`Image may not be greater than ${this.maxFileSize} megabytes.`);
          }
          this.clear();
          return false;
        }
      }

      this.$emit("changed", files);
    },
    clear() {
      this.$refs.fileInput.value = "";
    }
  }
};
</script>

<style>
.custom-file-input {
  cursor: pointer;
}
</style>
