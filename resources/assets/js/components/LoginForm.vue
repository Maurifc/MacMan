<template>
  <div id="login-form">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 offset-sm-3">

          <!-- Form -->
          <div class="card">
            <div class="card-header">
              <strong>Entre</strong>
            </div>
            <div class="card-block">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Usuário"
                  v-model="login"
                  required>
              </div>
              <div class="form-group">
                <input
                  type="password"
                  class="form-control"
                  placeholder="Senha"
                  v-model="password"
                  required>
              </div>
              <button class="btn btn-info" @click="doLogin">Login</button>
            </div>
          </div><!-- Form -->

        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "login-form",
  data: () => ({
    login: '',
    password: '',
  }),
  methods: {
    doLogin() {
      axios.post('/auth/login', {
        login: this.login,
        password: this.password
      })
      .then(function (r) {
        console.log(r.data);
      })
      .catch(function (error) {
        alert('Falha no login. Confira suas credenciais!');
      })

    }
  }
}
</script>
<style lang="scss" scoped>
</style>
