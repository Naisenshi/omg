<template>
    <div>
        <div v-if="!loading">
            <img class="rounder mx-auto d-block" :src="image" alt="loader">
        </div>
        <div v-else>
            <button @click="createModal" class="btn btn-primary btn-block">Register Now</button>
            <table class="table" v-if="cars">
                <thead>
                    <th scope="col">RegistrationID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Temporary Plate</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </thead>
                <tbody>
                    <tr v-for="(car, index) in cars">
                        <td>{{index + 1}}</td>
                        <td>{{car.name}}</td>
                        <td>{{car.address}}</td>
                        <td>{{car.brand}}</td>
                        <td>{{car.model}}</td>
                        <td>{{car.template}}</td>
                        <td>{{car.weight}}</td>
                        <td><button @click="updateModal(index)" class="btn btn-info">Edit</button></td>
                        <td><button @click="deleteCar(index)" class="btn btn-danger">Delete</button></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog .modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{error}}</li>
                            </ul>
                        </div>
                    <h3 style="text-align: center;"> OWNER INFORMATION</h3><br>
        <br>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input v-model="car.name" type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input v-model="car.address" type="text" id="address" class="form-control">
                        </div>
        </div>
                        <br>
        <h3 style="text-align: center;"> CAR INFORMATION</h3><br>
        <br>

        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="brand">Brand</label>
                            <input v-model="car.brand" type="text" id="address" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="model">Model</label>
                            <input v-model="car.model" type="text" id="model" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="template">Temporary Plate</label>
                            <input v-model="car.template" type="text" id="template" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="weight">Weight</label>
                            <input v-model="car.weight" type="text" id="weight" class="form-control" placeholder="kg">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="createCar" type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        
        </div>
        <!--End of modal-->

        <!-- Modal -->
        <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog .modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{error}}</li>
                            </ul>
                        </div>

                        <h3 style="text-align: center;"> OWNER INFORMATION</h3><br><br>

                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input v-model="new_update_car.name" type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input v-model="new_update_car.address" type="text" id="address" class="form-control">
                        </div>
                        </div>

                        <h3 style="text-align: center;"> OWNER INFORMATION</h3><br><br>

                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="brand">Brand</label>
                            <input v-model="new_update_car.brand" type="text" id="address" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="model">Model</label>
                            <input v-model="new_update_car.model" type="text" id="model" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="template">Temporary Plate</label>
                            <input v-model="new_update_car.template" type="text" id="template" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="weight">Weight</label>
                            <input v-model="new_update_car.weight" type="text" id="weight" class="form-control">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="updateCar" type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        
        </div>
        <!--End of modal-->
    </div>

</template>

<script>
    export default {

        data() {
            return {
                car:{
                    name: '',
                    address: '',
                    brand: '',
                    model: '',
                    class: '',
                    template: '',
                    weight: ''
                },
                cars: [],
                errors: [],
                new_update_car: [],
                uri: 'http://127.0.0.1:8000/cars/',
                image: 'img/loader1.gif',
                loading: false
            }
        },
        methods:{
            createModal(){
                $("#create-modal").modal("show");
            },
            updateModal(index){
                this.errors = [];
                $("#update-modal").modal("show");
                this.new_update_car = this.cars[index];
                
            },
            createCar(){
                axios.post(this.uri, {
                name: this.car.name, 
                address: this.car.address, 
                brand: this.car.brand, 
                model: this.car.model, 
                template: this.car.template, 
                class: this.car.class, 
                weight: this.car.weight
                })
                .then(response=>{
                    this.resetData();
                    this.cars.push(response.data.car);
                    $("#create-modal").modal("hide");
                    toastr.success(response.data.message);
                })
                .catch(error=>{
                    this.errors = [];
                    if (error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if (error.response.data.errors.address){
                        this.errors.push(error.response.data.errors.address[0]);
                    }
                    if (error.response.data.errors.brand){
                        this.errors.push(error.response.data.errors.brand[0]);
                    }
                    if (error.response.data.errors.model){
                        this.errors.push(error.response.data.errors.model[0]);
                    }
                    if (error.response.data.errors.template){
                        this.errors.push(error.response.data.errors.template[0]);
                    }
                    if (error.response.data.errors.class){
                        this.errors.push(error.response.data.errors.class[0]);
                    }
                    if (error.response.data.errors.weight){
                        this.errors.push(error.response.data.errors.weight[0]);
                    }
                })
            },
            updateCar(){
                axios.patch(this.uri + this.new_update_car.id, {
                name: this.new_update_car.name, 
                address: this.new_update_car.address, 
                brand: this.new_update_car.brand, 
                model: this.new_update_car.model, 
                template: this.new_update_car.template, 
                class: this.new_update_car.class, 
                weight: this.new_update_car.weight
                })
                .then(response=>{
                    $("#update-modal").modal("hide");
                    toastr.success(response.data.message);
                })
                .catch(error=>{
                    this.errors = [];
                    if (error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if (error.response.data.errors.address){
                        this.errors.push(error.response.data.errors.address[0]);
                    }
                    if (error.response.data.errors.brand){
                        this.errors.push(error.response.data.errors.brand[0]);
                    }
                    if (error.response.data.errors.model){
                        this.errors.push(error.response.data.errors.model[0]);
                    }
                    if (error.response.data.errors.template){
                        this.errors.push(error.response.data.errors.template[0]);
                    }
                    if (error.response.data.errors.class){
                        this.errors.push(error.response.data.errors.class[0]);
                    }
                    if (error.response.data.errors.weight){
                        this.errors.push(error.response.data.errors.weight[0]);
                    }
                })
            },
            deleteCar(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox == true){
                    axios.delete(this.uri + this.cars[index].id)
                    .then(response=>{
                        this.$delete(this.cars, index);
                        toastr.success(response.data.message);
                    }).catch(error =>{
                        console.log("Could not delete for some reason")
                    });
                }
            },
            loadCar(){
                axios.get(this.uri).then(response => {
                    this.cars = response.data.cars;
                    this.loading = true; 
                });
            },
            resetData() {
                this.car.name = '';
                this.car.address = '';
                this.car.brand = '';
                this.car.model = '';
                this.car.template = '';
                this.car.class = '';
                this.car.weight = '';
            }
        },
        mounted() {
            this.loadCar();
        }
    }
</script>
