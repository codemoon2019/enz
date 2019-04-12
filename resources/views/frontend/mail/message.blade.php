@component('frontend.mail.layout')
    {{-- Header --}}
    @slot('header')
        <tr>
            <td class="header">
                <a href="{{ url('/') }}"> {{ app_name() }} </a>
            </td>
        </tr>
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            <table class="subcopy" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        {{ Illuminate\Mail\Markdown::parse($subcopy) }}
                    </td>
                </tr>
            </table>
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        <tr>
            <td>
                <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-cell" align="center">
                            &copy; {{ date('Y') }} {{ app_name() }}. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @endslot
@endcomponent
