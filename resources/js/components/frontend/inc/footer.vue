<template>
    <div class="footer">
        <section class="main_footer container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>User Comunity</h5>
                        <ul>
                            <li><a href="">facebook</a></li>
                            <li><a href="">facebook</a></li>
                            <li><a href="">facebook</a></li>
                            <li><a href="">facebook</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                            <h5>User Information</h5>
                        <ul class="about">
                            <li><a href="">About</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Cuminuty</a></li>
                            <li><a href="">Survice</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                            <h5>User Apps</h5>
                    </div>
                    </div>
                    <div class="mayfooter">
                        <h5>@gmail.com {{new Date()|Fronttime}}</h5>
                    </div>
        </section>
    </div>
</template>

<style>
.mayfooter{
    border-top: 1px solid #fff;
    padding: 18px;
}
  .mayfooter h5{
      text-align: center;
      color: #fff;
  }
  .footer{
          background: #48474d;
  }
  .main_footer {
      padding: 20px;
  }
  .main_footer ul{
      list-style-type: none;
  }
  .main_footer h5{
      color: #fff;
      text-align: center;
  }
  ul.about{
      color: #fff;
  }
</style>