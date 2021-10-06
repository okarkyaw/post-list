<template>
    <div class="card text-center">
      <div class="card-body">
        <a  :href="detail_url">
            <h4 class="card-title">
                <slot name="title"></slot>
            </h4>
        </a>
        <p>Written by : <strong><slot name="author_name"></slot></strong> </p>
        <p>Created by : <strong><slot name="created_at"></slot></strong></p>
        <p class="card-text"><slot name="content"></slot></p>
        <a :href="detail_url" class="btn btn-primary">View Detail</a>
        <a :href="edit_url" class="btn btn-primary">Edit</a>
      </div>
    </div>
</template>

<script>
export default {
    props:["detail_url","edit_url"]
};
</script>