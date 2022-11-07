<template>
  <div class="container-fluid g-0 homelayout">
    <div class="row g-0">
      <div class="col-lg-2">
        <sidebar></sidebar>
      </div>
      <div class="col-lg-10 divmain">
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

<style>
h1 {
  margin-left: 20px;
}

.divmain {
  min-height: 938px;
}

@media (max-width: 768px) {
  .divmain {
    min-height: 100%;
  }

  h1 {
    margin-top: 40px;
  }
}
</style>