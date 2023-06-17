<template>
  <Sidebar></Sidebar>
  <div class="p-4 sm:ml-64">
    <div
      class="p-4 my-10 mx-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <Form @submit="updateProfileInformation" class="space-y-6">
        <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">
          Edição de perfil
        </h5>

        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <Field name="floating_name" v-model="form.name" :rules="validateFullName">
              <TextInput
                type="text"
                id="floating_name"
                name="floating_name"
                placeholder=" "
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                v-model="form.name"
                :rules="validateFullName"
              />
            </Field>
            <ErrorMessage name="floating_name" />
            <InputLabel
              for="floating_name"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Nome<span class="text-red-600">*</span></InputLabel
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <Field
              name="floating_birth_date"
              v-model="form.birth_date"
              :rules="validateBirthday"
            >
              <TextInput
                type="date"
                name="floating_birth_date"
                id="floating_birth_date"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.birth_date"
              />
            </Field>
            <ErrorMessage name="floating_birth_date" />
            <InputLabel
              for="floating_birth_date"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Data de nascimento<span class="text-red-600">*</span></InputLabel
            >
          </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <Field
              name="floating_mothers_name"
              v-model="form.mothers_name"
              :rules="validateFullName"
            >
              <TextInput
                type="text"
                name="floating_mothers_name"
                id="floating_mothers_name"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.mothers_name"
                :rules="validateFullName"
            /></Field>
            <ErrorMessage name="floating_mothers_name" />
            <InputLabel
              for="floating_mothers_name"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Nome da mãe<span class="text-red-600">*</span></InputLabel
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <Field name="floating_cpf" v-model="form.cpf" :rules="validateCPF">
              <TextInput
                type="text"
                name="floating_cpf"
                id="floating_cpf"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.cpf"
                :rules="validateCPF"
                v-mask="['###.###.###-##']"
                readonly
              />
            </Field>
            <ErrorMessage name="floating_cpf" />
            <InputLabel
              for="floating_cpf"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >CPF<span class="text-red-600">*</span> (Não é possível alterar)</InputLabel
            >
          </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <Field
              name="floating_identification_document"
              v-model="form.identification_document"
              :rules="isRequired"
            >
              <TextInput
                type="text"
                name="floating_identification_document"
                id="floating_identification_document"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="form.identification_document"
                :rules="isRequired"
              />
            </Field>
            <ErrorMessage name="floating_identification_document" />
            <InputLabel
              for="floating_identification_document"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Documento de identificação<span class="text-red-600">*</span></InputLabel
            >
          </div>
        </div>
        <div class="flex w-full justify-end">
          <PrimaryButton
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            :disabled="
              validateFullName(form.name) !== true ||
              validateBirthday(form.birth_date) !== true ||
              validateFullName(form.mothers_name) !== true ||
              isRequired(form.identification_document) !== true
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
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Field, Form, ErrorMessage } from "vee-validate";
import {
  isRequired,
  validateFullName,
  validateBirthday,
} from "@/Pages/Validation/FirstLogin/validation.js";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

const toast = useToast();

const props = defineProps({
  profile: Object,
});

const form = useForm({
  _method: "PUT",
  name: props.profile.name,
  birth_date: props.profile.birth_date,
  mothers_name: props.profile.mothers_name,
  cpf: props.profile.cpf,
  identification_document: props.profile.identification_document,
});

const updateProfileInformation = () => {
  form.post(route("profile.update"), {
    errorBag: "updateProfileInformation",
    preserveScroll: true,
  });
  toast.success("Perfil atualizado com Sucesso!", {
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
