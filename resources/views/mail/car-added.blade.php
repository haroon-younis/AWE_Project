@component('mail::message')
# You have added a new car: {{ $car->make }} {{ $car->model }}

You have added a new car to the 'My cars' section of the website, this is the descripton of your car: <br>
{{$car->description}}

@component('mail::button', ['url' => url('/cars/'. $car->id)])
View Your Car
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
