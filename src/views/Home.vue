<template>
  <div class="home">
    <div class="row">
      <div class="col-sm-8 visible-xs">
        <carousel :autoplay="true" :perPage=1>
          <slide v-for="slide in topslide" v-bind:key="slide.image">
            <div class="slidehome-img" :style="'background-image:url(\'' + slide.image.replace('/public','') + '\')'"></div>
          </slide>
        </carousel>
      </div>
      <div class="col-sm-4">
        <div class="home-slide-description">
          <h1>{{ translations.home_main_title[language] }}</h1>
          <h1 class="subh1" style="font-weight:200!important">{{ translations.home_main_subtitle[language] }}</h1><br>
          <p>{{ translations.home_main_description[language] }}</p><br>
          <br><a href="#"><div class="btn btn-aquila">{{ translations.book_now[language] }}</div></a>
        </div>
      </div>
      <div class="col-sm-8 hidden-xs" style="cursor: grab;">
        <carousel :autoplay="true" :paginationEnabled="true" :perPage=1>
          <slide v-for="slide in topslide" v-bind:key="slide.image">
            <div class="slidehome-img" :style="'background-image:url(\'' + slide.image.replace('/public','') + '\')'"></div>
          </slide>
        </carousel>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 text-center aboutus-wrapper" style="margin:140px 0">
          <h1>{{ translations.about_us[language] }}</h1>
          <p>{{ translations.about_us_preview[language] }}</p>
          <a href="#"><div class="btn btn-aquila-transparent">{{ translations.learn_more[language] }} <img src="../../public/img/arrow.png" height="14"></div></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4" v-for="box in homebox" v-bind:key="box.order">
        <div class="home-tile">
          <h4>{{ box['title_' + language] }}</h4>
          <p>{{ box['text_' + language] }}</p>
          <a :href="'/#/' + box.link"><div class="btn btn-aquila-transparent">{{ translations.learn_more[language] }} <img src="../../public/img/arrow_white.png" height="14"></div></a>
        </div>
      </div><!--col-4-->
    </div>

    <div class="row" style="position:relative; margin-bottom:100px;">
      <div class="img" style="background-image:url('/placeholders/focus.jpg')"></div>
      <div class="home-focus-discovering"></div>
      <div class="col-12 text-center" style="padding:200px 100px; color:#fff">
        <h1>{{ translations.home_discoverytaormina_title[language] }}</h1>
        <p>{{ translations.home_discoverytaormina_preview[language] }}</p>
        <a href="/#/about-taormina"><div class="btn btn-aquila-white">{{ translations.learn_more[language] }} <img src="../../public/img/arrow_white.png" height="14"></div></a>
      </div>
    </div>

    <!--<div class="container">
      <div class="row">
        <div class="col-12">
          <div class="swiper-container" style="margin-bottom:100px; overflow:inherit">
            <div class="swiper-wrapper">
                <div class="swiper-slide home-slide" v-for="slide in bottomslide" v-bind:key="slide.order"  :style="'background-image:url(\'' + slide.image.replace('/public','') + '\')'">
                  <div class="slide-shadow"></div>
                  <div class="slide-button">
                    <div class="slide-button-head">{{ slide['caption_' + language] }}</div>
                    Explore <img src="../../public/img/arrow.png" height="14">
                  </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>-->

    <div class="" style="margin-bottom:100px">
      <div class="row">
        <div class="col-sm-8 visible-xs">
          <img :src="extraservice.image.replace('/public','')" style="width:100%">
        </div>
        <div class="col-sm-4">
          <div class="home-slide-description">
            <h1>{{ extraservice['title_' + language] }}</h1>
            <p>{{ extraservice['description_' + language] }}</p>
            <a :href="extraservice.link" class="big-arrow"><img src="../../public/img/arrow_big.png" height="70"></a>
          </div>
        </div>
        <div class="col-sm-8 hidden-xs">
          <img :src="extraservice.image.replace('/public','')" style="width:100%">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { Carousel, Slide } from 'vue-carousel';
  import Swiper from 'swiper';
  import * as contents from '@/contents/get'
  export default {
    name: 'home',
    components: {
      Carousel,
      Slide
    },
    data () {
      return {
        swiper: Swiper,
        translations: contents.translations,
        homeslider: contents.homeslider,
        topslide: [],
        bottomslide: [],
        homebox: contents.homebox,
        accomodation: contents.accomodation,
        extraservice: contents.extraservice['1'],
        language: 'en'
      }
    },
    mounted () {
      const app = this
      let language = localStorage.getItem('language')
      if(language !== null){
        app.language = language
      }
      for(let i in app.homeslider){
        if (app.homeslider[i].type === 'top'){
          app.topslide.push(app.homeslider[i])
        }else{
          app.bottomslide.push(app.homeslider[i])
        }
      }
      new app.swiper('.swiper-container',{
        effect: 'coverflow',
        grabCursor: true,
        spaceBetween: 100,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 0,
          modifier: 1,
          slideShadows : true,
        },
        pagination: {
          el: '.swiper-pagination',
        },
      });
    }
  }
</script>