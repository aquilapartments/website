<template>
  <div class="about">
    <div class="head-image"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-10 offset-md-1">
          <div class="taormina-description">
            <h1>About <b>Taormina</b></h1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus ex velit, ac auctor nisi dictum luctus. Nullam ex tellus, interdum ac viverra eget, consectetur a metus. Vivamus urna dolor, rhoncus sit amet ante vitae, lobortis sodales orci. Nulla sodales eleifend dolor eget faucibus. Quisque nibh odio, dapibus at tempor venenatis, vestibulum at augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus ex velit, ac auctor nisi dictum luctus. Nullam ex tellus, interdum ac viverra eget, consectetur a metus. Vivamus urna dolor, rhoncus sit amet ante vitae, lobortis sodales orci. Nulla sodales eleifend dolor eget faucibus. Quisque nibh odio, dapibus at tempor venenatis, vestibulum at augue.
          </div>
        </div>
      </div>

      <div class="row" style="margin-top:80px">
        <div class="col-sm-4 text-left left-description">
          <h3>Parking Garage</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>

          <h3>Parking Garage</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>

          <h3>Parking Garage</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>

          <h3>Parking Garage</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>
        </div>
        <div class="col-sm-8">
          <img src="../../public/placeholders/accomodation_2.jpg" style="width:100%"><br><br><br>
          <img src="../../public/placeholders/accomodation_3.jpg" style="width:100%">
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:100px">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.369585080524!2d15.282543015414682!3d37.85164187974546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131411a39251c7f9%3A0x2654f47409ca387a!2sPiazza%20Var%C3%B2%2C%2098039%20Taormina%20ME!5e0!3m2!1sen!2sit!4v1580329882609!5m2!1sen!2sit" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

    <div class="container" style="margin:100px 0">
      <div class="row">
        <div class="col-sm-8 visible-xs">
          <img src="../../public/placeholders/accomodation_4.jpg" style="width:100%">
        </div>
        <div class="col-sm-4">
          <div class="home-slide-description">
            <h1>Accomodation 1</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="big-arrow"><img src="../../public/img/arrow_big.png" height="70"></a>
          </div>
        </div>
        <div class="col-sm-8 hidden-xs">
          <img src="../../public/placeholders/accomodation_4.jpg" style="width:100%">
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .head-image{
    width:100%;
    height:70vh;
    background-image:url('../../public/placeholders/taormina.jpg');
    background-position: top;
    background-repeat: no-repeat;
  }

  .taormina-description{
    margin-top:-100px;
    background: #FFFDF1;
    width:100%;
    padding:80px 130px;
    text-align: justify; 
    font-weight: 100;
    font-size: 35px;
    color: #8B8B8B;
    letter-spacing: 0;
    text-align: justify;
    line-height: 55px;
  }

  .taormina-description h1{
    color:#000;
    margin-top:0;
    padding-top:0;
    font-weight: 100;
  }

  .left-description{
    font-weight:300;
    font-size: 16px;
    color: #545454;
    letter-spacing: 0;
    line-height: 30px;
  }

  @media screen and (max-width:768px){
    .head-image{
      height:30vh;
    }
    .taormina-description{
      padding:40px 30px;
      font-size:22px;
      line-height: 35px;
      font-weight: 200;
    }
  }
</style>