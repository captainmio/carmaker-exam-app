<template>
  <div class="container tabcontent">
    <div class="row">
      <div class="col-lg-12">
        <div class="form_box">
          <div class="mb-3">
            <label for="manufacturer" class="form-label fw-bold"
              >Add manufacturer</label
            >
            <textfield
              type="text"
              v-model="manufacturer"
              @keyup.enter="addManufacturer"
            />
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <btn
              :onClick="addManufacturer"
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
                  :onClick="deleteManufacturer.bind(null, list.id)"
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
      manufacturer: "",
      lists: [],
      disabled: false,
    };
  },
  methods: {
    addManufacturer() {
      this.disabled = true;
      if (this.manufacturer.length) {
        let data = {
          manufacturer: this.manufacturer,
        };

        carService
          .addManufacturer(data)
          .then((response) => {
            this.disabled = false;
            this.$snackbar.add({
              type: "success",
              text: "Manufacturer Created",
            });

            this.resetManufacturer();
            this.getManufacturers();
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
          text: "Please fill-in manufacturer textfield",
        });
      }
    },
    getManufacturers() {
      carService.getManufacturers().then((response) => {
        this.lists = response.data;
      });
    },
    deleteManufacturer(id) {
      carService.deleteManufacturer(id).then((response) => {
        this.$snackbar.add({
          type: "success",
          text: "Manufacturer successfully deleted",
        });
        this.getManufacturers();
      });
    },
    resetManufacturer() {
      this.manufacturer = "";
    },
  },
  created() {
    // get manufacturers from backend
    this.getManufacturers();
  },
};
</script>

<style scoped>
</style>