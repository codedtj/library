<template>
    <b-container fluid class="mt-5">
        <b-row>
            <b-col cols="12">
                <b-jumbotron>
                    <b-container fluid>
                        <b-row>
                            <inertia-link class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('resources.create')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #FFCC33">
                                    <b-icon-plus-circle font-scale="2" class="tile-icon text-white">
                                    </b-icon-plus-circle>
                                    <span class="tile-content first-letter-capitalize">{{$t('label.add_resource')}}</span>
                                </b-aspect>
                            </inertia-link>

                            <inertia-link class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('profile.show')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #3399CC">
                                    <b-icon-person font-scale="2" class="tile-icon text-white">
                                    </b-icon-person>
                                    <span class="tile-content first-letter-capitalize">{{$t('label.my_page')}}</span>
                                </b-aspect>
                            </inertia-link>

                            <inertia-link class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('my-resources')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #339999">
                                    <b-icon-collection font-scale="2" class="tile-icon text-white">
                                    </b-icon-collection>
                                    <span class="tile-content first-letter-capitalize">{{$t('label.my_resources')}}</span>
                                </b-aspect>
                            </inertia-link>

                            <inertia-link class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('favourite.index')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #ff0099">
                                    <b-icon-bookmark-heart font-scale="2" class="tile-icon text-white">
                                    </b-icon-bookmark-heart>
                                    <span class="tile-content first-letter-capitalize">{{$t('label.favourite')}}</span>
                                </b-aspect>
                            </inertia-link>

                            <inertia-link class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('statistic.index')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #ff0099">
                                    <b-icon-kanban-fill font-scale="2" class="tile-icon text-white">
                                    </b-icon-kanban-fill>
                                    <span class="tile-content first-letter-capitalize">{{$t('label.statistics')}}</span>
                                </b-aspect>
                            </inertia-link>
                        </b-row>
                    </b-container>
                </b-jumbotron>
            </b-col>
            <b-col cols="12" v-if="$page.props.is_admin">
                <b-jumbotron>
                    <b-container fluid>
                        <b-row>
                            <inertia-link class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('users.index')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #33CCCC">
                                    <b-icon-people font-scale="2" class="tile-icon text-white">
                                    </b-icon-people>
                                    <span class="tile-content first-letter-capitalize">{{$tc('label.user',2)}}</span>
                                </b-aspect>
                            </inertia-link>
                        </b-row>
                    </b-container>
                </b-jumbotron>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: "Show"
}
</script>

<style scoped>
.tile {
    position: relative;
    border-radius: 5px;
    transition: 0.2s ease;
}

.tile:hover {
    cursor: pointer;
    transform: scale(1.02);
}

.tile:active {
    transform: scale(0.98);
}

.tile-content {
    position: absolute;
    bottom: 8px;
    left: 10px;
    color: #ffffff;
}

.tile-icon {
    top: calc(50% - 14px);
    right: calc(50% - 14px);
    position: absolute;
}
</style>
