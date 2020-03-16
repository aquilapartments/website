<template>
  <div id="app">
    <div class="container">
      <div class="col-12">
        <b-navbar toggleable="lg">
          <b-navbar-brand href="/#/" class="navlogo">
            AQUILA<br>
            <div class="langselector hidden-xs">
              <span v-on:click="changeLanguage('en')" v-bind:class="{ langselected: language === 'en' }" style="cursor:pointer">ENG</span> | 
              <span v-on:click="changeLanguage('it')" v-bind:class="{ langselected: language === 'it' }" style="cursor:pointer"> ITA</span> | 
              <span v-on:click="changeLanguage('de')" v-bind:class="{ langselected: language === 'de' }" style="cursor:pointer">GER</span>
            </div>
          </b-navbar-brand>
          <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
          <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
              <b-nav-item class="navbar-href" v-bind:class="{ menuselected: route === 'home' }" href="/#/">{{ translations.home[language] }}</b-nav-item>
              <b-nav-item class="navbar-href" v-bind:class="{ menuselected: route === 'accomodation' }" href="/#/accomodation">{{ translations.accomodation[language] }}</b-nav-item>
              <b-nav-item class="navbar-href" v-bind:class="{ menuselected: route === 'about' }" href="/#/about-taormina">{{ translations.about_taormina[language] }}</b-nav-item>
              <b-nav-item class="navbar-href" v-bind:class="{ menuselected: route === 'contact' }" href="/#/contact">{{ translations.contact[language] }}</b-nav-item>
              <b-nav-item class="navbar-href visible-xs" href="https://instagram.com" target="_blank">Instagram</b-nav-item>
              <b-nav-item class="navbar-href visible-xs" href="#" target="_blank">
                <span v-on:click="changeLanguage('en')" v-bind:class="{ langselected: language === 'en' }" style="cursor:pointer">ENG</span> | 
                <span v-on:click="changeLanguage('it')" v-bind:class="{ langselected: language === 'it' }" style="cursor:pointer"> ITA</span> | 
                <span v-on:click="changeLanguage('de')" v-bind:class="{ langselected: language === 'de' }" style="cursor:pointer">GER</span>
              </b-nav-item>
            </b-navbar-nav>
          </b-collapse>
          <img style="float:right;" class="instagram-logo" src="../public/img/instagram.png" height="25">
        </b-navbar>
      </div>
    </div>
    
    <router-view/>

    <div class="row text-center" style="background:#FF8C6C; color:#fff">
      <div class="col-sm-4 border-mobile" style="padding:30px 0; font-size:18px;">
        <img src="../public/img/phone.png" height="40"><br><br>
        +39 333 11 22 333
      </div>
      <div class="col-sm-4 border-mobile" style="padding:30px 0; font-size:18px;">
        <img src="../public/img/mail.png" height="40"><br><br>
        <a style="font-size:18px; color:#fff!important; text-decoration:none" href="mailto:info@aquilataormina.com">info@aquilataormina.com</a>
      </div>
      <div class="col-sm-4" style="padding:30px 0; font-size:18px;">
        <img src="../public/img/sun.png" height="40"><br><br>
        Taormina | +38°
      </div>
    </div>
    <div class="footer">
      <div class="col-12" style="font-size:11px;">
        Made with love by <a href="http://wearefuturing.com" target="_blank">wearefuturing.com</a>
      </div>
    </div>
  </div>
</template>
<script>
  import * as contents from '@/contents/get'
  export default {
    data: function() {
     return {
        route: '',
        language: 'en',
        translations: contents.translations
      }
    },
    watch:{
        $route (to){
            const app = this
            app.route = to.name
        }
    },
    mounted (){
      const app = this
      app.route = app.$route.name
      let language = localStorage.getItem('language')
      if(language !== null){
        app.language = language
      }
    },
    methods: {
      changeLanguage(lang){
        const app = this
        app.language = lang
        localStorage.setItem('language',lang)
        location.reload()
      }
    }
  }
</script>
<style>
  body, html{
    overflow-x: hidden;
  }
  
  #app {
    font-family: 'Work Sans', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
  }

  #nav a {
    font-size: 16px;
    color: #545454;
    letter-spacing: 0;
  }

  #nav a.router-link-exact-active {
    color: #42b983;
  }

  .navlogo{
    font-family: 'Work Sans'; 
    font-weight: 100;
    font-size: 60px!important;
    color: #545454;
    letter-spacing: 7px;
    line-height: 71px;
    padding-right:130px; 
  }

  .langselector{
    font-size: 16px;
    color: #545454;
    letter-spacing: 0;
    float: left;
    font-weight: 400!important;
  }
  
  .navbar-href{
    margin: 0 20px;
  }
  
  h1{
    font-weight: 700!important;
  }

  .btn-aquila{
    background: #FF8C6C!important;
    border-radius: 29px!important;
    color:#fff!important;
    padding:15px 45px!important;
  }

  .btn-aquila:hover{
    opacity: 0.75;
  }

  .btn-aquila-transparent{
    font-weight: 500!important;
    padding:15px 45px!important;
  }
  .btn-aquila-transparent:hover{
    font-weight: 700!important;
    cursor:pointer;
  }
  .slidehome-img{
    background-size:cover; 
    background-position:center;
    background-repeat: no-repeat;
    width: 100%; 
    height:95vh;
  }

  .btn-aquila-white{
    color:#fff!important;
    font-weight: 500!important;
    padding:15px 45px!important;
  }

  .btn-aquila-white:hover{
    font-weight: 700!important;
    cursor:pointer;
  }

  .big-arrow{
    position:absolute; 
    top:50%; 
    right:40px; 
    margin-top:-35px;
  }

  .big-arrow:hover{
    cursor: pointer;
    opacity: 0.75;
  }

  .footer{
    background: #FFFDF1;
    padding:30px 0;
  }
  
  .swiper-container {
      width: 100%;
      height: 500px;
  }

  .home-slide-description{
    background: #FFFDF1;
    width:150%;
    padding:90px;
    z-index: 99;
    position:absolute;
    top: 50px;
    left: -10px;
    text-align: left; 
  }

  .home-slide-description h1{
    font-weight: 600;
    font-size: 50px;
    color: #545454;
    letter-spacing: 0;
    line-height: 48px;
  }

  .hone-slide-description p{
    font-size: 16px;
    color: #545454;
    letter-spacing: 0;
    line-height: 30px;
  }

  .aboutus-wrapper h1{
    font-weight: 500;
    margin-bottom:24px;
    font-size: 50px;
    color: #545454;
    letter-spacing: 0;
    text-align: center;
    line-height: 48px;
  }

  .aboutus-wrapper p{
    font-size: 16px;
    color: #545454;
    letter-spacing: 0;
    text-align: center;
    line-height: 30px;
  }

  .home-tile{
    background: #FFFDF1!important;
    padding:90px 30px;
    color:#fff;
    font-family: 'Work Sans';
    font-size: 16px;
    color: #545454;
    letter-spacing: 0;
    text-align: center;
    line-height: 30px;
    margin-bottom:30px;
  }
  .home-tile .btn-aquila-transparent{
    opacity:0
  }
  .home-tile:hover .btn-aquila-transparent{
    opacity: 1;
  }
  .home-tile .btn-aquila-transparent:hover{
    font-weight: 500!important;
  }
  .home-tile h4{
    font-weight:500;
    margin-bottom:20px;
    font-size: 16px;
    color: #363636;
    letter-spacing: 0.73px;
    text-align: center;
  }

  .home-tile:hover{
    background: #FF8C6C!important;
    color:#fff;
    cursor:pointer;
  }

  .home-focus{
    opacity: 0.6;
    background: #FF8C6C!important;
    position:absolute; 
    top:0; 
    left:0;
    width:100%;
    height:100%;
  }

  .swiper-container-horizontal>.swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction{
    bottom: -50px!important;
  }

  .swiper-pagination-bullet-active{
    background-color:#FF8C6C!important;
  }

  .swiper-pagination-bullet{
    width:14px;
    height:14px;
  }

  .home-focus-discovering{
    opacity: 0.2;
    background: #000!important;
    position:absolute; 
    top:0; 
    left:0;
    width:100%;
    height:100%;
  }

  .img{
    width:100%;
    height:100%;
    position:absolute;
    top:0;
    left:0;
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
  }

  .home-slide{
    background-size:cover; 
    background-position:center; 
    background-repeat:no-repeat; 
    position:relative;
  }

  .slide-button{
    position:absolute;
    bottom:15px; 
    left:15px;
    background:#fff;
    padding:25px;
    text-align:left;
    font-weight:bold;
    font-size:22px;
    color: #545454;
  }

  .slide-button:hover{
    opacity: 0.9;
    cursor:pointer;
  }
  
  .slide-button-head{
    font-size:24px;
    margin-bottom:10px;
    font-weight: bold;
    color: #545454;
    letter-spacing: 0.91px;
  }
  

  .slide-shadow{
    width:100%;
    height:100%;
    top:0;
    left:0;
    position:absolute;
    background:rgba(255,255,255,0.5);
  }

  .swiper-slide-active .slide-shadow{
    display:none;
  }

  .aquila-input{
    border:0!important;
    border-bottom: 1px solid #FF8C6C!important;
    border-radius: 0px!important;
    font-weight: bold!important;
    margin-bottom:20px!important;
    font-size: 16px!important;
  }
  .aquila-input:focus{
    outline:none!important;
    box-shadow:none!important;
    border-bottom: 1px solid rgb(216, 112, 83)!important;
  }
  
  .langselected, .langselected .nav-link{
    font-weight: bold;
    color:rgba(0,0,0,1)!important;
  }
  .hidden-xs {
    display:block;
  }
  .visible-xs{
    display:none;
  }
  .menuselected, .menuselected .nav-link{
    font-weight:bold!important;
    color:#FF8C6C!important;
  }
  .VueCarousel-pagination{
    display: none;
  }
  @media screen and (max-width:768px){

    .navbar {
      position: fixed!important;
      left: 0!important;
      top: 0!important;
      width: 100%!important;
      padding: 0 20px!important;
      background: #fff!important;
      z-index: 99999!important;
    }
    .home, .about, .accomodation, .contact{
      margin-top:80px;
    }
    .navbar-collapse{
      background: #fff;
      margin-top:70px;
    }
    .navbar-brand{
      margin-top:-10px;
      position:fixed;
      top:6px;
      left:20px;
    }
    .navbar{
      height: 75px;
    }
    .langselector{
      position: fixed;
      top:23 px;
      left:20px;
    }
    .instagram-logo{
      display: none;
    }
    .accomodation-side-description{
      width:100%!important;
    }
    .navbar-light .navbar-toggler {
      position:absolute;
      top:20px;
      right:20px;
    }
    .navlogo{
      font-size:30px!important;
    }
    .slidehome-img{
      height: 40vh!important;
    }
    .hidden-xs {
      display:none;
    }
    .visible-xs{
      display:block;
    }
    .home-slide-description{
      padding:20px;
      text-align: left;
    }
    .big-arrow{
      right:20px;
    }
    .big-arrow img{
      height: 30px;
      margin-top:20px;
    }
    .home-slide-description{
      width:100%;
      position:relative; 
      top:0;
      left:0;
    }
    .aboutus-wrapper p, .aboutus-wrapper h1, .aboutus-wrapper .btn{
      text-align:left!important;
    }
    .aboutus-wrapper .btn{
      text-align:left!important;
      float:left;
      padding: 0!important;
    }
    .border-mobile{
      border-bottom:1px solid #fff;
    }
  }
</style>
