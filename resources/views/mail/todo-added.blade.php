@component('mail::message')
# You have added a new TODO item for your car!

You have added a new car to the 'My cars' section of the website, this is the descripton of your car: <br>

@component('mail::button', ['url' => url('/cars/')])
View Your Todo for your car
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
