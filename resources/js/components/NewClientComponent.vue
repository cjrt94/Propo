<template>

    <section id="content">

        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h2>Cliente
                        <small>Agregar cliente.
                        </small>
                    </h2>
                </div>

                <div class="alert alert-danger alert-dismissible" role="alert" v-if="errors.length>0" v-for="error in errors">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>


                         {{error.des}}

                 </div>

                    <div class="card-body card-padding" >

                        <form action="" method="POST" @submit.prevent="submit" >

                            <input type="hidden" name="_token" :value="csrf">

                            <div class="row">

                                <div class="col-lg-7">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-sm" placeholder="Razón Social / Nombre" v-model="description" required>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-2">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-sm" placeholder="Documento" name="document_client"  v-model="document" required>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-3">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <div class="select">
                                                <select class="form-control" v-model="typeDocument">
                                                    <option>Seleccionar documento</option>
                                                    <option>RUC</option>
                                                    <option>DNI</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                              <div>

                                <br/>
                                <p class="c-black f-500 m-b-5 m-t-20">Contactos</p>

                                <div class="row m-t-15">

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <input type="text" class="form-control input-sm" placeholder="Nombre"  :style="{borderColor: nameContactColor}" v-model="nameContact">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <input type="email" class="form-control input-sm" placeholder="Email" :style="{borderColor: emailContactColor}" v-model="emailContact">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <input type="number" class="form-control input-sm" placeholder="Telefono" :style="{borderColor: phoneContactColor}" v-model="phoneContact">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div >

                                            <button class="btn" type="button" v-on:click="addContact">Agregar</button>
                                        </div>

                                    </div>



                                </div>

                                <div class="row">

                                    <div class="table-responsive">
                                        <table id="data-table-basic_1" class="table table-striped">
                                            <thead>
                                            <tr>

                                                <th  data-column-id="id" scope="col">#</th>
                                                <th  data-column-id="name" scope="col">Nombre</th>
                                                <th  data-column-id="portion" scope="col">Email</th>
                                                <th  data-column-id="portion" scope="col">Telefono</th>
                                                <th  data-column-id="id" scope="col"> Eliminar </th>


                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr v-for="(contact, index) in contacts">
                                                <td scope="row">{{contact.id}}</td>
                                                <td scope="row">{{contact.name}}</td>
                                                <td >{{contact.email}}</td>
                                                <td >{{contact.phone}}</td>
                                                <td><button class="btn btn-icon command-edit waves-effect waves-circle"
                                                            onclick="window.location.href=''" ><span class="zmdi zmdi-delete"></span></button></td>


                                            </tr>

                                            </tbody>


                                        </table>



                                    </div>

                                </div>



                            </div>

                            <div>

                                <br/>
                                <p class="c-black f-500 m-b-5 m-t-20">Locales</p>

                                <div class="row m-t-15">

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <input type="text" class="form-control input-sm" placeholder="Dirección" v-model="address_1" :style="{borderColor:address_1Color}" >
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <input type="text" class="form-control input-sm" placeholder="Referencia"  v-model="reference" :style="{borderColor:referenceColor}">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <input type="text" class="form-control input-sm" placeholder="Email"  v-model="email" :style="{borderColor:emailColor}">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <input type="number" class="form-control input-sm" placeholder="Telefono"   v-model="phone" :style="{borderColor:phoneColor}">
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <div class="select">
                                                    <select v-model="selectedDep" class="form-control"   @change="getProvinces">
                                                        <option value="-1">Selecciona departamento</option>

                                                        <option v-for="department in departments" :value=department.id>{{department.name}}</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <div class="select">
                                                    <select v-model="selectedPro" class="form-control" @change="getDistricts">
                                                        <option value="-1">Selecciona provincia</option>
                                                         <option v-for="province in provinces" :value=province.id > {{province.name}}</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <div class="fg-line">
                                                <div class="select">
                                                    <select v-model="selectedDis" class="form-control" >
                                                        <option value="-1">Selecciona distrito</option>
                                                        <option v-for="district in districts"  :value=district.id>{{district.name}}</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-3">

                                        <div >

                                            <button class="btn" type="button" v-on:click="addAdresses">Agregar</button>

                                        </div>

                                    </div>



                                </div>

                                <div class="row">

                                    <div class="table-responsive">
                                        <table id="data-table-basic" class="table table-striped" >
                                            <thead>
                                            <tr>

                                                <th  data-column-id="id" scope="col">#</th>
                                                <th  data-column-id="name" scope="col">Dirección</th>
                                                <th  data-column-id="email" scope="col">Email</th>
                                                <th  data-column-id="phone" scope="col">Telefono</th>
                                                <th  data-column-id="reference" scope="col">Referencia</th>
                                                <th  data-column-id="delete" scope="col"> Eliminar </th>


                                            </tr>
                                            </thead>
                                            <tbody>


                                                <tr v-for="address in addresses">
                                                    <td scope="row">{{address.id}}</td>
                                                    <td >{{address.address}}</td>
                                                    <td >{{address.email}} </td>
                                                    <td >{{address.phone}}</td>
                                                    <td >{{address.reference}}</td>
                                                    <td><button class="btn btn-icon command-edit waves-effect waves-circle"
                                                                onclick="window.location.href=''" ><span class="zmdi zmdi-delete"></span></button></td>


                                                </tr>


                                            </tbody>


                                        </table>



                                    </div>

                                </div>



                            </div>

                            <div class="text-right">

                                <button type="submit" class="btn btn-danger" >Crear</button>

                            </div>

                        </form>

                    </div>



            </div>

        </div>


    </section>


</template>

<script>
    import swal from 'sweetalert';

    export default {

        props: ['departments','route'],

        data() {

            return {

                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                //Addresses
                addresses: [],
                address_1 : '',
                email : '',
                phone : '',
                reference : '',
                provinces: [],
                districts: [],
                selectedDep : '-1',
                selectedPro : '-1',
                selectedDis: '-1',

                address_1Color: '',
                emailColor: '',
                phoneColor: '',
                referenceColor:'',

                //Contacts

                contacts: [],
                nameContact: '',
                emailContact: '',
                phoneContact: '',

                nameContactColor: '',
                emailContactColor: '',
                phoneContactColor: '',

                description: '',
                document:'',
                typeDocument: '',

                errors: [],
                errorsAddress:[]


            }

        },

        mounted() {


        },

        methods: {

            addAdresses: function(event) {

                this.address_1Color= '';
                this.emailColor='';
                this.phoneColor= '';
                this.referenceColor= '';
                

                if(this.address_1.length===0){

                    this.address_1Color= 'red';

                }

                else if(this.reference.length===0){

                    this.referenceColor= 'red';

                }

                else if(this.email.length===0){

                    this.emailColor='red';

                }

                else if(this.phone.length===0){

                    this.phoneColor= 'red';

                }


                else {


                    this.addresses.push({
                        id: 0,
                        address: this.address_1,
                        phone: this.phone,
                        email: this.email,
                        state: 1,
                        reference: this.reference,
                        district_id: this.selectedDis,
                        province_id: this.selectedPro,
                        department_id: this.selectedDep,


                    });

                    this.address_1 = '';
                    this.email = '';
                    this.phone = '';
                    this.reference = '';

                    this.selectedDep= '-1';
                    this.provinces = [];
                    this.selectedPro = '-1';
                    this.districts = [];
                    this.selectedDis = '-1';


                }

            },

            getProvinces: function (ev) {

                var url = 'provinces' + "/" + this.selectedDep;
                axios.get(url).then(response => {
                    this.provinces = response.data
                    this.selectedPro = '-1';
                    this.districts= [];
                    this.selectedDis= '-1';


                });

            },

            getDistricts: function (ev) {

                var url = 'districts' + "/" + this.selectedPro;
                axios.get(url).then(response => {
                    this.districts = response.data
                    this.selectedDis = '-1';
                });

            },


            addContact: function(event) {

                this.nameContactColor= '';
                this.emailContactColor= '';
                this.phoneContactColor= '';

                if(this.nameContact.length===0){
                    this.nameContactColor='red';
                }

                else if(this.emailContact.length===0){
                    this.emailContactColor= 'red';
                }

                else if(this.phoneContact.length===0){
                    this.phoneContactColor= 'red';
                }

                else {

                    this.contacts.push({
                        id: 0,
                        name : this.nameContact,
                        email : this.emailContact,
                        phone : this.phoneContact,
                        state: 1
                    });

                    this.nameContact="";
                    this.emailContact="";
                    this.phoneContact="";

                }

            },

            submit: function () {

                this.errors = [];

                if(this.contacts.length===0){
                    this.errors.push({
                        des: 'Debes agregar contactos.'
                    });
                }
                if(this.addresses.length===0){
                    this.errors.push({
                        des: 'Debes agregar locales.'
                    });
                }

                else {

                    axios.post(this.route, {
                        _token: this.csrf,
                        description: this.description,
                        document: this.document,
                        type_document: this.typeDocument,
                        contacts: this.contacts,
                        addresses: this.addresses
                    }).then(function (response) {
                        if (response.data === 'ok') {

                            swal("El cliente fue creado correctamente", {
                                buttons: false,
                                timer: 3000,
                            }).then()
                            {
                                window.location.href = '/admin/clientes';
                            }
                            ;

                        }
                    })
                        .catch(function (error) {
                            console.log(error);
                        });

                }
            }



        }

    }





</script>