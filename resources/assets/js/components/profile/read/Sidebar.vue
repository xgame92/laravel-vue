<template lang="html">
    <div class="panel panel-default">
        <div class="panel-body">
            <a :href="`/profile/${user.id}/edit`" class="btn btn-link btn-edit"
                v-if="(authUser.hasPermission['update-own-profile'] && authUser.id == user.id) || authUser.hasPermission['update-all-profile']">
                <i class="fa fa-lg fa-pencil" aria-hidden="true"></i>
            </a>
            <div class="text-center">
                <img class="avatar-md" :src="user.avatar_url">
                <p class="lead">{{user.name}}</p>
                <small class="text-muted">{{user.email}}</small>
            </div>
        </div>
        <!-- Buttons -->
        <ul class="nav nav-pills nav-stacked">
            <li :class="{'active': activeLink == 'profile'}">
                <a :href="'/profile/'+user.id">
                    <i class="fa fa-fw fa-lg fa-user-circle-o" aria-hidden="true"></i> Profile
                </a>
            </li>
            <li :class="{'active': activeLink == 'work'}">
                <a :href="'/profile/'+user.id+'/work'">
                    <i class="fa fa-fw fa-lg fa-briefcase" aria-hidden="true"></i> Work
                </a>
            </li>
            <li>
                <a href="" @click.prevent="comingSoon">
                    <i class="fa fa-fw fa-lg fa-sticky-note" aria-hidden="true"></i> Notes
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    import comingSoon from '../../../mixins/comingSoon'

    export default {
        data () {
            return {
                authUser: Laravel.user,
                activeLink: '',
            }
        },
        props:['user'],
        mixins: [ comingSoon ],
        mounted() {
            var str = window.location.pathname;
            var res = str.split("/");

            if (res.length == 3) {
                this.activeLink = res[1];
            } else if (res.length == 4) {
                this.activeLink = res[3];
            }
            console.log(this.authUser);
            console.log(this.user);
        }
    }
</script>
