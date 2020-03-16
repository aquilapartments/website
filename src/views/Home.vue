<template>
  <div class="home">
    <div class="row">
      <div class="col-sm-8 visible-xs">
        <carousel :perPage=1>
          <slide v-for="slide in homeslider" v-bind:key="slide.order">
            <div class="slidehome-img" :style="'background-image:url(\'' + slide.image.replace('/public','') + '\')'"></div>
          </slide>
        </carousel>
      </div>
      <div class="col-sm-4">
        <div class="home-slide-description">
          <h1>{{ translations.home_main_title[language] }}</h1>
          <h1 style="font-weight:200!important">{{ translations.home_main_subtitle[language] }}</h1><br>
          <p>{{ translations.home_main_description[language] }}</p><br>
          <br><a href="#"><div class="btn btn-aquila">{{ translations.book_now[language] }}</div></a>
        </div>
      </div>
      <div class="col-sm-8 hidden-xs">
        <carousel :perPage=1>
          <slide v-for="slide in homeslider" v-bind:key="slide.order">
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
          <h4>{{ box.title }}</h4>
          <p>{{ box.text }}</p>
          <a :href="'/#/' + box.link"><div class="btn btn-aquila-transparent">{{ translations.learn_more[language] }} <img src="../../public/img/arrow_white.png" height="14"></div></a>
        </div>
      </div><!--col-4-->
    </div>

    <div class="row" style="position:relative; margin-bottom:100px;">
      <div class="img" style="background-image:url('/placeholders/focus.jpg')"></div>
      <div class="home-focus-discovering"></div>
      <div class="col-12 text-center" style="padding:200px 100px; color:#fff">
        <h1>Discovery Taormina</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus ex velit, ac auctor nisi dictum luctus. Nullam ex tellus, interdum ac viverra eget, consectetur a metus. Vivamus urna dolor, rhoncus sit amet ante vitae, lobortis sodales orci. </p>
        <a href="#"><div class="btn btn-aquila-white">Learn more <img src="../../public/img/arrow_white.png" height="14"></div></a>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="swiper-container" style="margin-bottom:100px; overflow:inherit">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <div class="swiper-slide home-slide" style="background-image:url('/placeholders/slide_home.jpg')">
                  <div class="slide-shadow"></div>
                  <div class="slide-button">
                    <div class="slide-button-head">Lorem ipsum</div>
                    Explore <img src="../../public/img/arrow.png" height="14">
                  </div>
                </div> <!--slide-->
                <div class="swiper-slide home-slide" style="background-image:url('/placeholders/slide_home.jpg')">
                  <div class="slide-shadow"></div>
                  <div class="slide-button">
                    <div class="slide-button-head">Lorem ipsum</div>
                    Explore <img src="../../public/img/arrow.png" height="14">
                  </div>
                </div> <!--slide-->
                <div class="swiper-slide home-slide" style="background-image:url('/placeholders/slide_home.jpg')">
                  <div class="slide-shadow"></div>
                  <div class="slide-button">
                    <div class="slide-button-head">Lorem ipsum</div>
                    Explore <img src="../../public/img/arrow.png" height="14">
                  </div>
                </div> <!--slide-->
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="" style="margin-bottom:100px">
      <div class="row">
        <div class="col-sm-8 visible-xs">
          <img src="../../public/placeholders/yacht.jpg" style="width:100%">
        </div>
        <div class="col-sm-4">
          <div class="home-slide-description">
            <h1>Rent a Yacht</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="big-arrow"><img src="../../public/img/arrow_big.png" height="70"></a>
          </div>
        </div>
        <div class="col-sm-8 hidden-xs">
          <img src="../../public/placeholders/yacht.jpg" style="width:100%">
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
        homebox: contents.homebox,
        accomodation: contents.accomodation,
        language: 'en'
      }
    },
    mounted () {
      const app = this
      let language = localStorage.getItem('language')
      if(language !== null){
        app.language = language
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