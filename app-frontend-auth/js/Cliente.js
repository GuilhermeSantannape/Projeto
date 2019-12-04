
// Definir URL padrão do web service que será chamada nas funções
var url = "http://localhost/Projeto/app-pet/api/cliente";

// Selecionando o body no DOM (Document Object Model)
var body = document.querySelector("body");

// Evento de carregamento da página atual
body.onload = function () {
    // Chamar a função de visualização dos dados
    // Método GET
    carregarCliente();
}

// Selecionando o elemento cujo ID é "formulario"
var form = document.querySelector("#formulario");

// Evento de submeter o formulário 
form.onsubmit = function(event){
    event.preventDefault();
 
    // Criação de um objeto JSON
    var cliente = {};
 
    // Cada atributo busca por JS o ID do input e associa ao valor digitado 
    cliente.nome = document.querySelector("#txtnome").value;
    cliente.cpf = document.querySelector("#txtcpf").value;
    cliente.sexo = document.querySelector("#txtsexo").value;
    cliente.email = document.querySelector("#txtemail").value;
    cliente.endereco = document.querySelector("#txtendereco").value;
    cliente.numero = document.querySelector("#txtnumero").value;
    cliente.complemente = document.querySelector("#txtcomplemente").value;
    
    
    // Atributo ID só vai ter valor quando for um caso de EDIÇÃO (PUT)
    // Quando for um caso de CRIAÇÃO (POST) será nulo
    var id_cliente = document.querySelector("#txtid_cliente").value;
    
    // Se o ID estiver vazio então é uma CRIAÇÃO (POST)
    // Se o ID *não* estiver vazio então é uma EDIÇÃO (PUT) e precisa do ID
    if(id_cliente == "") 
        enviarCliente(cliente);
    else
        atualizarDadosCliente(cliente, id_cliente);
}

// Processo de inserção de dados digitados no formulário
// Método POST
function enviarCliente(cliente){
    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();

    
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 201) {
            console.log("Response recebido!");
            limparFormulario();
            carregarCliente();
        }
    };
    xhttp.open("POST", url, true);
    // Passando um cabeçalho com tipo de dados JSON
    xhttp.setRequestHeader("Content-Type","application/json");
    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send(JSON.stringify(cliente));
}

// Busca os dados do registro atual para que sejam mostrados no 
// formulário e posteriormente editados pelo usuário
// Método GET{id}
function editarCliente(id_cliente) {

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var cliente = JSON.parse(this.responseText);
            document.querySelector("#txtnome").value = cliente.nome;
            document.querySelector("#txtcpf").value =  cliente.cpf;
            document.querySelector("#txtsexo").value = cliente.sexo;
            document.querySelector("#txtemail").value = cliente.email;
            document.querySelector("#txtendereco").value = cliente.endereco;
            document.querySelector("#txtnumero").value = cliente.numero;
            document.querySelector("#txtcomplemente").value = cliente.complemente;
            document.querySelector("#txtid_cliente").value = cliente.id_cliente;
            
        }
    };
    // Concatena a URL padrão do Web Service com /id
    xhttp.open("GET", url + "/" + id_cliente, true);
    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}

// Edição dos dados no Web Service passando os dados e o ID
// Método PUT 
function atualizarDadosCliente(cliente, id_cliente){

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    
       if (this.readyState === 4 && this.status === 200) {            
            console.log("Response recebido!");
            limparFormulario();
            carregarCliente();
        }
    };
    // Concatena a URL padrão do Web Service com /id
    xhttp.open("PUT", url + "/" + id_cliente, true);
    xhttp.setRequestHeader("Content-Type","application/json");
    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    alert(JSON.stringify(cliente));
    xhttp.send(JSON.stringify(cliente));
}

// Procedimento de exclusão de dados via Web Service passando ID
// Método DELETE 
function excluirCliente(id_cliente) {

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            limparFormulario();
            carregarCliente();
        }
    };
    // Concatena a URL padrão do Web Servic com /id
    xhttp.open("DELETE", url + "/" + id_cliente, true);

    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}

function limparFormulario(){
    document.querySelector("#txtnome").value="";
    document.querySelector("#txtcpf").value="";
    document.querySelector("#txtsexo").value="";
    document.querySelector("#txtemail").value="";
    document.querySelector("#txtendereco").value="";
    document.querySelector("#txtnumero").value="";
    document.querySelector("#txtcomplemente").value="";
     
    document.querySelector("#txtid_cliente").value="";     
}

// Confirmação de exclusão do registro
function confirmarExcluir(id_cliente) {
    if(confirm("Tem certeza que deseja excluir este registro?"))
         excluirCliente(id_cliente);
    else 
        false;
}

// Função para recuperação de dados do web service
// Método GET e usar a função montarTabela com a estrutura JSON
function carregarCliente() {
    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    // Etapa 3: quando a requisição dá uma resposta 
    //          e chegar no estado de pronto, executa a função 
    xhttp.onreadystatechange = function () {
        // Estado de pront e status OK (conseguiu recuperar os dados)
        if (this.readyState === 4 && this.status === 200) {
            // Enviar os dados recuperados convertendo para JSON
            montarTabela(JSON.parse(this.responseText));
        }
    };
    // Etapa 1: prepara a requisição com método (GET, POST, PUT, DELETE)
    //          a URL onde está o Web Service e se é assíncrono ou não
    xhttp.open("GET", url, true);

    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));

    // Etapa 2: enviar a requisição preparada anteriormente
    xhttp.send();
}

// Recebe a estrutura JSON que veio a partir da requisição (GET)
function montarTabela(clientes) {

    var str="";
    str+= "<table>";
    str+= "<tr>";
    str+= "<th>nome</th>";
    str+= "<th>cpf</th>";
    str+= "<th>sexo</th>";
    str+= "<th>email</th>";
    str+= "<th>endereco</th>";
    str+= "<th>numero</th>";
    str+= "<th>complemente</th>";
    str+= "<th colspan='2'>Ações</th>";
    str+= "</tr>";

    // Iteração no JSON criando uma linha para cada registro
    for(var i in clientes){
        str+="<tr>";
        str+="<td>" + clientes[i].nome + "</td>";
        str+="<td>" + clientes[i].cpf + "</td>";
        str+="<td>" + clientes[i].sexo + "</td>";
        str+="<td>" + clientes[i].email + "</td>";
        str+="<td>" + clientes[i].endereco + "</td>";
        str+="<td>" + clientes[i].numero + "</td>";
        str+="<td>" + clientes[i].complemente + "</td>";
        
      
        // Construção de botões de ação para Edição e Exclusão passando o ID do registro
        str+="<td onclick='editarCliente(" + clientes[i].id_cliente + ")' class='beditar'>Editar</a></td>";
        str+="<td onclick='confirmarExcluir(" + clientes[i].id_cliente + ")' class='bexcluir'>Excluir</a></td>";
        str+="</tr>";
    } 
    str+= "</table>";

    // Buscando no documento HTML o ID com valor "tabela"
    var tabela = document.querySelector("#tabela");
    // Inserindo os dados concatenados no interior do elemento ID valor "tabela"
    tabela.innerHTML = str;
}
