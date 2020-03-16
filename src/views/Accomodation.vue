<template>
  <div class="about">
    <div class="row">
      <div class="col-sm-8 visible-xs">
        <img src="../../public/placeholders/accomodation.jpg" style="width:100%">
      </div>
      <div class="col-sm-4">
        <div class="home-slide-description">
          <h1>{{ accomodation.title }}<br><span style="font-weight:100">{{ accomodation.subtitle }}</span></h1>
          <p>{{ accomodation.initial_description }}</p>
          <img src="../../public/img/pin.png" style="margin-right:10px;" height="36"> <b>{{ accomodation.address }}</b>
          <br><br>       
          <a href="#"><div class="btn btn-aquila">{{ translations.book_now[language] }}</div></a>
        </div>
      </div>
      <div class="col-sm-8 hidden-xs">
        <img :src="accomodation.main_image.replace('/public','')" style="width:100%">
      </div>
    </div>
    
    <div class="container" style="margin-bottom:150px">
      <div class="row">
        <div class="col-sm-12">
          <carousel :perPage=2>
            <slide>
              <div class="accomodation-slide">
                <img src="../../public/placeholders/accomodation_2.jpg" style="width:100%">
              </div>
            </slide>
            <slide>
              <div class="accomodation-slide">
                <img src="../../public/placeholders/accomodation_3.jpg" style="width:100%">
              </div>
            </slide>
            <slide>
              <div class="accomodation-slide">
                <img src="../../public/placeholders/accomodation_2.jpg" style="width:100%">
              </div>
            </slide>
            <slide>
              <div class="accomodation-slide">
                <img src="../../public/placeholders/accomodation_3.jpg" style="width:100%">
              </div>
            </slide>
          </carousel>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-9">
          <div class="accomodation-description">
            <h1>{{ translations.description[language] }}<br><span style="font-weight:100">{{ accomodation.subtitle }}</span></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus ex velit, ac auctor nisi dictum luctus. Nullam ex tellus, interdum ac viverra eget, consectetur a metus. Vivamus urna dolor, rhoncus sit amet ante vitae, lobortis sodales orci. Nulla sodales eleifend dolor eget faucibus. Quisque nibh odio, dapibus at tempor venenatis, vestibulum at augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus ex velit, ac auctor nisi dictum luctus. Nullam ex tellus, interdum ac viverra eget, consectetur a metus. Vivamus urna dolor, rhoncus sit amet ante vitae, lobortis sodales orci. Nulla sodales eleifend dolor eget faucibus. Quisque nibh odio, dapibus.</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="accomodation-side-description">
            <h3>Parking Garage</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>

            <h3>Parking Garage</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>

            <h3>Parking Garage</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>

            <h3>Parking Garage</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus finibus augue, nec egestas ante. Nullam fringilla in elit sed posuere. Quisque gravida elit in felis consequat, ac dapibus felis maximus.</p>
          </div>
        </div>
      </div>
    </div><!-- container -->

    <div class="row">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.369585080524!2d15.282543015414682!3d37.85164187974546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131411a39251c7f9%3A0x2654f47409ca387a!2sPiazza%20Var%C3%B2%2C%2098039%20Taormina%20ME!5e0!3m2!1sen!2sit!4v1580329882609!5m2!1sen!2sit" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

    <div class="">
      <div class="row" style="margin:150px 0; text-align:left;">
        <div class="col-sm-12 text-center" style="margin-bottom:50px;">
          <h1><b>Book</b> <span style="font-weight:200!important">Now</span></h1>
        </div>
        <div class="col-sm-4 offset-md-2">
            <b-form-input v-model="form.from" class="aquila-input" placeholder="From: dd/mm/yyyy"></b-form-input>
            <b-form-input v-model="form.to" class="aquila-input" placeholder="To: dd/mm/yyyy"></b-form-input>
            <b-form-input v-model="form.name" class="aquila-input" placeholder="Your name"></b-form-input>
        </div>
        <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-6">
                <b-form-input v-model="form.adults" class="aquila-input" placeholder="Adults"></b-form-input>
              </div>
              <div class="col-sm-6">
                <b-form-input v-model="form.children" class="aquila-input" placeholder="Children"></b-form-input>
              </div>
            </div>
            <b-form-input v-model="form.message" class="aquila-input" placeholder="Message"></b-form-input>
            <b-form-input v-model="form.email" type="email" class="aquila-input" placeholder="E-mail address"></b-form-input>
        </div>
        <div class="col-sm-12 text-center" style="margin-top:20px">
          <div class="btn btn-aquila">BOOK NOW</div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  import * as contents from '@/contents/get'
  export default {
    name: 'accomodation',
    data () {
      return{
        translations: contents.translations,
        accomodations: contents.accomodation,
        accomodation: '',
        language: 'en',
        form: {
          from: '',
          to: '',
          name: '',
          adults: '',
          children: '',
          message: '',
          email: ''
        }
      }
    },
    mounted () {
      const app = this
      let language = localStorage.getItem('language')
      if(language !== null){
        app.language = language
      }
      app.accomodation = app.accomodations['accomodation-' + language]
    }
  }
</script>

<style scoped>
  .accomodation-slide{
    padding:20px;
    margin:20px 0;
  }
  .accomodation-description{
    text-align:justify;
    margin:30px 0;
    font-weight:100;
    font-size: 35px;
    color: #8B8B8B;
    letter-spacing: 0;
    text-align: justify;
    line-height: 55px;
  }

  .accomodation-description h1{
    color:#000
  }
  
  .accomodation-side-description p{
    margin-bottom:30px;
  }

  .accomodation-side-description{
    background: #FFFDF1;
    width:130%;
    padding:50px;
    text-align: left; 
  }
</style>
