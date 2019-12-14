@component('mail::message')
# <h1>You have added a new car</h1> <strong>{{ $car->make }} {{ $car->model }}</strong> <br><br>

You have added a new car to the '<strong>My Cars</strong>' section of the website. 

This is the descripton of your car: <br>

<strong>{{$car->description}}</strong>

@component('mail::button', ['url' => url('/cars/'. $car->id)])
View Your Car
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
