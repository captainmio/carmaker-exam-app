<template>
  <vue3-snackbar bottom right :duration="4000"></vue3-snackbar>
</template>

<script>
import { useSnackbar } from "vue3-snackbar";
export default {
  props: {
    message: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "success",
    },
  },
  mounted() {
    const snackbar = useSnackbar();
    snackbar.add({
      type: this.type,
      text: this.message,
    });
  },
};
</script>

<style>
</style>