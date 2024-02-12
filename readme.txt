# sistema-php-cadastro-e-consulta-de-processos

Sistema confeccionado com PHP, HTML, CSS, JS, Bootstrap e o Banco de Dados em MySQL. 

Este projeto é um sistema de cadastro e consulta de processos e protocolos. Há duas abas (processo e protocolo), onde no Processo é possível cadastrar algum documento oriundo de outro sistema para apenas salvar as informações, com opção de adicionar um anexo em PDF, caso possua. 

Na aba Protocolo é possível cadastrar um novo para gerar um número único pelo próprio sistema.


É necessário criar uma pasta com nome "uploads", onde serão armazenados os arquivos enviados por upload no formulário do processo e uma pasta "relatorios" para salvar o relatório em pdf.


O usuário padrão é "admin" e senha "admin". 

Para conexão com o banco de dados, altere as informações do arquivo "conexao.php" e "init.php", conforme seus dados de conexão.


Sugestões e melhorias são bem-vindas.

Por gentileza dar os créditos :)

Obrigado!

#Atualização v 1.1 (2024)

- Melhorias no layout;
- Adicionado página para cadastro e exclusão de usuários;
- Adicionado página para listagem de usuários cadastrados;
- Adicionado página de edição dos usuários cadastrados;
- Envio de usuário apenas em Lowercase;
- Validação de senha com SHA1 para cadastro de usuários; 
- Adicionado paginação de relatório de processos, a ser gerado por datas ou nome do envolvido no processo;
- Cadastro de usuários pelo front e listagem das informações pelo banco de dados no processo;
- Relatório gerado com dompdf e composer.
