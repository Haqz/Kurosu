@extends('body')
@section('title', 'Beta Keys')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-sm-6">

            <h1 class="text-center"><i class="fa fa-key"></i> Beta Keys</h1>
            <p class="text-center">
                Here you can find some Beta keys.<br>
                You can't find a valid beta key? Don't worry, we add new ones periodically.<br>
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Key</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr class="@if($item->is_public) table-success @else table-danger @endif">
                        <td class="text-center">{{ $item->key }}</td>
                        <td class="text-center"><i class="fa @if($item->is_public) fa-check @else fa-exclamation @endif"></i></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
