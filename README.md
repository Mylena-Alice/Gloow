# Trabalho Final — Programação Back-End
# Loja de Gloss — Catálogo e Carrinho

*Disciplina:* Programação Back-End  
*Aluno:* Mylena Alice Moura Rodrigues  
*Professor:* Luiz Mesquita  
*Tema:* Loja de Gloss  
*Data:* Setembro/2025  

---

## Apêndice 1 — README do Projeto

###  Sobre o Projeto
Este projeto consiste no desenvolvimento de um sistema de e-commerce simples para uma loja de gloss, com catálogo de produtos e carrinho de compras.  
O sistema permite visualizar os produtos, adicionar itens ao carrinho, remover produtos e calcular o total automaticamente.  
Todos os produtos são carregados dinamicamente de um arquivo JSON, sem uso de banco de dados.

---

### Funcionalidades
- Listagem de produtos com imagens, descrição e preço.
- Busca de produtos por nome.
- Adição e remoção de produtos no carrinho.
- Cálculo automático do valor total.
- Produtos carregados via arquivo JSON.



### Tecnologias Utilizadas
- PHP 8+
- HTML5 e CSS3
- JSON para persistência de dados
- Sessões PHP para controle do carrinho
- XAMPP para execução local

---

###  Como Executar o Projeto
1. Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html).
2. Coloque a pasta do projeto dentro do diretóriona `htdocs` :
3. Inicie o servidor Apache pelo XAMPP.
4. Abra no navegador:


---

## Apêndice 2 — Estrutura do Repositório


/src
│── /app
│   ├── home.php          # Página inicial com catálogo e carrinho
│   ├── catalog.php       # Página de catálogo completa
│   ├── cart.php          # Página do carrinho
│   ├── header.php        # Cabeçalho da aplicação
│   ├── footer.php        # Rodapé da aplicação
│   ├── config.php        # Configurações globais do sistema
│
│── /lib
│   ├── functions.php     # Funções utilitárias para o projeto
│   ├── session.php       # Controle de sessões PHP
│
│── /models
│   ├── Product.php       # Classe de produto (POO)
│   ├── Cart.php          # Classe do carrinho (POO)
│
│── /dados
│   └── produtos.json     # Arquivo com os dados dos produtos
│
│── /public
│   ├── index.php         # Arquivo inicial 
│   └── /assets
│       ├── style.css     # Estilo principal do projeto
│       └── /imagens      # Imagens dos glosses
│
├── README.md             # Documentação do projeto






---

## Apêndice 3 — Evolução por Etapas

1. **Fundamentos do PHP**  
   - Criação do arquivo `index.php` como ponto de entrada da aplicação.  
   - Uso de `include`/`require` para reaproveitar trechos de código (`header.php` e `footer.php`).  
   - Primeiros testes com `echo` e sintaxe básica do PHP.  

2. **Variáveis e Tipos**  
   - Manipulação de variáveis simples para armazenar nome, preço e descrição dos glosses.  
   - Uso de números decimais (float) para representar preços (`19.90`, `22.50`).  
   - Strings para nomes e descrições de produtos.  

3. **Estruturas de Controle**  
   - Uso de `if/else` para verificar se o carrinho está vazio ou não.  
   - Estrutura `foreach` para percorrer a lista de produtos (`produtos.json`) e exibir dinamicamente.  
   - Uso de condições em `isset($_GET['add'])` e `isset($_GET['remove'])` para controlar ações no carrinho.  

4. **Arrays**  
   - Criação de um array associativo indexado pelo `id` do produto em `functions.php`.  
   - Manipulação de arrays no carrinho para armazenar quantidade de cada produto selecionado.  
   - Uso de `array_filter` no catálogo para implementar a busca de produtos.  

5. **GET/POST + Includes**  
   - `GET`: utilizado para buscar produtos (`?q=nome`) e para adicionar/remover itens do carrinho (`?add=id`, `?remove=id`).  
   - `POST`: utilizado no formulário de newsletter (`footer.php`).  
   - `include` e `require_once`: usados para organizar o projeto em múltiplos arquivos (`header.php`, `footer.php`, `functions.php`, etc).  

6. **Funções**  
   - Implementação no arquivo `functions.php`:  
     - `carregarProdutos()` → lê o arquivo JSON e retorna produtos indexados pelo ID.  
     - `adicionarCarrinho($id)` → adiciona 1 unidade ao produto no carrinho.  
     - `removerCarrinho($id)` → reduz quantidade ou remove item do carrinho.  
   - Essas funções centralizam a lógica, facilitando manutenção e reutilização.  

7. **Sessões**  
   - Implementação de `session_start()` em `session.php` para manter os dados do carrinho ativos entre páginas.  
   - Carrinho armazenado em `$_SESSION['carrinho']`.  

---

## Decisões Técnicas

- **GET vs. POST no projeto**  
  - **GET**: usado para interações rápidas e que não afetam a segurança, como pesquisa no catálogo (`?q=gloss`) e adicionar/remover produtos (`?add=id`).  
  - **POST**: usado em formulários que podem armazenar dados do usuário (exemplo: cadastro de newsletter no `footer.php`).  
  - Essa decisão garante clareza: GET para navegação e POST para envio de dados do usuário.  

- **Cookies vs. Sessões**  
  - **Sessões** foram escolhidas porque o carrinho precisa estar protegido no servidor e expirar ao encerrar a navegação.  
  - **Cookies** não foram usados para o carrinho, pois armazenariam dados no navegador, facilitando adulterações.  
  - Cookies seriam aplicáveis apenas em preferências visuais ou login automático (não implementados aqui).  

- **Por que usar funções próprias em vez de repetir código**  
  - Evita repetição de lógica em `home.php`, `cart.php` e `catalog.php`.  
  - Se a forma de carregar os produtos mudar (ex.: de JSON para banco de dados), basta alterar apenas `functions.php`.  
  - Mantém o código modular e escalável, facilitando futuras melhorias.  

---

## Diagrama das Classes

    class Product {
        +int id
        +string nome
        +float preco
        +string imagem
        +__construct(id, nome, preco, imagem)
    }

    class Cart {
        -array items
        +add(id)
        +remove(id)
        +getItems()
    }

    Cart "1" --> "*" Product

---

## Link para o vídeo de  demonstração

https://youtu.be/v_PyIQt9TJo?feature=shared
1. Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html).
2. Coloque a pasta do projeto dentro do diretório:
