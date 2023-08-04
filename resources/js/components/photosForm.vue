<template>
    <div>
      <h2 v-if="isNewphotos">Add Photos</h2>
      <h2 v-else>Edit Photos</h2>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <!-- <form method="post" action="/api/photos" enctype="multipart/form-data"> -->
          <div class="uk-margin-top">
            <label for="title" class="form-label">Title:</label>
            <input class="uk-input" type="text" id="title" v-model="photos.title" required />
          </div>
          <div class="uk-margin-top">
            <label for="filename" class="form-label">File:</label>
   <!-- <input class="uk-input" type="text" id="filename" v-model="photos.filename" required /> -->
    <input class="uk-input" name="image" type="file" id="image" v-on:change="photos_file" ref="file" required />
          </div>
          <div class="uk-margin-top">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" v-model="photos.status" class="uk-select">
<option value="show">show</option>
<option value="hide">Hide</option>
            </select>
          </div>
          <div class="uk-margin-top">
          <button type="submit" v-if="isNewphotos" class="uk-button uk-button-primary">Add Photos</button>
          <button type="submit" v-else class="uk-button uk-button-primary">Update Photos</button>
          </div>
        </form>
    </div>
  </template>

  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        photos: {
          title: '',
          file: '',
          filename: '',
          status: 'show'
        }
      }
    },
    computed: {
      isNewphotos() {
        return !this.$route.path.includes('edit');
      }
    },
    async created() {
      if (!this.isNewphotos) {
        const response = await axios.get(`/api/photos/${this.$route.params.id}`);
        this.photos = response.data[0];
            console.log(this.photos);
      }
    },
    methods: {
        photos_file(e){
            this.photos.file = e.target.files[0];
            this.photos.filename=e.target.files[0].name;
            console.log(this.photos.filename);
            console.log(this.photos.file);
        },
      async submitForm() {
        try {
          if (this.isNewphotos) {
            console.log(this.photos);
            await axios.post('/api/photos', this.photos);
          } else {
            await axios.put(`/api/photos/${this.$route.params.id}`, this.photos);

          }
          this.$router.push('/');
        } catch (error) {
          console.error(error);
        }
      }
    }
  }
  </script>
