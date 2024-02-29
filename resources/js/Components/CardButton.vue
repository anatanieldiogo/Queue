<script>
import { Head } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';

export default {
    name: 'CardButton',

    components: {
        Head,
        Modal,
    },
    props:{
        service: Object,
    },
    data(){
      return{
        taller: false,
        open: false,
        queue: {
            service: null,
            letter: null,
            waiting: null,
            code: null,
            date: null,
        },
        loader: false
      }
    },
    methods: {
        toggleHeight: function() {
            this.taller = ! this.taller
        },
        storeQueue: function(id, type){
            this.toggleHeight()
            this.loader = true

            axios.post('/store-queue', {id:id, type:type}, )
                .then(response => {
                    this.loader = false

                    const responseData = response.data;
                    this.queue.waiting = responseData.waiting;
                    this.queue.date = responseData.date;

                    if (type === 'service') {
                        const serviceData = responseData.service;
                        if (serviceData) {
                            this.queue.service = serviceData.service;
                            this.queue.letter = serviceData.letter?.letter || '';
                        }
                    } else {
                        const categoryData = responseData.service;
                        if (categoryData) {
                            this.queue.service = categoryData.category;
                            this.queue.letter = categoryData.service?.letter?.letter || '';
                        }
                    }

                    this.queue.code = this.queue.letter + (this.queue.waiting + 1);
                    this.open = true

            }).catch(err => {
                console.log('error');
                console.log(err.status);
                console.log(err.response.status)
            });
        },

        closeModal: function(){
            this.open = false;
            this.loader = false
        }
    },
  };

</script>

<template>
    <button class="w-80 my-shadow p-2 bg-white flex items-center rounded-full border" v-if="service.categories == '' " @click="storeQueue(service.id, 'service')">
        <div class="my-shadow-in my-bg-blue w-10 h-10 rounded-full text-white text-lg flex justify-center items-center">{{service.letter.letter}}</div>
        <h2 class="ml-2 mr-2 my-text-blue">{{service.service}}</h2>
    </button>
    <div class="w-80 my-shadow  bg-white border my-border overflow-hidden ease-in" v-class="taller" v-else>
        <button class="w-full flex p-2 items-center border-b" @click="toggleHeight()">
            <div class="my-shadow-in my-bg-blue w-10 h-10 rounded-full text-white text-lg flex justify-center items-center">{{service.letter.letter}}</div>
            <h2 class="ml-2 mr-2 my-text-blue">{{service.service}}</h2>
        </button>
        <div v-show="taller">
            <button class="w-full p-2 bg-white hover:bg-gray-100 text-left" v-for="category in service.categories" :key="category.id" @click="storeQueue(category.id, 'category')">
                <h2 class="text-gray-800 ml-12">{{ category.category }}</h2>
            </button>
        </div>
    </div>

    <Modal :show="open" maxWidth="sm" @close="closeModal">
        <div class="flex justify-center flex-col items-center p-4">
            <img src="./../../../public/img/logo-bai.svg" alt="" class="w-32 mt-5 mb-4">
            <div class="mt-2 flex flex-col items-center">
                <p class="font-medium">Data e hora de chegada: <span class="font-thin">{{queue.date}}</span> </p>
                <h2 class="font-medium text-lg">Serviço selecionado</h2>
                <h1 class="font-bold text-xl text-center w-64">{{queue.letter}} | {{queue.service}}</h1>
                <h2 class="font-bold text-5xl py-5">{{queue.code}}</h2>
                <p>Clientes a espera: {{queue.waiting}}</p>
                <p class="font-medium">Agência Sequele</p>
                <h2 class="font-medium">Obrigado pela sua preferência.</h2>
            </div>
        </div>
    </Modal>
    <Modal :show="loader" maxWidth="sm">
        <div class="flex items-center justify-center">
            <img src="./../../../public/img/loader.gif" alt="" class="w-32 mt-5 mb-4">
        </div>
    </Modal>
</template>

<style lang="css">
    .my-bg-blue{
        background-color: #00A1E0;
    }
    .my-text-blue{
        color: #00A1E0;
    }
    .my-shadow{
        box-shadow: 1px 1px 6px 0px rgba(95, 95, 95, 0.212);
    }
    .my-shadow-in{
        box-shadow: inset 1px 1px 2px 0px rgba(24, 24, 24, 0.212);
    }
    .my-border{
        border-radius: 30px;
    }
</style>