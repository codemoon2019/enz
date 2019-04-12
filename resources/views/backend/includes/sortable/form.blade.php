<form action="{{ route('webapi.admin.sortable.sort', $model) }}" method="post" id="serialize-form">

    {{ csrf_field() }}
    
    {{ method_field('PUT') }}
    
    <textarea id="serialize" class="form-control" style="display: none;" name="serialize"></textarea>
    
    <button class="btn btn-primary" style="display: none;">Update</button>

</form>