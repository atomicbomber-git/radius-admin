@if(session("message_text"))
<div class="alert alert-{{ session("message_state") }} my-3">
    {{ session("message_text") }}
</div>
@endif