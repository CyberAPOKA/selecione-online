<template>
  <Sidebar></Sidebar>

  <div class="p-4 sm:ml-64">
    <div
      class="p-4 my-10 lg:mx-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <form @submit="updateFiles" class="space-y-6" enctype="multipart/form-data">
        <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">
          Arquivos únicos
        </h5>
        <div class="relative z-0 w-full mb-6 group">
          <div class="relative overflow-x-auto py-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
              >
                <tr>
                  <th scope="col" class="px-6 py-3">Arquivo atual</th>
                  <th scope="col" class="px-6 py-3">Substituir por</th>
                  <th scope="col" class="px-6 py-3">Tipo</th>
                  <th scope="col" class="px-6 py-3">Excluir</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  v-for="file in files.filter(
                    (file) => file.type !== 'courses' && file.type !== 'receipts'
                  )"
                  :key="file.id"
                >
                  <th
                    scope="row"
                    class="w-2/4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    {{ file.name }}
                  </th>
                  <td class="px-6 py-4">
                    <input
                      class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                      type="file"
                      @change="onFileSelect(file.type, $event)"
                      accept=".pdf"
                    />
                  </td>
                  <td class="px-6 py-4">
                    {{ fileType[file.type] }}
                  </td>
                  <td
                    class="px-6 py-4 flex justify-between"
                    v-if="file.type === 'license'"
                  >
                    <button type="button" @click="deleteFile(file.id)">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        />
                      </svg>
                    </button>
                  </td>
                  <td v-else class="px-6 py-4 flex justify-between">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="w-6 h-6"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
                      />
                    </svg>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="flex w-full justify-end">
          <PrimaryButton
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Salvar
          </PrimaryButton>
        </div>
      </form>
    </div>
  </div>

  <div class="p-4 sm:ml-64" v-if="!files.some((file) => file.type === 'license')">
    <div
      class="p-4 my-10 lg:mx-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <form @submit="updateFiles" class="space-y-6" enctype="multipart/form-data">
        <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">
          Parece que você ainda não enviou seu Alvará de Folha Corrida!
        </h5>

        <div class="relative z-0 w-full mb-6 group">
          <div class="relative overflow-x-auto py-4">
            <input
              class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              type="file"
              @change="onFileSelect('license', $event)"
              accept=".pdf"
            />
          </div>
        </div>

        <div class="flex w-full justify-end">
          <PrimaryButton
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Salvar
          </PrimaryButton>
        </div>
      </form>
    </div>
  </div>
  <div class="p-4 sm:ml-64">
    <div
      class="p-4 my-10 lg:mx-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <form @submit="updateCourses" class="space-y-6">
        <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">
          Arquivos atuais de Certificados de Cursos e Capacitações
        </h5>

        <div class="relative overflow-x-auto py-4">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-6 py-3">NOME DO ARQUIVO</th>
                <th scope="col" class="px-6 py-3">EXCLUIR</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                v-for="file in files.filter((file) => file.type === 'courses')"
                :key="file.id"
              >
                <th
                  scope="row"
                  class="w-9/12 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  {{ file.name.substring(0, 35) }}
                </th>
                <td class="px-6 py-4 flex justify-between">
                  <button type="button" @click="deleteFile(file.id)">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="w-6 h-6"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                      />
                    </svg>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="relative z-0 w-full mb-6 group">
            <div class="flex items-center justify-center w-full py-8">
              <label
                for="dropzone-file-courses"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
              >
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg
                    aria-hidden="true"
                    class="w-10 h-10 mb-3 text-gray-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                    ></path>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold">Clique para enviar mais arquivos</span>
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">
                    Não irá substituir os arquivos atuais
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">
                    Tamanho máximo por arquivo 3MB
                  </p>
                </div>
                <TextInput
                  id="dropzone-file-courses"
                  type="file"
                  class="hidden"
                  multiple
                  @change="onFileSelected('courses', $event)"
                  accept=".pdf"
                />
              </label>
            </div>

            <div class="text-center">
              <div v-if="form.courses.length > 0" class="text-white">
                <h3 class="text-green-400">Arquivos Selecionados:</h3>
                <ul>
                  <li v-for="(file, index) in visibleFilesCourses" :key="file.name">
                    {{ file.name }}
                  </li>
                </ul>

                <button
                  v-if="form.courses.length > 5 && !showLessActiveCourses"
                  @click="showMoreCourses"
                  class="text-blue-500"
                >
                  Ver mais
                </button>
                <button
                  v-if="visibleFilesCourses.length > 5"
                  @click="showLessCourses"
                  class="text-blue-500"
                >
                  Ver menos
                </button>
              </div>
              <div v-else class="text-red-600">Nenhum arquivo selecionado!</div>
            </div>
          </div>
        </div>

        <div class="flex w-full justify-end">
          <PrimaryButton
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Salvar
          </PrimaryButton>
        </div>
      </form>
    </div>
  </div>

  <div class="p-4 sm:ml-64">
    <div
      class="p-4 my-10 lg:mx-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <form @submit="updateReceipts" class="space-y-6">
        <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">
          Arquivos atuais de Certificados de Cursos e Capacitações
        </h5>

        <div class="relative overflow-x-auto py-4">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-6 py-3">NOME DO ARQUIVO</th>
                <th scope="col" class="px-6 py-3">EXCLUIR</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                v-for="file in files.filter((file) => file.type === 'receipts')"
                :key="file.id"
              >
                <th
                  scope="row"
                  class="w-9/12 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  {{ file.name.substring(0, 35) }}
                </th>
                <td class="px-6 py-4 flex justify-between">
                  <button type="button" @click="deleteFile(file.id)">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="w-6 h-6"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                      />
                    </svg>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <div class="flex items-center justify-center w-full py-8">
            <label
              for="dropzone-file-receipts"
              class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
            >
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg
                  aria-hidden="true"
                  class="w-10 h-10 mb-3 text-gray-400"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                  ></path>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                  <span class="font-semibold">Clique para enviar mais arquivos</span>
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                  Não irá substituir os arquivos atuais
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                  Tamanho máximo por arquivo 3MB
                </p>
              </div>
              <TextInput
                id="dropzone-file-receipts"
                type="file"
                class="hidden"
                multiple
                @change="onFileSelected('receipts', $event)"
                accept=".pdf"
              />
            </label>
          </div>

          <div class="text-center">
            <div v-if="form.receipts.length > 0" class="text-white">
              <h3 class="text-green-400">Arquivos Selecionados:</h3>
              <ul>
                <li v-for="(file, index) in visibleFilesReceipts" :key="file.name">
                  {{ file.name }}
                </li>
              </ul>

              <button
                v-if="form.receipts.length > 5 && !showLessActiveReceipts"
                @click="showMoreReceipts"
                class="text-blue-500"
              >
                Ver mais
              </button>
              <button
                v-if="visibleFilesReceipts.length > 5"
                @click="showLessReceipts"
                class="text-blue-500"
              >
                Ver menos
              </button>
            </div>
            <div v-else class="text-red-600">Nenhum arquivo selecionado!</div>
          </div>
        </div>

        <div class="flex w-full justify-end">
          <PrimaryButton
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Salvar
          </PrimaryButton>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
import Sidebar from "@/Pages/Layout/Sidebar.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { computed } from "@vue/reactivity";
import { ref } from "vue";
// import { onFileSelect } from "@/Pages/Validation/FirstLogin/validation.js";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

const toast = useToast();

const fileType = {
  education: "Comprovante de Escolaridade",
  curriculum: "Currículo",
  certificate: "Atestado de Bons Antecedentes",
  license: "Alvará de Folha Corrida",
};

//Cursos
const visibleFilesCountCourses = ref(5);

const visibleFilesCourses = computed(() => {
  return Array.from(form.courses).slice(0, visibleFilesCountCourses.value);
});

let showLessActiveCourses = ref(false);

const showMoreCourses = () => {
  visibleFilesCountCourses.value = form.courses.length;
  showLessActiveCourses.value = true;
};

const showLessCourses = () => {
  visibleFilesCountCourses.value = 5;
  showLessActiveCourses.value = false;
};

//Comprovantes
const visibleFilesCountReceipts = ref(5);

const visibleFilesReceipts = computed(() => {
  return Array.from(form.receipts).slice(0, visibleFilesCountReceipts.value);
});

let showLessActiveReceipts = ref(false);

const showMoreReceipts = () => {
  visibleFilesCountReceipts.value = form.receipts.length;
  showLessActiveReceipts.value = true;
};

const showLessReceipts = () => {
  visibleFilesCountReceipts.value = 5;
  showLessActiveReceipts.value = false;
};

function onFileSelect(field, event) {
  const files = event.target.files;
  if (files.length === 1) {
    const file = files[0];
    if (file.type === "application/pdf") {
      if (file.size <= 3 * 1024 * 1024) {
        //3MB
        form[field] = file;
      } else {
        event.target.value = null;
        alert("O arquivo deve ter no máximo 3MB.");
      }
    } else {
      event.target.value = null;
      alert("Por favor, selecione um arquivo PDF.");
    }
  } else {
    event.target.value = null;
    alert("1 Arquivo no máximo.");
  }
}

const onFileSelected = (key, event) => {
  const files = event.target.files;
  if (files.length > 0) {
    if (files.length > 10) {
      alert("Por favor, selecione no máximo 10 arquivos.");
      return;
    }
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      if (file.size > 3 * 1024 * 1024) {
        alert(`O arquivo ${file.name} excede o tamanho máximo de 3MB.`);
        return;
      }
      if (file.type !== "application/pdf") {
        alert(`O arquivo ${file.name} não é um arquivo PDF válido.`);
        return;
      }
    }
    form[key] = files;
  }
};

const props = defineProps({
  files: Array,
});

const form = useForm({
  _method: "POST",
  education: null,
  curriculum: null,
  certificate: null,
  license: null,
  courses: [],
  receipts: [],
});

const updateFiles = (event) => {
  event.preventDefault();
  form.post(route("file.update"), {
    errorBag: "updateFiles",
    preserveScroll: true,
    headers: {
      "Content-Type": "multipart/form-data",
    },
    onFinish: () => {
      document.querySelector('input[type="file"]').value = "";
      event.target.reset();
    },
  });
  toast.success("Arquivos salvos com Sucesso!", {
    position: "top-right",
    duration: 5000,
  });
};

const updateCourses = (event) => {
  event.preventDefault();
  form.post(route("courses.update"), {
    errorBag: "updateCourses",
    preserveScroll: true,
    headers: {
      "Content-Type": "multipart/form-data",
    },
    onFinish: () => {
      form.courses = [];
      document.querySelector('input[type="file"]').value = "";
      event.target.reset();
    },
  });
  toast.success("Arquivos salvos com Sucesso!", {
    position: "top-right",
    duration: 5000,
  });
};

const updateReceipts = (event) => {
  event.preventDefault();
  form.post(route("receipts.update"), {
    errorBag: "updateReceipts",
    preserveScroll: true,
    headers: {
      "Content-Type": "multipart/form-data",
    },
    onFinish: () => {
      form.courses = [];
      document.querySelector('input[type="file"]').value = "";
      event.target.reset();
    },
  });
  toast.success("Arquivos salvos com Sucesso!", {
    position: "top-right",
    duration: 5000,
  });
};

const file = useForm({
  file: "",
});

const deleteFile = (id) => {
  file.post(route("file.delete", { id: id }), {
    preserveScroll: true,
  });
  toast.success("Arquivo excluído com Sucesso!", {
    position: "top-right",
    duration: 5000,
  });
};
</script>
