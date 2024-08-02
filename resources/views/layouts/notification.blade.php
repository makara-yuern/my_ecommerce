@if(Session::has(config('constants.key_success')))
    <div class="alert bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 h-5 rounded-full">{{ Session::get(config('constants.key_success')) }}</div>
@elseif(Session::has(config('constants.key_fail')))
    <div class="alert bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 h-5 rounded-full">{{ Session::get(config('constants.key_fail')) }}</div>
@endif
<div class="alert message"></div>
@push('js')
    <script type='module'>
    $(document).ready(function (){
        $('.alert').fadeOut(2500);
    })
    </script>
@endpush
