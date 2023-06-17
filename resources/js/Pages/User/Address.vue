<template>
  <Sidebar></Sidebar>
  <div class="p-4 sm:ml-64">
    <div
      class="p-4 my-10 mx-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <Form @submit="updateAddressInformation" class="space-y-6">
        <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">
          Edição de endereço
        </h5>

        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <select
              id="floating_state"
              name="floating_state"
              class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              v-model="form.state"
              :rules="isRequired"
            >
              <option disabled selected value="">Estado<span class="text-red-600">*</span></option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PB">Paraíba</option>
              <option value="PA">Pará</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
              <option value="DF">Distrito Federal</option>
            </select>
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <Field name="floating_city" v-model="form.city" :rules="isRequired">
              <TextInput
                type="text"
                name="floating_city"
                id="floating_city"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.city"
              />
            </Field>
            <ErrorMessage name="floating_city" />
            <InputLabel
              for="floating_city"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Cidade<span class="text-red-600">*</span></InputLabel
            >
          </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <Field name="floating_zip_code" v-model="form.zip_code" :rules="validateCEP">
              <TextInput
                type="text"
                name="floating_zip_code"
                id="floating_zip_code"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.zip_code"
                :rules="validateCEP"
                v-mask="['#####-###']"
            /></Field>
            <ErrorMessage name="floating_zip_code" />
            <InputLabel
              for="floating_zip_code"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Cep<span class="text-red-600">*</span></InputLabel
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <Field name="floating_address" v-model="form.address" :rules="isRequired">
              <TextInput
                type="text"
                name="floating_address"
                id="floating_address"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.address"
              />
            </Field>
            <ErrorMessage name="floating_address" />
            <InputLabel
              for="floating_first_name"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Endereço<span class="text-red-600">*</span></InputLabel
            >
          </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <Field name="floating_number" v-model="form.number" :rules="isRequired">
              <TextInput
                type="number"
                name="floating_number"
                id="floating_number"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.number"
              />
            </Field>
            <ErrorMessage name="floating_number" />
            <InputLabel
              for="floating_number"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Número<span class="text-red-600">*</span></InputLabel
            >
          </div>
        </div>

        <div class="flex w-full justify-end">
          <PrimaryButton
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            :disabled="
              isRequired(form.state) !== true ||
              isRequired(form.city) !== true ||
              isRequired(form.zip_code) !== true ||
              isRequired(form.address) !== true ||
              isRequired(form.number) !== true
            "
          >
            Salvar
          </PrimaryButton>
        </div>
      </Form>
    </div>
  </div>
</template>
<script setup>
import Sidebar from "@/Pages/Layout/Sidebar.vue";
import { ref } from "vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Field, Form, ErrorMessage } from "vee-validate";
import { isRequired, validateCEP } from "@/Pages/Validation/FirstLogin/validation.js";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
const toast = useToast();
const props = defineProps({
  address: Object,
});

const form = useForm({
  _method: "PUT",
  state: props.address.state,
  city: props.address.city,
  zip_code: props.address.zip_code,
  address: props.address.address,
  number: props.address.number,
});

const updateAddressInformation = () => {
  form.post(route("address.update"), {
    errorBag: "updateAddressInformation",
    preserveScroll: true,
  });
  toast.success("Endereço atualizado com Sucesso!", {
    position: "top-right",
    duration: 5000,
  });
};
</script>
<script>
import { mask } from "vue-the-mask";
export default {
  directives: { mask },
};
</script>
<style>
span[role="alert"] {
  color: red;
}
</style>
