
# 🛍️ Catálogo de Produtos 

Este é um sistema web simples e responsivo de **catálogo de produtos**, desenvolvido com **PHP (sem frameworks)**, **Mysql** e frontend em **HTML, CSS e JavaScript**. O sistema lista produtos e permite a separação visual dos produtos com ou sem desconto

---

## 🚀 Funcionalidades

- Cadastro de produtos com nome, descrição, preço, imagem e dados de desconto.
- Listagem separada de produtos com e sem desconto.
- Exibição dos produtos em carrosséis responsivos.
- Banners dinâmicos e adaptativos conforme o tamanho da tela.
- Edição dos dados de produtos cadastrados.
- Layout responsivo para dispositivos móveis, tablets e desktops.

---

## 🧱 Modelo Relacional

Banco de dados: `Mysql`  
Tabela: `produtos`

| Campo           | Tipo     | Descrição                                               |
|------------------|----------|-----------------------------------------------------------|
| id              | INTEGER  | Chave primária, autoincrementada                         |
| nome            | VARCHAR     | Nome do produto                                           |
| preco           | DECIMAL     | Preço original do produto                                 |
| descricao       | TEXT     | Descrição do produto                                      |
| imagem          | VARCHAR     | Caminho da imagem do produto                              |
| tem_desconto    | INTEGER  | Flag (0 ou 1) indicando se o produto tem desconto         |
| preco_desconto  | DECIMAL     | Preço com desconto (se `tem_desconto = 1`)                |


---

## 📋 Requisitos Funcionais

- **RF01** – O sistema deve permitir o cadastro de produtos com nome, descrição, imagem, preço e dados de desconto.
- **RF02** – O sistema deve listar separadamente os produtos com e sem desconto.
- **RF03** – O sistema deve apresentar os produtos em carrosséis horizontais.
- **RF04** – O sistema deve mostrar banners que se adaptam ao tamanho da tela.
- **RF05** – O sistema deve ser responsivo, adaptando layout e conteúdos para diferentes dispositivos.
- **RF06** – O sistema deve permitir a edição completa de um produto, inclusive valores de desconto.


---

## 💻 Tecnologias Utilizadas

- **Frontend:**
  - HTML5
  - CSS3
  - JavaScript (puro)
  

- **Backend:**
  - PHP (sem frameworks)
  - MySQL (banco de dados leve e embutido)

---

## 📂 Estrutura do Projeto

```
CATALOGO/
├── actions/
│ └── salvarproduto.php # Lógica para salvar produto
├── controllers/
│ └── produtocontroller.php # Controle principal de produto
├── models/
│ ├── conexao.php # Conexão com o banco de dados
│ └── produto.php # Model com regras de produto
├── public/
│ ├── css/
│ │ ├── breve.css # Estilo para produtos "em breve"
│ │ ├── cadastro.css # Estilo da tela de cadastro
│ │ ├── index.css # Estilo geral da página inicial
│ │ └── produto.css # Estilo específico de produtos
│ ├── js/
│ │ ├── cadastro.js # Validação do formulário
│ │ └── index.js # Página principal e listagem de produtos
├── uploads/ # Imagens salvas dos produtos
├── cadastro.php # Página de cadastro
├── em-breve.php # Página de produtos indisponíveis
├── index.php # Página inicial do catálogo
├── produto.php # Página de produto individual
├── produtos.sql # Script SQL do banco
└── README.md # Documentação do projeto
```

---

## ▶️ Como Executar com XAMPP

### 1. Instalar o XAMPP
- Baixe e instale o XAMPP: https://www.apachefriends.org/

### 2. Colocar os arquivos na pasta correta
- Copie todos os arquivos do projeto para:
  ```
  C:\xampp\htdocs\catalogo
  ```

### 3. Iniciar o servidor Apache
- Abra o **Painel de Controle do XAMPP**
- Clique em **Start** no módulo **Apache**
- Clique em **Start** no módulo **MYSQL**

### 4. Acessar o sistema
Abra o navegador e acesse:
```
http://localhost/catalogo/public/index.php
```

### 5. Banco de dados
- Baixe o arquivo `SQL` do projeto e execute.
- Não há necessidade de configurar manualmente o banco.

---

## 🖼️ Responsividade e Design

- Cards criados com e CSS puro, se ajustando dinamicamente.
- Produtos com desconto são exibidos separado dos produtos sem desconto.
- Banners no topo da página que se adaptam automaticamente ao tamanho da tela.
- Layout otimizado para **celulares**, **tablets** e **desktops**.
- Exibição do preço original riscado ao lado do valor com desconto, se aplicável.

---

## 🧪 Possibilidades Futuras (para expansão)

> _*Estes itens não estão implementados, mas podem ser considerados futuramente:*_

- Sistema de login e autenticação de administradores
- Filtros por categoria, faixa de preço ou porcentagem de desconto
- Paginação para muitos produtos
- Modal para visualização ampliada do produto
- Exportação de dados em CSV/Excel

---

## 🤝 Contribuição

Este projeto foi desenvolvido para um processo seletivo da teiú industrias. 

---

Desenvolvido com imaginação e dedicação.
