<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  @php
    $form_id = 'contact_add_form';
    if(isset($quick_add)){
      $form_id = 'quick_add_contact';
    }

    if(isset($store_action)) {
      $url = $store_action;
      $type = 'lead';
      $customer_groups = [];
    } else {
      $url = action([\App\Http\Controllers\ContactController::class, 'store']);
      $type = isset($selected_type) ? $selected_type : '';
      $sources = [];
      $life_stages = [];
    }
  @endphp
    {!! Form::open(['url' => $url, 'method' => 'post', 'id' => $form_id ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang('contact.add_contact')</h4>
    </div>

    <div class="modal-body">
        <div class="row">            
            <div class="col-md-4 contact_type_div">
                <div class="form-group">
                    {!! Form::label('type', __('contact.contact_type') . ':*' ) !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        {!! Form::select('type', $types, $type , ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']); !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-15">
                <label class="radio-inline">
                    <input type="radio" name="contact_type_radio" id="inlineRadio1" value="individual">
                    @lang('lang_v1.individual')
                </label>
                <label class="radio-inline">
                    <input type="radio" name="contact_type_radio" id="inlineRadio2" value="business">
                    @lang('business.business')
                </label>
            </div>
            
             <div class="col-sm-4">
        <div class="form-group">
            <label for="type_organization_id">Tpo de Organizacion:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-building"></i>
                </span>
                <select class="form-control select2_register"  style="width:100%;" id="type_organization_id" name="type_organization_id"><option selected="selected" value="">Seleccione</option><option value="1">Persona Jurídica</option><option value="2">Persona Natural</option></select>
            </div>
        </div>
    </div>
            
            <div class="col-sm-4">
            <div class="form-group">
                <label for="type_document_identification_id">Tipo de Identificacion:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                    </span>
                    <select class="form-control select2"  id="type_document_identification_id" name="type_document_identification_id"><option value="">Seleccione</option><option value="1">Registro civil</option><option value="2">Tarjeta de identidad</option><option value="3" selected="selected">Cédula de ciudadanía</option><option value="4">Tarjeta de extranjería</option><option value="5">Cédula de extranjería</option><option value="6">NIT</option><option value="7">Pasaporte</option><option value="8">Documento de identificación extranjero</option><option value="9">NIT de otro país</option><option value="10">NUIP *</option></select>
                </div>
            </div>
        </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('contact_id', __('Numero de Identificacion') . ':') !!}
                    <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Digite el Numero de Identificacion, Persona natural o Juridica" data-html="true" data-trigger="hover"></i> 
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-id-badge"></i>
                        </span>
                        {!! Form::text('contact_id', null, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]); !!}
                    </div>
                    
                </div>
            </div>
            
            <div class="col-sm-4">
        <div class="form-group">
            <label for="dv">DV*</label>
                        <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-id-card"></i>
                </span>
                <input class="form-control" placeholder="Digito de Verificacion"  name="dv" type="number" id="dv">
            </div>
        </div>
    </div>
            
            
            <div class="col-md-4 customer_fields">
                <div class="form-group">
                  {!! Form::label('customer_group_id', __('lang_v1.customer_group') . ':') !!}
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fa fa-users"></i>
                      </span>
                      {!! Form::select('customer_group_id', $customer_groups, '', ['class' => 'form-control']); !!}
                  </div>
                </div>
            </div>
            <div class="clearfix customer_fields"></div>
            <div class="col-md-8 business" style="display: none;">
                <div class="form-group">
                    {!! Form::label('supplier_business_name', __('business.business_name') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-briefcase"></i>
                        </span>
                        {!! Form::text('supplier_business_name', null, ['class' => 'form-control', 'placeholder' => __('business.business_name')]); !!}
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <!--<div class="col-md-3 individual" style="display: none;">
                  <div class="form-group">
                    {!! Form::label('prefix', __( 'business.prefix' ) . ':') !!}
                    {!! Form::text('prefix', null, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]); !!}
                </div>
            </div> -->
            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('first_name', __( 'business.first_name' ) . ':*') !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]); !!}
                </div>
            </div>
            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('middle_name', __( 'lang_v1.middle_name' ) . ':') !!}
                    {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.middle_name' ) ]); !!}
                </div>
            </div>
            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('last_name', __( 'business.last_name' ) . ':') !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]); !!}
                </div>
            </div>
            
             <div class="col-sm-4">
        <div class="form-group">
            <label for="type_regime_id">Regimen:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-building"></i>
                </span>
                <select class="form-control select2_register"  style="width:100%;" id="type_regime_id" name="type_regime_id"><option selected="selected" value="">Seleccione</option><option value="1">Responsable de IVA</option><option value="2">No Responsable de IVA</option></select>
            </div>
        </div>
    </div>
            
            
        
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('mobile', __('contact.mobile') . ':*') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-mobile"></i>
                        </span>
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]); !!}
                    </div>
                </div>
            </div>

            <!--  <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('alternate_number', __('contact.alternate_contact_number') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        {!! Form::text('alternate_number', null, ['class' => 'form-control', 'placeholder' => __('contact.alternate_contact_number')]); !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('landline', __('contact.landline') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        {!! Form::text('landline', null, ['class' => 'form-control', 'placeholder' => __('contact.landline')]); !!}
                    </div>
                </div>
            </div>  -->
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('email', __('business.email') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        {!! Form::email('email', null, ['class' => 'form-control','placeholder' => __('business.email')]); !!}
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
        <div class="form-group">
            <label for="identification_number">Registro Mercatil:*</label>
                        <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-id-card"></i>
                </span>
                <input class="form-control" placeholder="Matricula"   type="number" id="">
            </div>
        </div>
    </div>
    
    
    <div class="col-md-4">
    <div class="form-group">
    <label for="country">Pa&iacute;s:*</label>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-globe"></i>
        </span>
        <input class="form-control" placeholder="País"  name="country" type="text" value="Colombia" id="country">
    </div>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label for="state">Estado:</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
            </span>
            <select style="width: 100%" class="form-control select2_register"  id="state" name="state"><option selected="selected" value="">Estado</option><option value="1">Amazonas</option><option value="2">Antioquia</option><option value="3">Arauca</option><option value="4">Atlántico</option><option value="5">Bogotá</option><option value="6">Bolívar</option><option value="7">Boyacá</option><option value="8">Caldas</option><option value="9">Caquetá</option><option value="10">Casanare</option><option value="11">Cauca</option><option value="12">Cesar</option><option value="13">Chocó</option><option value="14">Córdoba</option><option value="15">Cundinamarca</option><option value="16">Guainía</option><option value="17">Guaviare</option><option value="18">Huila</option><option value="19">La Guajira</option><option value="20">Magdalena</option><option value="21">Meta</option><option value="22">Nariño</option><option value="23">Norte de Santander</option><option value="24">Putumayo</option><option value="25">Quindío</option><option value="26">Risaralda</option><option value="27">San Andrés y Providencia</option><option value="28">Santander</option><option value="29">Sucre</option><option value="30">Tolima</option><option value="31">Valle del Cauca</option><option value="32">Vaupés</option><option value="33">Vichada</option></select>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
    <div class="form-group">
        <label for="city">Ciudad:</label>
        <div class="input-group">
    <span class="input-group-addon">
        <i class="fa fa-map-marker"></i>
    </span>
            <select style="width: 100%" class="form-control select2_register"  id="city" name="city"><option selected="selected" value="">Ciudad</option><option value="1">Medellín</option><option value="2">Abejorral</option><option value="3">Abriaquí</option><option value="4">Alejandría</option><option value="5">Amagá</option><option value="6">Amalfi</option><option value="7">Andes</option><option value="8">Angelópolis</option><option value="9">Angostura</option><option value="10">Anorí</option><option value="11">Santa Fé De Antioquia</option><option value="12">Anzá</option><option value="13">Apartadó</option><option value="14">Arboletes</option><option value="15">Argelia</option><option value="16">Armenia</option><option value="17">Barbosa</option><option value="18">Belmira</option><option value="19">Bello</option><option value="20">Betania</option><option value="21">Betulia</option><option value="22">Ciudad Bolívar </option><option value="23">Briceño</option><option value="24">Buriticá</option><option value="25">Cáceres</option><option value="26">Caicedo</option><option value="27">Caldas</option><option value="28">Campamento</option><option value="29">Cañasgordas</option><option value="30">Caracolí</option><option value="31">Caramanta</option><option value="32">Carepa</option><option value="33">El Carmen De Viboral</option><option value="34">Carolina</option><option value="35">Caucasia</option><option value="36">Chigorodó</option><option value="37">Cisneros</option><option value="38">Cocorná</option><option value="39">Concepción</option><option value="40">Concordia</option><option value="41">Copacabana</option><option value="42">Dabeiba</option><option value="43">Donmatías</option><option value="44">Ebéjico</option><option value="45">El Bagre </option><option value="46">Entrerríos</option><option value="47">Envigado</option><option value="48">Fredonia</option><option value="49">Frontino</option><option value="50">Giraldo</option><option value="51">Girardota</option><option value="52">Gómez Plata </option><option value="53">Granada</option><option value="54">Guadalupe</option><option value="55">Guarne</option><option value="56">Guatapé</option><option value="57">Heliconia</option><option value="58">Hispania</option><option value="59">Itagüí</option><option value="60">Ituango</option><option value="61">Jardín</option><option value="62">Jericó</option><option value="63">La Ceja </option><option value="64">La Estrella </option><option value="65">La Pintada </option><option value="66">La Unión </option><option value="67">Liborina</option><option value="68">Maceo</option><option value="69">Marinilla</option><option value="70">Montebello</option><option value="71">Murindó</option><option value="72">Mutatá</option><option value="73">Nariño</option><option value="74">Necoclí</option><option value="75">Nechí</option><option value="76">Olaya</option><option value="77">Peñol</option><option value="78">Peque</option><option value="79">Pueblorrico</option><option value="80">Puerto Berrío </option><option value="81">Puerto Nare </option><option value="82">Puerto Triunfo </option><option value="83">Remedios</option><option value="84">Retiro</option><option value="85">Rionegro</option><option value="86">Sabanalarga</option><option value="87">Sabaneta</option><option value="88">Salgar</option><option value="89">San Andrés De Cuerquía</option><option value="90">San Carlos </option><option value="91">San Francisco </option><option value="92">San Jerónimo </option><option value="93">San José De La Montaña </option><option value="94">San Juan De Urabá</option><option value="95">San Luis </option><option value="96">San Pedro De Los Milagros </option><option value="97">San Pedro De Urabá</option><option value="98">San Rafael </option><option value="99">San Roque </option><option value="100">San Vicente Ferrer</option><option value="101">Santa Bárbara </option><option value="102">Santa Rosa De Osos</option><option value="103">Santo Domingo </option><option value="104">El Santuario </option><option value="105">Segovia</option><option value="106">Sonsón</option><option value="107">Sopetrán</option><option value="108">Támesis</option><option value="109">Tarazá</option><option value="110">Tarso</option><option value="111">Titiribí</option><option value="112">Toledo</option><option value="113">Turbo</option><option value="114">Uramita</option><option value="115">Urrao</option><option value="116">Valdivia</option><option value="117">Valparaíso</option><option value="118">Vegachí</option><option value="119">Venecia</option><option value="120">Vigía Del Fuerte</option><option value="121">Yalí</option><option value="122">Yarumal</option><option value="123">Yolombó</option><option value="124">Yondó</option><option value="125">Zaragoza</option><option value="126">Barranquilla</option><option value="127">Baranoa</option><option value="128">Campo De La Cruz</option><option value="129">Candelaria</option><option value="130">Galapa</option><option value="131">Juan De Acosta</option><option value="132">Luruaco</option><option value="133">Malambo</option><option value="134">Manatí</option><option value="135">Palmar De Varela</option><option value="136">Piojó</option><option value="137">Polonuevo</option><option value="138">Ponedera</option><option value="139">Puerto Colombia </option><option value="140">Repelón</option><option value="141">Sabanagrande</option><option value="142">Sabanalarga</option><option value="143">Santa Lucía </option><option value="144">Santo Tomás </option><option value="145">Soledad</option><option value="146">Suan</option><option value="147">Tubará</option><option value="148">Usiacurí</option><option value="149">Bogotá, D.c. </option><option value="150">Cartagena De Indias</option><option value="151">Achí</option><option value="152">Altos Del Rosario</option><option value="153">Arenal</option><option value="154">Arjona</option><option value="155">Arroyohondo</option><option value="156">Barranco De Loba</option><option value="157">Calamar</option><option value="158">Cantagallo</option><option value="159">Cicuco</option><option value="160">Córdoba</option><option value="161">Clemencia</option><option value="162">El Carmen De Bolívar</option><option value="163">El Guamo </option><option value="164">El Peñón </option><option value="165">Hatillo De Loba</option><option value="166">Magangué</option><option value="167">Mahates</option><option value="168">Margarita</option><option value="169">María La Baja</option><option value="170">Montecristo</option><option value="171">Mompós</option><option value="172">Morales</option><option value="173">Norosí</option><option value="174">Pinillos</option><option value="175">Regidor</option><option value="176">Río Viejo </option><option value="177">San Cristóbal </option><option value="178">San Estanislao </option><option value="179">San Fernando </option><option value="180">San Jacinto </option><option value="181">San Jacinto Del Cauca</option><option value="182">San Juan Nepomuceno</option><option value="183">San Martín De Loba</option><option value="184">San Pablo </option><option value="185">Santa Catalina </option><option value="186">Santa Rosa </option><option value="187">Santa Rosa Del Sur</option><option value="188">Simití</option><option value="189">Soplaviento</option><option value="190">Talaigua Nuevo </option><option value="191">Tiquisio</option><option value="192">Turbaco</option><option value="193">Turbaná</option><option value="194">Villanueva</option><option value="195">Zambrano</option><option value="196">Tunja</option><option value="197">Almeida</option><option value="198">Aquitania</option><option value="199">Arcabuco</option><option value="200">Belén</option><option value="201">Berbeo</option><option value="202">Betéitiva</option><option value="203">Boavita</option><option value="204">Boyacá</option><option value="205">Briceño</option><option value="206">Buenavista</option><option value="207">Busbanzá</option><option value="208">Caldas</option><option value="209">Campohermoso</option><option value="210">Cerinza</option><option value="211">Chinavita</option><option value="212">Chiquinquirá</option><option value="213">Chiscas</option><option value="214">Chita</option><option value="215">Chitaraque</option><option value="216">Chivatá</option><option value="217">Ciénega</option><option value="218">Cómbita</option><option value="219">Coper</option><option value="220">Corrales</option><option value="221">Covarachía</option><option value="222">Cubará</option><option value="223">Cucaita</option><option value="224">Cuítiva</option><option value="225">Chíquiza</option><option value="226">Chivor</option><option value="227">Duitama</option><option value="228">El Cocuy </option><option value="229">El Espino </option><option value="230">Firavitoba</option><option value="231">Floresta</option><option value="232">Gachantivá</option><option value="233">Gámeza</option><option value="234">Garagoa</option><option value="235">Guacamayas</option><option value="236">Guateque</option><option value="237">Guayatá</option><option value="238">Güicán De La Sierra</option><option value="239">Iza</option><option value="240">Jenesano</option><option value="241">Jericó</option><option value="242">Labranzagrande</option><option value="243">La Capilla </option><option value="244">La Victoria </option><option value="245">La Uvita </option><option value="246">Villa De Leyva</option><option value="247">Macanal</option><option value="248">Maripí</option><option value="249">Miraflores</option><option value="250">Mongua</option><option value="251">Monguí</option><option value="252">Moniquirá</option><option value="253">Motavita</option><option value="254">Muzo</option><option value="255">Nobsa</option><option value="256">Nuevo Colón </option><option value="257">Oicatá</option><option value="258">Otanche</option><option value="259">Pachavita</option><option value="260">Páez</option><option value="261">Paipa</option><option value="262">Pajarito</option><option value="263">Panqueba</option><option value="264">Pauna</option><option value="265">Paya</option><option value="266">Paz De Río</option><option value="267">Pesca</option><option value="268">Pisba</option><option value="269">Puerto Boyacá </option><option value="270">Quípama</option><option value="271">Ramiriquí</option><option value="272">Ráquira</option><option value="273">Rondón</option><option value="274">Saboyá</option><option value="275">Sáchica</option><option value="276">Samacá</option><option value="277">San Eduardo </option><option value="278">San José De Pare</option><option value="279">San Luis De Gaceno</option><option value="280">San Mateo </option><option value="281">San Miguel De Sema</option><option value="282">San Pablo De Borbur</option><option value="283">Santana</option><option value="284">Santa María </option><option value="285">Santa Rosa De Viterbo</option><option value="286">Santa Sofía </option><option value="287">Sativanorte</option><option value="288">Sativasur</option><option value="289">Siachoque</option><option value="290">Soatá</option><option value="291">Socotá</option><option value="292">Socha</option><option value="293">Sogamoso</option><option value="294">Somondoco</option><option value="295">Sora</option><option value="296">Sotaquirá</option><option value="297">Soracá</option><option value="298">Susacón</option><option value="299">Sutamarchán</option><option value="300">Sutatenza</option><option value="301">Tasco</option><option value="302">Tenza</option><option value="303">Tibaná</option><option value="304">Tibasosa</option><option value="305">Tinjacá</option><option value="306">Tipacoque</option><option value="307">Toca</option><option value="308">Togüí</option><option value="309">Tópaga</option><option value="310">Tota</option><option value="311">Tununguá</option><option value="312">Turmequé</option><option value="313">Tuta</option><option value="314">Tutazá</option><option value="315">Úmbita</option><option value="316">Ventaquemada</option><option value="317">Viracachá</option><option value="318">Zetaquira</option><option value="319">Manizales</option><option value="320">Aguadas</option><option value="321">Anserma</option><option value="322">Aranzazu</option><option value="323">Belalcázar</option><option value="324">Chinchiná</option><option value="325">Filadelfia</option><option value="326">La Dorada </option><option value="327">La Merced </option><option value="328">Manzanares</option><option value="329">Marmato</option><option value="330">Marquetalia</option><option value="331">Marulanda</option><option value="332">Neira</option><option value="333">Norcasia</option><option value="334">Pácora</option><option value="335">Palestina</option><option value="336">Pensilvania</option><option value="337">Riosucio</option><option value="338">Risaralda</option><option value="339">Salamina</option><option value="340">Samaná</option><option value="341">San José </option><option value="342">Supía</option><option value="343">Victoria</option><option value="344">Villamaría</option><option value="345">Viterbo</option><option value="346">Florencia</option><option value="347">Albania</option><option value="348">Belén De Los Andaquíes</option><option value="349">Cartagena Del Chairá</option><option value="350">Curillo</option><option value="351">El Doncello </option><option value="352">El Paujíl </option><option value="353">La Montañita </option><option value="354">Milán</option><option value="355">Morelia</option><option value="356">Puerto Rico </option><option value="357">San José Del Fragua</option><option value="358">San Vicente Del Caguán</option><option value="359">Solano</option><option value="360">Solita</option><option value="361">Valparaíso</option><option value="362">Popayán</option><option value="363">Almaguer</option><option value="364">Argelia</option><option value="365">Balboa</option><option value="366">Bolívar</option><option value="367">Buenos Aires </option><option value="368">Cajibío</option><option value="369">Caldono</option><option value="370">Caloto</option><option value="371">Corinto</option><option value="372">El Tambo </option><option value="373">Florencia</option><option value="374">Guachené</option><option value="375">Guapí</option><option value="376">Inzá</option><option value="377">Jambaló</option><option value="378">La Sierra </option><option value="379">La Vega </option><option value="380">López De Micay</option><option value="381">Mercaderes</option><option value="382">Miranda</option><option value="383">Morales</option><option value="384">Padilla</option><option value="385">Páez</option><option value="386">Patía</option><option value="387">Piamonte</option><option value="388">Piendamó - Tunía</option><option value="389">Puerto Tejada </option><option value="390">Puracé</option><option value="391">Rosas</option><option value="392">San Sebastián </option><option value="393">Santander De Quilichao</option><option value="394">Santa Rosa </option><option value="395">Silvia</option><option value="396">Sotara</option><option value="397">Suárez</option><option value="398">Sucre</option><option value="399">Timbío</option><option value="400">Timbiquí</option><option value="401">Toribío</option><option value="402">Totoró</option><option value="403">Villa Rica </option><option value="404">Valledupar</option><option value="405">Aguachica</option><option value="406">Agustín Codazzi </option><option value="407">Astrea</option><option value="408">Becerril</option><option value="409">Bosconia</option><option value="410">Chimichagua</option><option value="411">Chiriguaná</option><option value="412">Curumaní</option><option value="413">El Copey </option><option value="414">El Paso </option><option value="415">Gamarra</option><option value="416">González</option><option value="417">La Gloria </option><option value="418">La Jagua De Ibirico</option><option value="419">Manaure Balcón Del Cesar</option><option value="420">Pailitas</option><option value="421">Pelaya</option><option value="422">Pueblo Bello </option><option value="423">Río De Oro</option><option value="424">La Paz </option><option value="425">San Alberto </option><option value="426">San Diego </option><option value="427">San Martín </option><option value="428">Tamalameque</option><option value="429">Montería</option><option value="430">Ayapel</option><option value="431">Buenavista</option><option value="432">Canalete</option><option value="433">Cereté</option><option value="434">Chimá</option><option value="435">Chinú</option><option value="436">Ciénaga De Oro</option><option value="437">Cotorra</option><option value="438">La Apartada </option><option value="439">Lorica</option><option value="440">Los Córdobas </option><option value="441">Momil</option><option value="442">Montelíbano</option><option value="443">Moñitos</option><option value="444">Planeta Rica </option><option value="445">Pueblo Nuevo </option><option value="446">Puerto Escondido </option><option value="447">Puerto Libertador </option><option value="448">Purísima De La Concepción</option><option value="449">Sahagún</option><option value="450">San Andrés De Sotavento</option><option value="451">San Antero </option><option value="452">San Bernardo Del Viento</option><option value="453">San Carlos </option><option value="454">San José De Uré</option><option value="455">San Pelayo </option><option value="456">Tierralta</option><option value="457">Tuchín</option><option value="458">Valencia</option><option value="459">Agua De Dios</option><option value="460">Albán</option><option value="461">Anapoima</option><option value="462">Anolaima</option><option value="463">Arbeláez</option><option value="464">Beltrán</option><option value="465">Bituima</option><option value="466">Bojacá</option><option value="467">Cabrera</option><option value="468">Cachipay</option><option value="469">Cajicá</option><option value="470">Caparrapí</option><option value="471">Cáqueza</option><option value="472">Carmen De Carupa</option><option value="473">Chaguaní</option><option value="474">Chía</option><option value="475">Chipaque</option><option value="476">Choachí</option><option value="477">Chocontá</option><option value="478">Cogua</option><option value="479">Cota</option><option value="480">Cucunubá</option><option value="481">El Colegio </option><option value="482">El Peñón </option><option value="483">El Rosal </option><option value="484">Facatativá</option><option value="485">Fómeque</option><option value="486">Fosca</option><option value="487">Funza</option><option value="488">Fúquene</option><option value="489">Fusagasugá</option><option value="490">Gachalá</option><option value="491">Gachancipá</option><option value="492">Gachetá</option><option value="493">Gama</option><option value="494">Girardot</option><option value="495">Granada</option><option value="496">Guachetá</option><option value="497">Guaduas</option><option value="498">Guasca</option><option value="499">Guataquí</option><option value="500">Guatavita</option><option value="501">Guayabal De Síquima</option><option value="502">Guayabetal</option><option value="503">Gutiérrez</option><option value="504">Jerusalén</option><option value="505">Junín</option><option value="506">La Calera </option><option value="507">La Mesa </option><option value="508">La Palma </option><option value="509">La Peña </option><option value="510">La Vega </option><option value="511">Lenguazaque</option><option value="512">Machetá</option><option value="513">Madrid</option><option value="514">Manta</option><option value="515">Medina</option><option value="516">Mosquera</option><option value="517">Nariño</option><option value="518">Nemocón</option><option value="519">Nilo</option><option value="520">Nimaima</option><option value="521">Nocaima</option><option value="522">Venecia</option><option value="523">Pacho</option><option value="524">Paime</option><option value="525">Pandi</option><option value="526">Paratebueno</option><option value="527">Pasca</option><option value="528">Puerto Salgar </option><option value="529">Pulí</option><option value="530">Quebradanegra</option><option value="531">Quetame</option><option value="532">Quipile</option><option value="533">Apulo</option><option value="534">Ricaurte</option><option value="535">San Antonio Del Tequendama</option><option value="536">San Bernardo </option><option value="537">San Cayetano </option><option value="538">San Francisco </option><option value="539">San Juan De Rioseco</option><option value="540">Sasaima</option><option value="541">Sesquilé</option><option value="542">Sibaté</option><option value="543">Silvania</option><option value="544">Simijaca</option><option value="545">Soacha</option><option value="546">Sopó</option><option value="547">Subachoque</option><option value="548">Suesca</option><option value="549">Supatá</option><option value="550">Susa</option><option value="551">Sutatausa</option><option value="552">Tabio</option><option value="553">Tausa</option><option value="554">Tena</option><option value="555">Tenjo</option><option value="556">Tibacuy</option><option value="557">Tibirita</option><option value="558">Tocaima</option><option value="559">Tocancipá</option><option value="560">Topaipí</option><option value="561">Ubalá</option><option value="562">Ubaque</option><option value="563">Villa De San Diego De Ubaté</option><option value="564">Une</option><option value="565">Útica</option><option value="566">Vergara</option><option value="567">Vianí</option><option value="568">Villagómez</option><option value="569">Villapinzón</option><option value="570">Villeta</option><option value="571">Viotá</option><option value="572">Yacopí</option><option value="573">Zipacón</option><option value="574">Zipaquirá</option><option value="575">Quibdó</option><option value="576">Acandí</option><option value="577">Alto Baudó </option><option value="578">Atrato</option><option value="579">Bagadó</option><option value="580">Bahía Solano </option><option value="581">Bajo Baudó </option><option value="582">Bojayá</option><option value="583">El Cantón Del San Pablo </option><option value="584">Carmen Del Darién</option><option value="585">Cértegui</option><option value="586">Condoto</option><option value="587">El Carmen De Atrato</option><option value="588">El Litoral Del San Juan </option><option value="589">Istmina</option><option value="590">Juradó</option><option value="591">Lloró</option><option value="592">Medio Atrato </option><option value="593">Medio Baudó </option><option value="594">Medio San Juan</option><option value="595">Nóvita</option><option value="596">Nuquí</option><option value="597">Río Iró </option><option value="598">Río Quito </option><option value="599">Riosucio</option><option value="600">San José Del Palmar</option><option value="601">Sipí</option><option value="602">Tadó</option><option value="603">Unguía</option><option value="604">Unión Panamericana </option><option value="605">Neiva</option><option value="606">Acevedo</option><option value="607">Agrado</option><option value="608">Aipe</option><option value="609">Algeciras</option><option value="610">Altamira</option><option value="611">Baraya</option><option value="612">Campoalegre</option><option value="613">Colombia</option><option value="614">Elías</option><option value="615">Garzón</option><option value="616">Gigante</option><option value="617">Guadalupe</option><option value="618">Hobo</option><option value="619">Íquira</option><option value="620">Isnos</option><option value="621">La Argentina </option><option value="622">La Plata </option><option value="623">Nátaga</option><option value="624">Oporapa</option><option value="625">Paicol</option><option value="626">Palermo</option><option value="627">Palestina</option><option value="628">Pital</option><option value="629">Pitalito</option><option value="630">Rivera</option><option value="631">Saladoblanco</option><option value="632">San Agustín </option><option value="633">Santa María </option><option value="634">Suaza</option><option value="635">Tarqui</option><option value="636">Tesalia</option><option value="637">Tello</option><option value="638">Teruel</option><option value="639">Timaná</option><option value="640">Villavieja</option><option value="641">Yaguará</option><option value="642">Riohacha</option><option value="643">Albania</option><option value="644">Barrancas</option><option value="645">Dibulla</option><option value="646">Distracción</option><option value="647">El Molino </option><option value="648">Fonseca</option><option value="649">Hatonuevo</option><option value="650">La Jagua Del Pilar</option><option value="651">Maicao</option><option value="652">Manaure</option><option value="653">San Juan Del Cesar</option><option value="654">Uribia</option><option value="655">Urumita</option><option value="656">Villanueva</option><option value="657">Santa Marta </option><option value="658">Algarrobo</option><option value="659">Aracataca</option><option value="660">Ariguaní</option><option value="661">Cerro De San Antonio</option><option value="662">Chivolo</option><option value="663">Ciénaga</option><option value="664">Concordia</option><option value="665">El Banco </option><option value="666">El Piñón </option><option value="667">El Retén </option><option value="668">Fundación</option><option value="669">Guamal</option><option value="670">Nueva Granada </option><option value="671">Pedraza</option><option value="672">Pijiño Del Carmen</option><option value="673">Pivijay</option><option value="674">Plato</option><option value="675">Puebloviejo</option><option value="676">Remolino</option><option value="677">Sabanas De San Ángel</option><option value="678">Salamina</option><option value="679">San Sebastián De Buenavista</option><option value="680">San Zenón </option><option value="681">Santa Ana </option><option value="682">Santa Bárbara De Pinto</option><option value="683">Sitionuevo</option><option value="684">Tenerife</option><option value="685">Zapayán</option><option value="686">Zona Bananera </option><option value="687">Villavicencio</option><option value="688">Acacías</option><option value="689">Barranca De Upía</option><option value="690">Cabuyaro</option><option value="691">Castilla La Nueva</option><option value="692">Cubarral</option><option value="693">Cumaral</option><option value="694">El Calvario </option><option value="695">El Castillo </option><option value="696">El Dorado </option><option value="697">Fuente De Oro</option><option value="698">Granada</option><option value="699">Guamal</option><option value="700">Mapiripán</option><option value="701">Mesetas</option><option value="702">La Macarena </option><option value="703">Uribe</option><option value="704">Lejanías</option><option value="705">Puerto Concordia </option><option value="706">Puerto Gaitán </option><option value="707">Puerto López </option><option value="708">Puerto Lleras </option><option value="709">Puerto Rico </option><option value="710">Restrepo</option><option value="711">San Carlos De Guaroa</option><option value="712">San Juan De Arama</option><option value="713">San Juanito </option><option value="714">San Martín </option><option value="715">Vistahermosa</option><option value="716">Pasto</option><option value="717">Albán</option><option value="718">Aldana</option><option value="719">Ancuyá</option><option value="720">Arboleda</option><option value="721">Barbacoas</option><option value="722">Belén</option><option value="723">Buesaco</option><option value="724">Colón</option><option value="725">Consacá</option><option value="726">Contadero</option><option value="727">Córdoba</option><option value="728">Cuaspúd</option><option value="729">Cumbal</option><option value="730">Cumbitara</option><option value="731">Chachagüí</option><option value="732">El Charco </option><option value="733">El Peñol </option><option value="734">El Rosario </option><option value="735">El Tablón De Gómez</option><option value="736">El Tambo </option><option value="737">Funes</option><option value="738">Guachucal</option><option value="739">Guaitarilla</option><option value="740">Gualmatán</option><option value="741">Iles</option><option value="742">Imués</option><option value="743">Ipiales</option><option value="744">La Cruz </option><option value="745">La Florida </option><option value="746">La Llanada </option><option value="747">La Tola </option><option value="748">La Unión </option><option value="749">Leiva</option><option value="750">Linares</option><option value="751">Los Andes </option><option value="752">Magüí</option><option value="753">Mallama</option><option value="754">Mosquera</option><option value="755">Nariño</option><option value="756">Olaya Herrera </option><option value="757">Ospina</option><option value="758">Francisco Pizarro </option><option value="759">Policarpa</option><option value="760">Potosí</option><option value="761">Providencia</option><option value="762">Puerres</option><option value="763">Pupiales</option><option value="764">Ricaurte</option><option value="765">Roberto Payán </option><option value="766">Samaniego</option><option value="767">Sandoná</option><option value="768">San Bernardo </option><option value="769">San Lorenzo </option><option value="770">San Pablo </option><option value="771">San Pedro De Cartago</option><option value="772">Santa Bárbara </option><option value="773">Santacruz</option><option value="774">Sapuyes</option><option value="775">Taminango</option><option value="776">Tangua</option><option value="777">San Andrés De Tumaco</option><option value="778">Túquerres</option><option value="779">Yacuanquer</option><option value="780">San José De Cúcuta</option><option value="781">Ábrego</option><option value="782">Arboledas</option><option value="783">Bochalema</option><option value="784">Bucarasica</option><option value="785">Cácota</option><option value="786">Cáchira</option><option value="787">Chinácota</option><option value="788">Chitagá</option><option value="789">Convención</option><option value="790">Cucutilla</option><option value="791">Durania</option><option value="792">El Carmen </option><option value="793">El Tarra </option><option value="794">El Zulia </option><option value="795">Gramalote</option><option value="796">Hacarí</option><option value="797">Herrán</option><option value="798">Labateca</option><option value="799">La Esperanza </option><option value="800">La Playa </option><option value="801">Los Patios </option><option value="802">Lourdes</option><option value="803">Mutiscua</option><option value="804">Ocaña</option><option value="805">Pamplona</option><option value="806">Pamplonita</option><option value="807">Puerto Santander </option><option value="808">Ragonvalia</option><option value="809">Salazar</option><option value="810">San Calixto </option><option value="811">San Cayetano </option><option value="812">Santiago</option><option value="813">Sardinata</option><option value="814">Silos</option><option value="815">Teorama</option><option value="816">Tibú</option><option value="817">Toledo</option><option value="818">Villa Caro </option><option value="819">Villa Del Rosario</option><option value="820">Armenia</option><option value="821">Buenavista</option><option value="822">Calarcá</option><option value="823">Circasia</option><option value="824">Córdoba</option><option value="825">Filandia</option><option value="826">Génova</option><option value="827">La Tebaida </option><option value="828">Montenegro</option><option value="829">Pijao</option><option value="830">Quimbaya</option><option value="831">Salento</option><option value="832">Pereira</option><option value="833">Apía</option><option value="834">Balboa</option><option value="835">Belén De Umbría</option><option value="836">Dosquebradas</option><option value="837">Guática</option><option value="838">La Celia </option><option value="839">La Virginia </option><option value="840">Marsella</option><option value="841">Mistrató</option><option value="842">Pueblo Rico </option><option value="843">Quinchía</option><option value="844">Santa Rosa De Cabal</option><option value="845">Santuario</option><option value="846">Bucaramanga</option><option value="847">Aguada</option><option value="848">Albania</option><option value="849">Aratoca</option><option value="850">Barbosa</option><option value="851">Barichara</option><option value="852">Barrancabermeja</option><option value="853">Betulia</option><option value="854">Bolívar</option><option value="855">Cabrera</option><option value="856">California</option><option value="857">Capitanejo</option><option value="858">Carcasí</option><option value="859">Cepitá</option><option value="860">Cerrito</option><option value="861">Charalá</option><option value="862">Charta</option><option value="863">Chima</option><option value="864">Chipatá</option><option value="865">Cimitarra</option><option value="866">Concepción</option><option value="867">Confines</option><option value="868">Contratación</option><option value="869">Coromoro</option><option value="870">Curití</option><option value="871">El Carmen De Chucurí</option><option value="872">El Guacamayo </option><option value="873">El Peñón </option><option value="874">El Playón </option><option value="875">Encino</option><option value="876">Enciso</option><option value="877">Florián</option><option value="878">Floridablanca</option><option value="879">Galán</option><option value="880">Gámbita</option><option value="881">Girón</option><option value="882">Guaca</option><option value="883">Guadalupe</option><option value="884">Guapotá</option><option value="885">Guavatá</option><option value="886">Güepsa</option><option value="887">Hato</option><option value="888">Jesús María </option><option value="889">Jordán</option><option value="890">La Belleza </option><option value="891">Landázuri</option><option value="892">La Paz </option><option value="893">Lebrija</option><option value="894">Los Santos </option><option value="895">Macaravita</option><option value="896">Málaga</option><option value="897">Matanza</option><option value="898">Mogotes</option><option value="899">Molagavita</option><option value="900">Ocamonte</option><option value="901">Oiba</option><option value="902">Onzaga</option><option value="903">Palmar</option><option value="904">Palmas Del Socorro</option><option value="905">Páramo</option><option value="906">Piedecuesta</option><option value="907">Pinchote</option><option value="908">Puente Nacional </option><option value="909">Puerto Parra </option><option value="910">Puerto Wilches </option><option value="911">Rionegro</option><option value="912">Sabana De Torres</option><option value="913">San Andrés </option><option value="914">San Benito </option><option value="915">San Gil </option><option value="916">San Joaquín </option><option value="917">San José De Miranda</option><option value="918">San Miguel </option><option value="919">San Vicente De Chucurí</option><option value="920">Santa Bárbara </option><option value="921">Santa Helena Del Opón</option><option value="922">Simacota</option><option value="923">Socorro</option><option value="924">Suaita</option><option value="925">Sucre</option><option value="926">Suratá</option><option value="927">Tona</option><option value="928">Valle De San José</option><option value="929">Vélez</option><option value="930">Vetas</option><option value="931">Villanueva</option><option value="932">Zapatoca</option><option value="933">Sincelejo</option><option value="934">Buenavista</option><option value="935">Caimito</option><option value="936">Colosó</option><option value="937">Corozal</option><option value="938">Coveñas</option><option value="939">Chalán</option><option value="940">El Roble </option><option value="941">Galeras</option><option value="942">Guaranda</option><option value="943">La Unión </option><option value="944">Los Palmitos </option><option value="945">Majagual</option><option value="946">Morroa</option><option value="947">Ovejas</option><option value="948">Palmito</option><option value="949">Sampués</option><option value="950">San Benito Abad</option><option value="951">San Juan De Betulia</option><option value="952">San Marcos </option><option value="953">San Onofre </option><option value="954">San Pedro </option><option value="955">San Luis De Sincé</option><option value="956">Sucre</option><option value="957">Santiago De Tolú</option><option value="958">Tolú Viejo </option><option value="959">Ibagué</option><option value="960">Alpujarra</option><option value="961">Alvarado</option><option value="962">Ambalema</option><option value="963">Anzoátegui</option><option value="964">Armero</option><option value="965">Ataco</option><option value="966">Cajamarca</option><option value="967">Carmen De Apicalá</option><option value="968">Casabianca</option><option value="969">Chaparral</option><option value="970">Coello</option><option value="971">Coyaima</option><option value="972">Cunday</option><option value="973">Dolores</option><option value="974">Espinal</option><option value="975">Falan</option><option value="976">Flandes</option><option value="977">Fresno</option><option value="978">Guamo</option><option value="979">Herveo</option><option value="980">Honda</option><option value="981">Icononzo</option><option value="982">Lérida</option><option value="983">Líbano</option><option value="984">San Sebastián De Mariquita</option><option value="985">Melgar</option><option value="986">Murillo</option><option value="987">Natagaima</option><option value="988">Ortega</option><option value="989">Palocabildo</option><option value="990">Piedras</option><option value="991">Planadas</option><option value="992">Prado</option><option value="993">Purificación</option><option value="994">Rioblanco</option><option value="995">Roncesvalles</option><option value="996">Rovira</option><option value="997">Saldaña</option><option value="998">San Antonio </option><option value="999">San Luis </option><option value="1000">Santa Isabel </option><option value="1001">Suárez</option><option value="1002">Valle De San Juan</option><option value="1003">Venadillo</option><option value="1004">Villahermosa</option><option value="1005">Villarrica</option><option value="1006">Cali</option><option value="1007">Alcalá</option><option value="1008">Andalucía</option><option value="1009">Ansermanuevo</option><option value="1010">Argelia</option><option value="1011">Bolívar</option><option value="1012">Buenaventura</option><option value="1013">Guadalajara De Buga</option><option value="1014">Bugalagrande</option><option value="1015">Caicedonia</option><option value="1016">Calima</option><option value="1017">Candelaria</option><option value="1018">Cartago</option><option value="1019">Dagua</option><option value="1020">El Águila </option><option value="1021">El Cairo </option><option value="1022">El Cerrito </option><option value="1023">El Dovio </option><option value="1024">Florida</option><option value="1025">Ginebra</option><option value="1026">Guacarí</option><option value="1027">Jamundí</option><option value="1028">La Cumbre </option><option value="1029">La Unión </option><option value="1030">La Victoria </option><option value="1031">Obando</option><option value="1032">Palmira</option><option value="1033">Pradera</option><option value="1034">Restrepo</option><option value="1035">Riofrío</option><option value="1036">Roldanillo</option><option value="1037">San Pedro </option><option value="1038">Sevilla</option><option value="1039">Toro</option><option value="1040">Trujillo</option><option value="1041">Tuluá</option><option value="1042">Ulloa</option><option value="1043">Versalles</option><option value="1044">Vijes</option><option value="1045">Yotoco</option><option value="1046">Yumbo</option><option value="1047">Zarzal</option><option value="1048">Arauca</option><option value="1049">Arauquita</option><option value="1050">Cravo Norte </option><option value="1051">Fortul</option><option value="1052">Puerto Rondón </option><option value="1053">Saravena</option><option value="1054">Tame</option><option value="1055">Yopal</option><option value="1056">Aguazul</option><option value="1057">Chámeza</option><option value="1058">Hato Corozal </option><option value="1059">La Salina </option><option value="1060">Maní</option><option value="1061">Monterrey</option><option value="1062">Nunchía</option><option value="1063">Orocué</option><option value="1064">Paz De Ariporo</option><option value="1065">Pore</option><option value="1066">Recetor</option><option value="1067">Sabanalarga</option><option value="1068">Sácama</option><option value="1069">San Luis De Palenque</option><option value="1070">Támara</option><option value="1071">Tauramena</option><option value="1072">Trinidad</option><option value="1073">Villanueva</option><option value="1074">Mocoa</option><option value="1075">Colón</option><option value="1076">Orito</option><option value="1077">Puerto Asís </option><option value="1078">Puerto Caicedo </option><option value="1079">Puerto Guzmán </option><option value="1080">Puerto Leguízamo </option><option value="1081">Sibundoy</option><option value="1082">San Francisco </option><option value="1083">San Miguel </option><option value="1084">Santiago</option><option value="1085">Valle Del Guamuez</option><option value="1086">Villagarzón</option><option value="1087">San Andrés </option><option value="1088">Providencia</option><option value="1089">Leticia</option><option value="1090">El Encanto </option><option value="1091">La Chorrera </option><option value="1092">La Pedrera </option><option value="1093">La Victoria </option><option value="1094">Mirití - Paraná</option><option value="1095">Puerto Alegría </option><option value="1096">Puerto Arica </option><option value="1097">Puerto Nariño </option><option value="1098">Puerto Santander </option><option value="1099">Tarapacá</option><option value="1100">Inírida</option><option value="1101">Barranco Minas </option><option value="1102">Mapiripana</option><option value="1103">San Felipe </option><option value="1104">Puerto Colombia </option><option value="1105">La Guadalupe </option><option value="1106">Cacahual</option><option value="1107">Pana Pana </option><option value="1108">Morichal</option><option value="1109">San José Del Guaviare</option><option value="1110">Calamar</option><option value="1111">El Retorno </option><option value="1112">Miraflores</option><option value="1113">Mitú</option><option value="1114">Carurú</option><option value="1115">Pacoa</option><option value="1116">Taraira</option><option value="1117">Papunahua</option><option value="1118">Yavaraté</option><option value="1119">Puerto Carreño </option><option value="1120">La Primavera </option><option value="1121">Santa Rosalía </option><option value="1122">Cumaribo</option></select>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
    <label for="zip_code">C&oacute;digo postal:*</label>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
        <input class="form-control" placeholder="Código Postal / Zip"  name="zip_code" type="text" value="" id="zip_code">
    </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
    <div class="form-group">
    <label for="landmark">Direccion:*</label>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
        <input class="form-control" placeholder="Direccion"  name="landmark" type="text" id="landmark">
    </div>
    </div>
</div>
            
            <div class="clearfix"></div>
            <div class="col-sm-4 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('dob', __('lang_v1.dob') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        
                        {!! Form::text('dob', null, ['class' => 'form-control dob-date-picker','placeholder' => __('lang_v1.dob'), 'readonly']); !!}
                    </div>
                </div>
            </div>

            <!-- lead additional field -->
            <div class="col-md-4 lead_additional_div">
              <div class="form-group">
                  {!! Form::label('crm_source', __('lang_v1.source') . ':' ) !!}
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fas fa fa-search"></i>
                      </span>
                      {!! Form::select('crm_source', $sources, null , ['class' => 'form-control', 'id' => 'crm_source','placeholder' => __('messages.please_select')]); !!}
                  </div>
              </div>
            </div>
            
            <div class="col-md-4 lead_additional_div">
              <div class="form-group">
                  {!! Form::label('crm_life_stage', __('lang_v1.life_stage') . ':' ) !!}
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fas fa fa-life-ring"></i>
                      </span>
                      {!! Form::select('crm_life_stage', $life_stages, null , ['class' => 'form-control', 'id' => 'crm_life_stage','placeholder' => __('messages.please_select')]); !!}
                  </div>
              </div>
            </div>

            <!-- User in create leads -->
            <div class="col-md-6 lead_additional_div">
                  <div class="form-group">
                      {!! Form::label('user_id', __('lang_v1.assigned_to') . ':*' ) !!}
                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fa fa-user"></i>
                          </span>
                          {!! Form::select('user_id[]', $users ?? [], null , ['class' => 'form-control select2', 'id' => 'user_id', 'multiple', 'required', 'style' => 'width: 100%;']); !!}
                      </div>
                  </div>
            </div>

            <!-- User in create customer & supplier -->
            @if(config('constants.enable_contact_assign') && $type !== 'lead')
                <div class="col-md-6">
                      <div class="form-group">
                          {!! Form::label('assigned_to_users', __('lang_v1.assigned_to') . ':' ) !!}
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="fa fa-user"></i>
                              </span>
                              {!! Form::select('assigned_to_users[]', $users ?? [], null , ['class' => 'form-control select2', 'id' => 'assigned_to_users', 'multiple', 'style' => 'width: 100%;']); !!}
                          </div>
                      </div>
                </div>
            @endif

            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="tw-dw-btn tw-dw-btn-success tw-text-white tw-dw-btn-sm center-block more_btn" data-target="#more_div">@lang('lang_v1.more_info') <i class="fa fa-chevron-down"></i></button>
            </div>

            <div id="more_div" class="hide">
                {!! Form::hidden('position', null, ['id' => 'position']); !!}
                <div class="col-md-12"><hr/></div>

                <div class="col-md-4">
                    <div class="form-group">
                      {!! Form::label('tax_number', __('contact.tax_no') . ':') !!}
                        <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fa fa-info"></i>
                          </span>
                          {!! Form::text('tax_number', null, ['class' => 'form-control', 'placeholder' => __('contact.tax_no')]); !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-4 opening_balance">
                  <div class="form-group">
                      {!! Form::label('opening_balance', __('lang_v1.opening_balance') . ':') !!}
                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fas fa-money-bill-alt"></i>
                          </span>
                          {!! Form::text('opening_balance', 0, ['class' => 'form-control input_number']); !!}
                      </div>
                  </div>
                </div>

                <div class="col-md-4 pay_term">
                  <div class="form-group">
                    <div class="multi-input">
                      {!! Form::label('pay_term_number', __('contact.pay_term') . ':') !!} @show_tooltip(__('tooltip.pay_term'))
                      <br/>
                      {!! Form::number('pay_term_number', null, ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]); !!}

                      {!! Form::select('pay_term_type', ['months' => __('lang_v1.months'), 'days' => __('lang_v1.days')], '', ['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]); !!}
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                @php
                  $common_settings = session()->get('business.common_settings');
                  $default_credit_limit = !empty($common_settings['default_credit_limit']) ? $common_settings['default_credit_limit'] : null;
                @endphp
                <div class="col-md-4 customer_fields">
                  <div class="form-group">
                      {!! Form::label('credit_limit', __('lang_v1.credit_limit') . ':') !!}
                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fas fa-money-bill-alt"></i>
                          </span>
                          {!! Form::text('credit_limit', $default_credit_limit ?? null, ['class' => 'form-control input_number']); !!}
                      </div>
                      <p class="help-block">@lang('lang_v1.credit_limit_help')</p>
                  </div>
                </div>
                

                <div class="col-md-12"><hr/></div>
                <div class="clearfix"></div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address_line_1', __('lang_v1.address_line_1') . ':') !!}
                        {!! Form::text('address_line_1', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.address_line_1'), 'rows' => 3]); !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address_line_2', __('lang_v1.address_line_2') . ':') !!}
                        {!! Form::text('address_line_2', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.address_line_2'), 'rows' => 3]); !!}
                    </div>
                </div>
                <div class="clearfix"></div>
              <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('city', __('business.city') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('business.city')]); !!}
                    </div>
                </div>
              </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('state', __('business.state') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                    </span>
                    {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('business.state')]); !!}
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('country', __('business.country') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-globe"></i>
                    </span>
                    {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('business.country')]); !!}
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('zip_code', __('business.zip_code') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                    </span>
                    {!! Form::text('zip_code', null, ['class' => 'form-control', 
                    'placeholder' => __('business.zip_code_placeholder')]); !!}
                </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="col-md-12">
            <hr/>
          </div>
          @php
            $custom_labels = json_decode(session('business.custom_labels'), true);
            $contact_custom_field1 = !empty($custom_labels['contact']['custom_field_1']) ? $custom_labels['contact']['custom_field_1'] : __('lang_v1.contact_custom_field1');
            $contact_custom_field2 = !empty($custom_labels['contact']['custom_field_2']) ? $custom_labels['contact']['custom_field_2'] : __('lang_v1.contact_custom_field2');
            $contact_custom_field3 = !empty($custom_labels['contact']['custom_field_3']) ? $custom_labels['contact']['custom_field_3'] : __('lang_v1.contact_custom_field3');
            $contact_custom_field4 = !empty($custom_labels['contact']['custom_field_4']) ? $custom_labels['contact']['custom_field_4'] : __('lang_v1.contact_custom_field4');
            $contact_custom_field5 = !empty($custom_labels['contact']['custom_field_5']) ? $custom_labels['contact']['custom_field_5'] : __('lang_v1.custom_field', ['number' => 5]);
            $contact_custom_field6 = !empty($custom_labels['contact']['custom_field_6']) ? $custom_labels['contact']['custom_field_6'] : __('lang_v1.custom_field', ['number' => 6]);
            $contact_custom_field7 = !empty($custom_labels['contact']['custom_field_7']) ? $custom_labels['contact']['custom_field_7'] : __('lang_v1.custom_field', ['number' => 7]);
            $contact_custom_field8 = !empty($custom_labels['contact']['custom_field_8']) ? $custom_labels['contact']['custom_field_8'] : __('lang_v1.custom_field', ['number' => 8]);
            $contact_custom_field9 = !empty($custom_labels['contact']['custom_field_9']) ? $custom_labels['contact']['custom_field_9'] : __('lang_v1.custom_field', ['number' => 9]);
            $contact_custom_field10 = !empty($custom_labels['contact']['custom_field_10']) ? $custom_labels['contact']['custom_field_10'] : __('lang_v1.custom_field', ['number' => 10]);
          @endphp
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field1', $contact_custom_field1 . ':') !!}
                {!! Form::text('custom_field1', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field1]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field2', $contact_custom_field2 . ':') !!}
                {!! Form::text('custom_field2', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field2]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field3', $contact_custom_field3 . ':') !!}
                {!! Form::text('custom_field3', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field3]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field4', $contact_custom_field4 . ':') !!}
                {!! Form::text('custom_field4', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field4]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field5', $contact_custom_field5 . ':') !!}
                {!! Form::text('custom_field5', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field5]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field6', $contact_custom_field6 . ':') !!}
                {!! Form::text('custom_field6', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field6]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field7', $contact_custom_field7 . ':') !!}
                {!! Form::text('custom_field7', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field7]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field8', $contact_custom_field8 . ':') !!}
                {!! Form::text('custom_field8', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field8]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field9', $contact_custom_field9 . ':') !!}
                {!! Form::text('custom_field9', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field9]); !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('custom_field10', $contact_custom_field10 . ':') !!}
                {!! Form::text('custom_field10', null, ['class' => 'form-control', 
                    'placeholder' => $contact_custom_field10]); !!}
            </div>
          </div>
          <div class="col-md-12 shipping_addr_div"><hr></div>
          <div class="col-md-8 col-md-offset-2 shipping_addr_div mb-10" >
              <strong>{{__('lang_v1.shipping_address')}}</strong><br>
              {!! Form::text('shipping_address', null, ['class' => 'form-control', 
                    'placeholder' => __('lang_v1.search_address'), 'id' => 'shipping_address']); !!}
            <div class="mb-10" id="map"></div>
          </div>
          @php
                $shipping_custom_label_1 = !empty($custom_labels['shipping']['custom_field_1']) ? $custom_labels['shipping']['custom_field_1'] : '';

                $shipping_custom_label_2 = !empty($custom_labels['shipping']['custom_field_2']) ? $custom_labels['shipping']['custom_field_2'] : '';

                $shipping_custom_label_3 = !empty($custom_labels['shipping']['custom_field_3']) ? $custom_labels['shipping']['custom_field_3'] : '';

                $shipping_custom_label_4 = !empty($custom_labels['shipping']['custom_field_4']) ? $custom_labels['shipping']['custom_field_4'] : '';

                $shipping_custom_label_5 = !empty($custom_labels['shipping']['custom_field_5']) ? $custom_labels['shipping']['custom_field_5'] : '';
            @endphp

            @if(!empty($custom_labels['shipping']['is_custom_field_1_contact_default']) && !empty($shipping_custom_label_1))
                @php
                    $label_1 = $shipping_custom_label_1 . ':';
                @endphp

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('shipping_custom_field_1', $label_1 ) !!}
                        {!! Form::text('shipping_custom_field_details[shipping_custom_field_1]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_1]); !!}
                    </div>
                </div>
            @endif
            @if(!empty($custom_labels['shipping']['is_custom_field_2_contact_default']) && !empty($shipping_custom_label_2))
                @php
                    $label_2 = $shipping_custom_label_2 . ':';
                @endphp

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('shipping_custom_field_2', $label_2 ) !!}
                        {!! Form::text('shipping_custom_field_details[shipping_custom_field_2]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_2]); !!}
                    </div>
                </div>
            @endif
            @if(!empty($custom_labels['shipping']['is_custom_field_3_contact_default']) && !empty($shipping_custom_label_3))
                @php
                    $label_3 = $shipping_custom_label_3 . ':';
                @endphp

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('shipping_custom_field_3', $label_3 ) !!}
                        {!! Form::text('shipping_custom_field_details[shipping_custom_field_3]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_3]); !!}
                    </div>
                </div>
            @endif
            @if(!empty($custom_labels['shipping']['is_custom_field_4_contact_default']) && !empty($shipping_custom_label_4))
                @php
                    $label_4 = $shipping_custom_label_4 . ':';
                @endphp

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('shipping_custom_field_4', $label_4 ) !!}
                        {!! Form::text('shipping_custom_field_details[shipping_custom_field_4]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_4]); !!}
                    </div>
                </div>
            @endif
            @if(!empty($custom_labels['shipping']['is_custom_field_5_contact_default']) && !empty($shipping_custom_label_5))
                @php
                    $label_5 = $shipping_custom_label_5 . ':';
                @endphp

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('shipping_custom_field_5', $label_5 ) !!}
                        {!! Form::text('shipping_custom_field_details[shipping_custom_field_5]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_5]); !!}
                    </div>
                </div>
            @endif
            @if(!empty($common_settings['is_enabled_export']))
                <div class="col-md-12 mb-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_export" class="form-check-input" id="is_customer_export">
                        <label class="form-check-label" for="is_customer_export">@lang('lang_v1.is_export')</label>
                    </div>
                </div>
                @php
                    $i = 1;
                @endphp
                @for($i; $i <= 6 ; $i++)
                    <div class="col-md-4 export_div" style="display: none;">
                        <div class="form-group">
                            {!! Form::label('export_custom_field_'.$i, __('lang_v1.export_custom_field'.$i).':' ) !!}
                            {!! Form::text('export_custom_field_'.$i, null, ['class' => 'form-control','placeholder' => __('lang_v1.export_custom_field'.$i)]); !!}
                        </div>
                    </div>
                @endfor
            @endif
            </div>
        </div>
        @include('layouts.partials.module_form_part')
    </div>
    
    <div class="modal-footer">
      <button type="submit" class="tw-dw-btn tw-dw-btn-warning tw-text-black">@lang( 'messages.save' )</button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}
  
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->