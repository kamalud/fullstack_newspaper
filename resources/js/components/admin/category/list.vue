<template>
    <div class="list">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category All </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link :to="{name:'adminhome'}">Home</router-link></li>
              <li class="breadcrumb-item active">Category Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 m-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
                <router-link :to="{name:'category-add'}" class="btn btn-success float-right"><i class="fa fa-plus-circle"> Add</i></router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>name</th>
                      <th>status</th>
                      <th>creator</th>
                      <th>Date</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(category,i) in categories" :key="i">
                      <td>{{i+1}}</td>
                      <td>{{category.name}}</td>
                      <td><span class="badge" :class="statusColor(category.status)">{{statusName(category.status)}}</span></td>
                      <td>{{category.created_by}}</td>
                      <td>{{category.created_at|time}}</td>
                      <td>
                        <router-link :to="`/category-show/${category.slug}`" class="btn btn-success badge"><i class="fa fa-edit"></i></router-link>
                        <a @click="remove(category.slug)" class="btn btn-danger badge"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr v-if="datafound()">
                      <td colspan="5">
                        <h4 class="text-center text-danger">Data not found</h4>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>
      </div>
   </section>
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

  methods:{
    statusName:function(status){
      let data = {0:'Inactive', 1:"Active"};
      return data[status];
    },
    statusColor:function(status){
      let data = {0:'bg-danger', 1:"bg-success"};
      return data[status];
    },
    remove(slug){




                  Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  // Swal.fire(
                  //   'Deleted!',
                  //   'Your file has been deleted.',
                  //   'success'
                  // )


                   axios.get('admin/category-remove/'+slug).then(Response=>{
                    
                    this.$message({
                      message: 'Category  info remove success',
                      type: 'info'
                    });

                    this.$store.dispatch('categoryInfo')

                  });
                }
              })




     
    },
    datafound(){
      return this.categories.length < 1;
    }
  }
}
</script>