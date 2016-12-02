
    <div class="jumbotron">
      <h1>Geo Twitter</h1>
    </div>

    <div class="container">

      <div class="row presentation">
        <img src="img/imgNav.jpg">
      </div>

      <div class="row" id="nosotros">
        <div class="col-sm-8 col-sm-offset-2">
          <p>Somos una web de servicios de estadística social sobre las cantidades de tweets realizados en un lugar dado del mundo.</p>
          <p>Haciendo uso de los servicios de información (API's) de <a href="https://maps.google.com" target="_blank">Google Maps</a> y <a href="https://twitter.com/" target="_blank">Twitter</a> podemos mostrar la información actual.</p>
        </div>
      </div>

      <div class="row" id="info">
        <form class="form-horizontal">
          <div class="form-group">
            <h3><label class="col-lg-2 control-label">Lugar</label></h3>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="dir" placeholder="Ingrese lugar a buscar - Ej. Ciudad, Provincia, Pa&iacute;s"></input>
            </div>
            <div class="col-lg-1">
              <button type="button" class="btn btn-info" id="dirSearch">Search</button>
            </div>
          </div>
        </form>
      </div>

      <div class="row map" id="map"> {* cuadro para la API de Google Maps *}
        <div id="map_canvas"></div> {* contenedor para cargar API de Google Maps *}
      </div>

      {* contenedor donde se cargan los trending topics de la API de Twitter según el lugar especificado *}
      <div class="row">
        {include file='templates/response.tpl'}
      </div>

      <div class="container col-sm-12 panel-group" id="faq">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
              Preguntas Frecuentes (FAQ)</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
              <h5>¿Qué es esto?</h5>
              <p>Somos una web de servicios de estadística social sobre las cantidades de tweets realizados en un lugar dado del mundo.</p>

              <h5>¿Qué podré encontrar?</h5>
              <p>Se podrá visualizar cuales son los trending topics actuales en la red social Twitter dado un determinado lugar</p>

              <h5>¿Cómo veo los trendig topics?</h5>
              <p>Una vez que se ingresa el lugar del que queremos obtener la información, sólo debemos cliquear en el marcador de Twitter reflejado en el mapa de Google</p>

            </div>
          </div>
        </div>
      </div>

    </div>
