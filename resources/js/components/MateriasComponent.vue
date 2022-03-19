<template>
    <div>
        <h1 class="text-center">Materias</h1>
        <hr>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Registrar Materia
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registra una materia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                        
                            <div class="form-group my-4">
                                <label for="exampleFormControlInput1">Nombre de la materia</label>
                                <input v-model="materia.nombre" name='nombre' type="text" class="form-control" id="nombre" placeholder="Español">
                                <div class="alert alert-danger" v-if="errores.nombre">
                                    {{errores.nombre[0]}}
                                </div>
                            </div>
                            <div class="form-group my-4">
                                <label for="exampleFormControlInput1">Semestre</label>
                                <input v-model="materia.semestre" name="semestre" type="number" class="form-control" id="semestre" placeholder="1">
                                <div class="alert alert-danger" v-if="errores.semestre">
                                    {{errores.semestre[0]}}
                                </div>
                            </div>
                            <div class="form-group my-4">
                                <label for="exampleFormControlInput1">No. Creditos</label>
                                <input v-model="materia.creditos" name="creditos" type="number" class="form-control" id="creditos" placeholder="1" max="5">
                                <div class="alert alert-danger" v-if="errores.creditos">
                                    {{errores.creditos[0]}}
                                </div>
                            </div>
                            <div class="form-group my-4">
                                <label for="maestro">Selecciona un maestro</label>
                                <select v-model="materia.maestro_id" class="form-control" id="maestro" >
                                    <option name="maestro_id" v-for="maestro in maestros" :key="maestro.id" :value="maestro.id">{{maestro.nombre}}</option>
                                </select>
                                <div class="alert alert-danger" v-if="errores.maestro_id">
                                    {{errores.maestro_id[0]}}
                                </div>
                            </div>
                        </form>                
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button @click="guardar" class="btn btn-primary" data-bs-dismiss="modal" type="submit">Guardar</button>
                        
                    </div>
                </div>
            </div>
        </div>       

        <form>
            <div class="form-group my-4">
                <label for="m">Selecciona un maestro</label>
                <select v-model="maestroSelec.seleccionado" class="form-control" @change="get_sectores">
                    <option v-for="m in maestros" :key="m.id" :value="m.id">{{m.nombre}}</option>
                </select>
            </div>

        </form>       

        <table class="table table-borderless align-middle" id="materi">
            <thead class="table-dark ">
                <tr>
                  <th scope="col">Materia</th>
                  <th scope="col">Semestre</th>
                  <th scope="col">Creditos</th>
                  <th scope="col">Maestro</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="mtr in array" :key="mtr.id" for="maestro">
                    <td>{{mtr.MatNombre}}</td>
                    <td>{{mtr.semestre}}</td> 
                    <td>{{mtr.creditos}}</td>
                    <td>{{mtr.MaesNombre}}</td>
                </tr>
            </tbody>
        </table>        
    </div>
</template>

<script>


export default {
    
    data() {
        return{
            materia:{                
                nombre:null,
                semestre:null,
                creditos:null,
                maestro_id:null,                
            },
            errores: {},
            maestroSelec: {
                seleccionado:'',
            },
            array:'',         
            materias:[],
            maestros:[],        
        }
    },


    methods:{
        async listar(){
            const res=await axios.get('materias')
            this.materias=res.data;           
        },
        async listar2(){
            const resultado=await axios.get('maestros')
            this.maestros=resultado.data;
        },

        get_sectores: async function(){
                try{
                    let response = await axios.get('consulta/'+this.maestroSelec.seleccionado);
                    this.array=response.data;                  
                    console.log(array);
                }catch(error){
                }
            },

        async guardar(){
            try{
                const res3=await axios.post('/materias',this.materia);
                alert("Registro exitoso");
            } catch(error) {
                if(error.response.data){
                    this.errores=error.response.data.errors;
                    window.alert("No se pudo registrar la materia verifica los campos");
                }               
            }                             
        }, 
    },

    created(){
        this.listar();
        this.listar2();
    },    
}
</script>
