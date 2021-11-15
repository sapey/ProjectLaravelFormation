<div class="banner">

    @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('formationAdd')}}" class="btn btn-primary">Ajouter une formation</a>
    @endif
    <h1>{{$title}}</h1>

</div>
