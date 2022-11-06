<template>
  <div class="container-fluid g-0 homelayout">
    <div class="row g-0">
      <div class="col-lg-3">
        <sidebar></sidebar>
      </div>
      <div class="col-lg-9 divmain">
        <main>
          <slot></slot>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import sidebar from "@/components/sidebar.vue";
export default {
  components: {
    sidebar,
  },
};
</script>

<style scoped>
.divmain {
  min-height: 880px;
}
</style>