<template>
    <div class="sideber">
        <nav>
        <div class="nav nav-tabs post_tab" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Latest</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Most read</a>
            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Popular</a>
        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active post_list" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <nav class="nav flex-column">
                <ul>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                </ul>
                <div class="button">
                   <a href="" class="btn btn-primary">Read more ..</a>
               </div>
             </nav>
        </div>
        <div class="tab-pane fade post_list" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <nav class="nav flex-column">
                <ul>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                </ul>
                <div class="button">
                   <a href="" class="btn btn-primary">Read more ..</a>
               </div>
             </nav>
        </div>
        <div class="tab-pane fade post_list" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <nav class="nav flex-column">
                  <ul>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                    <li><router-link class="nav-link" to="">This is news title This is news title</router-link></li>
                </ul>
               <div class="button">
                   <a href="" class="btn btn-primary">Read more ..</a>
               </div>
             </nav>
        </div>
        </div>
    </div>
</template>

<style>
  .post_list ul li {
      margin: 5px 5px;
      padding: 10px;
      color: #fff;
      background: rgb(13, 6, 109);
  }
  .post_list ul li:nth-child(odd){
            color: #fff;
  }
  .post_list ul li a {
      color: #fff;
  }
  .post_tab a{
      color: #fff;
  }
  .post_tab{
      background: rgb(13, 6, 109);
  }

  .button a{
      width: 120px;
      margin-left: 42px;
  }
</style>