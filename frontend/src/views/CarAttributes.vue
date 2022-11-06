<template>
  <layoutone active="car-attributes">
    <slot name="main">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1>Car Attributes</h1>
            <br />
            <div class="d-flex align-items-start w-100">
              <div
                class="nav flex-column nav-pills me-3"
                id="v-pills-tab"
                role="tablist"
                aria-orientation="vertical"
              >
                <button
                  class="nav-link active"
                  id="v-pills-Colors-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#v-pills-Colors"
                  type="button"
                  role="tab"
                  aria-controls="v-pills-Colors"
                  aria-selected="true"
                >
                  Colors
                </button>
                <button
                  class="nav-link"
                  id="v-pills-Type-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#v-pills-Type"
                  type="button"
                  role="tab"
                  aria-controls="v-pills-Type"
                  aria-selected="false"
                >
                  Types
                </button>
                <button
                  class="nav-link"
                  id="v-pills-Manufacturer-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#v-pills-Manufacturer"
                  type="button"
                  role="tab"
                  aria-controls="v-pills-Manufacturer"
                  aria-selected="false"
                >
                  Manufacturers
                </button>
              </div>
              <div class="tab-content w-100" id="v-pills-tabContent">
                <div
                  class="tab-pane fade show active w-100"
                  id="v-pills-Colors"
                  role="tabpanel"
                  aria-labelledby="v-pills-Colors-tab"
                >
                  <attrColors></attrColors>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-Type"
                  role="tabpanel"
                  aria-labelledby="v-pills-Type-tab"
                >
                  <attrType></attrType>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-Manufacturer"
                  role="tabpanel"
                  aria-labelledby="v-pills-Manufacturer-tab"
                >
                  ManuFacturer tab
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </slot>
  </layoutone>
</template>

<script>
import layoutone from "@/layouts/layoutone.vue";

import attrColors from "../components/car-attributes/colorform.vue";
import attrType from "../components/car-attributes/typeform.vue";

export default {
  components: {
    layoutone,
    attrColors,
    attrType,
  },
  created() {},
};
</script>

<style scoped>
.tab-content {
  padding-left: 100px;
}

@media (max-width: 992px) {
  .tab-content {
    padding-left: 0px;
  }
}
</style>