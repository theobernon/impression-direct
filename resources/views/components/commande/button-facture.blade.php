@if ($value->facturee === 0)
    <form method="GET" id="[{{$value->noCommande}}]" action="{{route('htmlPdf',['noCommande' => $value->noCommande])}}" >
        <button type="submit" style="border: none;background: none">
            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </button>
    </form>
@else
    <form method="GET" id="{{$value->noCommande}}" action="{{route('htmlPdf',['noCommande' => $value->noCommande])}}" >
        <button type="submit" style="border: none;background: none">
            <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </button>
@endif
