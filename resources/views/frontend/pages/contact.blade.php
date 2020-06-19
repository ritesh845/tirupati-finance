 <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>If you want to Two wheeler and Four wheeler loan please contact us. Our team member contact you and provide loan details</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <h4>Location:</h4>
                <p>{{APPADDRESS}}</p>
              </div>

              <div class="email">
               <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <h4>Email:</h4>
                <p>{{APP_EMAIL}}</p>
              </div>

              <div class="phone">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <h4>Call:</h4>
                <p>{{APPMOBILE}}</p>
              </div>

                {{-- <div id="map"></div> --}}

            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="email" data-rule="mobile" data-msg="Please enter a valid mobile" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
                  <div class="validate" ></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->