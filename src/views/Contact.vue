<template>
  <div class="about">
    <div class="" style="margin-bottom:100px">
      <div class="row">
        <div class="col-sm-4">
          <div class="home-slide-description">
            <h1>Accomodation<br><span style="font-weight:100">Number 1</span></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus ex velit, ac auctor nisi dictum luctus. Nullam ex tellus, interdum ac viverra eget, consectetur a metus.</p>
            <img src="../../public/img/pin.png" style="margin-right:10px;" height="36"> <b>Piazza Varò 98039 Taormina ME</b>
            <br><br>       
            <a href="#"><div class="btn btn-aquila">BOOK NOW</div></a>
          </div>
        </div>
        <div class="col-sm-8">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.369585080524!2d15.282543015414682!3d37.85164187974546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131411a39251c7f9%3A0x2654f47409ca387a!2sPiazza%20Var%C3%B2%2C%2098039%20Taormina%20ME!5e0!3m2!1sen!2sit!4v1580329882609!5m2!1sen!2sit" width="100%" height="850" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
      </div>

      <div class="row" style="margin:150px 0; text-align:left;">
        <div class="col-12 text-center" style="margin-bottom:50px;">
          <h1 style="font-weight:300"><b>Book</b> <span style="font-weight:200!important">Now</span></h1>
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
        <div class="col-12 text-center" style="margin-top:20px">
          <div class="btn btn-aquila">BOOK NOW</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'contact',
    data () {
      return{
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
    }
  }
</script>