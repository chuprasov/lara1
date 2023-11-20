<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                {{-- <x-form-input type="text" name="brand" label="Марка " /> --}}
                <x-form-select label="{{ __('Brand') }}" name="brand_id" :options="$brands"
                    placeholder="{{ __('not selected') }}" />
            </div>
            {{-- @error('brand')
                <div style="color: red">{{ $message }}</div>
            @enderror --}}
            <div class="mb-3">
                <x-form-input type="text" name="model" label="{{ __('Model') }} " />
            </div>
            <div class="mb-3">
                <x-form-input type="text" name="vin" label="VIN " />
            </div>
            <div class="mb-3">
                <x-form-select label="{{ __('Transmission') }}:" name="transmission" :options="config('app-cars.transmissions')"
                    placeholder="{{ __('not selected') }}" />
            </div>
            <div class="mb-3">
                <x-form-select name="tags[]" label="{{ __('Tags') }}" :options="$tags" multiple :size="$tags->count()"
                    many-relation />
            </div>
            @error('tags.*')
                <div class="alert alert-danger my-2">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <x-form-input type="file" name="imagefile" />
            </div>
            <div class="mb-3">
                <x-form-submit id="btn-save">{{ __('Save') }}</x-form-submit>
            </div>

            <div class="mb-3">
                <a id="btn-cancel" href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </div>
    </div>
</div>
