import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios';


const app = createApp(App)

app.use(router)

axios.interceptors.request.use(async (config) => {
    var token = localStorage.getItem('token');

    if(!token) {
        window.location.href = "https://idm.jusbaires.gob.ar/auth/realms/jusbaires/protocol/openid-connect/auth?client_id=test-oauth&redirect_uri=http://localhost&response_type=code&scope=openid";
    }


    let token2 = JSON.parse(token);

    config.headers['Authorization'] = `Bearer ${token2.access_token}`;
    return config;
}, error => {
    console.error('Error al enviar la solicitud:', error);
    return Promise.reject(error);
});


app.mount('#app')
