<template>
  <div id="login-form">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 offset-sm-3">

          <!-- Form -->
          <form>
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
                  autofocus
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
                <button type="submit" class="btn btn-info" @click="doLogin">Login</button>
              </div>
            </div>
          </form>
          <!-- Form -->

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
      let self = this;
      //Validações
      if(this.login == '' || this.password == ''){
        alert('Preencha os campos corretamente!');

      } else {
        //AJAX
        axios.post('/auth/login', {
          login: this.login,
          password: this.password
        })
        .then(function (r) {
          router.push('/computadores');
        })
        .catch(function (error) {
          alert('Falha no login. Confira suas credenciais!');
          self.login = self.password = '';
        });
      }
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
