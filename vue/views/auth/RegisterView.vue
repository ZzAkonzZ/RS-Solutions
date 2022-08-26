<script>
import axios from 'axios';

export default{
    data() {
        return {
            captcha_html: null,

            company_name: '',
            address: '',
            post_index: '',
            company_phone: '',
            email: '',
            bin: '',
            iik: '',
            bank_name: '',
            bik: '',
            ceo_name: '',
            responsible_person: '',
            responsible_person_phone: '',
            responsible_person_email: '',
            domen: '',
            certificate: '',
            captcha: '',

            inputsState: {
                company_name: null,
                address: null,
                post_index: null,
                company_phone: null,
                email: null,
                bin: null,
                iik: null,
                bank_name: null,
                bik: null,
                ceo_name: null,
                responsible_person: null,
                responsible_person_phone: null,
                responsible_person_email: null,
                domen: null,
                certificate: null,
                captcha: null
            },

            sent: false
        }
    },
    methods: {
        handleFileUpload(event) {
            this.certificate = event.target.files[0]
        },
        register() {
            let formData = new FormData();
            formData.append('company_name', this.company_name);
            formData.append('address', this.address);
            formData.append('post_index', this.post_index);
            formData.append('company_phone', this.company_phone);
            formData.append('email', this.email);
            formData.append('bin', this.bin);
            formData.append('iik', this.iik);
            formData.append('bank_name', this.bank_name);
            formData.append('bik', this.bik);
            formData.append('ceo_name', this.ceo_name);
            formData.append('responsible_person', this.responsible_person);
            formData.append('responsible_person_phone', this.responsible_person_phone);
            formData.append('responsible_person_email', this.responsible_person_email);
            formData.append('domen', this.domen);
            formData.append('certificate', this.certificate);
            formData.append('captcha', this.captcha);

            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            }

            axios
            .post('http://127.0.0.1:8000/api/companies/store', formData, config)
            .then((msg) => {
                console.log('msg', msg)
                
                this.sent = true
                this.handleErrors(msg)
            })
            .catch((err) => {                
                this.sent = true
                console.log('err', err)
                this.handleErrors(err.response.data.errors)
            })

            this.reloadCaptcha()
        },
        handleErrors(errors) {
            Object.entries(this.inputsState).forEach(entry => {
                const [key, value] = entry;
                if(errors[key])
                {
                    this.inputsState[key] = errors[key]
                }else{
                    this.inputsState[key] = null
                }
            });

            console.log(this.inputsState)
        },
        reloadCaptcha()
        {
            axios
            .get('http://127.0.0.1:8000/api/companies/reload-captcha')
            .then((msg) => {
                this.captcha_html = msg.data.captcha
            })
            .catch((err) => {
                console.log(err)
            })
        }
    },
    beforeMount() {
        this.reloadCaptcha()
    }
}
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="header mt-3">
                    Регистрация
                </h1>
            </div>
        </div>
            <form action="" class="row" @submit.prevent="register">
                <div class="col-5">
                    <label class="input-text mt-3">Наименование организации (пропишите полностью) *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="company_name"
                    v-bind:class="{ 'is-invalid' : this.inputsState.company_name != null && this.sent, 'is-valid' : this.inputsState.company_name == null && this.sent }"
                    >
                    <div v-if="this.inputsState.company_name != null && this.sent" class="invalid-feedback">{{ this.inputsState.company_name[0] }}</div>

                    <label class="input-text mt-3">Юридический адрес организации, включая город/область *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="address"
                    v-bind:class="{ 'is-invalid' : this.inputsState.address != null && this.sent, 'is-valid' : this.inputsState.address == null && this.sent }"
                    >
                    <div v-if="this.inputsState.address != null && this.sent" class="invalid-feedback">{{ this.inputsState.address[0] }}</div>
                    
                    <label class="input-text mt-3">Почтовый индекс *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="post_index"
                    v-bind:class="{ 'is-invalid' : this.inputsState.post_index != null && this.sent, 'is-valid' : this.inputsState.post_index == null && this.sent }"
                    >
                    <div v-if="this.inputsState.post_index != null && this.sent" class="invalid-feedback">{{ this.inputsState.post_index[0] }}</div>
                    
                    <label class="input-text mt-3">Телефон организации *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="company_phone"
                    v-bind:class="{ 'is-invalid' : this.inputsState.company_phone != null && this.sent, 'is-valid' : this.inputsState.company_phone == null && this.sent }"
                    >
                    <div v-if="this.inputsState.company_phone != null && this.sent" class="invalid-feedback">{{ this.inputsState.company_phone[0] }}</div>
                    
                    <label class="input-text mt-3">E-mail адрес организации *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="email"
                    v-bind:class="{ 'is-invalid' : this.inputsState.email != null && this.sent, 'is-valid' : this.inputsState.email == null && this.sent }"
                    >
                    <div v-if="this.inputsState.email != null && this.sent" class="invalid-feedback">{{ this.inputsState.email[0] }}</div>
                </div>
                <div class="col-3">
                    <label class="input-text mt-3">БИН организации (12 цифр) *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="bin"
                    v-bind:class="{ 'is-invalid' : this.inputsState.bin != null && this.sent, 'is-valid' : this.inputsState.bin == null && this.sent }"
                    >
                    <div v-if="this.inputsState.bin != null && this.sent" class="invalid-feedback">{{ this.inputsState.bin[0] }}</div>

                    <label class="input-text mt-3">ИИК KZ (20 значный счет) *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="iik"
                    v-bind:class="{ 'is-invalid' : this.inputsState.iik != null && this.sent, 'is-valid' : this.inputsState.iik == null && this.sent }"
                    >
                    <div v-if="this.inputsState.iik != null && this.sent" class="invalid-feedback">{{ this.inputsState.iik[0] }}</div>
                    
                    <label class="input-text mt-3">Наименование банка *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="bank_name"
                    v-bind:class="{ 'is-invalid' : this.inputsState.bank_name != null && this.sent, 'is-valid' : this.inputsState.bank_name == null && this.sent }"
                    >
                    <div v-if="this.inputsState.bank_name != null && this.sent" class="invalid-feedback">{{ this.inputsState.bank_name[0] }}</div>
                    
                    <label class="input-text mt-3">БИК (8 латинских букв и цифр) *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="bik"
                    v-bind:class="{ 'is-invalid' : this.inputsState.bik != null && this.sent, 'is-valid' : this.inputsState.bik == null && this.sent }"
                    >
                    <div v-if="this.inputsState.bik != null && this.sent" class="invalid-feedback">{{ this.inputsState.bik[0] }}</div>
                </div>
                <div class="col-4">
                    <label class="input-text mt-3">ФИО руководителя организации *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="ceo_name"
                    v-bind:class="{ 'is-invalid' : this.inputsState.ceo_name != null && this.sent, 'is-valid' : this.inputsState.ceo_name == null && this.sent }"
                    >
                    <div v-if="this.inputsState.ceo_name != null && this.sent" class="invalid-feedback">{{ this.inputsState.ceo_name[0] }}</div>
                    
                    <label class="input-text mt-3">Ответственное лицо*</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="responsible_person"
                    v-bind:class="{ 'is-invalid' : this.inputsState.responsible_person != null && this.sent, 'is-valid' : this.inputsState.responsible_person == null && this.sent }"
                    >
                    <div v-if="this.inputsState.responsible_person != null && this.sent" class="invalid-feedback">{{ this.inputsState.responsible_person[0] }}</div>
                    
                    <label class="input-text mt-3">Телефон ответственного лица *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="responsible_person_phone"
                    v-bind:class="{ 'is-invalid' : this.inputsState.responsible_person_phone != null && this.sent, 'is-valid' : this.inputsState.responsible_person_phone == null && this.sent }"
                    >
                    <div v-if="this.inputsState.responsible_person_phone != null && this.sent" class="invalid-feedback">{{ this.inputsState.responsible_person_phone[0] }}</div>
                    
                    <label class="input-text mt-3">E-mail ответственного лица *</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="responsible_person_email"
                    v-bind:class="{ 'is-invalid' : this.inputsState.responsible_person_email != null && this.sent, 'is-valid' : this.inputsState.responsible_person_email == null && this.sent }"
                    >
                    <div v-if="this.inputsState.responsible_person_email != null && this.sent" class="invalid-feedback">{{ this.inputsState.responsible_person_email[0] }}</div>
                    
                    <label class="input-text mt-3">Желаемое название доменного имени в зоне edu.kz</label>
                    <input
                    type="text"
                    class="form-control"
                    v-model="domen"
                    v-bind:class="{ 'is-invalid' : this.inputsState.domen != null && this.sent, 'is-valid' : this.inputsState.domen == null && this.sent }"
                    >
                    <div v-if="this.inputsState.domen != null && this.sent" class="invalid-feedback">{{ this.inputsState.domen[0] }}</div>
                </div>
                <div class="col-5">
                    <label class="input-text mt-3">
                        Загрузите копию свидетельства о государственной регистрации организации или другой документ удостоверяющий организацию в pdf (Размер не должен превышать 2.00 МиБ) *
                    </label>
                    <input
                    type="file"
                    class="form-control"
                    v-on:change="handleFileUpload"
                    v-bind:class="{ 'is-invalid' : this.inputsState.certificate != null && this.sent, 'is-valid' : this.inputsState.certificate == null && this.sent }"
                    >
                    <div v-if="this.inputsState.certificate != null && this.sent" class="invalid-feedback">{{ this.inputsState.certificate[0] }}</div>
                </div>
                <div class="col-3">
                </div>
                <div class="col-4">
                        <label class="input-text mt-3">
                            Введите код с картинки *
                        </label>
                    <div class="d-flex input-group">
                        <div v-html="captcha_html" style="border-radius: 0.375rem 0 0 0.375rem; overflow:hidden"></div>
                        <button type="button" class="btn btn-primary reload" id="reload" v-on:click="reloadCaptcha()">
                            &#x21bb;
                        </button>
                        <input
                        type="text"
                        class="form-control"
                        v-model="captcha"
                        v-bind:class="{ 'is-invalid' : this.inputsState.captcha != null && this.sent, 'is-valid' : this.inputsState.captcha == null && this.sent }"
                        >
                    </div>
                    <div v-if="this.inputsState.captcha != null && this.sent" class="invalid-feedback">{{ this.inputsState.captcha[0] }}</div>

                    <button class="btn btn-warning my-auto w-100 mt-3">Регистрация</button>
                </div>
            </form>
        </div>
</template>