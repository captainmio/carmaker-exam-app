<template>
  <layoutone active="home">
    <slot name="main">
      <h1>Car Maker</h1>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body p-3">
                <div class="mb-3">
                  <label for="car_name" class="form-label">Car name</label>
                  <textfield
                    type="text"
                    v-model="car_name"
                    @keyup.enter="submit"
                  />
                  <span
                    class="text-danger text-end d-block fst-italic"
                    v-if="errors && errors.name"
                  >
                    {{ errors.name }}
                  </span>
                </div>
                <div class="mb-3">
                  <label for="car_name" class="form-label">Choose color</label>
                  <dropdown
                    :options="attributes.colors"
                    v-model="color"
                  ></dropdown>
                </div>
                <div class="mb-3">
                  <label for="car_name" class="form-label">Choose type</label>
                  <dropdown
                    :options="attributes.types"
                    v-model="type"
                  ></dropdown>
                </div>
                <div class="mb-3">
                  <label for="car_name" class="form-label"
                    >Choose manufacturer</label
                  >
                  <dropdown
                    :options="attributes.manufacturers"
                    v-model="manufacturer"
                  ></dropdown>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-2">
                  <btn
                    :onClick="submit"
                    :disable="loading"
                    color="btn-primary"
                    type="button"
                  >
                    Create Car
                  </btn>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 p-5">
            <table class="table table-striped text-center">
              <thead>
                <th>Name</th>
                <th>Color</th>
                <th>Type</th>
                <th>Manufacturer</th>
              </thead>
              <tbody>
                <tr v-for="car in cars" :key="car.id">
                  <td>{{ car.name }}</td>
                  <td>{{ car.color }}</td>
                  <td>{{ car.type }}</td>
                  <td>{{ car.manufacturer }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </slot>
  </layoutone>
</template>

<script>
import layoutone from "@/layouts/layoutone.vue";
import carService from "../services/carService";
import textfield from "../components/textfield.vue";
import dropdown from "../components/select.vue";
import btn from "../components/button.vue";

export default {
  data() {
    return {
      attributes: {
        colors: [],
        types: [],
        manufacturers: [],
      },
      car_name: "",
      color: 0,
      type: 0,
      manufacturer: 0,
      loading: false,
      errors: [],
      cars: [],
    };
  },
  components: {
    layoutone,
    textfield,
    dropdown,
    btn,
  },
  methods: {
    submit() {
      let thisvue = this;

      if (
        this.color.length == undefined ||
        this.type.length == undefined ||
        this.manufacturer.length == undefined
      ) {
        this.$snackbar.add({
          type: "error",
          text: "Please select car attribute",
        });
        return;
      } else {
        console.log("not working");
      }
      let selected_color = this.attributes.colors.find((color) => {
        if (color.id == thisvue.color) {
          return color;
        }
      });

      let selected_type = this.attributes.types.find((type) => {
        if (type.id == thisvue.type) {
          return type;
        }
      });

      let selected_manufacturer = this.attributes.manufacturers.find(
        (manufacturer) => {
          if (manufacturer.id == thisvue.manufacturer) {
            return manufacturer;
          }
        }
      );

      let data = {
        name: this.car_name,
        color: selected_color.name,
        type: selected_type.name,
        manufacturer: selected_manufacturer.name,
      };

      carService
        .createCar(data)
        .then((response) => {
          this.getCars();
          this.resetForm();

          this.$snackbar.add({
            type: "success",
            text: response.data.message,
          });
        })
        .catch((err) => {
          let errordata = err.response.data.errors;
          let thisvue = this;
          Object.keys(errordata).map(function (key, value) {
            thisvue.errors[key] = errordata[key][0];
          });

          this.$snackbar.add({
            type: "error",
            text: err.response.data.message,
          });
        });
    },
    getCarAttributeFunc() {
      carService.getAllCarAttributes().then((response) => {
        this.attributes.colors = response.data.colors;
        this.attributes.types = response.data.types;
        this.attributes.manufacturers = response.data.manufacturers;
      });
    },
    resetForm() {
      this.car_name = "";
      this.color = 0;
      this.type = 0;
      this.manufacturer = 0;
      this.errors = [];
    },
    getCars() {
      carService.getCars().then((response) => {
        this.cars = response.data;
      });
    },
  },
  created() {
    this.getCarAttributeFunc();
    this.getCars();
  },
};
</script>

<style scoped lang='scss'>
.card {
  max-width: 500px;
  margin: 0 auto;
}

table {
  padding: 20px;
  thead {
    th {
      font-weight: bold;
      padding: 10px;
      width: 25%;
    }
  }
}
</style>