export function isRequired(value) {
    if (!value || value.trim() === "") {
        return "Este campo é obrigatório!";
    }
    return true;
}

export function fileRequired(value) {
    if (!value) {
        return "Este campo é obrigatório!";
    }
    return true;
}

export function validateFullName(name) {
    let errorMessage = "";

    if (!name || name.trim() === "") {
        errorMessage = "Este campo é obrigatório!";
    } else if (!/^[a-zA-Z\u00C0-\u017F\s]+$/.test(name)) {
        errorMessage = "O nome não deve conter números ou caracteres especiais.";
    } else if (name.trim().split(" ").length < 2) {
        errorMessage = "Insira seu nome completo.";
    }

    if (errorMessage) {
        return errorMessage;
    }

    return true;
}


export function validateBirthday(value) {
    if (!value) {
        return "Este campo é obrigatório!";
    }
    const date = new Date(value);
    if (isNaN(date.getTime())) {
        return "Este campo deve ser uma data válida!";
    }
    const age = new Date().getFullYear() - date.getFullYear();

    if (age < 16) {
        return "No mínimo 16 anos para se inscrever.";
    } else if (age > 150) {
        return "Tem certeza que esta data está correta?";
    }
    return true;
}

export async function validateCEP(value) {
    if (!value) {
        return "Este campo é obrigatório!";
    }

    value = value.replace(/\D/g, "");

    const regex = /^[0-9]{8}$/;
    if (!regex.test(value)) {
        return "Este campo deve ser um CEP válido!";
    }
    const response = await fetch(`https://viacep.com.br/ws/${value}/json/`);
    const data = await response.json();
    if (data.erro) {
        return "Este CEP não existe";
    }
    return true;
}

export function onFileCourses(event) {
    const courses = event.target.files;
    if (courses.length > 0) {

        if (courses.length > 10) {
            alert("Por favor, selecione no máximo 10 arquivos.");
            return;
        }
        for (let i = 0; i < courses.length; i++) {
            const file = courses[i];

            if (file.size > 3 * 1024 * 1024) {
                alert(`O arquivo ${file.name} excede o tamanho máximo de 3MB.`);
                return;
            }

            if (file.type !== "application/pdf") {
                alert(`O arquivo ${file.name} não é um arquivo PDF válido.`);
                return;
            }
        }

        form.courses = courses;
    }
}