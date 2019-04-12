<h4 class="form-group"> Meta Tags </h4>
<div class="table-responsive">
    <table class="table">
        <tbody>
        <tr>
            <th>Name</th>
            <td>{{ $meta->name }}</td>
        </tr>
        <tr>
            <th>Keywords</th>
            <td>
                @forelse(explode(',', $meta->keywords) as $k => $key)
                    <span class="badge badge-pill badge-primary">{{ $key }}</span>
                @empty
                    <small><i class="text-muted">No keywords</i></small>
                @endforelse
            </td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $meta->description }}</td>
        </tr>
        </tbody>
    </table>
</div>