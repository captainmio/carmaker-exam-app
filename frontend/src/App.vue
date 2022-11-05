<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <!-- <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav> -->

  <div class="container">
    <RouterView />
  </div>
</template>

<style scoped>
</style>
