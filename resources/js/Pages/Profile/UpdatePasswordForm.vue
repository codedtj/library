<template>
    <form @submit.prevent="updatePassword">
        <b-card title="Тағйири  рамз"
                sub-title="Рамзи дарозтарро бо истифода аз аломатҳои махсус фикр намоед.">
            <b-card-body>
                <b-col md="6">
                    <b-form-group label="Рамзи ҷорӣ" :state="!form.error('current_password')" ref="current_password"
                                  :invalid-feedback="form.error('current_password')" autocomplete="current-password">
                        <b-input type="password" v-model="form.current_password"></b-input>
                    </b-form-group>
                    <b-form-group label="Рамзи нав" :state="!form.error('password')" ref="password"
                                  :invalid-feedback="form.error('password')" autocomplete="new-password">
                        <b-input type="password" v-model="form.password"></b-input>
                    </b-form-group>
                    <b-form-group label="Тасдиқи рамз" :state="!form.error('password_confirmation')"
                                  ref="password_confirmation"
                                  :invalid-feedback="form.error('password_confirmation')" autocomplete="new-password">
                        <b-input type="password" v-model="form.password_confirmation"></b-input>
                    </b-form-group>
                </b-col>
            </b-card-body>

            <template #footer>
                <b-row align-v="baseline">
                    <b-card-text class="ml-4" v-if="form.recentlySuccessful">Тағйиротҳо маҳфуз шуданд</b-card-text>
                    <b-button type="submit" class="ml-auto mr-4" variant="info" :disabled="form.processing">
                        Маҳфуз
                    </b-button>
                </b-row>
            </template>
        </b-card>
    </form>
</template>

<script>
import JetActionMessage from '@/Jetstream/ActionMessage'
import JetButton from '@/Jetstream/Button'
import JetFormSection from '@/Jetstream/FormSection'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
    },

    data() {
        return {
            form: this.$inertia.form({
                current_password: '',
                password: '',
                password_confirmation: '',
            }, {
                bag: 'updatePassword',
            }),
        }
    },

    methods: {
        updatePassword() {
            this.form.put(route('user-password.update'), {
                preserveScroll: true
            }).then(() => {
                this.$refs.current_password.focus()
            })
        },
    },
}
</script>
