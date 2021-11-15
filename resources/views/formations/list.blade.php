@extends('layout')

@section('content')

    @include('components.banner', ['title' => 'La liste des formations'])


    @if(sizeof($formations) > 0)
        <div class="row">
            @foreach($formations as $formation)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset("storage/$formation->picture")}}"
                         style="object-fit: cover" height="200">
                        <div class="card-body">
                            <h5 class="card-title">{{$formation->title}}</h5>
                            <p>{{$formation->description}}</p>
                            <p>{{$formation->type}}</p>
                            <p>{{$formation->price}}</p>
                            <!-- Je ne comprend pas pourquoi ca m'affiche une erreur lorsque je veuc l'afficher-->
                            <!--<p>Ecrit par {{--$formation->user->firstname--}}</p>-->
                            <div>
                                @foreach($formation->categories as $category)
                                    <span>{{$category->name}}</span>
                                @endforeach
                            </div>
                            <div class="d-flex">
                                <a href="{{route('formationDetails', $formation->id)}}"
                                   class="btn btn-primary">Détail</a>
                                {{--@if(\Illuminate\Support\Facades\Auth::check())
                                    <form method="post" action="{{route('formationDelete', $formation->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                @endif
                                --}}
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>



    @else
        <p>Il n'y à aucune formation</p>
    @endif


@endsection
