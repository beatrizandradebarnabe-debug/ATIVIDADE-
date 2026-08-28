<?php 
 
declare(strict_types=1); 
 
require_once '../utilitarios.php'; 
 
echo "<h1> Central de Atendimento e Cadastro do CRM Senai </h1>"; 
 
/* 
 * TESTE 1 - Formatação de nome 
 */ 
 
$nome = "  ANA CLARA SILVA "; 

echo "<h2>Teste 1 - Formatar nome</h2>"; 
echo "Nome do(a) Cliente: " . formatarNome($nome); 
 
/* 
 * TESTE 2 - Limpeza do CPF 
 */ 
 
$cpf = "123.956.789-00"; 
 
echo "<h2>Teste 2 - Limpar CPF</h2>"; 
echo "CPF do(a) Cliente: " . limparCPF($cpf); 
 
 
/* 
 * TESTE 3 - CPF válido 
 */ 
 
echo "<h2>Validação CPF</h2>"; 
 
if (validarCPF("123.456.780-00")) { 
    echo "CPF válido."; 
} else { 
    echo "CPF inválido."; 
} 
 
 
echo "<h2> CPF inválido</h2>"; 
 
if (validarCPF("123.45")) { 
    echo "CPF válido."; 
} else { 
    echo "CPF inválido."; 
} 
 

echo "<h2>Validação e-mail</h2>"; 
 
if (validarEmail("teste@email.com")) { 
    echo "E-mail válido."; 
} else { 
    echo "E-mail inválido."; 
} 
 
 
/* 
 * TESTE 6 - Contrato igual a zero 
 */ 
 
echo "<h2> Contrato igual a zero</h2>"; 
 
if (validarCliente( 
    "João", 
    "123.456.789-00", 
    "joao@email.com", 
    0 
)) { 
    echo "Cadastro válido."; 
} else { 
    echo "Cadastro inválido, pois o contrato é zero."; 
} 
 
 
/* 
 * TESTE 7 - Buscar cliente 
 */ 
 
$clientes = [ 
    [ 
        "nome" => "Ana Clara Silva", 
        "cpf" => "12345678900", 
        "email" => "ana@email.com", 
        "contrato" => 1500.00, 
        "ativo" => true 
    ] 
]; 
 
echo "<h2> Buscar cliente</h2>"; 
 
$cliente = buscarCliente($clientes, "Ana Clara Silva"); 
 
if ($cliente !== null) { 
    echo "Cliente encontrado: " . formatarNome($cliente["nome"]); 
} else { 
    echo "Cliente não encontrado."; 
} 
 
 
/* 
 * TESTE 8 - Cliente inexistente 
 */ 
 
echo "<h2>Cliente inexistente</h2>"; 
 
$cliente = buscarCliente($clientes, "Carlos Souza"); 
 
if ($cliente !== null) { 
    echo "Cliente encontrado."; 
} else { 
    echo "Cliente não encontrado."; 
} 
 
 
/* 
 * TESTE 9 - Reajuste por referência 
 */ 
 
echo "<h2> Reajuste</h2>"; 
 
$contrato = 1000.00; 
 
aplicarReajuste($contrato, 10); 
 
echo "Novo contrato: " . formatarMoeda($contrato); 

 