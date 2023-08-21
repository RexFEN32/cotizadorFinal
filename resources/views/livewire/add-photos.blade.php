<div>
    <div class="row p-3">
        <x-jet-label class="font-bold" value="* Fotografía" />
        <div class="contairner">
            <div class="row">
                @if ($photo)
                <div class="col-xs-12 col-sm-6 p-3 items-center">
                    <img src="{{ $photo->temporaryUrl() }}" class="imagesEC" />
                </div>
                @else
                <div class="col-xs-12 col-sm-6 p-3 items-center">
                    <x-image-empty class="imagesEC" />
                </div>
                @endif
                <div class="col-xs-12 col-sm-6 flex-1 justify-center px-6 pt-5 pb-6 border-2 border-blue-800 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class=" items-center text-sm text-gray-800">
                            <div class="mb-3">
                                <i class="fas fa-camera"></i>&nbsp; Tomar o Subir Foto
                                <input wire:model="photo" type="file" accept="image/x-png, image/gif, image/jpeg"
                                    class="w-full p-2 shadow-lg cursor-pointer bg-blue-500 rounded-md font-medium text-white hover:text-gray-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-gray-800">
                                <x-jet-input-error for='photo' />
                            </div>
                        </div>
                        <p class="text-xs text-gray-700">
                            Formatos soportados: PNG, JPG, GIF tamaño máximo 2 MB
                        </p>
                    </div>
                    <div class="space-y-1 text-center">
                        @if ($photo)
                            <x-jet-button wire:click="save">
                                <i class="fas fa-save"></i>&nbsp; Guardar imagen
                            </x-jet-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
