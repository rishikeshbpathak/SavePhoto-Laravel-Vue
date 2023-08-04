import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';
import photoList from './components/photosList.vue';
import photoForm from './components/photosForm.vue';
import photo from './components/photos.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: photoList },
        { path: '/photos/create', component: photoForm },
        { path: '/photos/:id', component: photo },
        { path: '/photos/:id/edit', component: photoForm },
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');
