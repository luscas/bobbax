@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between">
    <div class="col-lg">
        <div class="box">
            <div class="box--title">
                <div class="box--title--text">Equipe</div>
            </div>

            <div class="box--content">
                @foreach ($cargos as $cargo)
                <div class="team">
                    <div class="team--title">{{$cargo->nome}}</div>

                    <div class="team--container">
                        <?php for($i = 0; $i <= 5; $i++): ?>
                        <div class="team--container--base d-flex align-items-center">
                            <div class="team--container--base--image"></div>

                            <div class="team--container--base--infos">
                                <div class="team--container--base--infos--name">Spolle</div>
                                <div class="team--container--base--infos--social" style="margin-top: -2px;">@rgrtorres</div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
