<div class="mb-3">
    <x-form-input type="text" name="title" label="{{ __('Brand') }} " />
</div>
<div class="mb-3">
    <x-form-submit id="btn-save">{{ __('Save') }}</x-form-submit>
</div>

<div class="mb-3">
    <a id="btn-cancel" href="{{route('brands.index')}}" class="btn btn-secondary">{{ __('Cancel') }}</a>
</div>
