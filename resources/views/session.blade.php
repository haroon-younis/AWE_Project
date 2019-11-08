@if(session('added')) <!-- Adding a new car alert -->
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Successfully added</h4>
        <p>{{session('added')}}</p>
    </div>
@endif

@if(session('edited')) <!-- Editing a existing car alert -->
    <div class="alert alert-info" role="alert">
      <h4 class="alert-heading">Successfully edited</h4>
        <p>{{session('edited')}}</p>
    </div>    
@endif

@if(session('deleted')) <!-- Deleting a existing car alert -->
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Removed car</h4>
        <p>{{session('deleted')}}</p>
    </div>
@endif

@if(session('todo')) <!-- Adding a todo alert -->
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Successfully added</h4>
        <p>{{session('todo')}}</p>
    </div>
@endif

@if(session('completed')) <!-- Completing a todo alert -->
    <div class="alert alert-secondary" role="alert">
      <h4 class="alert-heading">Completed!</h4>
        <p>{{session('completed')}}</p>
    </div>
@endif