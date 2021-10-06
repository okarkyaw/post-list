<template>
  <div class="card text-center">
    <div class="card blue-grey darken-1">
      <div class="card-content white-text">
        <h3 class="card-title"><slot name="title"></slot></h3>
          <p>Written by : <strong><slot name="author_name"></slot></strong> </p>
          <p>Created by : <strong><slot name="created_at"></slot></strong></p>
          <p><slot name="content"></slot></p>
      </div>
      <div class="card-action">
        <a :href="edit_url">Edit</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:["edit_url"]
};
</script>