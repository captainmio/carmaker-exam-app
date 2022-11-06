<template>
  <div class="container tabcontent">
    <div class="row">
      <div class="col-lg-12">
        <div class="form_box">
          <div class="mb-3">
            <label for="color" class="form-label fw-bold">Add color</label>
            <textfield type="text" v-model="color" @keyup.enter="addColor" />
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <btn
              :onClick="addColor"
              :disable="disabled"
              color="btn-primary"
              type="button"
            >
              Add
            </btn>
          </div>
        </div>
      </div>
      <div class="col-lg-12 pt-5">
        <table class="table table-striped text-center">
          <tbody>
            <tr v-for="list in lists" :key="list.id">
              <td>{{ list.name }}</td>
              <td>
                <btn
                  :onClick="deleteColor.bind(null, list.id)"
                  color="btn-danger"
                  type="button"
                >
                  Delete
                </btn>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import textfield from "../textfield.vue";
import btn from "../button.vue";

import carService from "../../services/carService";

export default {
  components: {
    btn,
    textfield,
  },
  data() {
    return {
      color: "",
      lists: [],
      disabled: false,
    };
  },
  methods: {
    addColor() {
      this.disabled = true;
      if (this.color.length) {
        let data = {
          color: this.color,
        };

        carService
          .addColor(data)
          .then((response) => {
            this.disabled = false;
            this.$snackbar.add({
              type: "success",
              text: "Color Created",
            });

            this.resetColor();
            this.getColors();
          })
          .catch((err) => {
            this.$snackbar.add({
              type: "error",
              text: err.response.data.message,
            });
          });
      } else {
        this.disabled = false;
        this.$snackbar.add({
          type: "error",
          text: "Please fill-in color textfield",
        });
      }
    },
    getColors() {
      carService.getColors().then((response) => {
        this.lists = response.data;
      });
    },
    deleteColor(id) {
      carService.deleteColor(id).then((response) => {
        this.$snackbar.add({
          type: "success",
          text: "Color successfully deleted",
        });
        this.getColors();
      });
    },
    resetColor() {
      this.color = "";
    },
  },
  created() {
    // get colors from backend
    this.getColors();
  },
};
</script>

<style scoped>
</style>