<x-mail::message>

	<h1>Contact Form Request</h1> <br>
	<p>Name : {{$request['name']}} </p> <br>
	<p>Surname : {{$request['last_name']}} </p> <br>
	<p>Email : {{$request['email']}} </p> <br>
	<p>{{$request['message']}}</p> <br>
</x-mail::message>
