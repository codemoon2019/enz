<template>
  <li class="list-group-item">
    <div class="draggable__title">
      <button class="btn btn-link p-0" @click.prevent="form.show = !form.show">
        <i :class="`mr-2 fa fa-caret-${ form.show ? 'up' : 'down' }`"></i>
        {{ getTitle(form.fields) }}
      </button>
      <button class="btn btn-link draggable__delete-btn float-right p-0" @click.prevent="$emit('close', { form, index })">
        <i class="icon-close"></i>
      </button>
    </div>

    <vue-element-loading :active="loading"></vue-element-loading>
    <div class="row" v-show="form.show">
      <div class="col-md-12">
        <hr>
        <draggable-form-field :field="field" v-for="(field, index) in fields" :index="index" :key="index"></draggable-form-field>
        <button class="btn btn-dark btn-sm float-right mt-1" @click.prevent="submit" v-if="submitEndpoint">
          <i class="fa fa-check"></i>
          {{ submitButtonText }}
        </button>
      </div>
    </div>
  </li>
</template>

<script>
import VueElementLoading from "vue-element-loading";
import DraggableFormField from "./DraggableFormField";

export default {
  props: {
    name: {
      type: String
    },
    form: {
      type: Object,
      required: true
    },
    titleField: {
      type: String
    },
    submitEndpoint: {
      type: String
    },
    submitMethod: {
      type: String
    },
    submitButtonText: {
      type: String
    },
    index: {
      type: Number
    }
  },
  components: {
    VueElementLoading,
    DraggableFormField
  },
  data: () => ({
    fields: [],
    loading: false
  }),
  mounted() {
    this.fields = this.form.fields.map(field => {
      return { ...field };
    });
  },
  watch: {
    // revert back when re-ordered
    "form.fields": {
      handler(value) {
        this.fields = value.map(field => {
          return { ...field };
        });
      },
      deep: true
    }
  },
  methods: {
    getTitle(fields) {
      let find = fields.find(field => field.name === this.titleField);
      return find && find.value ? find.value : `Untitled ${this.name}`;
    },
    submit() {
      let method = this.submitMethod;
      const data = new FormData();

      this.fields.forEach(field => {
        data.append(`fields[${field.name}]`, field.value);
      });

      // const data = Object.assign({ ...this.form }, { fields: fields_ });
      let { show, fields, ...others } = this.form;

      Object.keys(others).forEach(key => {
        data.append(key, others[key]);
      });

      data.append("index", this.index);

      if (
        this.submitMethod === "PATCH" ||
        this.submitMethod === "patch" ||
        this.submitMethod === "PUT" ||
        this.submitMethod === "put"
      ) {
        method = "POST";
        data.append("_method", this.submitMethod);
      }
      
      /* let formData = new FormData();
      let formWithNoFields = Object.assign({ ...this.form }, { fields: undefined });

      this.fields.forEach(field => {
        // fields_[field.name] = field.value;
        formData.append(field.name, field.value);
      });

      Object.keys(formWithNoFields).forEach(key => {
        formData.append(key, formWithNoFields[key]);
      }); */

      this.loading = true;

      axios({
        method: method,
        url: this.submitEndpoint,
        data: data/* ,
        headers: {
          'Content-Type': 'multipart/form-data'
        } */
      }).then(
        response => {
          this.form.fields = this.fields.map(field => {
            return { ...field };
          });
          this.$toasted.show(`${this.name} has been submitted`, {
            icon: { name: "fa-check" }
          });
          this.$emit("submitted", response.data.form);
          this.loading = false;
        },
        error => {
          this.$toasted.error(
            error.response.data.message || `failed to submit ${this.name}`
          );
          this.loading = false;
        }
      );
    }
  }
};
</script>

<style scoped>
.draggable__title > .btn-link {
  text-decoration: none;
  color: darkslategray;
}
.draggable__delete-btn {
  color: maroon !important;
}
</style>
