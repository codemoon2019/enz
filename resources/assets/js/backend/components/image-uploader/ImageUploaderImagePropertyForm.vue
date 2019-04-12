<template>
  <div class="modal modal-property" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-property__content">
        <vue-element-loading color="#555" :active="loading"></vue-element-loading>
        <div class="modal-header modal-property__content__header">
          <h5 class="modal-title">Properties</h5>
        </div>
        <div class="modal-body modal-property__content__body">
          <div v-if="hasProperties">
            <div class="row mb-2" v-for="(property, index) in form.properties" :key="index">
              <div class="col-md-12" v-if="property === Object(property)">
                <div class="row mb-2" v-for="(childProperty, childIndex) in property" :key="childIndex">
                  <label class="col-sm-2 col-form-label">{{ `${index}.${childIndex}` | ucfirst }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="form.properties[index][childIndex]">
                  </div>
                </div>
              </div>
              <div class="col-md-12" v-else>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ index | ucfirst }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="form.properties[index]">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div v-else>No properties available.</div>
        </div>
        <div class="modal-footer modal-property__content__footer">
          <button type="button" class="btn btn-sm btn-secondary" @click.prevent="$emit('close')"><i class="fa fa-close"></i> Close</button>
          <button type="button" class="btn btn-sm btn-dark" @click.prevent="update()" v-if="hasProperties"><i class="fa fa-check"></i> Update</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueElementLoading from "vue-element-loading";

export default {
  props: {
    properties: {
      type: Object,
      required: true
    },
    updateUrl: {
      type: String,
      required: true
    }
  },
  components: {
    VueElementLoading
  },
  filters: {
    ucfirst(value) {
      return value.charAt(0).toUpperCase() + value.substr(1);
    }
  },
  data: () => ({
    form: {
      properties: {}
    },
    loading: false
  }),
  mounted() {
    this.form.properties = JSON.parse(JSON.stringify(this.properties));
  },
  computed: {
    hasProperties() {
      return Object.keys(this.form.properties).length > 0;
    }
  },
  methods: {
    update() {
      this.loading = true;

      axios
        .patch(this.updateUrl, { properties: this.form.properties })
        .then(
          response => {
            this.loading = false;
            this.$emit("updated", response.data.data);
            if (this.$toasted) {
              this.$toasted.show("Properties has been updated.", {
                icon: { name: "fa-check" }
              });
            } else {
              alert("Properties has been updated.");
            }
          },
          error => {
            this.loading = false;
            if (this.$toasted) {
              this.$toasted.error("Failed to update properties.", {
                icon: { name: "fa-check" }
              });
            } else {
              alert("Failed to update properties.");
            }
          }
        );
    }
  }
};
</script>
