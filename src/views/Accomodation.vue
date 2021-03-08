<template>
  <div class="about">
    <div class="row">
      <div class="col-sm-8 visible-xs">
        <img :src="accomodation.main_image.replace('/public','')" style="width:100%">
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
            <slide v-for="slide in slider" v-bind:key="slide.order">
              <div class="accomodation-slide">
                <div class="slidehome-img" :style="'height:300px; background-image:url(\'' + slide.image.replace('/public','') + '\')'"></div>
              </div>
            </slide>
          </carousel>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-9">
          <div class="accomodation-description">
            <h1>{{ translations.description[language] }}<br><span style="font-weight:100">{{ accomodation.subtitle }}</span></h1>
            <p>{{ accomodation.long_description }}</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="accomodation-side-description">
            <h3>{{ accomodation.right_title_1 }}</h3>
            <p>{{ accomodation.right_description_1 }}</p>

            <h3>{{ accomodation.right_title_2 }}</h3>
            <p>{{ accomodation.right_description_2 }}</p>

            <h3>{{ accomodation.right_title_3 }}</h3>
            <p>{{ accomodation.right_description_3 }}</p>

            <h3>{{ accomodation.right_title_4 }}</h3>
            <p>{{ accomodation.right_description_4 }}</p>
          </div>
        </div>
      </div>
    </div><!-- container -->

    <div class="row">
      <iframe :src="accomodation.location" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

    <ContactForm/>

  </div>
</template>

<script>
  import * as contents from '@/contents/get'
  import ContactForm from '@/components/ContactForm'
  export default {
    name: 'accomodation',
    components: {
      ContactForm
    },
    data () {
      return{
        translations: contents.translations,
        accomodations: contents.accomodation,
        slider: contents.accomodationslider,
        accomodation: {
          main_image: ''
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
      app.accomodation = app.accomodations['accomodation-' + app.language]
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
