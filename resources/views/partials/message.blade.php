@if ($messege = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $messege }}</strong>
    </div>
@endif
{{-- Delete category --}}
@if ($messege = Session::get('delete'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $messege }}</strong>
    </div>
@endif
