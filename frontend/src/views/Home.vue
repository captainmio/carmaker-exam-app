<template>
  <layoutone active="home">
    <slot name="main">
      <h1>Car Maker</h1>
      <div class="container">
        <div class="row">
          <div class="col-lg-12"></div>
        </div>
      </div>
    </slot>
  </layoutone>
</template>

<script>
import layoutone from "@/layouts/layoutone.vue";
export default {
  components: {
    layoutone,
  },
};
</script>

<style>
</style>