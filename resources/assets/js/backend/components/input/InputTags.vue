<template>
  <voerro-tags-input :inputClass="inputClass" :elementId="elementId" :existing-tags="existingTags" :typeahead="true" :value="values" :only-existing-tags="true" :placeholder="placeholder" :limit="limit" typeahead-style="dropdown" :typeahead-activation-threshold="0"></voerro-tags-input>
</template>

<script>
export default {
  props: {
    values: {
      type: Array
    },
    existingTags: {
      type: Object
    },
    elementId: {
      type: String
    },
    inputClass: {
      type: String
    },
    placeholder: {
      type: String
    },
    limit: {
      type: Number,
      default: 0
    }
  }
};
</script>

<style>
.tags-input input {
  padding-left: 10px;
}
.tags-input-badge-selected-default {
  color: white;
  background-color: #20a8d8;
}
.tags-input span {
  margin: 3px 3px;
  padding: 5px;
  font-size: 0.8rem;
  border-radius: 3px;
}
.tags-input-remove:before,
.tags-input-remove:after {
  background: white;
}
.typeahead-dropdown {
  z-index: 99;
  max-height: 500px;
  overflow-y: auto;
  border: 1px solid #CCC;
}
/* Typeahead elements style/theme */
.tags-input-typeahead-item-default {
  color: #20a8d8;
  background-color: white;
}

.tags-input-typeahead-item-highlighted-default {
  color: #fff;
  background-color: #20a8d8;
}
</style>
