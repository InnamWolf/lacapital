<section class="comprar">
  <!--===============================================
  PREMIO PRINCIPAL
  =================================================-->
  <div class="principal">
    <div class="principal__item">
       <span>🍀HONDA CIVIC SPORT 2024🍀</span>
       <p>27 de Febrero del 2024</p>
    </div>
  </div>

  <!--===============================================
  IMAGEN
  =================================================-->
  <div class="imagen">
    <div class="imagen__item"></div>
  </div>

  <!--===============================================
  COSTO BOLETOS
  =================================================-->
  <div class="costo">
    <h2>COSTO BOLETOS</h2>
    <div class="costo__item">
      <p><span class="txt__Verde">(4 números por boleto)</span></p>
      <p>1 BOLETO POR $99</p>
      <p>2 BOLETOS POR $198</p>
      <p>3 BOLETOS POR $297</p>
      <p>4 BOLETOS POR $396</p>
      <p>5 BOLETOS POR $495</p>
      <p>10 BOLETOS POR $990</p>
      <p>20 BOLETOS POR $1,980</p>
      <p>30 BOLETOS POR $2,970</p>
      <p>40 BOLETOS POR $3,960</p>
      <p>50 BOLETOS POR $4,950</p>
      <p>100 BOLETOS POR $9,900</p>
    </div>
  </div>

  <!--===============================================
  PREMIOS
  =================================================-->
  <div class="premios">
    <!-- <h3>CON TU BOLETO LIQUIDADO PARTICIPAS POR:</h3> -->
    <div class="premiositem">
      <p>
          <span class="txt__Verde">
            🍀HONDA CIVIC SPORT 🏎️💨 2024🍀
            <br> Fecha de finalización 27/02/2024 
          </span>
        <br>NÚMERO GANADOR CON  BASE EN LAS
        <br>ÚLTIMAS 5 CIFRAS DE LA
        <br>LOTERÍA NACIONAL
      </p>
    </div>
    <h3>+ BONO DE PRESENTACIÓN:</h3>
    <div class="premios__item">
      <p> 
        <span class="txt__Verde">$100,000 MXN </span>
        <br>VÁLIDO HASTA El 15 DE FEBRERO
      </p>
    </div>
    <h3>BONO ADICIONAL</h3>
    <div class="premios__item">
      <p> 
        <span class="txt__Verde">$50,000 MXN </span>
        <br>EN LA COMPRA DE 2 BOLETOS 🎟️ O MÁS.
      </p>
    </div>
    <p>
      Nota 📝 los bonos serán aplicados para todos los boletos liquidados durante las primeras 6 hrs de reserva sin dejar ningún despreciado.
    </p>
    <p>
      Mucha suerte y éxito a todos.
    </p>
  </div>
  
  <!--===============================================
  BUSCAR BOLETO
  =================================================-->
  <div class="boleto">
    <h2 class="titulo">BUSCAR FOLIO</h2>
    <div class="boleto__botones">
      <input type="text" id="folioBuscar" name="folioBuscar" class="botones__item" placeholder="Escribe tu # de folio">
      <button id="btnBuscarFolio" class="nuevoBoleto">Buscar folio</button>    
    </div>
  </div>  

  <!--===============================================
  AGREGAR BOLETO
  =================================================-->
  <div class="boleto">
    <h2 class="titulo">AGREGAR BOLETO</h2>
    <div class="boleto__botones">
      <input type="text" id="folio" name="folio" class="botones__item" placeholder="Escribe tu # de boleto" maxlength="5" pattern="[0-9]{5}">
      <button class="nuevoBoleto" id="btnAgregarBoleto">Agregar boleto</button>
      </div>
  </div>

  <div class="boleto">
    <div class="boleto__botones">
      <div class="apartar__boletos">
        <div class="mostrar__boletos__seleccionado" id="pintarBoleto"></div>
        <a href="#" class="botones__item btn__verde apartar" data-bs-toggle="modal" data-bs-target="#apartarBoleto">APARTAR</a>
        <div class="oportunidad__boleto" id="mostrarOportunidad">
          <b>Oportunidades</b><br>
          <div class="mostrar__boletos__seleccionado" id="oportunidadBoleto"></div>
        </div>
      </div>
      <a href="#" class="botones__item btn__verde" data-bs-toggle="modal" data-bs-target="#generarBoleto">MÁQUINA DE LA SUERTE</a>
      <div class="mostrar__boletos" id="quitarBoleto">Cargando boletos disponibles ...</div>
    </div>
  </div>

  <!--===============================================
  GENERAR BOLETO MAQUINA DE LA SUERTE
  =================================================-->
  <div class="modal fade" id="generarBoleto" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="modal-title">BOLETOS A GENERAR</h5>
        <select class="form-control" aria-label="selBoleto" id="cantidadBoleto" name="cantidadBoleto">
          <option selected value="1">1 BOLETO</option>
          <option value="2">2 BOLETOS</option>
          <option value="3">3 BOLETOS</option>
          <option value="4">4 BOLETOS</option>
          <option value="5">5 BOLETOS</option>
          <option value="10">10 BOLETOS</option>
          <option value="20">20 BOLETOS</option>
          <option value="30">30 BOLETOS</option>
          <option value="40">40 BOLETOS</option>
          <option value="50">50 BOLETOS</option>
          <option value="100">100 BOLETOS</option>
        </select>
        <a href="#" class="botones__item btn__azul clickMaquina">USAR MÁQUINA</a>
        
        <div class="girar__maquina" id="girarMaquina">
          <div class="suerte__maquina">
            <img src="view/src/img/maquina.gif" alt="suerte...">
          </div>
        </div>
        
        <div class="mostrar__boletos__seleccionado generar__seleccionado" id="boletosMaquina"></div>
      </div>
    </div>
  </div>
</div>

<!--===============================================
MODAL APARTAR BOLETO
=================================================-->
<div class="modal fade" id="apartarBoleto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title">CONSIGUE TU BOLETO</h5>
          <form role="form" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <div class="mostrar__boletos__seleccionado generar__seleccionado" id="boletosApartados">

            </div>
          </div>
          
            <!--===============================================
            Whatsapp
            =================================================-->
            <div class="form-group">
                <input type="text" class="form-control" id="apartarWhatsapp" name="apartarWhatsapp" placeholder="Número Whatsapp (10 Dígitos)" maxlength="10">          
            </div>
            <!--===============================================
            Nombre
            =================================================-->
            <div class="form-group">                  
                <input type="text" class="form-control" id="apartarNombre" name="apartarNombre" placeholder="Nombre(s)">
            </div>
            <!--===============================================
            Apellidos
            =================================================-->
            <div class="form-group">
                <input type="text" class="form-control" id="apartarApellido" name="apartarApellido" placeholder="Apellidos">
            </div>
            <!--===============================================
            Estado
            =================================================-->
            <div class="form-group">
                <select class="form-control" aria-label="selEstado" id="apartarEstado" name="apartarEstado" required >
                  <option selected value="">-- SELECCIONE --</option>
                  <option value="1">AGUASCALIENTES</option>
                  <option value="2">BAJA CALIFORNIA</option>
                  <option value="3">BAJA CALIFORNIA SUR</option>
                  <option value="4">CAMPECHE</option>
                  <option value="5">CHIAPAS</option>
                  <option value="6">CHIHUAHUA</option>
                  <option value="7">COAHUILA</option>
                  <option value="8">COLIMA</option>
                  <option value="9">CIUDAD DE MÉXICO</option>
                  <option value="10">DURANGO</option>
                  <option value="11">GUANAJUATO</option>
                  <option value="12">GUERRERO</option>
                  <option value="13">HIDALGO</option>
                  <option value="14">JALISCO</option>
                  <option value="15">MÉXICO</option>
                  <option value="16">MICHOACÁN</option>
                  <option value="17">MORELOS</option>
                  <option value="18">NAYARIT</option>
                  <option value="19">NUEVO LEON</option>
                  <option value="20">OAXACA</option>
                  <option value="21">PUEBLA</option>
                  <option value="22">QUERÉTARO</option>
                  <option value="23">QUINTANA ROO</option>
                  <option value="24">SAN LUIS POTOSÍ</option>
                  <option value="25">SINALOA</option>
                  <option value="26">SONORA</option>
                  <option value="27">TABASCO</option>
                  <option value="28">TAMAULIPAS</option>
                  <option value="29">TLAXCALA</option>
                  <option value="30">VERACRUZ</option>
                  <option value="31">YUCATAN</option>
                  <option value="32">ZACATECAS</option>
                  <option value="33">EXTRANJERO</option>
                </select>            
            </div>
            <p class="etiqueta"><span class="verde">¡Al apartar encontrarás cuentas de pago!</span><br> 
              <span class="rojo">Tu boleto sólo dura 12 HORAS apartado</span></p>  
              <button type="submit" class="botones__item btn__rojo">Apartar Boleto</button>
            <?php

              $conseguirBoletoFront = new ControladorBoletosFront();
              $conseguirBoletoFront -> ctrConseguirBoletoFront(); 

            ?>
          </form>        
      </div>
    </div>  
  </div>
</div>
 
</section>

<script src="view/src/js/boletosFront.js"></script>