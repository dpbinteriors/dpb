<x-mail::message>

    <h1>İnsan Kaynakları Başvuru Formu</h1> <br>
    <p>Name Surname : {{ $request['name'] }} </p> <br>
    <p>Email : {{ $request['email'] }} </p> <br>
    <p>Phone : {{ $request['country_code'] }} {{ $request['phone_number'] }} </p> <br>
    <p>{{$request['message']}}</p> <br>
</x-mail::message>
