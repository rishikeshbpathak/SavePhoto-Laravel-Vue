<template>
    <div>
        <table class="uk-table">
            <thead>
              <tr class="uk-background-secondary uk-text-center uk-text-capitalize " >
                <td scope="col">#</td>
                <td scope="col">Image</td>
                <td scope="col">Title</td>
                <td scope="col">Status</td>
                <td scope="col">Actions</td>
              </tr>
            </thead>
            <tbody>
                <tr class="uk-text-center uk-text-capitalize" v-for="(photos , index) in photos" :key="photos.id">
                    <td>{{ index+1 }}</td>
                    <td><img width="80" v-bind:src="'/upload_img/photos/'+photos.filename"> </td>
                    <td>{{ photos.title }}</td>
                    <td>{{ photos.status }}</td>
                    <td>
                      <div class="row gap-3">
                        <router-link :to="`/photos/${photos.id}/edit`" class="uk-button uk-button-primary">Edit</router-link>
                        <button @click="deletephotos(photos.id)" type="button" class="uk-button uk-button-danger">Delete</button>
                      </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      photos: []
    }
  },
  async created() {
    try {
      const response = await axios.get('/api/photos');
      this.photos = response.data;
    } catch (error) {
      console.error(error);
    }
  },
  methods: {
    async deletephotos(id) {
      try {
        await axios.delete(`/api/photos/${id}`);
        this.photos = this.photos.filter(photos => photos.id !== id);
        return alert('Deleted successfully');
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>
