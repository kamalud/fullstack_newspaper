<template>
    <div class="postedit">
            <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post edit Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link :to="{name:'adminhome'}">Home</router-link></li>
              <li class="breadcrumb-item active">Post edit Form</li>
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
                <h3 class="card-title">Post edit form</h3>
                <router-link :to="{name:'post-list'}" class="btn btn-primary float-right"><i class="fa fa-list"> Post List</i></router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" @submit.prevent="postInfo()" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="Category name">News title</label>
                            <input type="text" class="form-control" v-model="form.title">
                         <div class="text-danger" v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                        </div>
                        <div class="col-md-6">
                            <label for="Category name">Category name</label>
                            <select name="" id="" class="form-control" v-model="form.category_id">
                              <option value="">category name</option>
                              <option :value="cat.id" v-for="cat in categories">{{cat.name}}</option>
                            </select>
                         <div class="text-danger" v-if="form.errors.has('category_id')" v-html="form.errors.get('category_id')" />

                            
                        </div>

                        <div class="col-md-12">
                          <label for="description">Description</label>
                           <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                         <div class="text-danger" v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                        </div>
                        <br>
                        <div class="col-md-4">
                          <label for="status">Status</label>
                          <div>
                            Active <input type="radio" v-model="form.status" value="1">
                            Inactive <input type="radio" v-model="form.status" value="0">
                            <div class="text-danger" v-if="form.errors.has('status')" v-html="form.errors.get('status')" /></div>
                        </div>
                        
                        <div class="col-md-4">
                          <label for="Image">Image</label>
                          <input  type="file" @change="ImageShow($event)" id="image" name="image">
                            <div class="text-danger" v-if="form.errors.has('image')" v-html="form.errors.get('image')" />
                        </div>
                         <div class="col-md-4">
                          <img :src="form.image" alt="">
                        </div>
                       
                    </div>
                    <button type="submit" class="btn btn-primary">save category</button>
                   <button type="reset" class="float-right btn btn-danger">Reset</button>
                </form>
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
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        name: 'edit_post',
        data() {
            return {
              form: new Form({
                    title: '',
                    image: '',
                    description: '',
                    category_id: '',
                    user_id: '',
                    keyword: '',
                    lik: '',
                    dislik: '',
                    status: ''
                  }),
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        },
       methods: {
      postInfo:function(){
        this.form.post('/admin/post-edit').then(Response=>{
           this.form.title="";
           this.form.description="";
           this.form.category_id="";
           this.form.status="";
           this.form.image="";
        });

        this.$message({
          message: 'Post save successfully',
          type: 'success'
        });
        
      },
      ImageShow:function(e){
        let file = e.target.files[0];
        let reader = new FileReader(); 
        reader.onload = e=>{
          this.form.image = e.target.result;
        }
        reader.readAsDataURL(file);
      }
  },
  
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
<style>
  img {
    height: 90px;
    width: 90px;
    padding-top:15px;
  }
</style>