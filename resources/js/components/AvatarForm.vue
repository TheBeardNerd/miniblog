
<template>
    <div>
        <h1 v-text="user.name"></h1>

        <img :src="avatar" width="100" height="100" class="avatar mb-2" />

            <form v-if="canUpdate" id="uploadAvatar" method="POST" enctype="multipart/form-data">
                <div class="d-flex flex-column align-items-center">
                    <input class="col-sm-3 mb-2" type="file" name="avatar" accept="image/*" @change="onChange">
                </div>
            </form>
    </div>
</template>

<script>
    export default {
        name: "avatar-form",
        props: ['user'],
        data() {
            return {
                avatar: '/storage/' + this.user.avatar_path
            }
        },
        computed: {
            canUpdate() {
                return this.authorize(user => user.id === this.user.id)
            }
        },
        methods: {
            onChange(event) {
                if (! event.target.files.length) return;
                let avatar = event.target.files[0];

                let reader = new FileReader();
                reader.readAsDataURL(avatar);
                reader.onload = event => {
                    this.avatar = event.target.result;
                };

                this.persist(avatar);
            },

            persist(avatar) {
                let data = new FormData();
                data.append('avatar', avatar);

                axios.post(`/users/${this.user.id}/avatar`, data)
                    .then(console.log('Avatar uploaded!'));
            },
        }
    }
</script>
