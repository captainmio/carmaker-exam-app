<template>
  <div class="container tabcontent">
    <div class="row">
      <div class="col-lg-12">
        <div class="form_box">
          <div class="mb-3">
            <label for="type" class="form-label fw-bold">Add type</label>
            <textfield type="text" v-model="type" @keyup.enter="addType" />
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <btn
              :onClick="addType"
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
                  :onClick="deleteType.bind(null, list.id)"
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
      type: "",
      lists: [],
      disabled: false,
    };
  },
  methods: {
    addType() {
      this.disabled = true;
      if (this.type.length) {
        let data = {
          type: this.type,
        };

        carService
          .addType(data)
          .then((response) => {
            this.disabled = false;
            this.$snackbar.add({
              type: "success",
              text: "Type Created",
            });

            this.resetType();
            this.getTypes();
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
          text: "Please fill-in type textfield",
        });
      }
    },
    getTypes() {
      carService.getTypes().then((response) => {
        this.lists = response.data;
      });
    },
    deleteType(id) {
      carService.deleteType(id).then((response) => {
        this.$snackbar.add({
          type: "success",
          text: "Type successfully deleted",
        });
        this.getTypes();
      });
    },
    resetType() {
      this.type = "";
    },
  },
  created() {
    // get types from backend
    this.getTypes();
  },
};
</script>

<style scoped>
</style>