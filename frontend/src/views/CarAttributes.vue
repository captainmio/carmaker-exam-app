<template>
  <layoutone active="car-attributes">
    <slot name="main"> Car Attributes page </slot>
  </layoutone>
</template>

<script>
import layoutone from "@/layouts/layoutone.vue";
export default {
  components: {
    layoutone,
  },
  created() {},
};
</script>

<style>
</style>