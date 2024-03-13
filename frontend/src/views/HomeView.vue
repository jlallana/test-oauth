<template>
  <main>
    <button @click="hacerSolicitud">Hacer solicitud</button>
  </main>
</template>

<script>
import axios from 'axios';

export default {
  mounted(){

    var code = window.location.search.substring(6);


    if(code) {
        var data = new URLSearchParams();
        data.append('grant_type', 'authorization_code');
        data.append('client_id', 'test-oauth');
        data.append('client_secret', 'test');
        data.append('code', code);
        data.append('redirect_uri', 'http://localhost');
        data.append('scope', 'openid');

        var response = fetch('/auth/realms/jusbaires/protocol/openid-connect/token', {
            method: 'post',
            headers: { 
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body : data
        }).then(response => response.text())
        .then(result => {
          localStorage.setItem('token', result);
          window.location.replace(window.location.pathname);
        });      
    }

  },
  methods: {
    hacerSolicitud() {
      axios.get('/api/example')
        .then(response => {
          alert(response.data);
        })
        .catch(error => {
          console.error('Error al hacer la solicitud:', error);
        });
      
    }
  }
}
</script>