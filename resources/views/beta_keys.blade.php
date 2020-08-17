@extends('body')
@section('title', 'Beta Keys')

@section('content')
    <div class="sixteen wide mobile eight wide tablet six wide computer centered  column">

            <h1 class="text-center"><i class="fa fa-key"></i> Beta Keys</h1>
            <p class="text-center">
                Here you can find some Beta keys.<br>
                You can't find a valid beta key? Don't worry, we add new ones periodically.<br>
            </p>
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th class="center aligned">Key</th>
                        <th class="center aligned">Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr class="@if($item->is_allowed) positive @else negative @endif">
                        <td class="center aligned" data-label="Key">{{ $item->key }}</td>
                        <td class="center aligned" data-label="Status"><i class="fa @if($item->is_allowed) fa-check @else fa-exclamation @endif"></i></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

@endsection
@section('scripts')

@endsection
