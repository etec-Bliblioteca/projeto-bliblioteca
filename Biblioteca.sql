
/*EXECUTE A QUERY AQUI*/
create database Biblioteca;

use Biblioteca;

CREATE TABLE revista (
    id_revista INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descricao VARCHAR(255),
    anoPubli INT,
    edicao INT,
    periodo VARCHAR(20),
    tema VARCHAR(256),
    issn VARCHAR(256),
    quantidade INT NOT NULL,
    imagem VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    rm INT(5) PRIMARY KEY,
    nivel INT NOT NULL,
    estado VARCHAR(30) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    turma VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

insert into users (rm,nivel,estado,nome,email,telefone,senha) 
values (0,1,'ativo','admin','admin@gmail.com','12345','21232f297a57a5a743894a0e4a801fc3');


/* NIVEL 0 = USUARIO*/
/* NIVEL 1 = ADM*/

CREATE TABLE agendamento (
    id_agen INT PRIMARY KEY AUTO_INCREMENT,
    rm INT NOT NULL,
    id_revista INT NOT NULL,
    dt_devolver DATE NOT NULL,
    dt_pegar DATE NOT NULL,
    estado BOOL NOT NULL
);

CREATE TABLE evento (
    id_evento INT PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(255) NOT NULL
);


/*PARE AQUI DE SELECIONAR*/

/*TESTES NO BANCO*/
alter table agendamento add constraint FK_RMAGD 
foreign key (rm) references users(rm);

alter table agendamento add constraint FK_REVISTAAGD 
foreign key (id_revista) references revista(id_revista);

SELECT * FROM revista order by id_revista desc LIMIT 3;
SELECT * 
FROM (
    SELECT * 
    FROM revista 
    ORDER BY id_revista DESC 
    LIMIT 3
) AS ultimas_revistas
ORDER BY id_revista ASC;

drop table revista;
UPDATE revista SET quantidade=10 where id_revista=2;

SELECT revista.titulo AS nomeRevista,revista.tema AS revistaTema,revista.imagem AS revistaImg,revista.descricao AS revistaDesc FROM revista INNER JOIN agendamento
ON revista.id_revista = agendamento.id_revista
WHERE agendamento.rm = 23035;

drop table agendamento;
delete from agendamento where id_agen = 1;
insert into agendamento	 (rm,id_revista,dt_devolver,dt_pegar,estado) values (1,1,"2024-10-30","2024-11-05",false);
insert into agendamento (rm,id_revista,dt_entregar,dt_pegar,estado) values (12345,2,"2024-10-30","2024-11-05",false);

select users.nome,users.turma,revista.titulo,agendamento.dt_devolver from agendamento inner join users
on agendamento.rm = users.rm inner join revista 
on agendamento.id_revista = revista.id_revista 
where agendamento.rm = users.rm and agendamento.id_revista = revista.id_revista;

select * from agendamento;
select * from revista where id_revista = (select id_revista from agendamento where rm = 1 and estado = 1);
DELETE FROM agendamento WHERE id_agen = 22;
UPDATE agendamento SET dt_devolver="2024-10-27" WHERE id_agen=12 ;
SELECT id_revista FROM agendamento WHERE rm = 23035 AND estado = 1;

SELECT * FROM evento;
drop table evento;


insert into users (rm,nivel,estado,nome,turma,email,telefone,senha) 
values (00001,1,'ativo','Teste',"!° Info manhã",'teste@gmail.com','11949335503','12345');

select * from users;
drop table users;

INSERT INTO revista (titulo, anoPubli, edicao, periodo, tema, issn, quantidade) VALUES
('Pesquisa Fapesp', '2012', '194', 'Abril', 'Conforto na Cabine', NULL, 1),
('Pesquisa Fapesp', '2012', '201', 'Novembro', 'As negociações do Império', NULL, 1),
('Pesquisa Fapesp', '2010', '169', 'Março', 'Um telescópio brasileiro nos Andes', '1519-8774', 1),
('Pesquisa Fapesp', '2015', '233', 'Julho', 'Integridade na Ciência', NULL, 1),
('Pesquisa Fapesp', '2016', '243', 'Maio', 'Fosfoetanolamina', NULL, 1),
('Pesquisa Fapesp', '2012', '196', 'Junho', 'A organização dos macacos-prego', NULL, 1),
('Pesquisa Fapesp', '2014', '223', 'Setembro', 'Ataque ao Câncer', NULL, 1),
('Pesquisa Fapesp', '2012', '192', 'Fevereiro', 'Dogmas em Xeque', NULL, 1),
('Pesquisa Fapesp', '2009', '155', 'Janeiro', 'Os genes e a química dos cheiros', '1519-8774', 1),
('Pesquisa Fapesp', '2012', '191', 'Janeiro', 'Uma estrela que apaga', NULL, 1),
('Pesquisa Fapesp', '2011', '190', 'Dezembro', 'A escravidão sob a terra', NULL, 1),
('Pesquisa Fapesp', '2011', '189', 'Novembro', 'Como fazer Neurônios', NULL, 1),
('Pesquisa Fapesp', '2015', '230', 'Abril', 'A identidade da Língua portuguesa no Brasil', NULL, 1),
('Pesquisa Fapesp', '2015', '229', 'Março', 'Para estudar os mortos e ajudar os vivos', NULL, 1),
('Pesquisa Fapesp', '2012', '199', 'Setembro', 'Achando pó alquímico na Royal Society', NULL, 1),
('Pesquisa Fapesp', '2014', '221', 'Julho', 'O monitor do cérebro', NULL, 1),
('Pesquisa Fapesp', '2013', '214', 'Dezembro', 'A cidade dos rios invisíveis', NULL, 1),
('Pesquisa Fapesp', '2009', '162', 'Agosto', 'Câncer, controlar em vez de eliminar', '1519-8774', 1),
('Pesquisa Fapesp', '2014', '217', 'Março', 'Um oceano de Chuvas', NULL, 1),
('Pesquisa Fapesp', '2010', '170', 'Abril', 'Entre homem & mulher', '1519-8774', 1),
('Pesquisa Fapesp', '2012', '195', 'Maio', 'Um salto no mar', NULL, 1),
('Pesquisa Fapesp', '2011', '183', 'Maio', 'Mal de Parkinson', '1519-8774', 1),
('Zupi', NULL, '68', 'Abasteça com ideias', '1809-5534', NULL, 1),
('Feira tecnológica retoma a animação do modo presencial', '2018', '100', 'Julho', 'Portal para o mundo do trabalho', NULL, 1),
('Pesquisa Fapesp', '2014', '224', 'Outubro', 'Bichos das Cavernas', NULL, 1),
('Pesquisa FAPESP', '2010', '168', 'Fevereiro', 'Cogumelos iluminam a floresta', '1519-8774', 1),
('Pesquisa FAPESP', '2013', '213', 'Novembro', 'O maior macaco das Américas', NULL, 1),
('Pesquisa FAPESP', '2014', '215', 'Janeiro', 'A múmia de Pedro II', NULL, 1),
('Pesquisa FAPESP', '2009', '156', 'Fevereiro', 'Amazônia, o experimento que secou a floresta', '1519-8774', 1),
('Pesquisa FAPESP', '2013', '204', 'Fevereiro', 'A era dos genomas comparáveis', NULL, 1),
('Pesquisa FAPESP', '2016', '244', 'Junho', 'Genética do esporte', NULL, 1),
('Pesquisa FAPESP', '2013', '207', 'Maio', 'As novas aves da Amazônia', NULL, 1),
('Pesquisa FAPESP', '2009', '157', 'Março', 'Etanol, sol, vento…', '1519-8774', 1),
('Pesquisa FAPESP', '2010', '175', 'Setembro', 'Inovação em mão dupla', '1519-8774', 1),
('Pesquisa FAPESP', '2010', '171', 'Maio', 'Contra novas tragédias', NULL, 1),
('Pesquisa FAPESP', '2011', '182', 'Abril', 'Um retrato ancestral dos ameríndios', '1519-8774', 1),
('Pesquisa FAPESP', '2015', '227', 'Janeiro', 'O alerta das serpentes', NULL, 1),
('Pesquisa FAPESP', '2011', '179', 'Janeiro', 'Crescer com saúde', '1519-8774', 1),
('Pesquisa FAPESP', '2010', '177', 'Novembro', 'A energia dos ventos', '1519-8774', 1),
('Pesquisa FAPESP', '2010', '176', 'Outubro', 'Vida no espaço', '1519-8774', 1),
('Pesquisa FAPESP', '2013', '209', 'Julho', 'Deu peixe', NULL, 1),
('Pesquisa FAPESP', '2018', '254', 'Abril', 'Por que envelhecemos', NULL, 1),
('Pesquisa FAPESP', '2010', '173', 'Julho', 'As veias cortadas', '1519-8774', 1), 
('Pesquisa FAPESP', '2011', '187', 'Setembro', 'Evolução da hepatite no Brasil', '1519-8774', 1),
('Pesquisa FAPESP', '2011', '188', 'Outubro', 'América do Sul', '1519-8774', 1),
('Pesquisa FAPESP', '2015', '237', 'Novembro', 'Segredos do DNA', NULL, 1),
('Pesquisa FAPESP', '2010', '178', 'Dezembro', 'Vitória em Nagoya', '1519-8774', 1),
('Pesquisa FAPESP', '2011', '184', 'Junho', 'O olhar desfocado do autista', NULL, 1),
('Centro Paula Souza', '2018', '100', 'Julho', 'Portal para o mundo do trabalho', NULL, 3),
('Pesquisa Fapesp', '2016', '245', '2016', 'Pele artificial', NULL, 1),
('Pesquisa Fapesp', '2016', '242', '2016', 'Geo - genômica', NULL, 1),
('Pesquisa Fapesp', '2012', '193', NULL, 'A preservação da Terra', NULL, 1),
('Zupi', '2016', NULL, NULL, 'A maior dificuldade é se manter inspirado nesse ramo que pode engolir os artistas. Viver de arte no Brasil não é', NULL, 1),
('Pesquisa Fapesp', '2016', '241', 'Março', 'Zika microcefalia', NULL, 1),
('Pesquisa Fapesp', '2013', '206', 'Abril', 'Sócios na inovação', NULL,          1),
('Pesquisa Fapesp', '2010', '172', 'Junho', 'Coração flácido', '1519-8774', 1),
('Pesquisa Fapesp', '2009', '160', 'Junho', 'As pontes do coração', '1519-8774', 1),
('Revista bibliográfica e cultural', '2002', '3', 'Dezembro', 'Ler', NULL, 1),
('Pesquisa Fapesp', '2013', '212', 'Outubro', 'Truques recém-descobertos da evolução', NULL, 1),
('Revista bibliográfica e cultural', '2013', '10', 'Dezembro', 'Cultura e extensão USP', NULL, 1),
('Pesquisa Fapesp', '2014', '224', 'Outubro', 'Bichos das cavernas', NULL, 1),
('RTI', '2023', '274', 'Março', 'Redes, Telecom e instalações', '1808-3544', 1),
('Pesquisa Fapesp', '2017', '253', 'Março', 'Antes de Monteiro Lobato', NULL, 1),
('Ciência Hoje', NULL, '172', NULL, 'Estresse', 9, 1         ),
('Pesquisa Fapesp', '2012', '198', 'Agosto', 'Viagem ao centro da Terra', NULL, 1),
('Pesquisa Fapesp', '2013', '211', 'Setembro', 'Marcas da Extinção', NULL, 1),
('Pesquisa Fapesp', '2013', '210', 'Agosto', 'A era dos extremos', NULL, 1),
('Revista', '2014', '1', 'Maio', 'Cultura e extensão USP', NULL, 1),
('Pesquisa Fapesp', '2009', '163', 'Setembro', 'A corrida pela segunda geração de etanol', '1519-8774', 1),
('Pesquisa Fapesp', '2012', '202', 'Dezembro', 'O pulo do gato', NULL, 1),
('Pesquisa Fapesp', '2014', '222', 'Agosto', 'A emergêngica das doenças raras', NULL, 1),
('Pesquisa Fapesp', '2014', '220', 'Junho', 'O velho mar de Minas Gerais', NULL, 1),
('Pesquisa Fapesp', '2015', '232', 'Junho', 'Dengue', NULL, 1),
('Pesquisa Fapesp', '2017', '252', 'Fevereiro', 'Remédios na justiça', NULL, 1),
('Pesquisa Fapesp', NULL, NULL, NULL, NULL, NULL, 1),
('Pesquisa Fatesp Brasil de Extremos', '2016', '249', 'Novembro', 'brasil', NULL, 1),
('Revista da Biblioteca', '2009', NULL, NULL, NULL, '0104-0863', 1),
('Bravo! Entrevista', '2002', NULL, NULL, NULL, NULL, 1),
('Pesquisa Fatesp Aplicada x Básica', '2016', '246', 'Agosto', 'educação', NULL, 1),
('Pesquisa Fatesp Saúde dos Adolescentes', '2016', '248', 'Outubro', 'saúde', NULL, 1),
('Pesquisa Fatesp AIDS Reforçando a Prevenção', '2016', '250', 'Dezembro', 'saúde', NULL, 1),
('Políticas Públicas Étnico Racial e de Gênero', NULL, '1', NULL, 'política', NULL, 1),
('Pesquisa Fatesp Unicamp 50 Anos', '2016', '50', 'Setembro', 'educação', NULL, 1),
('Pesquisa Fatesp O Medo do Estrangeiro', '2015', '236', 'Outubro', 'política', NULL, 1),
('Experiências Inovadoras de Ensino e Aprendizagem', '2014', NULL, '2014/2015', 'educação', '972-85-66241-02-0', 1),
('Pesquisa Fapesp Buraco Negro Voraz', '2009', '159', 'Maio', 'educação', NULL, 1),
('Pesquisa Fapesp Berçário de Raios Cósmicos', '2012', '200', 'Outubro', 'educação', NULL, 1),
('Pesquisa Fapesp Povos de Lagoa Santa', '2016', '247', 'Setembro', 'educação', NULL, 1),
('Pesquisa Fatesp ASMA', '2009', '165', 'Novembro', 'saúde', NULL, 1),
('Lights Out', NULL, NULL, NULL, NULL, NULL, 1),
('Guia Catraca Livre', '2012', '2012', NULL, 'guia', '978-85-7060-623-5', 1),
('Pesquisa Fapesp Capitalismo Selvagem', '2009', '158', 'Abril', 'política', '1519-8774', 1),
('CPS Inova CPS Impulsiona Negócios Inovadoras', '2024', '99', 'Maio', 'educação', NULL, 4),
('CPS Ensino de Excelência', '2024', '97', 'Janeiro', 'educação', NULL, 4),
('Pesquisa Fapesp – TOC', '2013', '205', 'Março', 'Olimpíadas Científicas', NULL, 1),
('Manuscrítica', '2009', '17', 'Agosto', 'Revista de Crítica Genética', '1415-4498', 1),
('Pesquisa Fapesp', '2011', '185', 'Junho', 'Arqueologia Magnética', '1519-8774', 1),
('Pesquisa Fapesp', '2014', '218', 'Abril', 'O Trabalho de Resgatar a História', NULL, 1),
('Pesquisa Fapesp', '2017', '251', 'Janeiro', 'Ciência da Cerveja', NULL, 2),
('RTI', '2024', '288', 'Maio', 'Redes, Telecom e Instalações', '1808-3544', 1),
('Pesquisa Fapesp', '2015', '228', 'Fevereiro', 'Nascidos Antes do Tempo', NULL, 1),
('Pesquisa Fapesp', '2014', '225', 'Novembro', 'O Tamanho dos Bebês', NULL, 2),
('Pesquisa Fapesp', '2014', '219', 'Maio', 'Os Nanossatélites Brasileiros', NULL, 1),
('Pesquisa Fapesp', '2010', '167', 'Janeiro', 'O Butantan vai à Amazônia', '1519-774', 1),
('Pesquisa Fapesp', '2010', '174', 'Agosto', 'O Prazer de Entender a Ciência', '1519-8774', 1),
('Pesquisa Fapesp', '2015', '235', 'Setembro', 'Luz', NULL, 1),
('Pesquisa Fapesp', '2015', '231', 'Maio', 'Universo Expandido', NULL, 1),
('Pesquisa Fapesp', '2012', '197', 'Junho', 'Os Executivos do Conhecimento', NULL, 1),
('Pesquisa Fapesp', '2014', '222', 'Agosto', 'A Emergência das Doenças', NULL, 1),
('Manuscrítica', '2007', '15', 'Outubro', 'Revista Crítica Genérica', '1415-4498', 1),
('Pesquisa Fapesp', '2014', '226', 'Dezembro', 'Objeto de Desejo', NULL, 1),
('Pesquisa Fapesp', '2009', '164', 'Outubro', 'O Clima vai Mudar a Natureza do País', '1519-8774', 1),
('Hugo França', NULL, NULL, NULL, 'Esculturas e Obras em Madeira', NULL, 1),
('Pesquisa Fapesp', '2011', '181', 'Março', 'Mais Ciência no Zoo', '1519-8774', 1);

select count(*) FROM revista;
select * from revista Limit 10;

drop database Biblioteca;