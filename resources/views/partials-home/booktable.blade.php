<!-- Book A Table Section -->
<section id="book-a-table" class="book-a-table section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>RESERVATION</h2>
    <p>Book a Table</p>
  </div><!-- End Section Title -->

  <div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="bookTableForm" action="{{ route('bookTable') }}" method="post" role="form" class="php-email-form">
        @csrf
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
            </div>
            <div class="col-lg-4 col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
            </div>
            <div class="col-lg-4 col-md-6">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
            </div>
            <div class="col-lg-4 col-md-6">
                <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
            </div>
            <div class="col-lg-4 col-md-6">
                <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
            </div>
            <div class="col-lg-4 col-md-6">
                <input type="number" class="form-control" name="people" id="people" placeholder="# of people" required="">
            </div>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
        </div>
        <div class="mb-3">
            <div class="loading1" style="display: none;">Loading</div>
            <div class="error-message1"></div>
            <div class="sent-message1" style="display: none;">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Book a Table</button></div>
    </form>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Contact Us</p>
  </div><!-- End Section Title -->

  <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
    <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d247.9192338504682!2d106.7848456!3d-6.1698746!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65afa1b68a3%3A0x647879f5ebbe7083!2sRopang%20talent!5e0!3m2!1sid!2sid!4v1718559511628!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div><!-- End Google Maps -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Location</h3>
            <p>Jl. Tj. Duren Utara IIIF No.32, Kec. Grogol Petamburan, Jakarta Barat</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Open Hours</h3>
            <p>Monday-Saturday:<br>00:00 - 23:59</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>+62 822 6004 5686</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>marketing@rittertalent.com</p>
          </div>
        </div><!-- End Info Item -->

      </div>

      <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="contactForm" action="{{ route('storeContact') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
        @csrf
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading2" style="display: none;">Loading</div>
              <div class="error-message2"></div>
              <div class="sent-message2" style="display: none;">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->
    </div>
  </div>
</section><!-- /Contact Section -->

<style type="text/css">
  .alert {
    position: relative;
    padding: 1rem 1rem;
    margin-bottom: 1rem;
    border: 1px;
    border-radius: 0.375rem;
  }

  .alert-success {
    color: #0a3622;
    background-color: #d1e7dd;
    border-color: #a3cfbb;
  }

  .alert-danger {
    color: #58151c;
    background-color: #f8d7da;
    border-color: #f1aeb5;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    function showAlert(alertClass, message) {
      var alertElement = document.querySelector(alertClass);
      if (alertElement) {
        alertElement.style.display = 'block';
        alertElement.innerHTML = message ? message : 'Something went wrong.';
        setTimeout(function() {
          alertElement.style.display = 'none';
        }, 5000);
      }
    }

    var contactForm = document.getElementById('contactForm');
    if (contactForm) {
      contactForm.addEventListener('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(contactForm);
        var loading = contactForm.querySelector('.loading2');
        var error = contactForm.querySelector('.error-message2');
        var success = contactForm.querySelector('.sent-message2');

        loading.style.display = 'block';
        error.style.display = 'none';
        success.style.display = 'none';

        fetch(contactForm.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        })
        .then(response => response.text())
        .then(response => {
          loading.style.display = 'none';
          if (response.includes('success')) {
            success.style.display = 'block';
            contactForm.reset();
            window.scrollTo({ top: contactForm.offsetTop, behavior: 'smooth' });
            showAlert('.alert', 'Your message has been sent. Thank you!');
          } else {
            error.style.display = 'block';
            showAlert('.alert', 'Something went wrong.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          error.style.display = 'block';
          showAlert('.alert', 'Something went wrong.');
        });
      });
    }
  });
</script>
