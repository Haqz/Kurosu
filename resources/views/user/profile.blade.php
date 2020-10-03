@extends('body')
@section('title', 'Home')

@section('content')
    <div class="one column row centered">
        <div class="fifteen wide column">
            <div class="ui clearing inverted segment" style="background: rgba(0,0,0, 0.5)">
                <div class="ui left floated header" >
                    <div class="ui horizontal inverted cards">
                        <div class="card" style="background: rgba(0,0,0, 0)">
                            <div class="image" style="background: none; width: 100px">
                                <img style="border-radius: 50%; box-shadow: 0 0 7px 3px red; width: 100px; height:100px" src="https://a.kurosu.club/1001">
                            </div>
                            <div class="content left aligned">
                                <div class="header">{{ $user->username }}</div>
                                <div class="meta">
                                    is <a>{{ KurosuRank($user->rank) }}</a>
                                </div>
                                <div class="description">
                                    <i class="red circle icon"></i>Offline
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui right floated header">
                    <button class="ui small circular twitch icon button">
                        <i class="twitch icon"></i>
                    </button>
                    <button class="ui small circular discord icon button">
                        <i class="discord icon"></i>
                    </button>
                    <button class="ui small circular linkedin icon button">
                        <i class="linkedin icon"></i>
                    </button>
                    <button class="ui small circular google plus icon button">
                        <i class="google plus icon"></i>
                    </button>
                </div>
            </div>
            <div class="ui inverted segment">
                <div class="column" style="word-wrap: break-word">
                        @if($user->stats->userpage_content)
                            @markdown($user->stats->userpage_content)
                        @else
                            @markdown('## This user didn\'t provide his bio')
                        @endif
                </div>
            </div>

            <div class="ui top attached tabular menu" style="background: rgba(0,0,0, 0); text-align: center">
                <a class="item"  data-tab="Standard">Standard</a>
                <a class="item" data-tab="Taiko">Taiko</a>
                <a class="item" data-tab="Mania">Mania</a>
            </div>
            <div class="ui top attached tabular menu" style="background: rgba(0,0,0, 0); margin-top: 0;">
                <a class="item" style="cursor: not-allowed;"  data-tab="Relax">Relax</a>
                <a class="item" style="cursor: not-allowed;" data-tab="Autopilot">Autopilot</a>
            </div>
            @include('user.parts.segment', ['tab' => 'Standard','data' => [$user->stats->pp_std, $user->stats->ranked_score_std, $user->stats->total_score_std,
                                                        $user->stats->playcount_std, $user->stats->replays_watched_std, $user->stats->total_hits_std,
                                                         $user->stats->avg_accuracy_std]])

            @include('user.parts.segment', ['tab' => 'Taiko', 'data' => [$user->stats->pp_taiko, $user->stats->ranked_score_taiko, $user->stats->total_score_taiko,
                                                        $user->stats->playcount_taiko, $user->stats->replays_watched_taiko, $user->stats->total_hits_taiko,
                                                         $user->stats->avg_accuracy_taiko]])

            @include('user.parts.segment', ['tab' => 'Mania', 'data' => [$user->stats->pp_mania, $user->stats->ranked_score_mania, $user->stats->total_score_mania,
                                                        $user->stats->playcount_mania, $user->stats->replays_watched_mania, $user->stats->total_hits_mania,
                                                         $user->stats->avg_accuracy_mania]])

{{--            @include('user.parts.segment', ['tab' => 'Relax', 'data' => [$user->stats->pp_relax, $user->stats->ranked_score_relax, $user->stats->total_score_relax,--}}
{{--                                                        $user->stats->playcount_relax, $user->stats->replays_watched_relax, $user->stats->total_hits_relax,--}}
{{--                                                         $user->stats->avg_accuracy_relax]])--}}
            <div class="ui inverted segment" >
                <h1>Best Scores</h1>
                <div style="height:30em;overflow-x: scroll;">
                    <table class="ui celled striped table" id="std_scores" data-loaded-scores="10">
                        <tbody>
                        @foreach($user_scores as $score)
                            <tr>
                                <td>{{ $score->id }}</td>
                                <td>{{ $score->max_combo }}</td>
                                <td>{{ $score->pp }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <button class="ui button green loadMoreScores" id="user-add_more" data-user-id="{{$user->id}}">Load more</button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/user/main.js')}}"></script>
@endsection
