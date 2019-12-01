
var url = "http://localhost/Projeto/app-pet/api/animais";

var body = document.querySelector("body");

body.onload = function () {

    carregarAnimais();
}

var form = document.querySelector("#formulario");

form.onsubmit = function(event){
    event.preventDefault();

    var animal = {};
 
    animal.desc_animal = document.querySelector("#txtnome").value;
    animal.id_raca = document.querySelector("#txtraca").value;
    animal.dta_nasc = document.querySelector("#txtdata").value;
    animal.sexo = document.querySelector("#txtsexo").value;

    var id_animal = document.querySelector("#txtid_animal").value;

    if(id_animal == "") 
        enviarAnimal(animal);
    else
        atualizarDadosAnimal(animal, id_animal);
}

function enviarAnimal(animal){

    var xhttp = new XMLHttpRequest();

    
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 201) {
            console.log("Response recebid_animalo!");
            limparFormulario();
            carregarAnimais();
        }
    };
    xhttp.open("POST", url, true);

    xhttp.setRequestHeader("Content-Type","application/json");

    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send(JSON.stringify(animal));
}

function editarAnimal(id_animal) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var animal = JSON.parse(this.responseText);
            document.querySelector("#txtnome").value = animal.desc_animal;
            document.querySelector("#txtraca").value =  animal.id_raca;
            document.querySelector("#txtdata").value = animal.dta_nasc;
            document.querySelector("#txtsexo").value = animal.sexo;
            document.querySelector("#txtid_animal").value = id_animal;
        }
    };

    xhttp.open("GET", url + "/" + id_animal, true);

    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}

function atualizarDadosAnimal(animal, id_animal){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    
       if (this.readyState === 4 && this.status === 200) {            
            console.log("Response recebid_animalo!");
            limparFormulario();
            carregarAnimais();
        }
    };

    xhttp.open("PUT", url + "/" + id_animal, true);
    xhttp.setRequestHeader("Content-Type","application/json");

    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send(JSON.stringify(animal));
}

function excluirAnimal(id_animal) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            limparFormulario();
            carregarAnimais();
        }
    };
    xhttp.open("DELETE", url + "/" + id_animal, true);

    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}

function limparFormulario(){
    document.querySelector("#txtnome").value="";
    document.querySelector("#txtraca").value="";
    document.querySelector("#txtdata").value="";
    document.querySelector("#txtsexo").value="";  
    document.querySelector("#txtid_animal").value="";     
}

function confirmarExcluir(id_animal) {
    if(confirm("Tem certeza que deseja excluir este registro?"))
        excluirAnimal(id_animal);
    else 
        false;
}

function carregarAnimais() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            montarTabela(JSON.parse(this.responseText));
        }
    };
    xhttp.open("GET", url, true);

    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));

    xhttp.send();
}

function montarTabela(animais) {

    var str="";
    str+= "<table>";
    str+= "<tr>";
    str+= "<th>Nome</th>";
    str+= "<th>Raça</th>";
    str+= "<th>Data de Nascimento</th>";
    str+= "<th>Sexo</th>";
    str+= "<th colspan='2'>Ações</th>";
    str+= "</tr>";

    for(var i in animais){
        str+="<tr>";
        str+="<td>" + animais[i].desc_animal + "</td>";
        str+="<td>" + animais[i].id_raca + "</td>";
        str+="<td>" + animais[i].dta_nasc + "</td>";
        str+="<td>" + animais[i].sexo + "</td>";
        str+="<td onclick='editarAnimal(" + animais[i].id_animal + ")' class='beditar'>Editar</a></td>";
        str+="<td onclick='confirmarExcluir(" + animais[i].id_animal + ")' class='bexcluir'>Excluir</a></td>";
        str+="</tr>";
    } 
    str+= "</table>";

    var tabela = document.querySelector("#tabela");
    tabela.innerHTML = str;
}
