<template>
  <input
    :type="type"
    class="form-control"
    v-model="password"
    :value="modelValue"
    @input="updateInput"
  />
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "text",
    },
    modelValue: {
      type: [String, Number],
      default: "",
    },
  },
  methods: {
    updateInput(event) {
      this.$emit("update:modelValue", event.target.value);
    },
  },
};
</script>

<style>
</style>