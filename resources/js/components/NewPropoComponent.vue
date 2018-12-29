<template>

    <section id="content">

        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h2>Cotizaciones
                        <small>Agregar cotización.
                        </small>
                    </h2>
                </div>

                <div class="alert alert-danger alert-dismissible" role="alert" v-if="errors.length>0" v-for="error in errors">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>


                    {{error.des}}

                </div>


                <div class="card-body card-padding">

                    <form action="" method="POST" @submit.prevent="submit" >

                        <input type="hidden" name="_token" :value="csrf">

                        <div class="row">

                            <div class="col-lg-7">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <div class="select">
                                            <select class="selectpicker" data-live-search="true" v-model="selectedClient" @change="getData" :style="{borderColor: selectedClientColor}" >
                                                <option value="-1">Seleccionar Cliente</option>
                                                <option v-for="client in clients" :value="client.id">{{client.description}}</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-5">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <div class="select">
                                            <select class="form-control" v-model="selectedContact" :style="{borderColor: selectedContactColor}" >
                                                <option value="-1"> Seleccionar Contacto</option>
                                                <option v-for="contact in contacts" :value="contact.id">{{contact.name}}</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-9">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <div class="select">
                                            <select class="form-control" v-model="selectedAddress" :style="{borderColor: selectedAddressColor}">
                                                <option value="-1">Seleccionar Local</option>
                                                <option v-for="address in addresses" :value="address.id">{{address.address}}</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control input-sm" placeholder="Validez de oferta"  v-model="offerValidity" :style="{borderColor: offerValidityColor}">
                                    </div>
                                </div>


                            </div>



                        </div>

                        <div class="row">

                            <div class="col-lg-3">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control input-sm" placeholder="Forma de pago"  v-model="wayToPay" :style="{borderColor: wayToPayColor}" >
                                    </div>
                                </div>


                            </div>



                            <div class="col-lg-6">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control input-sm" placeholder="Lugar de entrega"  v-model="placeDelivery" :style="{borderColor: placeDeliveryColor}" >
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-3">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <div class="select">
                                            <select class="form-control" v-model="selectedCurrency" :style="{borderColor: selectedCurrencyColor}">
                                                <option value="-1">Seleccionar Moneda</option>
                                                <option value="Soles">Soles</option>
                                                <option value="Dólares">Dólares</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!--Productss-->
                        <div>

                            <p class="c-black f-500 m-b-5 m-t-20">Productos</p>

                            <div class="row m-t-15">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <div class="select">
                                                <select class="selectpicker" data-live-search="true" v-model="selectedProduct">
                                                    <option value="-1">Seleccionar Producto</option>
                                                    <option v-for="product in products" :value="product.id">{{product.description+ '-' + product.sku}}</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-lg-2">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="number" class="form-control input-sm" placeholder="Precio"  v-model="price" >
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-2">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="number" class="form-control input-sm" placeholder="Cantidad"  v-model="quantity" >
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-2">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="number" class="form-control input-sm" placeholder="Garantía"  v-model="warranty" >
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="row">

                                <div class="col-lg-3">

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="number" class="form-control input-sm" placeholder="Plazo de entrega"  v-model="term" >
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-2">

                                    <div >
                                        <button class="btn" type="button"  v-on:click="addProduct">Agregar</button>
                                    </div>

                                </div>



                            </div>

                            <div class="row">

                                <div class="table-responsive">
                                    <table id="data-table-basic_1" class="table table-striped">
                                        <thead>
                                        <tr>


                                            <th  data-column-id="name" scope="col">Descripción</th>
                                            <th  data-column-id="portion" scope="col">Warranty</th>
                                            <th  data-column-id="portion" scope="col">PE</th>
                                            <th  data-column-id="portion" scope="col">Precio</th>
                                            <th  data-column-id="portion" scope="col">Cantidad</th>
                                            <th  data-column-id="portion" scope="col">Total</th>

                                            <th  data-column-id="id" scope="col"> Eliminar </th>


                                        </tr>
                                        </thead>
                                        <tbody>


                                        <tr v-for="product in productsSelectedShow">

                                            <td scope="row">{{product.des}}</td>
                                            <td scope="row">{{product.warranty}}</td>
                                            <td scope="row">{{product.term}}</td>
                                            <td scope="row">{{product.price}}</td>
                                            <td scope="row">{{product.quantity}}</td>
                                            <td scope="row">{{product.total}}</td>

                                            <td><button class="btn btn-icon command-edit waves-effect waves-circle"
                                                        onclick="window.location.href=''" ><span class="zmdi zmdi-delete"></span></button></td>

                                        </tr>

                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="highlight">{{totalFinal}}</td>
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

    export default {

        props: ['clients','products','route'],

        data() {

            return {

                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                selectedContact: '-1',

                selectedAddress: '-1',

                selectedClient: '-1',

                selectedProduct: -1,

                selectedCurrency: -1,

                errors: [],

                offerValidity: '',

                wayToPay : '',

                placeDelivery : 'Donde indique dentro de lima metropolitana.',

                price: '',

                quantity: '',

                warranty: '',

                term: '',

                contacts: [],

                addresses: [],

                productsSelected: [],

                productsSelectedShow: [],

                totalFinal: 0,


                //Validate

                selectedContactColor: '',
                selectedAddressColor : '',
                selectedClientColor: '',
                offerValidityColor: '',
                wayToPayColor:'',
                placeDeliveryColor: '',
                selectedCurrencyColor: ''



            }

        },

        mounted() {



        },

        methods: {

            getData : function () {
                var url = 'contacts' + "/" + this.selectedClient;
                axios.get(url).then(response => {
                    this.contacts = response.data

                });

                var url = 'addresses' + "/" + this.selectedClient;
                axios.get(url).then(response => {
                    this.addresses = response.data

                });
            },

            addProduct: function () {

                this.productsSelected.push({

                    product_id: this.selectedProduct,
                    price: this.price,
                    quantity: this.quantity,
                    warranty: this.warranty,
                    term: this.term,
                    state: 1



                });

                let $des="";

                for( let product in this.products){


                    if(this.products[product].id===this.selectedProduct){
                        $des = this.products[product].description +"-" + this.products[product].sku;
                    }
                }


                this.productsSelectedShow.push({

                    des: $des,
                    price: this.price,
                    quantity: this.quantity,
                    total: Math.round(this.price*this.quantity*1.18*100)/100 ,
                    warranty: this.warranty,
                    term: this.term,


                });

                this.totalFinal = Math.round(this.price*this.quantity*1.18*100)/100 + this.totalFinal;


                this.warranty="";
                this.quantity="";
                this.price="";
                this.term="";
                this.selectedProduct='-1';



            },

            submit: function () {

                this.errors = [];

                this.selectedClientColor='';
                this.selectedContactColor='';
                this.selectedAddressColor='';
                this.offerValidityColor='';
                this.wayToPayColor='';
                this.placeDeliveryColor='';
                this.selectedCurrencyColor= '';


                if(this.selectedClient==='-1'){
                    this.selectedClientColor='red';
                }
                else if(this.selectedContact==='-1'){
                    this.selectedContactColor='red';
                }
                else if(this.selectedAddress==='-1'){
                    this.selectedAddressColor='red';
                }
                else if(this.offerValidity.length===0){
                    this.offerValidityColor='red';
                }
                else if(this.wayToPay.length===0){
                    this.wayToPayColor='red';
                }
                else if(this.placeDelivery.length===0){
                    this.placeDeliveryColor='red';
                }
                else if(this.selectedCurrency==='-1'){
                    this.selectedCurrencyColor='red';
                }
                else if(this.productsSelected.length===0){

                    this.errors.push({
                        des: 'Debes agregar productos.'
                    });

                }

                else {

                    axios.post(this.route, {
                        _token: this.csrf,
                        offer_validity: this.offerValidity,
                        way_to_pay: this.wayToPay,
                        place_delivery: this.placeDelivery,
                        currency: this.selectedCurrency,
                        total: this.totalFinal,
                        user_id: 1,
                        client_id: this.selectedClient,
                        contact_id: this.selectedContact,
                        address_id: this.selectedAddress,
                        products:  this.productsSelected


                    }).then(function (response) {
                        if (response.data === 'ok') {

                                notify('Cotización creada correctamente', "inverse");

                                window.location.href = '/admin/cotizaciones';


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