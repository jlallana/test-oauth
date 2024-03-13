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
        data.append('code', code);
        var response = fetch('/api/token?' +  data).then(response => response.text())
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