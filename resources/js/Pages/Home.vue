<template>
  <Sidebar></Sidebar>
  <div class="p-4 sm:ml-64">
    <div
      class="p-4 my-10 mx-10 grid grid-cols-12 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="col-span-4">
        <img
          class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
          :src="'/assets/welcome.svg'"
          alt=""
        />
      </div>
      <div class="col-span-8">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
          >
            Bem-vindo {{ name }}!
          </h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Seu cadastro foi realizado com sucesso, você pode editar seus dados e arquivos
            a qualquer momento no menu lateral até o dia X, após essa data fecharemos as
            incrições e desabilitaremos a possibilidade de atualização de dados.
          </p>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Escolha o processo em qual você quer se inscrever.
          </p>

          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-6 py-3">Nome</th>
                <th scope="col" class="px-6 py-3">Ação</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                v-for="process in processes"
                :key="process.id"
              >
                <th
                  scope="row"
                  class="w-2/4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  {{ process.name }}
                </th>
                <td v-if="!isUserSubscribed(process)">
                  <Form @click="signUp">
                    <PrimaryButton
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                      @click="setProcessId(process.id)"
                    >
                      Inscrever-se
                    </PrimaryButton>
                    <Field
                      type="hidden"
                      name="process_id"
                      v-model="form.process_id"
                      :value="process.id"
                    />
                  </Form>
                </td>
                <td v-else>Já inscrito</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- <div
      class="p-4 my-10 mx-10 grid grid-cols-12 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="col-span-4">
        <img
          class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
          :src="'/assets/welcome.svg'"
          alt=""
        />
      </div>
      <div class="col-span-8">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
          >
            Bem-vindo {{ name }}!
          </h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Seu cadastro foi realizado com sucesso, você pode editar seus dados e arquivos
            a qualquer momento no menu lateral até o dia X, após essa data fecharemos as
            incrições e desabilitaremos a possibilidade de atualização de dados.
          </p>
        </div>
      </div>
    </div> -->
    <div
      class="p-4 my-10 mx-10 grid grid-cols-12 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="col-span-8">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
          >
            1º Etapa - Processo seletivo
          </h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Nossa equipe estará analisando os seus dados e você receberá uma mensagem de
            feedback por aqui mesmo.
          </p>
        </div>
      </div>
      <div class="col-span-4">
        <img
          class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
          :src="'/assets/business.svg'"
          alt=""
        />
      </div>
    </div>
    <div
      class="p-4 my-10 mx-10 grid grid-cols-12 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="col-span-4">
        <img
          class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
          :src="'/assets/interview.svg'"
          alt=""
        />
      </div>
      <div class="col-span-8">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
          >
            2º Etapa - Entrevista
          </h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Caso você seja selecionado, um de nossos membros da equipe técnica entrará em
            contato para agendar uma entrevista.
          </p>
        </div>
      </div>
    </div>
    <div
      class="p-4 my-10 mx-10 grid grid-cols-12 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="col-span-8">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
          >
            3º Etapa - Contratação
          </h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Após a entrevista nossa equipe fará uma reunião interna para discutir sobre os
            perfis selecionados e então realizar a contratação dos candidatos.
          </p>
        </div>
      </div>
      <div class="col-span-2">
        <img
          class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
          :src="'/assets/contract.svg'"
          alt=""
        />
      </div>
    </div>
  </div>
</template>
<script setup>
import Sidebar from "@/Pages/Layout/Sidebar.vue";
import { Field, Form, ErrorMessage } from "vee-validate";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
  user: Object,
  name: Object,
  processes: Array,
});

const setProcessId = (processId) => {
  form.process_id = processId;
};

const form = useForm({
  process_id: "",
});

const isUserSubscribed = (process) => {
  return props.user.relations.some((relation) => relation.process_id === process.id);
};

const signUp = () => {
  event.preventDefault();
  form.post(route("user.process.signup"));
};
</script>
