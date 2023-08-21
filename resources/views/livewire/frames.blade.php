<div>
    <div  class="row bg-white p-3 shadow-lg rounded-lg">
        <div class="col-sm-4">
            <div class="form-group p-2">
                <x-jet-label value="* Seleccione el Calibre" />
                <select wire:model.defer="caliber" class="inputjet w-full text-xs uppercase">
                    <option value="12" @if (old('caliber')==12) selected @endif>12</option>
                    <option value="14" @if (old('caliber')==14) selected @endif>14</option>
                </select>
                <x-jet-input-error for='caliber' />
            </div>
            <div class="form-group p-2">
                <x-jet-label value="* Alto de Pandeo" />
                <select wire:model.defer="buckling" class="inputjet w-full text-xs uppercase">
                    @foreach ($buckling as $row)
                        <option value="{{$row->buckling}}" @if (old('buckling')==$row->buckling) selected @endif>{{$row->buckling}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for='buckling' />
            </div>
            <div class="form-group p-2">
                <x-jet-label value="* Peso" />
                <input type="number" wire:model.defer="weight" class="inputjet w-full text-xs uppercase" />
                <x-jet-input-error for='weight' />
            </div>
            <div class="form-group p-2">
                <x-jet-label value="* Fondo" />
                <select wire:model.defer="depth" class="inputjet w-full text-xs uppercase">
                    @foreach ($depth as $row)
                        <option value="{{$row->depth}}"@if (old('depth')==$row->depth) selected @endif>{{$row->depth}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for='depth' />
            </div>
            <div class="form-group p-2">
                <x-jet-label value="* Altura" />
                <select wire:model.defer="height" class="inputjet w-full text-xs uppercase">
                    @foreach ($height as $row)
                        <option value="{{$row->height}}" @if (old('height')==$row->height) selected @endif>{{$row->height}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for='height' />
            </div>
            <div class="form-group p-2">
                <button wire:click="Calculated" wire:loading.remove wire:target="Calculated" type="submit" class="btn btn-green mb-2">
                    <i class="fa-solid fa-calculator fa-2x"></i>&nbsp; &nbsp; Calcular
                </button>
                <div wire:loading wire:target="Calculated" class="spinner-border" role="status">
                    <span class="sr-only">Calculado...</span>
                </div>
            </div>
        </div>
        <div class="col-sm-8 ">
            {{$Calibre}}
        </div>
    </div>
</div>
