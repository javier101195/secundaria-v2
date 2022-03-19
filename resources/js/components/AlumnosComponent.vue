<template>
    <div>
        <h1 class="text-center">Alumnos</h1>
        <hr>

        
        <form>
            <div class="form-group my-4">
                <label for="m">Selecciona un alumno</label>
                <select v-model="eleccion.alu" class="form-control" id="" @change="get_sectores">
                    <option v-for="user in usuarios" :key="user.id" :value="user.id">{{user.name}}</option>
                    
                </select>
            </div>

        </form>     

        <table class="table table-borderless align-middle">
            <thead class="table-dark ">
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">Alumnos</th>
                  <th scope="col"># Materias</th>
                  <th scope="col"># Creditos</th>
                  <th scope="col">Cargar materia</th>
                </tr>
            </thead>
            <tbody>
                <tr for="users">
                    <!-- <th scope="row">{{mtr.id}}</th> -->
                    <td>{{m[0]}}</td>
                    <td>{{m[1]}}</td> 
                    <td>{{m[2]}}</td>
                    <td>

                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cargar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Materias</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>                                
                                <div v-for="mtr in lista" :key="mtr.id" class="form-check"> 
                                                                       
                                    <label class="form-check-label" for="flexCheckChecked">
                                        {{mtr.mat_nombre}}                                       
                                        <div>
                                            Creditos de la materia: {{mtr.creditos}}
                                        </div>                                        
                                    </label>
                                    <input @click="checkFluency(mtr.ca_id)" class="form-check-input" type="checkbox" value="mtr.ca_id" id="flexCheckChecked" checked> 
                               
                                </div>

                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                           
                                <div v-for="mtr in listaN" :key="mtr.id" class="form-check">

                                    
                                    <label class="form-check-label" for="flexCheckDefault" >
                                        {{mtr.mat_nombre}}
                                        <div>
                                            Creditos de la materia: {{mtr.creditos}}                                           
                                            
                                        </div>
                                    </label>
                                    <input @click="guardar(mtr.id)" class="form-check-input" type="checkbox" value="mtr.id" id="flexCheckDefault">
                                    
                                </div> 
                                             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>                   
                    
                    </td>
                </tr>
            </tbody>
        </table>        
    </div>
</template>

<script>


export default {

    props: ['h',
            'usuarios'],
    data() {
        return{
            alumSelec: {
                user_id:'',
                materia_id:'',
            },
            eleccion:{
                alu:'',

            },
            arreglo:[{
                user_id:'',
            }],
            m:'',
            lista:'',
            listaN:'',
            users:[],               

        }
    },
    methods:{

        async guardar(valor){
            if(valor != null){
                this.alumSelec.user_id=this.eleccion.alu;
                this.alumSelec.materia_id=valor;
                const res3=await axios.post('/carga_academica',this.alumSelec);
            }
            this.get_sectores();
        },

        async checkFluency(id)        
            {               
                if(id != null){                    
                    const res=await axios.delete('/carga_academica/'+id);
                }
                this.get_sectores();                
            },

        get_sectores: async function(){
                try{                    
                    let response = await axios.get('consul/'+this.eleccion.alu);
                    let responseMat = await axios.get('listaMaterias/'+this.eleccion.alu);
                    let responseMatNo = await axios.get('listaMateriasNo/'+this.eleccion.alu);
                    this.m=response.data;
                    this.lista=responseMat.data;
                    this.listaN=responseMatNo.data;
                    console.log(m);
                    console.log(lista);
                    console.log(listaN);                    
                }catch(error){

                }
            },
        
    },

    created(){
        console.log(this.h);
        console.log(this.usuarios);
    },        
}
</script>
