<template>
    <div class="m-0">
        <div v-for="qr in qrs">
                <img  v-bind:src="'data:image/png;base64,'+qr" alt="">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            qrs: [],
        }
    },
    methods: {
        startqr: function(){
            var id = setInterval(()=>{
                axios.get("/get-qr").then(response =>(this.qrs = response.data));
            },15000)
        },
    },
     beforeDestroy() {
        clearInterval(this.id);
    },
    created() {
        this.startqr()        
    },
   
}
</script>
