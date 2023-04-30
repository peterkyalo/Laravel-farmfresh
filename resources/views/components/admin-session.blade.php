 {{-- Seesion Alert --}}
 @if (Session::has('message'))
     <div class="alert alert-primary alert-dismissible fade show" role="alert">
         <strong>Hey!</strong> {{ Session::get('message') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif
 {{-- End Message Alert --}}
