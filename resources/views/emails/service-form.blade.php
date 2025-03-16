<x-mail::message>
	
	<h1>Servis Talep Formu</h1> <br>
	<p>Name Surname : {{$request['name']}} </p> <br>
	<p>Email : {{$request['email']}} </p> <br>
	<p>Phone Number : {{$request['country_code']}} {{$request['phone_number']}} </p> <br>
	<p>{{$request['message']}}</p> <br>
	
</x-mail::message>
