# ATIVIDADE-
## Descrição 
 
Este projeto foi desenvolvido em PHP como uma aplicação simples de uma Central de Atendimento e Cadastro de clientes para um CRM. 
 
O sistema utiliza arrays para simular os dados dos clientes, sem a necessidade de banco de dados. 
 
O projeto possui funções reutilizáveis para: 
 
- Formatação de nomes; 
- Limpeza de CPF; 
- Validação de CPF; 
- Validação de e-mail; 
- Formatação de valores em moeda brasileira; 
- Busca de clientes; 
- Cálculo de contratos ativos; 
- Cálculo da média dos contratos; 
- Contagem de clientes ativos; 
- Identificação do maior contrato; 
- Aplicação de reajuste percentual; 
- Validação de cadastro. 
 
## Estrutura do projeto 
 
```text 
projeto_crm/ 
│ 
├── index.php 
├── utilitarios.php 
├── README.md 
│ 
└── testes/ 
    └── testes.php 

Tecnologias utilizadas 

PHP 

HTML 

CSS 

Como executar 

Instale o PHP ou utilize um ambiente como XAMPP. 

Coloque a pasta projeto_crm dentro da pasta do servidor. 

Inicie o servidor. 

Abra o arquivo index.php pelo servidor local. 

Exemplo utilizando o servidor interno do PHP: 

php -S localhost:8000 

Depois acesse: 

http://localhost:8000 

Exemplos de testes 

Teste de nome 

Entrada: 

 ANA CLARA SILVA 

Resultado esperado: 

Ana Clara Silva 

Teste de CPF 

Entrada: 

123.456.789-00 

Resultado após limpeza: 

12345678900 

Teste de contrato 

Entrada: 

1500.00 

Resultado formatado: 

R$ 1.500,00 

Teste de cliente inexistente 

Busca: 

Carlos Oliveira 

Resultado esperado: 

Cliente não encontrado. 

Teste de reajuste 

Contrato: 

R$ 1.000,00 

Reajuste: 

10% 

Resultado: 

R$ 1.100,00 

Teste de contrato igual a zero 

Um cliente com contrato igual a zero deve ser considerado inválido pela função de validação. 

Princípio DRY 

O projeto utiliza o princípio DRY (Don't Repeat Yourself), pois as operações que podem ser reutilizadas foram colocadas em funções. 

Por exemplo, em vez de escrever várias vezes o código para formatar dinheiro, utilizamos: 

formatarMoeda($valor); 

Da mesma forma, a limpeza do CPF é feita pela função: 

limparCPF($cpf); 

Assim, a mesma lógica pode ser utilizada em diferentes partes do sistema. 

Passagem por referência 

A função aplicarReajuste() utiliza o símbolo &: 

function aplicarReajuste(float &$contrato, float $percentual): void 

Isso permite alterar diretamente o valor original da variável enviada para a função. 

Conclusão 

O projeto demonstra conceitos básicos de PHP, como: 

Funções; 

Parâmetros tipados; 

Retorno de funções; 

Arrays; 

foreach; 

if, elseif e else; 

Passagem por referência; 

require_once; 

Organização de código; 

Validação e tratamento de dados. 

 
--- 
 
# 6. Como vai ficar a pasta 
 
No final, confira se está exatamente assim: 
 
```text 
projeto_crm 
│ 
├── index.php 
│ 
├── utilitarios.php 
│ 
├── README.md 
│ 
└── testes 
    │ 
    └── testes.php 

 