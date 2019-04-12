<template>
  <div class="modal modal-preview" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-preview__content">
        <div class="modal-header modal-preview__content__header">
          <h5 class="modal-title">Preview</h5>
        </div>
        <div class="modal-body modal-preview__content__body">
          <div class="row">
            <div class="col-12 text-center">
              <img :src="image.source" class="image--preview">
            </div>
          </div>
        </div>
        <div class="modal-footer modal-preview__content__footer">
          <button type="button" class="btn btn-sm btn-secondary" @click.prevent="$emit('close')">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    image: {
      type: Object,
      required: true
    }
  }
};
</script>

<style scoped>
.modal-preview .modal-dialog {
  max-width: 100%;
}
.modal-preview__content {
  background: transparent;
  border: none;
}
.modal-preview__content__header {
  border-bottom: none;
  display: block;
  text-align: center;
}
.modal-preview__content__header .modal-title {
  color: whitesmoke;
  font-weight: bold;
}
.modal-preview__content__footer {
  border-top: none;
  display: block;
  text-align: center;
}
.modal-preview__content__footer > button {
  background: transparent;
  color: whitesmoke;
}
.modal-preview__content__footer > button:hover {
  background: whitesmoke;
  color: #222;
}
.modal-preview__content__body .image--preview {
  max-height: 500px;
  max-width: 100%;
}
</style>
