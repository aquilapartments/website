<template>
    <div class="">
      <div class="row" style="margin:150px 0; text-align:left;">
        <div class="col-sm-12 text-center" style="margin-bottom:50px;">
          <h1><b>{{ translations.book_now[language] }}</b></h1>
        </div>
        <div class="col-sm-4 offset-md-2">
            <b-form-input v-model="form.from" class="aquila-input" :placeholder="translations.from[language].replace('\'','').replace('\'','')"></b-form-input>
            <b-form-input v-model="form.to" class="aquila-input" :placeholder="translations.to[language].replace('\'','').replace('\'','')"></b-form-input>
            <b-form-input v-model="form.name" class="aquila-input" :placeholder="translations.name[language]"></b-form-input>
        </div>
        <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-6">
                <b-form-input v-model="form.adults" class="aquila-input" :placeholder="translations.adults[language]"></b-form-input>
              </div>
              <div class="col-sm-6">
                <b-form-input v-model="form.children" class="aquila-input" :placeholder="translations.children[language]"></b-form-input>
              </div>
            </div>
            <b-form-input v-model="form.message" class="aquila-input" :placeholder="translations.message[language]"></b-form-input>
            <b-form-input v-model="form.email" type="email" class="aquila-input" :placeholder="translations.email[language]"></b-form-input>
        </div>
        <div class="col-sm-12 text-center" style="margin-top:20px">
          <div v-if="!isSending" v-on:click="sendMail" class="btn btn-aquila">{{ translations.book_now[language] }}</div>
          <div v-if="isSending">{{ translations.sending[language].replace("'","").replace("'","") }}</div>
        </div>
      </div>
    </div>
</template>


<script>
  import * as contents from '@/contents/get'
  const axios = require('axios')
  export default {
    name: 'ContactForm',
    data () {
      return{
        translations: contents.translations,
        language: 'en',
        axios: axios,
        isSending: false,
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
    },
    methods: {
      async sendMail(){
        const app = this
        if(app.form.from !== '' && app.form.to !== '' && app.form.name !== '' && app.form.children !== '' && app.form.adults !== '' && app.form.email !== ''){
          app.isSending = true
          let url = 'https://aquilataormina.com:3002'
          if(window.location.host !== undefined){
            url = 'https://' + window.location.host.replace(':8080','') + ':3002'
          }
          let response = await app.axios.post(url + '/send', app.form)
          app.isSending = false
          if(response.data.accepted.length > 0){
            alert(app.translations.send_success[app.language])
            app.form.from = ''
            app.form.to = ''
            app.form.message = ''
            app.form.name = ''
            app.form.adults = ''
            app.form.children = ''
            app.form.email = ''
          }else{
            alert(app.translations.send_failed[app.language])
          }
        }else{
          alert(app.translations.fill_all_fields[app.language])
        }
      }
    }
  }
</script>