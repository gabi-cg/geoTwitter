    <div class="container">

      <div class="row presentation">
        <img src="img/imgNav.jpg">
      </div>

      <div class="row" id="nosotros">
        <div class="col-sm-8 col-sm-offset-2">
          <p>Somos una web de servicios de estadística social sobre las cantidades de twitts por segundo realizados en un determinado lugar del mundo.</p>
          <p>Haciendo uso de los servicios de información de <a href="https://maps.google.com" target="_blank">Google Maps</a> y <a href="https://twitter.com/" target="_blank">Twitter</a> podemos mostrar la información brindada.</p>
        </div>
      </div>

      <div class="row" id="info">
        <form class="form-horizontal">
          <div class="form-group">
            <h3><label class="col-lg-2 control-label">Direcci&oacute;n</label></h3>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="dir" placeholder="Ingrese direcci&oacute;n a buscar - Ej. Calle 123, Ciudad, Provincia, Pa&iacute;s"></input>
            </div>
            <div class="col-lg-1">
              <button type="button" class="btn btn-info" id="dirSearch">Search</button>
            </div>
          </div>
        </form>
      </div>

      <div class="row map" id="map">
        {include file='templates/map.tpl'}
      </div>

      <div class="row">
        <div id="response"></div>
      </div>

      <div class="row" id="faq">
        <h2>Preguntas Frecuentes (FAQ)</h2>


<p>¿Qué es esto?
Este espacio es una extensión del sitio de Alex Franco (jafrancov.com) donde podrás encontrar las demostraciones de los ejemplos de código que vaya generando.

¿Qué podré encontrar?
Día a día en el trabajo, escuela, pruebas, simple gusto de aprender o descubrir nuevas tecnologías, nos enfrentamos con nuevos retos, desde tips muy sencillos hasta situaciones muy elaboradas, pero generalmente lo realizamos, quedándose plasmado y extraviado en la inmensidad del código que realizamos. Bien pues aquí publicaré lo que cruce por mi diario acontecer.

Pero... ¿qué tipo de ejemplos serán?
Mis enfoques en este espacio son web, con tendencias siempre a nuevas tecnologías. Por lo cual verán tips de PHP, HTML5, CSS3, Javascript/jQuery, por mencionar algunos. Los temas en los que me llaman la atención y me apasiona estar moviendo, haciendo y deshaciendo es en el juego con APIs, GMaps, Geolocalización, Blogueo y los que vayan saliendo en el camino.

Si tengo dudas... ¿puedo preguntarte?
Claro, será un placer poder ayudar, cada artículo vendrá enlazado de algún post que publique en jafrancov.com, así que las preguntas que surjan podrás dejarlas en los comentarios del post y a la brevedad intentaré resolverlas.

¿Si me gusta algún ejemplo y quiero publicarlo, puedo hacerlo?
Si, si puedes hacerlo, solamente no olvides el link de dónde tuviste referencia, preferentemente te pediría que enlazaras al post original y no a la pagina del ejemplo, ya que es un inicio y pienso crecerlo, quizá algunas URLs lleguen a cambiar (espero que no), pero en los post del blog estarán siempre actualizadas.
</p>
      </div>

    </div>
