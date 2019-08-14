<template>

    <div class="center">
        <transition name="fade">
            <div class="alert alert-success alert-flash" role="alert" v-show="show">
                <strong>{{ body }}</strong>
            </div>
        </transition>
    </div>

</template>

<script>
import { setTimeout } from 'timers';
    export default {
        props: ['message'],

        data () {
            return {
                body: this.message,
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on('flash', message => {
                this.flash(message);
            });
        },

        methods: {
            flash(message) {
                this.body = message;
                this.show = true;

                this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    }
</script>

<style>
    .center {
        display: flex;
        justify-content: center;
    }
    .alert-flash {
        position: fixed;
        z-index: 999;
        top: 5em;
    }

    /* flash message transition */
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter,
    .fade-leave-to {
        opacity: 0;
    }
</style>
