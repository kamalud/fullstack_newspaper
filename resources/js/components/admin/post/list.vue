<template>
    <div class="postlist">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link :to="{name:'adminhome'}">Home</router-link></li>
              <li class="breadcrumb-item active">Post Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post Table</h3>
                <router-link :to="{name:'post-add'}" class="btn btn-success float-right"><i class="fa fa-plus-circle"> Add</i></router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Date</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(post ,i) in posts" :key="i">
                      <td>{{i+1}}</td>
                      <td>{{post.title}}</td>
                      <td><img :src="imageLink(post.image)" alt=""></td>
                      <td>{{post.created_at|time}}</td>
                      <td><span class="badge" :class="statusColor(post.status)">{{statusName(post.status)}}</span></td>
                      <td>
                        <router-link :to="`/post-edit/${post.slug}`" class="btn btn-success badge"><i class="fa fa-edit"></i></router-link>
                        <a @click="remove(post.slug)" class="btn btn-danger badge"><i class="fa fa-trash"></i></a>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
</template>


<script>
export default {
  computed:{
    posts(){
      return this.$store.getters.getpost;
    }
  },
  mounted(){
    this.$store.dispatch('postInfo')
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
    imageLink:function(name){
      return 'upload/posts/' + name;
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


                   axios.get('admin/post-remove/'+slug).then(Response=>{
                    
                    this.$message({
                      message: 'post  info remove success',
                      type: 'info'
                    });

                    this.$store.dispatch('postInfo')

                  });
                }
              })




     
    },
    datafound(){
      return this.posts.length < 1;
    }
  }
}
</script>

<style>
 tr td img {
    height: 40px;
    width: 45px;
    padding-top:1px;
  }
</style>