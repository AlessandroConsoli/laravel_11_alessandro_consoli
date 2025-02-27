<x-layout>
    
    <x-header>
        <h1 class="mt-5">Modifica il tuo articolo</h1>
    </x-header>
    
    
    <div class="container-fluid bg-custom pt-5">
        <x-display-errors/>
        <x-display-messages/>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h3 class="text-center">Oppure</h3>
                <div class="justify-content-center">
                    <div class="d-flex justify-content-center mb-5">
                        <a href="{{route('welcome')}}" class="btn btn-secondary btn-lg mt-2" role="button" aria-disabled="true">Torna alla Home</a>
                    </div>
                </div>
                <form
                class="shadow rounded-2"
                action="{{route('article.update',compact('article'))}}"
                method="POST"
                enctype="multipart/form-data"
                >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Modifica il Titolo</label>
                    <input type="text" name="title" value="{{$article->title}}" class="form-control" id="title" aria-describedby="emailHelp">
                </div>
                
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Modifica il Sottotitolo</label>
                    <input type="text" name="subtitle" value="{{$article->subtitle}}" class="form-control" id="subtitle">
                </div>
                
                <div class="mb-3">
                    <label for="body" class="form-label">Modifica il Corpo dell'articolo</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="5">
                        {{$article->body}}
                    </textarea>
                </div>

                <div class="mb-3">
                    @foreach ($tags as $tag)                        
                    <div class="form-check">
                        <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="flexCheckDefault" 
                        @if ($article->tags->contains($tag)) checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$tag->name}}
                        </label>
                    </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <span class="form-label">Immagine attuale</span>
                    <img src="{{Storage::url($article->img)}}" alt="{{$article->title}}" width="100">
                </div>
                
                <div class="mb-3">
                    <label for="img" class="form-label">Cambia immagine (facoltativo)</label>
                    <input type="file" name="img" value="{{$article->img}}" class="form-control" id="img">
                </div>
                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-secondary px-4">Conferma le modifiche</button>
                </div>
            </form>
        </div>
    </div>
</div>




</x-layout>