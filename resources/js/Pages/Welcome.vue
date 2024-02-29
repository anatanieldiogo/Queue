<script>
import CardButton from '@/Components/CardButton.vue';
import { Head } from '@inertiajs/vue3';
import { Link, router } from '@inertiajs/vue3';

export default {
    name: 'Ticket',

    components: {
        Head,
        CardButton,
    },
    props:{
        services: Object,
    },
    data(){
      return{
        currentDateTime: null,
      }
    },
    methods: {
        // upload(){
        // router.visit('/upload-file', {
        //     method: 'post',
        //     data: this.form,
        //     })
        // }
    },
     mounted() {
        const zeroFill = n => {
            return ('0' + n).slice(-2);
        }
        const interval = setInterval(() => {
            const now = new Date();
            const hora = zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());
            this.currentDateTime = hora;
        }, 1000);
   },
  };

</script>

<template>
    <Head title="Ticket" />
    <div class="current-time"><h2>{{ currentDateTime }}</h2></div>
    <div class="lateral-bar lateral-bar-left"></div>
    <div class="lateral-bar lateral-bar-right"></div>

    <div class="py-9 px-20">
        <div class="flex items-center gap-2 flex-col">
            <CardButton v-for="service in services" :key="service.id" :service="service"/>
        </div>
    </div>
</template>

<style lang="css">
    .lateral-bar{
        width: 120px;
        height: calc(100% - 70px);
        background-color: #00A1E0;
        position: fixed;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    .lateral-bar-left{
        left: 0;
        border-radius: 0 20px 20px 0;
    }
    .lateral-bar-right{
        left: 100%;
        border-radius: 20px 0 0 20px;
    }
    .current-time{
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #00A1E0;
    }
    .current-time h2{
        font-weight: 800;
    }
</style>