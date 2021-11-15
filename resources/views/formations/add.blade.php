@extends('layout')

@section('content')

    <div class="container">

        <h1>Ajouter une nouvelle formation</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{route('formationStore')}}" enctype="multipart/form-data">
            @csrf
           <div class="form-group">
               <label>Titre</label>
               <input type="text" class="form-control" name="title" required>
           </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label>Type</label>
                <input type="text" class="form-control" name="type" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" required>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="picture" required accept="image/png, image/jpeg, image/jpg" class="form-control">
            </div>

            <label>Catégorie</label>
            <div>
                @foreach($categories as $category)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="check-{{$category->id}}"
                               name="checkboxCategories[{{$category->id}}]"
                               value="{{$category->id}}">
                        <label for="check-{{$category->id}}" class="form-check-label">{{$category->name}}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label>Cours</label>
                <textarea name="cours" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Formation</button>

        </form>

        <a href="{{route('formationList')}}"
           class="btn btn-primary">Annuler</a>

    </div>

@endsection
