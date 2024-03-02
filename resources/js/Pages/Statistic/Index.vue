<template>
    <b-container fluid class="mt-5">
        <b-col cols="12">
            <b-jumbotron>
                <b-container fluid>
                    <b-row>
                        <b-card bg-variant="warning" text-variant="white" :header="$t('label.total')" class="text-center col-sm-3 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{recources_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="primary" text-variant="white" :header="$t('label.fiction_books')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{fiction_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="secondary" text-variant="white" :header="$t('label.textbooks')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{textbooks_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="success" text-variant="white" :header="$t('label.video_lessons')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{video_lessons_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="info" text-variant="white" :header="$t('label.practical_virtual_lessons')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{practical_virtual_lessons_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="danger" text-variant="white" :header="$t('label.interactive_books')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{interactive_books_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="primary" text-variant="white" :header="$t('label.demonstrations')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{demonstrations_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="secondary" text-variant="white" :header="$t('label.audio_materials')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{audio_materials_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="dark" text-variant="white" :header="$t('label.industry_materials')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{industry_materials_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="warning" text-variant="white" :header="$t('label.additional_course_materials')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{additional_course_materials_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="success" text-variant="white" :header="$t('label.teacher_training_materials')" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{teacher_training_materials_count}}</b-card-text>
                        </b-card>
                    </b-row>

                </b-container>
            </b-jumbotron>
        </b-col>
    </b-container>
</template>

<script>
export default {
    name: "Index",
    props: {
        recources_count: Number,
        fiction_count: Number,
        textbooks_count: Number,
        video_lessons_count: Number,
        practical_virtual_lessons_count: Number,
        interactive_books_count: Number,
        demonstrations_count: Number,
        industry_materials_count: Number,
        additional_course_materials_count: Number,
        teacher_training_materials_count: Number,
        audio_materials_count: Number
    }
}
</script>

<style scoped>

</style>
