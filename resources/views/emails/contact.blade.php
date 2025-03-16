<x-mail::message>
    <h1>Kullanıcı Sizinle İletişime Geçmek İstiyor:</h1>
    <h2>{{$request->name}}</h2>
    <h3>{{$request->phone}}</h3>
    <h3>{{$request->email}}</h3>
    <h3>{{$request->company}}</h3>
    <p>{{$request->message}}</p>
    <p>Reklam Onayı: {{$request->approve}}</p>
</x-mail::message>
