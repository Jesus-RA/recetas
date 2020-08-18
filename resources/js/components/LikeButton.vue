<template>
    <div class="placement">
        <div class="heart" @click="likeReceta" :class=" { 'is-active' : liked } "></div>
        <p>{{ cantidadLikes }} Les gustó esta receta</p>
    </div>
</template>

<script>
export default {
    props: [
        'receta',
        'liked',
        'likes',
    ],
    data(){
        return {
            totalLikes: this.likes,
        }
    },
    methods: {
        likeReceta(totalLikes){

            axios.post('/recetas/'+ this.receta)
                .then(response => {
                    console.log(response)
                    if (response.data.attached.length > 0) {
                        this.liked = true;
                        this.totalLikes++;
                    }else{
                        this.liked = false;
                        this.totalLikes--;
                    }
                })
                .catch(error => {
                    if(error.response.status === 401){
                        window.location = '/login';
                    }
                })
        }
    },
    computed: {
        cantidadLikes(){
            return this.totalLikes;
        }
    }
}
</script>