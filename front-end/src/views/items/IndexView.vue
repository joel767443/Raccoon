<template>
  <div class="card">
    <div class="card-header">
      <h4>
        Items
        <RouterLink to="/add-item" class="btn float-end btn-success">Add</RouterLink>
      </h4>
    </div>
    <div class="card-body">
      <RouterLink to="/edit-item" class="btn btn-success">Edit</RouterLink>
      <br/>
      <br/>
      <button type="button" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>