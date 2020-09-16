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
                <div class="ui equal width grid container">
                    <div class="column" style="word-wrap: break-word">
                            @if($user->stats->userpage_content)
                                @markdown($user->stats->userpage_content)
                            @else
                                @markdown('## This user didn\'t provide his bio')
                            @endif
                    </div>
                </div>
            </div>

            <div class="ui top attached tabular menu" style="background: rgba(0,0,0, 0); text-align: center">
                <a class="item"  data-tab="Standard">Standard</a>
                <a class="item" data-tab="Taiko">Taiko</a>
                <a class="item" data-tab="Mania">Mania</a>
            </div>
            <div class="ui top attached tabular menu" style="background: rgba(0,0,0, 0); margin-top: 0;">
                <a class="item"  data-tab="Relax">Relax</a>
                <a class="item" data-tab="Autopilot">Autopilot</a>
            </div>
            <div class="ui bottom attached inverted active tab segment" data-tab="Standard">
                <div class="ui equal width stackable centered grid  container">

                        <div class="column" style="word-wrap: break-word">1</div>
                        <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaa</div>
                        <div class=" column" style="word-wrap: break-word">
                            <div class="ui centered inverted segment">
                                <div class="ui inverted middle aligned divided list">
                                    <div class="item">
                                        <div class="right floated content">
                                            #1
                                        </div>
                                        <div class="content">
                                            Overall rank
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                        </div>
                                        <div class="content">
                                            Country rank
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                            {{$user->stats->pp_std}}
                                        </div>
                                        <div class="content">
                                            PP
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                            {{$user->stats->ranked_score_std}}
                                        </div>
                                        <div class="content">
                                            Ranking score
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                            {{$user->stats->total_score_std}}
                                        </div>
                                        <div class="content">
                                            Overall score
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                            {{$user->stats->playcount_std}}
                                        </div>
                                        <div class="content">
                                            Playcount
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">

                                        </div>
                                        <div class="content">
                                            Max combo
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">

                                        </div>
                                        <div class="content">
                                            Followers
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                            {{$user->stats->replays_watched_std}}
                                        </div>
                                        <div class="content">
                                            Replays watched
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                            {{$user->stats->total_hits_std}}
                                        </div>
                                        <div class="content">
                                            Overall hits
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="right floated content">
                                            {{$user->stats->avg_accuracy_std}}
                                        </div>
                                        <div class="content">
                                            Accuracy
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="ui bottom attached tab inverted segment" data-tab="Taiko">
                <div class="ui equal width grid  container">

                    <div class="column" style="word-wrap: break-word">2</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaa</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                </div>
            </div>
            <div class="ui bottom attached tab inverted segment" data-tab="Mania">
                <div class="ui equal width grid  container">

                    <div class="column" style="word-wrap: break-word">3</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaa</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                </div>
            </div>
            <div class="ui bottom attached tab inverted segment" data-tab="Relax">
                <div class="ui equal width grid container">

                    <div class="column" style="word-wrap: break-word">4</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaa</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                </div>
            </div>
            <div class="ui bottom attached tab inverted segment" data-tab="Autopilot">
                <div class="ui equal width grid container">

                    <div class="column" style="word-wrap: break-word">5</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaa</div>
                    <div class=" column" style="word-wrap: break-word">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
<script>
    $.ajax({
        url: 'http://kurosu_new.local/beta_keys/ajax/get_key',
        type: 'GET',
        success: function(response) {


            console.log(response)
        }
    });
    $('.tabular.menu .item').tab();
</script>
@endsection
