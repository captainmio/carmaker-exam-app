<template>
  <button
    :class="color"
    class="btn btn-lg"
    @click="onClick"
    :disabled="disable"
  >
    <slot>Submit</slot>
  </button>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "button",
    },
    color: {
      type: String,
      default: "btn-primary",
    },
    disable: {
      type: Boolean,
      default: false,
    },
    onClick: {
      type: Function,
      required: true,
    },
  },
};
</script>

<style>
</style>