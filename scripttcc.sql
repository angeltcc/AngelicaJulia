create database projetotcc;
use projetotcc;

create table tb_clientes (
id_cliente INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(45) NOT NULL,
CPF BIGINT (11) ZEROFILL,
telefone BIGINT(11) ZEROFILL,
email VARCHAR(100) UNIQUE NOT NULL,
usuario VARCHAR(15) UNIQUE,
senha VARCHAR(32) NOT NULL,
nivel INT);

create table tb_enderecos (
id_endereco INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
rua VARCHAR(45) NOT NULL,
bairro VARCHAR(45) NOT NULL,
CEP INT(8) UNSIGNED ZEROFILL NOT NULL,
complemento VARCHAR(50),
cidade VARCHAR(45) NOT NULL,
estado VARCHAR(2) NOT NULL,
cliente INT,
CONSTRAINT ch_estado CHECK (estado in ('AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS',
'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO' )),
CONSTRAINT fk_id_cliente1 FOREIGN KEY(cliente) REFERENCES tb_clientes (id_cliente));

create table tb_vendas(
id_venda INT AUTO_INCREMENT PRIMARY KEY,
data_venda DATE NOT NULL,
frete FLOAT(6,2),
cliente INT,
CONSTRAINT fk_id_cliente2 FOREIGN KEY(cliente) REFERENCES tb_clientes(id_cliente));

create table tb_produtos(
id_produto INT AUTO_INCREMENT PRIMARY KEY,
nome_produto VARCHAR (50),
descricao VARCHAR (255),
tamanho VARCHAR(3) NOT NULL,
valor FLOAT(6,2) NOT NULL,
modelagem VARCHAR (9),
cor VARCHAR (20),
categoria VARCHAR (12),
imagem VARCHAR (255),
estoque INT NOT NULL,
CONSTRAINT ch_categoria CHECK (categoria in ('Minimalista', 'Medio', 'Extravagante','Personalizado')),
CONSTRAINT ch_modelagem CHECK (modelagem in ('Regular', 'Baby-look')),
CONSTRAINT ch_tamanho CHECK (tamanho in ('P', 'PP', 'M', 'G', 'GG', 'GGG', 'EGG')),
CONSTRAINT ch_cor CHECK (cor in ('Preto', 'Branco', 'Vermelho', 'Azul', 'Cinza')));

create table tb_vendaprodutos(
venda INT,
produto INT,
quantidade INT NOT NULL,
CONSTRAINT fk_id_venda FOREIGN KEY (venda) REFERENCES tb_vendas(id_venda),
CONSTRAINT fk_id_produto FOREIGN KEY (produto)REFERENCES tb_produtos(id_produto));

create table tb_fornecedores(
id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
telefone BIGINT(11) ZEROFILL NOT NULL,
CNPJ BIGINT(14) ZEROFILL NOT NULL);

create table tb_compras(
id_compra INT AUTO_INCREMENT PRIMARY KEY,
data DATE NOT NULL,
fornecedor INT,
CONSTRAINT fk_id_fornecedores FOREIGN KEY (fornecedor) REFERENCES tb_fornecedores(id_fornecedor));

create table tb_materiasprimas(
id_materia INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR (45) NOT NULL,
valor FLOAT (6,2) NOT NULL,
cor VARCHAR (20),
tamanho VARCHAR(3),
modelagem VARCHAR (9) NOT NULL,
imagem VARCHAR (255),
estoque INT NOT NULL,
CONSTRAINT ch_modelagem1 CHECK (modelagem in ('Regular', 'Baby-look')));

create table tb_materiaprodutos(
materia INT,
produto INT ,
quantidade INT NOT NULL,
CONSTRAINT fk_id_materia2 FOREIGN KEY (materia) REFERENCES tb_materiasprimas (id_materia),
CONSTRAINT fk_id_produto2 FOREIGN KEY (produto) REFERENCES tb_produtos (id_produto));

create table tb_comprasmaterias(
compra INT,
fornecedor INT,
materia INT,
quantidade INT,
CONSTRAINT fk_id_compra FOREIGN KEY (compra) REFERENCES tb_compras (id_compra),
CONSTRAINT fk_id_fornecedor2 FOREIGN KEY (fornecedor) REFERENCES tb_fornecedores(id_fornecedor),
CONSTRAINT fk_id_materia FOREIGN KEY (materia) REFERENCES tb_materiasprimas (id_materia));

INSERT INTO tb_clientes values (1, 'admin', 11111111111, 11111111111, 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1); /* senha admin */
INSERT INTO tb_clientes values (2, '2', 22222222222, 22222222222, '2@2.com', '2', 'c81e728d9d4c2f636f067f89cc14862c', null); /* senha 2 */
INSERT INTO tb_clientes values (3, '3', 33333333333, 33333333333, '3@3.com', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', null); /* senha 3 */
INSERT INTO tb_clientes values (4, 'Gon Freecs', 12345678901, 12345678901, 'gon@hunter.com', 'gon', 'c6fac1b43c0b97c1a80e11267cca23e9', null); /* senha gon */
INSERT INTO tb_clientes values (5, 'Robson Lanches', 12332112332, 88345678900, 'robsonlindo@gmail.com', 'rob', '69727fef27a967e0f67cfece8fd225b8', null); /* senha robson */
INSERT INTO tb_clientes values (6, 'Vegeta Goku', 77777777777, 77777777777, 'vegetabolasdodragao@db.com', 'vegeta', '22298fb40914e48b1556ce0c8ffa7c93', null); /* senha vegeta */

INSERT INTO tb_enderecos values (1, 'casa', 'teste 444', 'Coqueiral', 00000067, 'casa', 'cascavel', 'CE', 1);
INSERT INTO tb_enderecos values (2, 'minha casa','Limão 456', 'Floresta', 12312312, 'apartamento', 'Ratanabá', 'AM', 2);
INSERT INTO tb_enderecos values (3, 'trabalho','Maçã 55', 'Frutas', 45454545, 'casa', 'Pindorama', 'RO', 1);
INSERT INTO tb_enderecos values (4, 'casa','Avenida Brasil 123', 'Coqueiral', 08000800, 'acampamento', 'São Paulo', 'SP', 3);
INSERT INTO tb_enderecos values (5, 'casa da tia','Avenida Guaíra 22', 'Centro', 56756756, 'casa', 'Curitiba', 'PR', 4);
INSERT INTO tb_enderecos values (6, 'trabalho','Visconde do Rio Branco 8909', 'Itapuera', 90021234, 'edifício', 'cascavel', 'CE', 1);
INSERT INTO tb_enderecos values (7, 'casa da vó','teste 222', 'Testando', 98989898, 'bloco 2 ap 4', 'São Luís', 'MA', 5);
INSERT INTO tb_enderecos values (8, 'rebouças','Monte Castelo 433', 'Maria Luiza', 09090909, null, 'Campo Grande', 'MT', 5);
INSERT INTO tb_enderecos values (9, 'centro','Getúlio Vargas 900', 'Centro', 87878787, null, 'Porto Alegre', 'RS', 6);
INSERT INTO tb_enderecos values (10, 'apartamento','Itamar Franco 4534', 'Naruto', 77777777, null, 'Jacarepaguá', 'MS', 6);

INSERT INTO tb_produtos values (null, 'Gato aquoso','Um gato sob a inundação ', 'G', 65.00, 'Regular', 'Branco', 'Extravagante',
'../Images/camisetas/gato-extra.png', 50);
INSERT INTO tb_produtos values (null, 'Olho monstro', 'Um olho devorando uma moça', 'G', 65.00, 'Regular', 'Branco', 'Extravagante', 
'../Images/camisetas/olho-extra.png', 50);
INSERT INTO tb_produtos values (null, 'Coral vívido', 'A vida no fundo do mar', 'M', 58.00, 'Regular', 'Branco', 'Medio', 
'../Images/camisetas/peixe-med.png', 50);
INSERT INTO tb_produtos values (null, 'Um olhar sobre a lua','Um gato encarando o luar', 'P', 55.00, 'Regular', 'Branco', 'Medio',
'../Images/camisetas/gato-med.png', 50);
INSERT INTO tb_produtos values (null, 'Peixe azul-marinho', 'Um peixe exibindo suas belas nadadeiras', 'G', 65.00, 'Regular', 'Branco', 'Extravagante', 
'../Images/camisetas/peixe-extra.png', 50);
INSERT INTO tb_produtos values (null, 'Olho monstro', 'Um olho devorando uma moça', 'PP', 65.00, 'Regular', 'Preto', 'Extravagante', 
'../Images/camisetas/olhoextra-preto.png', 50);
INSERT INTO tb_produtos values (null, 'Olho nas nuvens', 'Um olho delicado', 'M', 45.00, 'Regular', 'Branco', 'Minimalista', 
'../Images/camisetas/olho-min.png', 50);
INSERT INTO tb_produtos values (null, 'Olho monstro', 'Um olho devorando uma moça', 'M', 65.00, 'Regular', 'Azul', 'Extravagante', 
'../Images/camisetas/olhoextra-azul.png', 50);
INSERT INTO tb_produtos values (null, 'Gato siamês', 'Um gato olhando de lado', 'EGG', 55.00, 'Regular', 'Branco', 'Minimalista', 
'../Images/camisetas/gato-min.png', 50);
INSERT INTO tb_produtos values (null, 'Olho nas nuvens', 'Um olho delicado', 'GGG', 45.00, 'Baby-look', 'Branco', 'Minimalista', 
'../Images/camisetas/olhominb-branco.png', 50);
INSERT INTO tb_produtos values (null, 'Olho monstro', 'Um olho devorando uma moça', 'EGG', 65.00, 'Regular', 'Vermelho', 'Extravagante', 
'../Images/camisetas/olhoextra-vermelho.png', 50);
INSERT INTO tb_produtos values (null, 'Peixe azul-marinho', 'Um peixe exibindo suas belas nadadeiras', 'PP', 65.00, 'Regular', 'Branco', 'Extravagante', 
'../Images/camisetas/peixe-extra.png', 50);
INSERT INTO tb_produtos values (null, 'Olho nas nuvens', 'Um olho delicado', 'GG', 45.00, 'Baby-look', 'Cinza', 'Minimalista', 
'../Images/camisetas/olhominb-cinza.png', 50);
INSERT INTO tb_produtos values (null, 'Peixe-palhaço', 'Um peixe laranja', 'PP', 50.00, 'Regular', 'Branco', 'Minimalista', 
'../Images/camisetas/peixe-min.png', 50);
INSERT INTO tb_produtos values (null, 'Olho monstro', 'Um olho devorando uma moça', 'GG', 65.00, 'Regular', 'Cinza', 'Extravagante', 
'../Images/camisetas/olhoextra-cinza.png', 50);
INSERT INTO tb_produtos values (null, 'Olho nas nuvens', 'Um olho delicado', 'PP', 45.00, 'Baby-look', 'Cinza', 'Minimalista', 
'../Images/camisetas/olhominb-cinza.png', 50);
INSERT INTO tb_produtos values (null, 'Peixe azul-marinho', 'Um peixe exibindo suas belas nadadeiras', 'GGG', 65.00, 'Regular', 'Branco', 'Extravagante', 
'../Images/camisetas/peixe-extra.png', 50);
INSERT INTO tb_produtos values (null, 'Um olhar sobre a lua','Um gato encarando o luar', 'GG', 55.00, 'Regular', 'Preto', 'Medio',
'../Images/camisetas/gatomed-preto.png', 50);
INSERT INTO tb_produtos values (null, 'Olho nas nuvens', 'Um olho delicado', 'EGG', 45.00, 'Baby-look', 'Preto', 'Minimalista', 
'../Images/camisetas/olhominb-preto.png', 50);
INSERT INTO tb_produtos values (null, 'Olho monstro', 'Um olho devorando uma moça', 'P', 65.00, 'Regular', 'Cinza', 'Extravagante', 
'../Images/camisetas/olhoextra-cinza.png', 50);
INSERT INTO tb_produtos values (null, 'Olho nas nuvens', 'Um olho delicado', 'GG', 45.00, 'Baby-look', 'Vermelho', 'Minimalista', 
'../Images/camisetas/olhominb-vermelho.png', 50);
INSERT INTO tb_produtos values (null, 'Olho nas nuvens', 'Um olho delicado', 'EGG', 45.00, 'Baby-look', 'Azul', 'Minimalista', 
'../Images/camisetas/olhominb-azul.png', 50);





INSERT INTO tb_materiasprimas values (null, 'Camiseta Regular', 20.00, 'Branco', 'PP', 'Regular', '../Images/camisetas/cambase.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Regular', 20.00, 'Branco', 'P', 'Regular', '../Images/camisetas/cambase.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Regular', 20.00, 'Branco', 'M', 'Regular', '../Images/camisetas/cambase.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Regular', 20.00, 'Branco', 'G', 'Regular', '../Images/camisetas/cambase.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Regular', 20.00, 'Branco', 'GG', 'Regular', '../Images/camisetas/cambase.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Regular', 20.00, 'Branco', 'GGG', 'Regular', '../Images/camisetas/cambase.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Regular', 20.00, 'Branco', 'EGG', 'Regular', '../Images/camisetas/cambase.png', 50);

INSERT INTO tb_materiasprimas values (null, 'Camiseta Baby-look', 20.00, 'Branco', 'PP', 'Baby-look', '../Images/camisetas/basemin.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Baby-look', 20.00, 'Branco', 'P', 'Baby-look', '../Images/camisetas/basemin.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Baby-look', 20.00, 'Branco', 'M', 'Baby-look', '../Images/camisetas/basemin.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Baby-look', 20.00, 'Branco', 'G', 'Baby-look', '../Images/camisetas/basemin.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Baby-look', 20.00, 'Branco', 'GG', 'Baby-look', '../Images/camisetas/basemin.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Baby-look', 20.00, 'Branco', 'GGG', 'Baby-look', '../Images/camisetas/basemin.png', 50);
INSERT INTO tb_materiasprimas values (null, 'Camiseta Baby-look', 20.00, 'Branco', 'EGG', 'Baby-look', '../Images/camisetas/basemin.png', 50);
