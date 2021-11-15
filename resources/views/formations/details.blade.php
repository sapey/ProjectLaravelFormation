@extends('layout')

@section('content')

    <div class="container">

        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id === $formation->user_id || \Illuminate\Support\Facades\Auth::user()->id === 3)
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{route('formationUpdate', $formation->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" class="form-control" name="title" required value="{{$formation->title}}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5" required>{{$formation->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" required value="{{$formation->type}}">
                        </div>

                        <div class="form-group">
                            <label>Prix</label>
                            <input type="text" class="form-control" name="price" required value="{{$formation->price}}">
                        </div>

                        <div>

                            @foreach($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="check-{{$category->id}}"
                                           name="checkboxCategories[{{$category->id}}]"
                                           value="{{$category->id}}"
                                    @if($formation->categories->contains('id', $category->id))  checked @endif>
                                    <label for="check-{{$category->id}}" class="form-check-label">{{$category->name}}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>Cours</label>
                            <textarea name="cours" class="form-control" rows="5" required>{{$formation->cours}}</textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>

                    <p>Crée le {{$formation->created_at->format('d/m/Y')}}</p>
                    <p>Ecrit par {{$formation->user->firstname}}</p>
                </div>
                <div class="col-md-6">
                    <form method="post" action="{{route('formationUpdatePicture', $formation->id)}}"
                    enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Modifier l'image</label>
                            <input type="file" name="picture" required class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier l'image</button>
                    </form>
                </div>
            </div>

            <div class="d-flex">
                <a href="{{route('formationList')}}"
                   class="btn btn-primary">Retour à la liste des formations</a>

                <form method="post" action="{{route('formationDelete', $formation->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        @else
            <h1>{{$formation->title}}</h1>
            <p>Description : {{$formation->description}}</p>
            <p>Type : {{$formation->type}}</p>
            <p>Prix : {{$formation->price}}$</p>
            <div>
                <ul><b>Catégorie :</b> </ul>
                @foreach($categories as $category)
                    <li>{{$category->name}}</li>
                @endforeach
            </div>
            </br>
            <ul><b>Cours</b></ul>
            <li>{{$formation->cours}}</li>
            <a href="{{route('formationList')}}"
               class="btn btn-primary">Retour à la liste des formations</a>

        @endif


    </div>

@endsection
