<template>
  <select class="form-select" :value="modelValue" @change="updateInput">
    <option disabled="true" value="0">-- Select --</option>
    <option v-for="(option, index) in options" :key="index" :value="option.id">
      {{ option.name }}
    </option>
  </select>
</template>

<script>
export default {
  props: {
    modelValue: {
      type: [String, Number],
      default: "",
    },
    options: {
      type: Array,
      required: true,
    },
  },
  methods: {
    updateInput(event) {
      this.$emit("update:modelValue", event.target.value);
    },
  },
};
</script>

<style scoped>
</style>