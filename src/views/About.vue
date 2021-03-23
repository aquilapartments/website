<template>
  <div class="about">
    <div class="head-image" :style="'background-image:url(\''+about.main_image.replace('/public','')+'\')'"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-10 offset-md-1">
          <div class="taormina-description">
            <h1>{{ about.title }}</h1>
            <vue-simple-markdown :source="about.main_description"></vue-simple-markdown>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:80px">
        <div class="col-sm-4 text-left left-description">
          <vue-simple-markdown :source="about.secondary_description"></vue-simple-markdown>
        </div>
        <div class="col-sm-8">
          <img :src="about.second_image.replace('/public','')" style="width:100%"><br><br><br>
          <img :src="about.third_image.replace('/public','')" style="width:100%">
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:100px">
      <iframe :src="accomodation.location" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

    <div class="container" style="margin:100px 0">
      <div class="row">
        <div class="col-sm-8 visible-xs">
          <img :src="about.third_image.replace('/public','')" style="width:100%">
        </div>
        <div class="col-sm-4">
          <div class="home-slide-description">
            <h1>{{ accomodation.title }}</h1>
            <p>{{ accomodation.init_description }}</p>
            <a href="/#/accomodation" class="big-arrow"><img src="../../public/img/arrow_big.png" height="70"></a>
          </div>
        </div>
        <div class="col-sm-8 hidden-xs">
          <img :src="accomodation.main_image.replace('/public','')" style="width:100%">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import * as contents from '@/contents/get'
  export default {
    name: 'about',
    data () {
      return{
        accomodations: contents.accomodation,
        accomodation: {
          main_image: ''
        },
        abouts: contents.about,
        about: {
          main_image: '',
          second_image: '',
          third_image: ''
        },
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
      app.about = app.abouts[app.language]
      app.accomodation = app.accomodations['accomodation-' + app.language]
    }
  }
</script>

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
    font-weight: 300;
    font-size: 35px;
    color: #8B8B8B;
    letter-spacing: 0;
    text-align: justify;
    line-height: 55px;
  }

  .taormina-description .markdown-body{
    text-align: justify; 
    font-weight: 300;
    font-size: 25px;
    color: #8B8B8B;
    letter-spacing: 0;
    text-align: justify;
    line-height: 55px;
  }

  .taormina-description h1{
    color:#000;
    margin-top:0;
    padding-top:0;
    font-weight: 300;
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