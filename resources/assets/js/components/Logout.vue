<template>
</template>

<script>
export default {
  name: "logout",
  created: function () {
    let self = this;

    axios.post('/auth/logout')
    .then(function (response) {
      //Desloga do Vue
      self.$access('any');

      //Redireciona para form de login
      self.$router.push('/');
    });
  }
}
</script>
