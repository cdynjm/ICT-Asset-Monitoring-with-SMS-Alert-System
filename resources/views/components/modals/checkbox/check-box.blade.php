<div id="show-assets">
    <label for="" class="mt-2">Select Defective Property</label>
    @foreach($asset as $as)
    <div class="form-check form-switch ms-auto mt-2">
        <input type="checkbox" class="form-check-input mt-1" name="property[{{ $as->id }}]" value="{{ $as->id }}">
        <span class="ms-2 fw-bold text-sm">{{ $as->property }}</span>
    </div>
    @endforeach
</div>