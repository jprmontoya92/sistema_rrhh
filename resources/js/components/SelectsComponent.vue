<template>

    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="selectEstablishment">Establecimientos:</label>
                <select name="establishment" id="" class="form-control" v-model="establishment" @change="getLocations()">
                    <option value="0">Seleccione Establecimiento</option>
                    <option v-for="data in establishments" :value="data.id">{{data.name}}</option>
                </select>
            </div>
            <div class="col">
                <label for="selectLocation">Ubicación:</label>
                <select name="location" id="" class="form-control" v-model="location">
                    <option value="0">Seleccione lugar</option>
                    <option v-for="data in locations" :value="data.id">{{data.description}}</option>
                </select>
            </div>
        </div>
    
    </div>
</template>


<script>
export default {
    data() {
        return {
            establishment:0,
            establishments:[],
            location: 0,
            locations: []
            }
    },
    methods: {
        getEstablishments: function(){
            axios.get('/get-establishments').then(function(response){
                this.establishments = response.data;
            }.bind(this));
        },
        getLocations: function(){
            axios.post('/get-locations',{
                id: this.establishment
            }).then(function(response){
                this.locations = response.data;
            }.bind(this));
        }
    },

    created: function() {
        this.getEstablishments()
    },
  
}

</script>