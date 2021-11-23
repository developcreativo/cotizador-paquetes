<form wire:submit.prevent="calcular" action="#" method="POST">
    @if (session()->has('message'))
        <div style="text-align: center; color: red">
            {{ session('message') }}
        </div>
    @endif
    <p class="tituopag">Calcula tu envío aquí</p>
    <div class="cajadirecciones">
        <div class="partidabox">
            <div class="titdestinos">
                <span class="icotit"></span>
                <img class="icotitimg" src="{{ asset('assets/img/pinazul.png') }}" alt="Pin Azul">
                <span class="textit">Punto de partida</span>
            </div>
            <select id="inputorigen" class="selectin origen" wire:model="zona_origen">
                <option value="null"> {{ __('Seleccione distrito') }} </option>
                @foreach($zonas as $zona)
                    <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                @endforeach
            </select>
            @error('zona_origen') <div style="color: red">{{ $message }}</div> @enderror
        </div>
        <div class="destinobox">
            <div class="titdestinos">
                <span class="icotit"></span>
                <img class="icotitimg" src="{{ asset('assets/img/pinverde.png') }}" alt="Pin Verde">
                <span class="textit">Punto de entrega</span>
            </div>
            <select id="inputdestino" class="selectin destino" wire:model="zona_destino">
                <option value="null"> {{ __('Seleccione distrito') }} </option>
                @foreach($zonas as $zona)
                    <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                @endforeach
            </select>
            @error('zona_destino') <div style="color: red">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="boxer">
        <div class="boxtipoenvio">
            <p class="labelp">Tipo de Envio:</p>
            <div class="radiotipodeenvio">
                @foreach($tarifarios as $tarifa)
                    <p>
                        <input type="radio" id="tipoenvio{{ $tarifa->id }}" class="tipoenvioclass" wire:model="tarifario_id" value="{{ $tarifa->id }}">
                        <label for="tipoenvio{{ $tarifa->id }}">{{ $tarifa->nombre }}</label>
                    </p>
                @endforeach
                    @error('tarifario_id') <div style="color: red">{{ $message }}</div> @enderror
{{--                <p>--}}
{{--                    <input type="radio" id="tipoenvio2" class="tipoenvioclass" name="tipoenvio">--}}
{{--                    <label for="tipoenvio2">Express</label>--}}
{{--                </p>--}}
{{--                <p>--}}
{{--                    <input type="radio" id="tipoenvio3" class="tipoenvioclass" name="tipoenvio">--}}
{{--                    <label for="tipoenvio3">Valorado</label>--}}
{{--                </p>--}}
            </div>
        </div>
        <p class="titulolabel">¿Qué envías?</p>
        <div id="radiosqueenvio">
            <div class="cajandaud">
                <input type="radio" name="tiposobcaj" id="sobres" value="sobre" wire:model="tipo" wire:change="onchangeTipo">
                <label for="sobres" class="lolicons">
                    <p class="qoutnua">Sobres</p>
                    <span><img src="{{ asset('assets/img/Sobres.png') }}" alt="box"></span>
                </label>

            </div>
            <div class="cajandaud">
                <input type="radio" name="tiposobcaj" id="paquetes" value="paquete" wire:model="tipo"><label for="paquetes"
                                                                                           class="lolicons"  wire:change="onchangeTipo">
                    <p class="qoutnua">Paquetes</p>
                    <span><img src="{{ asset('assets/img/paquetes.png') }}" alt="box"></span>
                </label>
            </div>
            @error('tipo') <div style="color: red">{{ $message }}</div> @enderror
        </div>
        <p class="titulolabel">Detalles del envío</p>
        <div class="inputsboxdetalles">
               <span style="display: @if($tipo == 'paquete') block @else none @endif"  >
                    <input class="medidasfields" id="ancho" name="ancho" type="number" min="1"
                           placeholder="Ancho (cm)" wire:model="ancho">

                <input class="medidasfields" id="largo" name="largo" type="number" min="1"
                       placeholder="Largo (cm)" wire:model="largo">

                <input class="medidasfields" id="alto" name="alto" type="number" min="1"
                       placeholder="Alto (cm)" wire:model="alto">
               </span>


            <span style="display: @if($tipo == 'sobre' || $tipo == 'paquete') block @else none @endif">
                <input class="medidasfields" id="peso" name="peso" type="number" min="1"
                       placeholder="Peso (Gramos)" wire:model="peso">
            <input class="medidasfields" id="cantidadpaq" name="cantidadpaq" type="number" min="1"
                   placeholder="Cantidad de paquetes" wire:model="cantidad">
            </span>
            @error('ancho') <p style="color: red">{{ $message }}</p> @enderror
            @error('largo') <p style="color: red">{{ $message }}</p> @enderror
            @error('alto') <p style="color: red">{{ $message }}</p> @enderror
            @error('peso') <p style="color: red">{{ $message }}</p> @enderror
            @error('cantidad') <p style="color: red">{{ $message }}</p> @enderror
        </div>
        <label class="checkboxterminos">
            <input type="checkbox" class="checkterm" name="terms" id="terms" wire:model="term">
            <span class="text-terminos">He leído y acepto los
                        <a href="#" class="temrslink" target="_blank">términos
                            y condiciones</a>
                        del servicio.<span class="reqx">*</span>
                 @error('term') <p style="color: red">{{ $message }}</p> @enderror
        </label>
        <div class="footform">
            <div class="col1du">
                <button type="submit" class="button" name="estimarprecio" id="calculaenvio">Calcula tu envío</button>
            </div>
            <div class="col2du">
                <p class="preciotitulo">Precio estimado:</p>
                <p class="preciofinal">S/ {{ number_format($precio_estimado, 2) }}</p>
            </div>
        </div>
    </div>
</form>
