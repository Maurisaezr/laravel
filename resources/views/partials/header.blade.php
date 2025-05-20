 <header class="bg-dark text-white py-3">


<!----------------------------------------------------INICIO------RELOJ-------------------------------------------------------------------------->      
     <!-- ACA la alerta container para cuando agregamos el articulo  y la cantidad de articulos -->
        <div id="alert-container"></div>
        <div id="timedate"> 
            <a id="mon">January</a>
            <a id="d">1</a>,
            <a id="y">0</a><br />
            <a id="h">12</a> :
            <a id="m">00</a>:
            <a id="s">00</a>:
      </div>

        <div class="titulo">
<!-- Reloj con Date/Time - se agrega al header para que baje siempre la Hora info aca "https://desarrolloweb.com/articulos/549.php"-->
  <!-- Este seria el reloj principal pero ahora lo ocupo para corroborar hora y lo dejo oculto ya uqe no se utiliza la funcion JS que lo realiza es compararHoras -->
    <form  name="form_reloj" style="display: none;">
        <input type="text" name="reloj" size="10" style="background-color : rgb(96, 90, 90); color : #A2C9E4; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()">
    </form>

    <img id="logoelfaro" src="{{ asset('img/logo.png') }}" alt="Logo de El Faro">


          <h1>El Faro</h1>
          
        </div>
<!----------------------------------------------------FIN------NAVBAR----------------------------------------------------------------------------->
<!----------------------------------------------------INICIO------NAVBAR-------------------------------------------------------------------------->
<!-- Barra de navegacion  la etiqueta "a" usa id para ir a las secciones necsarias -->
    <!--LA CORREGIMOS PARA USAR BOOTSTRAP-->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">El Faro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#CantidadArticulos">Generales</a></li>
        <li class="nav-item"><a class="nav-link" href="economicos.html">Economicos</a></li>
        <li class="nav-item"><a class="nav-link" href="internacional.html">Internacional</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalContacto">Contáctenos</a></li>
        <li class="nav-item"><a class="btn btn-primary nav-link text-black" href="{{ route('login.form') }}">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
    </header>