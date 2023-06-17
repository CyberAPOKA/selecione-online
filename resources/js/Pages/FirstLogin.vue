<template>
  <Navbar></Navbar>
  <div
    class="p-4 my-10 mx-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
  >
    <Form @submit="submit" class="space-y-6" enctype="multipart/form-data">
      <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">
        Formulário de inscrição
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
            />
          </Field>
          <ErrorMessage name="floating_cpf" />
          <InputLabel
            for="floating_cpf"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
            >CPF<span class="text-red-600">*</span></InputLabel
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
          <ErrorMessage name="identification_document" />
          <InputLabel
            for="floating_identification_document"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
            >Documento de identificação<span class="text-red-600">*</span></InputLabel
          >
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <select
            id="floating_state"
            name="floating_state"
            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
            v-model="form.state"
            :rules="isRequired"
          >
            <option disabled selected value="">
              Estado<span class="text-red-600">*</span>
            </option>
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
      </div>
      <div class="grid md:grid-cols-2 md:gap-6">
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
      </div>
      <div class="grid md:grid-cols-2 md:gap-6">
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

      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-6 group">
          <InputLabel
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            for="file_input"
            >Comprovante de Escolaridade<span class="text-red-600">*</span></InputLabel
          >
          <Field
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help"
            id="file_input_education"
            name="file_input_education"
            type="file"
            @change="onFileSelect('education', $event)"
            accept=".pdf"
            :rules="fileRequired"
          />
          <ErrorMessage name="file_input_education" />
          <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
            PDF (1 Arquivo, Tamanho máximo 3MB).
          </p>
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <InputLabel
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            for="file_input"
            >Currículo<span class="text-red-600">*</span></InputLabel
          >

          <Field
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help"
            id="file_input_curriculum"
            name="file_input_curriculum"
            type="file"
            @change="onFileSelect('curriculum', $event)"
            accept=".pdf"
            :rules="fileRequired"
          />
          <ErrorMessage name="file_input_curriculum" />
          <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
            PDF (1 Arquivo, Tamanho máximo 3MB).
          </p>
        </div>
      </div>

      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-6 group">
          <InputLabel
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            for="file_input"
            >Atestado de Bons Antecedentes<span class="text-red-600">*</span></InputLabel
          >

          <Field
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help"
            id="file_input_certificate"
            name="file_input_certificate"
            type="file"
            @change="onFileSelect('certificate', $event)"
            accept=".pdf"
            :rules="fileRequired"
          />
          <ErrorMessage name="file_input_certificate" />
          <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
            PDF (1 Arquivo, Tamanho máximo 3MB).
          </p>
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <InputLabel
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            for="file_input"
            >Alvará de Folha Corrida</InputLabel
          >
          <TextInput
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help"
            id="file_input"
            type="file"
            @change="onFileSelect('license', $event)"
            accept=".pdf"
          />
          <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
            PDF (1 Arquivo, Tamanho máximo 3MB).
          </p>
        </div>
      </div>

      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-6 group">
          <InputLabel
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            for="file_input"
            >Certificados de Cursos e Capacitações</InputLabel
          >
          <div class="flex items-center justify-center w-full">
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
                  <span class="font-semibold">Clique para carregar</span>
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                  Máximo de 10 arquivos
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
        <div class="relative z-0 w-full mb-6 group">
          <InputLabel
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            for="file_input"
            >Comprovantes de Experiência Profissional</InputLabel
          >
          <div class="flex items-center justify-center w-full">
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
                  <span class="font-semibold">Clique para carregar</span>
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                  Máximo de 10 arquivos
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
      </div>

      <div class="flex items-center justify-between mt-4">
        <!-- <div class="mt-4">
          <InputLabel for="terms">
            <div class="flex items-center">
              <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

              <div class="ml-2 text-white">
                I agree to the
                <a
                  target="_blank"
                  class="underline text-sm text-blue-400 hover:text-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >Terms of Service</a
                >
                and
                <a
                  target="_blank"
                  class="underline text-sm text-blue-400 hover:text-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >Privacy Policy</a
                >
              </div>
            </div>
            <InputError class="mt-2" :message="form.errors.terms" />
          </InputLabel>
        </div> -->

        <PrimaryButton
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          :disabled="
            validateFullName(form.name) !== true ||
            validateBirthday(form.birth_date) !== true ||
            validateFullName(form.mothers_name) !== true ||
            validateCPF(form.cpf) !== true ||
            isRequired(form.identification_document) !== true ||
            isRequired(form.state) !== true ||
            isRequired(form.city) !== true ||
            isRequired(form.zip_code) !== true ||
            isRequired(form.address) !== true ||
            isRequired(form.number) !== true
          "
        >
          Registrar
        </PrimaryButton>
      </div>
    </Form>
  </div>
</template>
<script setup>
import Navbar from "@/Pages/Layout/Navbar.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Field, Form, ErrorMessage } from "vee-validate";
import { computed } from "@vue/reactivity";
import { ref } from "vue";
import {
  isRequired,
  fileRequired,
  validateFullName,
  validateBirthday,
  validateCEP,
} from "@/Pages/Validation/FirstLogin/validation.js";

const props = defineProps({
  cpfs: Array,
});

const form = useForm({
  name: "",
  birth_date: "",
  mothers_name: "",
  cpf: "",
  identification_document: "",
  state: "",
  city: "",
  zip_code: "",
  address: "",
  number: "",
  education: "",
  curriculum: "",
  certificate: "",
  license: "",
  receipts: [],
  courses: [],
  terms: false,
});

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

function validateCPF(value) {
  if (!value) {
    return "Este campo é obrigatório!";
  }

  value = value.replace(/[^0-9]/g, "");

  if (value.length !== 11) {
    return "Este campo deve ter 11 dígitos!";
  }

  if (value === "00000000000") return "CPF inválido";

  let Soma;
  let Resto;
  Soma = 0;

  for (let i = 1; i <= 9; i++) Soma += parseInt(value.substring(i - 1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

  if (Resto === 10 || Resto === 11) Resto = 0;
  if (Resto !== parseInt(value.substring(9, 10))) return "CPF inválido";

  Soma = 0;

  for (let i = 1; i <= 10; i++) Soma += parseInt(value.substring(i - 1, i)) * (12 - i);
  Resto = (Soma * 10) % 11;

  if (Resto === 10 || Resto === 11) Resto = 0;
  if (Resto !== parseInt(value.substring(10, 11))) return "CPF inválido";

  const cpf = value.replace(/[^0-9]/g, "");

  for (let i = 0; i < props.cpfs.length; i++) {
    if (props.cpfs[i] && props.cpfs[i].replace(/[^0-9]/g, "") === cpf) {
      return "Este CPF já existe!";
    }
  }

  return true;
}

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

const submit = () => {
  form.post(route("register.profile"), {
    headers: {
      "Content-Type": "multipart/form-data",
    },
    onFinish: () => form.reset("password", "password_confirmation"),
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
