<template>
  <div class="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
              <form method="POST" @submit.prevent="loginInfo()">
                <div class="form-group row">
                  <label
                    for="email"
                    class="col-md-4 col-form-label text-md-right"
                    >E-Mail Address</label
                  >
                  <div class="col-md-6">
                    <input v-model="email"
                      id="email"
                      type="email"
                      name="email"
                      value=""
                      required="required"
                      autocomplete="email"
                      autofocus="autofocus"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="password"
                    class="col-md-4 col-form-label text-md-right"
                    >Password</label
                  >
                  <div class="col-md-6">
                    <input v-model="password"
                      id="password"
                      type="password"
                      name="password"
                      required="required"
                      autocomplete="current-password"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                      <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="form-check-input"
                      />
                      <label for="remember" class="form-check-label">
                        Remember Me
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <router-link :to="{ name: 'reset' }"
                      >Forget your password</router-link
                    >
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default{
    data(){
        return {
            email:'',
            password:'',
        }
    },
    methods:{
        loginInfo(){
            axios.post('/login',{
              email:this.email,
              password:this.password

            }).then(response=>{
             
             if(response.data.token_type){
               var user_token = {
                 Access_token:response.data.token_type+' '+response.data.access_token,
                //  Refresh_token:response.data.refresh_token
               };
               document.cookie = 'user_token='+JSON.stringify(user_token)+':path=/';
               this.$router.push('/admin/dasboard');
              //  window.location.href='admin/dasboard';
              this.$message({
                  message: 'Login success',
                  type: 'success'
                });
             }else{
               response.data.error;
             }
   

            });
        }
    }
}
  
</script>
