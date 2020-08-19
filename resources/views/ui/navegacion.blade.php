<div class="mx-auto text-center bg-light p-3 w-50 shadow">
    
    <a href="{{ route('recetas.create') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg viewBox="0 0 20 20" fill="currentColor" class="document-add w-6 h-6 icono"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"></path></svg>
        Crear Receta
    </a>
    
    <a href="{{ route('perfils.edit', auth()->user()->perfil) }}" class="btn btn-outline-warning mr-2 text-uppercase font-weight-bold">
        <svg viewBox="0 0 20 20" fill="currentColor" class="pencil w-6 h-6 icono"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
        Editar Perfil
    </a>
    
    <a href="{{ route('perfils.show', auth()->user()->perfil) }}" class="btn btn-outline-info mr-2 text-uppercase font-weight-bold">
        <svg viewBox="0 0 20 20" fill="currentColor" class="user w-6 h-6 icono"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
        Ver Perfil
    </a>

</div>
