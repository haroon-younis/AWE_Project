@component('mail::message')
# You have added a new car: {{ $car->model }}

You have added a new car to the 'My cars' section of the website

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
