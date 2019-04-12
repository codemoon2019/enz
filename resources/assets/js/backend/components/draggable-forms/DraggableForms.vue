<template>
  <draggable el="li" class="list-group" :options="{ handle: '.draggable__title' }" v-model="forms_" @change="onDragChange">
    <draggable-form v-for="(form, index) in forms_" :name="name" :form="form" :title-field="titleField" :submit-endpoint="updateEndpoint" :submit-method="updateMethod" :submit-button-text="updateButtonText" @close="removeForm" :index="index" :key="index"></draggable-form>
    <vue-element-loading :active="loading"></vue-element-loading>
    <div class="row mt-3" slot="footer">
      <div class="col-md-12">
        <draggable-form :name="name" :form="newForm" :title-field="titleField" :submit-endpoint="createEndpoint" :submit-method="createMethod" :submit-button-text="createButtonText" @submitted="addForm" @close="adding = false" v-if="adding"></draggable-form>
        <button class="btn btn-dark btn-sm float-right" @click.prevent="createForm" v-else><i class="fa fa-plus"></i> Add {{ name }}</button>
      </div>
    </div>
  </draggable>
</template>

<script>
import VueElementLoading from "vue-element-loading";
import Draggable from "vuedraggable";
import DraggableForm from "./DraggableForm";

export default {
  props: {
    name: {
      type: String,
      default: "form"
    },
    forms: {
      type: Array,
      default: () => []
    },
    titleField: {
      type: String,
      required: true
    },
    newFormFormat: {
      type: Array,
      required: true
    },
    reorderEndpoint: {
      type: String
    },
    reorderMethod: {
      type: String,
      default: "POST"
    },
    createEndpoint: {
      type: String
    },
    createMethod: {
      type: String,
      default: "POST"
    },
    createButtonText: {
      type: String,
      default: "Create"
    },
    updateEndpoint: {
      type: String
    },
    updateMethod: {
      type: String,
      default: "PATCH"
    },
    updateButtonText: {
      type: String,
      default: "Update"
    },
    deleteEndpoint: {
      type: String
    },
    deleteMethod: {
      type: String,
      default: "DELETE"
    }
  },
  components: {
    VueElementLoading,
    Draggable,
    DraggableForm
  },
  data: () => ({
    forms_: [],
    newForm: {},
    adding: false,
    loading: false
  }),
  mounted() {
    this.forms_ = this.forms.map(form => {
      form.show = false;
      return form;
    });
  },
  methods: {
    createForm() {
      this.newForm = {
        show: true,
        fields: [...this.newFormFormat]
      };
      this.adding = true;
    },
    addForm(form) {
      this.forms_.push(Object.assign({ ...form }, { show: false }));
      this.adding = false;
    },
    removeForm({ form, index }) {
      this.loading = true;

      axios({
        url: this.deleteEndpoint,
        method: this.deleteMethod,
        data: form
      }).then(response => {
        this.$toasted.show(`${this.name} has been deleted`, {
          icon: { name: "fa-check" }
        });
        this.forms_.splice(index, 1);
        this.loading = false;
      }, error => {
        this.$toasted.error(
          error.response.data.message || `failed to delete ${this.name}`
        );
        this.loading = false;
      });
    },
    onDragChange(obj) {
      const moved = obj.moved;

      this.loading = true;

      if (this.reorderEndpoint) {
        axios({
          method: this.reorderMethod,
          url: this.reorderEndpoint,
          data: {
            forms: this.forms_,
            moved: moved
          }
        }).then(
          response => {
            this.$toasted.show(`${this.name} has been re-ordered`, {
              icon: { name: "fa-check" }
            });
            this.loading = false;
          },
          error => {
            this.$toasted.error(
              error.response.data.message || `failed to re-order ${this.name}`
            );
            this.loading = false;
          }
        );
      }
    }
  }
};
</script>
