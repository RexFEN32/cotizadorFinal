<x-jet-label value="* Clasificación de Cliente" />
<select class="form-capture uppercase w-full text-xs" name="customer_classification">
    @if (old('customer_classification'))
        <option value="{{ old('customer_classification') }}" selected>{{ old('customer_classification') }}</option>                           
    @endif
    @foreach ($CustomerClassifications as $row)
    <option value="{{$row->id}}">{{$row->customer_classification}}</option>
    @endforeach
</select>
<x-jet-input-error for='customer_classification' />
