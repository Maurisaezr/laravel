
<!----------------------------------------------------INICIO------CARRUSEL-------------------------------------------------------------------------->


  <!-- agregamos un  slider carrousel para hacerlo mas vistoso  https://getbootstrap.esdocu.com/docs/5.1/components/carousel/ -->



  <section class="container mt-5">
    <h2 class="text-center mb-4">📰 Artículos Destacados</h2>
    <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselNoticias" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselNoticias" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselNoticias" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/noticia1.jpg" class="d-block w-100 rounded" alt="Noticia 1">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
            <h5>Brasil juzgará a Bolsonaro</h5>
            <p>El Supremo Federal de Brasil iniciará juicio por intento de golpe.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/noticia2.jpg" class="d-block w-100 rounded" alt="Noticia 2">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
            <h5>Oxígeno en galaxia lejana</h5>
            <p>Chile ayuda al descubrimiento usando el radiotelescopio ALMA.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/noticia3.jpg" class="d-block w-100 rounded" alt="Noticia 3">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
            <h5>Salud mental en el trabajo</h5>
            <p>Consejos para un año laboral sin estrés.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselNoticias" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </section>
<!----------------------------------------------------FIN------CARRUSEL-------------------------------------------------------------------------->