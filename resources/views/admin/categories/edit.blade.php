@extends('layouts.admin')

@section('content')

<div class="catEditGeneral">
    <div>
        <h1>Categorie aanpassen</h1>
        <form method="POST" action="/app/Http/Controllers/Admin/CategoryController.php">

        </form>
    </div>
    <div>
        <h1>Producten</h1>
        <ul>
            @foreach($category->products as $product)
                <li>{{$product['title']}}</li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
