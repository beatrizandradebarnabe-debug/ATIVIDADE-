```php
<?php

declare(strict_types=1);

// Formata o nome do cliente
function formatarNome(string $nome): string
{
    $nome = trim($nome);
    $nome = strtolower($nome);
    $nome = ucwords($nome);

    return $nome;
}

// Remove pontos e traços do CPF
function limparCPF(string $cpf): string
{
    return str_replace(['.', '-'], '', trim($cpf));
}

// Valida o CPF
function validarCPF(string $cpf): bool
{
    $cpf = limparCPF($cpf);

    if (strlen($cpf) === 11 && ctype_digit($cpf)) {
        return true;
    }

    return false;
}

// Valida o e-mail
function validarEmail(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }

    return false;
}

// Formata o valor para dinheiro
function formatarMoeda(float $valor): string
{
    return "R$ " . number_format($valor, 2, ',', '.');
}

// Procura um cliente pelo nome
function buscarCliente(array $clientes, string $nome): ?array
{
    $nomePesquisa = strtolower(trim($nome));

    foreach ($clientes as $cliente) {

        $nomeCliente = strtolower(trim($cliente['nome']));

        if ($nomeCliente === $nomePesquisa) {
            return $cliente;
        }
    }

    return null;
}

// Calcula o total dos contratos ativos
function calcularTotalContratosAtivos(array $clientes): float
{
    $total = 0.0;

    foreach ($clientes as $cliente) {

        if ($cliente['ativo'] === true) {
            $total += $cliente['contrato'];
        }
    }

    return $total;
}

// Calcula a média dos contratos
function calcularMediaContratos(array $clientes): float
{
    if (count($clientes) === 0) {
        return 0.0;
    }

    $total = 0.0;

    foreach ($clientes as $cliente) {
        $total += $cliente['contrato'];
    }

    return $total / count($clientes);
}

// Aplica um reajuste no contrato
function aplicarReajuste(float &$contrato, float $percentual): void
{
    $contrato = $contrato + ($contrato * $percentual / 100);
}

// Conta os clientes ativos
function contarClientesAtivos(array $clientes): int
{
    $quantidade = 0;

    foreach ($clientes as $cliente) {

        if ($cliente['ativo'] === true) {
            $quantidade++;
        }
    }

    return $quantidade;
}

// Encontra o maior contrato
function maiorContrato(array $clientes): float
{
    if (count($clientes) === 0) {
        return 0.0;
    }

    $maior = $clientes[0]['contrato'];

    foreach ($clientes as $cliente) {

        if ($cliente['contrato'] > $maior) {
            $maior = $cliente['contrato'];
        }
    }

    return $maior;
}

// Valida os dados do cliente
function validarCliente(
    string $nome,
    string $cpf,
    string $email,
    float $contrato
): bool {

    if (
        trim($nome) !== '' &&
        validarCPF($cpf) &&
        validarEmail($email) &&
        $contrato > 0
    ) {
        return true;
    }

    return false;
}


/* ==========================
   DADOS DOS CLIENTES
   ========================== */

$clientes = [

    [
        'nome' => 'João Silva',
        'cpf' => '12345678901',
        'email' => 'joao@email.com',
        'contrato' => 1500.00,
        'ativo' => true
    ],

    [
        'nome' => 'Maria Santos',
        'cpf' => '98765432100',
        'email' => 'maria@email.com',
        'contrato' => 2500.00,
        'ativo' => true
    ],

    [
        'nome' => 'Pedro Souza',
        'cpf' => '11122233344',
        'email' => 'pedro@email.com',
        'contrato' => 1000.00,
        'ativo' => false
    ]

];


/* ==========================
   TESTANDO AS FUNÇÕES
   ========================== */

echo "<h1>Sistema de Clientes</h1>";


// Mostra os nomes dos clientes
echo "<h2>Clientes</h2>";

foreach ($clientes as $cliente) {

    echo "Nome: " . formatarNome($cliente['nome']) . "<br>";
    echo "Contrato: " . formatarMoeda($cliente['contrato']) . "<br>";
    echo "E-mail: " . $cliente['email'] . "<br>";

    if ($cliente['ativo']) {
        echo "Status: Ativo";
    } else {
        echo "Status: Inativo";
    }

    echo "<hr>";
}


// Total dos contratos ativos
$totalAtivos = calcularTotalContratosAtivos($clientes);

echo "<h2>Total dos contratos ativos</h2>";
echo formatarMoeda($totalAtivos);


// Média dos contratos
$media = calcularMediaContratos($clientes);

echo "<h2>Média dos contratos</h2>";
echo formatarMoeda($media);


// Quantidade de clientes ativos
$ativos = contarClientesAtivos($clientes);

echo "<h2>Clientes ativos</h2>";
echo $ativos;


// Maior contrato
$maior = maiorContrato($clientes);

echo "<h2>Maior contrato</h2>";
echo formatarMoeda($maior);

?>
```

