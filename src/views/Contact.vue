<template>
  <div class="about">
    <div class="" style="margin-bottom:100px">
      <div class="row">
        <div class="col-sm-4">
          <div class="home-slide-description">
            <h1>{{ translations.contact_main_title[language] }}<br><span style="font-weight:100">{{ translations.contact_subtitle[language] }}</span></h1>
            <p>{{ translations.contact_text[language] }}</p>
            <br><br>       
            <a href="#"><div class="btn btn-aquila">{{ translations.book_now[language] }}</div></a>
          </div>
        </div>
        <div class="col-sm-8">
          <iframe :src="accomodation.location" width="100%" height="850" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
      </div>
      <ContactForm/>
    </div>
  </div>
</template>

<script>
  import * as contents from '@/contents/get'
  import ContactForm from '@/components/ContactForm.vue'
  export default {
    name: 'contact',
    components: {
      ContactForm
    },
    data () {
      return{
        accomodations: contents.accomodation,
        accomodation: {
          main_image: ''
        },
        translations: contents.translations,
        language: 'en'
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