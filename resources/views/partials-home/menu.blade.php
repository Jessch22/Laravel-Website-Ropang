<!-- Menu Section -->
<section id="menu" class="menu section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Menu</h2>
    <p>Check Our Tasty Menu</p>
  </div>

  <div class="container isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul class="menu-filters isotope-filters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-Indomie">Indomie</li>
          <li data-filter=".filter-Roti">Roti</li>
          <li data-filter=".filter-Nasi">Nasi</li>
          <li data-filter=".filter-Pisang">Pisang</li>
          <li data-filter=".filter-Ayam">Ayam</li>
          <li data-filter=".filter-Minuman">Minuman</li>
          <li data-filter=".filter-Lainnya">Lainnya</li>
        </ul>
      </div>
    </div>

    <div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">
      @isset($menus)
        @forelse($menus as $menu)
          <div class="col-lg-6 menu-item isotope-item filter-{{ $menu->category }}">
            <img src="{{ asset($menu->image) }}" class="menu-img" alt="">
            <div class="menu-content">
              <a>{{ $menu->name }}</a><span>{{ number_format($menu->price, 0, ',', '.') }}</span>
            </div>
            <div class="menu-description">
                {{ $menu->description }}
            </div>
            <div class="menu-actions custom-flex-end">
              <button class="btn btn-primary btn-add-to-cart" onclick="addToCart({{ $menu->id }})><i class="fa fa-cart-plus"></i></button>
            </div>
          </div>
        @empty
          <div class="col-lg-12">
            <p>No menus available.</p>
          </div>
        @endforelse
      @else
        <div class="col-lg-12">
          <p>No menus available.</p>
        </div>
      @endisset
    </div><!-- isotope-container -->

    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <a href="#" class="btn btn-see-cart btn-primary">See Cart</a>
      </div>
    </div>

  </div><!-- isotope-layout -->
</section><!-- Menu Section -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  function addToCart(menuId) {
      axios.post('{{ route('cart.add') }}', {
          menu_id: menuId
      })
      .then(response => {
          alert(response.data.status);
      })
      .catch(error => {
          console.error(error);
      });
  }
</script>