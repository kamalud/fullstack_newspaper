<template>
    <div class="header">
      <div class="container-fluied">
         <div class="menu">
          <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <router-link class="nav-link" :to="{name:'home'}">Home <span class="sr-only">(current)</span></router-link>
                </li>
                <li class="nav-item" v-for="(category,i) in categories" :key="i">
                  <router-link :to="`/category_post/${category.slug}`" class="nav-link" href="#" :value="category.id" >{{category.name}}</router-link>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>
         </div>
      </div>
    </div>
</template>


<script>


export default {
    computed:{
    categories(){
      return this.$store.getters.getcategory;
    }
  },
  mounted(){
    this.$store.dispatch('categoryInfo')
  },
}
</script>
