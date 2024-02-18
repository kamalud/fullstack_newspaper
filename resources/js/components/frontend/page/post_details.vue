<template>
    <div class="postdetails">
            <div class="First_news">
                <div class="row">
                <div class="col-md-8">
                    <div class="row">
                       <div class="post_details">
                           <div class="card">
                               <div class="card-header">
                                   <h5>{{post_details.title}}</h5>
                               </div> 
                               <div class="card-body">
                                   <img :src="'/upload/posts/'+ post_details.image" alt="">
                                   <span v-html="post_details.description"></span>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <side-ber></side-ber>
                </div>
            </div>
            </div>
            <section>
                <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                          <div class="card title title">
                                <h4> Sposrts</h4>
                            </div>
                          <div class="First_news">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 sports" v-for="(post,index) in sports" :key="index">
                                        <div class="card">
                                        <img :src="'/upload/posts/'+ post.image" alt="">
                                        <div class="card-body">
                                            <h5><router-link to="">{{post.title.substring(0,20)}}</router-link></h5>
                                            <router-link :to="`/post-details/${post.slug}`" class="btn btn-primary">Read more ..</router-link>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card title title">
                                <h4>National</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="same_category">
                                            <img :src="'/upload/posts/'+ national_posts[national_posts.length-1].image" alt="">
                                            <h4>{{national_posts[national_posts.length-1].title}}</h4>
                                            <p><span v-html="StrLimit(national_posts[national_posts.length-1].description,250)"></span></p>
                                            <router-link :to="`/post-details/`+national_posts[national_posts.length-1].slug" class="btn btn-primary">Read more ..</router-link>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="post_link">
                                            <ul>
                                                <li v-for="(post,index) in national_posts" :key="index"><router-link :to="`/post-details/${post.slug}`" :value="post.id" >{{post.title}}</router-link></li>
                                            </ul>
                                        </div>
                                    </div>
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
    data(){
        return {
            post_details:{}
        }
    },
computed:{
    posts(){
      return this.$store.getters.getpost;
    },
    post4_list(){
        return this.posts.slice(0,5);
    },
    sports(){
        return this.posts.filter(p=>p.category.name=='Sports');
    },
    national_posts(){
        return this.posts.filter(p=>p.category.name=='National').slice(0,8);
    }
  },
  mounted(){
      this.post_detailsinfo();
  },

  methods:{
      StrLimit(string,limit){
        let str = string;
        if(typeof str === 'string' && str.length > limit){
             str = str.slice(0,255) + '.....';
        }
        return str;
      },
      post_detailsinfo(){
          axios.get('/post_details/' + this.$route.params.slug).then(response=>{
             this.post_details = response.data.post;
          });
      }
  }
}
</script>


<style>
.First_news {
    padding: 18px 0;
}
.main_image
 {
      margin-left: 15px;  
 }
.main_image img
  {
    width: 400px;
    height: 250px;
    margin-bottom: 24px;
  }

  .sub_image img{
      width: 80px;
      height: 80px;
  }

  .sub_image h5{ 
      margin-top: 14px !important;
  }

  section {
      margin-left: 15px;  
  }
  .title {
      margin:5px 15px;  
      width: 200px;
      text-align: center;
      background: black;
  }
  .title h4{
      color: #fff;
  }
  .same_category h4{
      margin-top: 18px;
      color: black;
      padding: 12px 0;
  }
  .post_link ul li {
      padding: 10px;
      border-bottom: 1px solid #000;
  }
  .post_link ul li:last-child{
      border-bottom: none;
  }

 .post_link ul li a{
     color: indigo;
 }
.same_category img {
    width: 400px;
    height: 200px;
}
.sports img {
    width: 244px;
    height: 200px;
    margin: 0;
    padding: 0;
}




</style>