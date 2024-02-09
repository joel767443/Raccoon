<template>
  <div class="card">
    <div class="card-header">
      <h4>
        Edit Item
        <router-link to="/items" class="btn float-end btn-success">Back</router-link>
      </h4>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" v-model="model.item.name"/>
      </div>
      <div class="mb-3">
        <label for="description">Description</label>
        <input type="text" class="form-control" v-model="model.item.description"/>
      </div>
      <div class="mb-3">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" v-model="model.item.brand"/>
      </div>
      <div class="mb-3">
        <label for="color">Color</label>
        <input type="text" class="form-control" v-model="model.item.color"/>
      </div>
      <div class="mb-3">
        <label for="checked">Checked</label>
        <input type="text" class="form-control" v-model="model.item.checked"/>
      </div>
      <div class="mb-3">
        <label for="availability">Availability</label>
        <input type="text" class="form-control" v-model="model.item.availability"/>
      </div>
      <div class="mb-3">
        <label for="price">Price</label>
        <input type="text" class="form-control" v-model="model.item.price"/>
      </div>
    </div>
    <div class="card-footer">
      <button type="button" @click="saveItem" class="btn btn-success form-control">Save</button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: 'itemEdit',
  data() {
    return {
      errorList: '',
      model: {
        item: {
          name: '',
          description: '',
          brand: '',
          color: '',
          checked: '',
          price: '',
          availability: '',
        }
      }
    }
  },
  methods: {
    saveItem() {
      const $this = this;
      axios.post("http://localhost:8001/api/items/update", this.model.item)
          .then(res => {
            console.log(res);
            alert(res.data.message);

            // Clear the form after successful save
            this.model.item = {
              name: '',
              description: '',
              brand: '',
              color: '',
              checked: '',
              price: '',
              availability: '',
            };
          })
          .catch(function (error) {
            if (error.response.status === 422) {
              $this.errorList = error.response.data.errors;
              // Handle input validation errors
            }
          });
    }
  }
}
</script>
