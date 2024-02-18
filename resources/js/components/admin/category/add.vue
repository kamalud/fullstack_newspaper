<template>
    <div class="add">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category add Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link :to="{name:'adminhome'}">Home</router-link></li>
              <li class="breadcrumb-item active">Category Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 m-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
                <router-link :to="{name:'category-list'}" class="btn btn-warning float-right"><i class="fa fa-list"> List</i></router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form @submit.prevent="categoryInfo()">
                   <div class="row form-group">
                     <label for="" class="col-md-4">category name</label>
                     <div class="col-md-8">
                       <input type="text" v-model="form.name" class="form-control">
                         <div class="text-danger" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                     </div>
                   </div>
                   <div class="row form-group">
                     <label for="" class="col-md-4">category status</label>
                     <div class="col-md-8">
                       Active <input type="radio" v-model="form.status" value="1">
                       Inactive <input type="radio" v-model="form.status" value="0">
                       <div class="text-danger" v-if="form.errors.has('status')" v-html="form.errors.get('status')" />
                     </div>
                   </div>
                   <button type="submit" class="btn btn-primary">save category</button>
                   <button type="reset" class="float-right btn btn-danger">Reset</button>
                 </form>
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


  data: () => ({
    form: new Form({
      name: '',
      status: ''
    })
  }),

  methods: {
      categoryInfo:function(){
        this.form.post('admin/category-add').then(Response=>{
           this.form.name="";
           this.form.status="";
        });

        this.$message({
          message: 'Category save successfully',
          type: 'success'
        });
        
      }
  }
}
</script>
