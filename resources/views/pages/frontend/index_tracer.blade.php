@extends('layouts.frontend.master_tracer')
@section('title')
@section('content')

  <body>
    <section class="hero d-flex">
      <div class="hero-left">
        <div>
          <h1>Bantu Seluruh <span>anak yatim</span> membangun masa depan</h1>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the
          </p>
        </div>
        <div class="d-flex credibility">
          <div class="desc">
            <p class="number"><b>100+</b></p>
            <p>Lorem Ipsum</p>
          </div>
          <div class="desc">
            <p class="number"><b>100+</b></p>
            <p>Lorem Ipsum</p>
          </div>
          <div class="desc">
            <p class="number"><b>100+</b></p>
            <p>Lorem Ipsum</p>
          </div>
        </div>
        <button class="tertiary lg">Donasi Sekarang</button>
      </div>
      <div class="hero-right">
        <img src="{{url('frontend/assets/images/ImageHeroRight.png')}}" alt="hero" />
      </div>
    </section>

    <!-- section bantu  -->
    <div class="help" id="donasi">
      <div class="page-center">
        <div class="help-content d-flex">
          <div class="help-left">
            <img src="{{url('frontend/assets/images/ImageSection2.png')}}" alt="Bantu" />
          </div>
          <div class="help-right">
            <div>
              <h2>Bantu <span>Anak Yatim</span> sampai Mandiri</h2>
              <p>
                Bantu anak yatim sampai mandiri, dengan data tervalidasi dan
                laporan berkala
              </p>
            </div>
            <div class="group-bantu">
              <div class="d-flex bantu-item">
                <img
                  src="{{url('frontend/assets/images/VectorIconSparkle.svg')}}"
                  alt="VectorIconSparkle"
                />
                <p>Mustahiq dengan 34 parameter survey</p>
              </div>
              <div class="d-flex bantu-item">
                <img
                  src="{{url('frontend/assets/images/VectorIconSparkle.svg')}}"
                  alt="VectorIconSparkle"
                />
                <p>Mustahiq dengan 34 parameter survey</p>
              </div>
              <div class="d-flex bantu-item">
                <img
                  src="assets/VectorIconSparkle.svg"
                  alt="VectorIconSparkle"
                />
                <p>Mustahiq dengan 34 parameter survey</p>
              </div>
            </div>
            <button class="primary lg">Donasi Sekarang</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of section bantu -->

    <!-- section layanan  -->
    <div class="layanan" id="layanan">
      <div class="page-center">
        <div class="layanan-content">
          <div class="text-center">
            <h2>Layanan pintukebaikan</h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the
            </p>
          </div>
          <div class="group-layanan d-flex">
            <div class="layanan-item">
              <img src="assets/VectorIconInfaq.svg" alt="Layanan" />
              <p><b>Infaq</b></p>
              <p>Lorem Ipsum is simply dolor sit</p>
              <div class="d-flex link">
                <a href="#" class="align-items-center">Donasi Sekarang </a>
                <img src="assets/VectorIconArrowRight.svg" alt="Arrow Right" />
              </div>
            </div>
            <div class="layanan-item">
              <img src="assets/VectorIconInfaq.svg" alt="Layanan" />
              <p><b>Infaq</b></p>
              <p>Lorem Ipsum is simply dolor sit</p>
              <div class="d-flex link">
                <a href="#" class="align-items-center">Donasi Sekarang </a>
                <img src="assets/VectorIconArrowRight.svg" alt="Arrow Right" />
              </div>
            </div>
            <div class="layanan-item">
              <img src="assets/VectorIconInfaq.svg" alt="Layanan" />
              <p><b>Infaq</b></p>
              <p>Lorem Ipsum is simply dolor sit</p>
              <div class="d-flex link">
                <a href="#" class="align-items-center">Donasi Sekarang </a>
                <img src="assets/VectorIconArrowRight.svg" alt="Arrow Right" />
              </div>
            </div>
            <div class="layanan-item">
              <img src="assets/VectorIconInfaq.svg" alt="Layanan" />
              <p><b>Infaq</b></p>
              <p>Lorem Ipsum is simply dolor sit</p>
              <div class="d-flex link">
                <a href="#" class="align-items-center">Donasi Sekarang </a>
                <img src="assets/VectorIconArrowRight.svg" alt="Arrow Right" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of layanan  -->

    <!-- section activity  -->
    <div class="activity" id="aktivitas">
      <div class="page-center">
        <div class="activity-content">
          <div class="text-center">
            <h2>Aktivitas penyaluran dana</h2>
            <div class="d-flex justify-content-center informasi-dana">
              <div class="dana">
                <p>Total dana masuk Oktober</p>
                <p class="amount">Rp21.000.000</p>
              </div>
              <div class="dana">
                <p>Total dana masuk Oktober</p>
                <p class="amount">Rp21.000.000</p>
              </div>
            </div>
          </div>
          <!-- TODO: Tab here  -->
          <div class="group-activity d-flex">
            <div class="activity-item">
              <img src="assets/Image.png" alt="Aktivitas" />
              <div>
                <p class="tag">Tag</p>
                <h3>Lorem Ipsum is simply dummy text of the printing</h3>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
                <div class="bar d-flex align-items-center">
                  <div class="progress-bar">
                    <div class="inner-bar" data-progress="90"></div>
                  </div>
                  <div class="percentage-label" data-progress="90">90%</div>
                </div>
              </div>
              <button class="primary lg w-full">Lihat Detail</button>
            </div>
            <div class="activity-item">
              <img src="assets/Image.png" alt="Aktivitas" />
              <div>
                <p class="tag">Tag</p>
                <h3>Lorem Ipsum is simply dummy text of the printing</h3>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
                <div class="bar d-flex align-items-center">
                  <div class="progress-bar">
                    <div class="inner-bar" data-progress="90"></div>
                  </div>
                  <div class="percentage-label" data-progress="90">90%</div>
                </div>
              </div>
              <button class="primary lg w-full">Lihat Detail</button>
            </div>
            <div class="activity-item">
              <img src="assets/Image.png" alt="Aktivitas" />
              <div>
                <p class="tag">Tag</p>
                <h3>Lorem Ipsum is simply dummy text of the printing</h3>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
                <div class="bar d-flex align-items-center">
                  <div class="progress-bar">
                    <div class="inner-bar" data-progress="90"></div>
                  </div>
                  <div class="percentage-label" data-progress="90">90%</div>
                </div>
              </div>
              <button class="primary lg w-full">Lihat Detail</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- end of activity  -->

    <!-- form   -->
    <div class="form">
      <div class="page-center">
        <h2 class="text-center">
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry.
        </h2>
        <div class="form-content d-flex">
          <div class="form-left">
            <img src="assets/ImageForm.png" alt="Image Form" />
          </div>
          <div class="form-right">
            <form>
              <div>
                <label for="name">Nama:</label><br />
                <input type="text" id="name" name="name" />
              </div>
              <div>
                <label for="phone">No HP:</label><br />
                <input type="tel" id="phone" name="phone" />
              </div>
              <div>
                <label for="category">Kategori:</label><br />
                <select id="category" name="category">
                  <option value="">Pilih...</option>
                  <option value="kategori1">Kategori 1</option>
                  <option value="kategori2">Kategori 2</option>
                  <!-- tambahkan option lain jika diperlukan -->
                </select>
              </div>

              <div>
                <label for="subcategory">Sub Kategori:</label><br />
                <select id="subcategory" name="subcategory">
                  <option value="">Pilih...</option>
                  <option value="subkategori1">Sub Kategori 1</option>
                  <option value="subkategori2">Sub Kategori 2</option>
                  <!-- tambahkan option lain jika diperlukan -->
                </select>
              </div>

              <input class="primary radius-full" type="submit" value="Submit" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of form  -->
  </body>
@endsection