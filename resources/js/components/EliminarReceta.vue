<template>
    <button
        type="submit"
        class="btn btn-danger"
        @click="eliminarReceta"
    >Eliminar
    </button>
</template>

<script>
export default {
    props: [
        'recetaId'
    ],
    methods: {
        eliminarReceta(){
            this.$swal({
                title: '¿Deseas eliminar ésta receta?',
                text: "Una vez eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if(result.value){

                    // Make delete petition to server
    
                    // params for the petition
                    const params = {
                        id: this.recetaId,
                    }
    
                    axios.post(`/recetas/${this.recetaId}`, {params, _method:'delete'})
                        .then(response => {
                            
                            this.$swal({
                                title: 'Receta Eliminada',
                                text: 'Se eliminó la receta',
                                icon: 'success',
                            })

                            // Remove recipe from the DOM
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {
                            console.log(error)
                        })
    
                }
            })
        }
    },
}
</script>