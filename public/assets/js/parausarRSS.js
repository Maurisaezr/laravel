
function Noticias_ultimo_minuto() {
  console.log("Noticias_ultimo_minuto fue llamado!");
  fetch('https://api.rss2json.com/v1/api.json?rss_url=http://feeds.bbci.co.uk/mundo/rss.xml')
    .then(res => res.json()) // recibo la respuesta en json 
    .then(data => {
      const carouselInner = document.querySelector("#carouselExampleControls .carousel-inner"); // busco la class carouselExampleControls 
      carouselInner.innerHTML = "";// parto con el inner vacio 

      const itemsPerSlide = 3;
      const totalItems = data.items.slice(0, 9); // máximo 9 noticias 
      const totalSlides = Math.ceil(totalItems.length / itemsPerSlide);
// for para recorrer el json generado  llegara a un total de 9  item
      for (let i = 0; i < totalSlides; i++) {
        const activeClass = i === 0 ? 'active' : '';
        const start = i * itemsPerSlide;
        const end = start + itemsPerSlide;
        const slideItems = totalItems.slice(start, end);
// inicio el inner para construir el carrusel 
        const slideHTML = ` 
          <div class="carousel-item ${activeClass}">
            <div class="row">
              ${slideItems.map(item => `
                <div class="col-md-4">
                  <div class="card h-100 shadow-sm">
                    <div class="img-wrapper">
                      <img src="${item.thumbnail || 'img/placeholder.jpg'}" class="w-100 img-fluid rounded" alt="${item.title}">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title">${item.title}</h6>
                      <p class="card-text small">${item.description.slice(0, 80)}...</p>
                      <a href="${item.link}" target="_blank" class="btn btn-sm btn-outline-primary">Leer más</a>
                    </div>
                  </div>
                </div>
              `).join('')}
            </div>
          </div>`;
        
        carouselInner.innerHTML += slideHTML;
      }
    });
}

