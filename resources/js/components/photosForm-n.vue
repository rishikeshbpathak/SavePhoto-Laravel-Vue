<template>
    <div>
      <h2 v-if="isNewphotos">Add Photos</h2>
      <h2 v-else>Edit Photos</h2>
        <form @submit.prevent="submitForm">
          <div class="uk-margin-top">
            <label for="title" class="form-label">Title:</label>
            <input class="uk-input" type="text" id="title" v-model="photos.title" required />
          </div>
          <div class="uk-margin-top">
            <label for="thumbnail" class="form-label">File:</label>
   <!-- <input class="uk-input" type="text" id="thumbnail" v-model="photos.thumbnail" required /> -->
    <input class="uk-input" type="file" id="title" v-on:change="photos_file" ref="file" required />
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
          status: 'show'
        },
        thumbnail:null,
        filename_path:null,
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
        // this.photos.title = response.data.title;
        // this.photos.thumbnail = response.data.thumbnail;
        // this.photos.status = response.data.status;

            console.log(this.photos);
      }
    },
    methods: {
        photos_file(e){
            this.thumbnail = this.$refs.file.files[0];
            this.filename_path=this.thumbnail.name;
             },
      async submitForm() {
        let photos = new Photos()
        photos.append('thumbnail', this.thumbnail)
        each(this.photos, (value, key) => {
            photos.append(key, value)
        })
        try {
          if (this.isNewphotos) {
            await axios.post('/api/photos', this.photos, {
                headers: {
              'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString()
            }
            });
          } else {
            await axios.put(`/api/photos/${this.$route.params.id}`, this.photos);

          }
          this.$router.push('/');
        } catch (error) {
          console.error(error);
        }
        console.log(this.photos);
      }
    }
  }
  </script>
