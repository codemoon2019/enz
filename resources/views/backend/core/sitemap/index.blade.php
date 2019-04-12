@extends('backend.layouts.app')
@section('content')
    @component('backend.includes.widgets.box-model')
        @slot('title')
            Sitemap file: <a href="{{ url('/sitemap.xml') }}">{{ url('/sitemap.xml') }}</a>
        @endslot
        @slot('secondary_title')
            Number of URLs in this sitemap: {{ count($html->find('url')) }}
        @endslot
        @slot('buttons')
            <a href="{{ route('admin.sitemap.generate') }}" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i></a>
        @endslot
        @slot('content')
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>URL Location</th>
                        <th>Last Modification Date</th>
                        <th>Change Frequency</th>
                        <th>Priority</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($html->find('url') as $url)
                        <tr>
                            <td>
                                <a href="{{ $url->find('loc', 0)->plaintext }}">{{ $url->find('loc', 0)->plaintext }}</a>
                            </td>
                            <td>{{ $url->find('lastmod', 0)->plaintext }}</td>
                            <td>{{ $url->find('changefreq', 0)->plaintext }}</td>
                            <td>{{ $url->find('priority', 0)->plaintext }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        @endslot
    @endcomponent
@endsection