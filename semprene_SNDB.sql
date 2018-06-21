-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tempo de Geração: 14/09/2016 às 09:35
-- Versão do servidor: 5.6.30-log
-- Versão do PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `semprene_SNDB`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Anuncio`
--

CREATE TABLE IF NOT EXISTS `Anuncio` (
  `anuncio_id` int(11) NOT NULL AUTO_INCREMENT,
  `anuncio_cliente_ref` int(11) NOT NULL,
  `anuncio_titulo` varchar(100) NOT NULL,
  `anuncio_descricao` varchar(1024) DEFAULT NULL,
  `anuncio_endereco` int(11) NOT NULL,
  `anuncio_categoria` int(11) NOT NULL,
  `anuncio_tel_fixo` varchar(45) DEFAULT NULL,
  `anuncio_tel_cel` varchar(45) DEFAULT NULL,
  `anuncio_email` varchar(45) DEFAULT NULL,
  `anuncio_status` int(11) NOT NULL,
  `anuncio_excluido` tinyint(1) NOT NULL,
  `anuncio_data_ativacao` varchar(50) NOT NULL,
  `anuncio_breve_descricao` varchar(200) NOT NULL,
  `anuncio_data_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `anuncio_imagem_capa` varchar(150) DEFAULT NULL,
  `anuncio_whats` varchar(45) NOT NULL,
  `anuncio_pacote` varchar(50) NOT NULL,
  `anuncio_media` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`anuncio_id`),
  UNIQUE KEY `anuncio_titulo` (`anuncio_titulo`),
  KEY `anuncio_cliente_idx` (`anuncio_cliente_ref`),
  KEY `anuncio_endereco_idx` (`anuncio_endereco`),
  KEY `anuncio_categoria_subcat_idx` (`anuncio_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=666 ;

--
-- Fazendo dump de dados para tabela `Anuncio`
--

INSERT INTO `Anuncio` (`anuncio_id`, `anuncio_cliente_ref`, `anuncio_titulo`, `anuncio_descricao`, `anuncio_endereco`, `anuncio_categoria`, `anuncio_tel_fixo`, `anuncio_tel_cel`, `anuncio_email`, `anuncio_status`, `anuncio_excluido`, `anuncio_data_ativacao`, `anuncio_breve_descricao`, `anuncio_data_insert`, `anuncio_imagem_capa`, `anuncio_whats`, `anuncio_pacote`, `anuncio_media`) VALUES
(549, 174, 'Banco do Brasil s/a', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários.  Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc.\r\n\r\nExistem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias, ', 569, 759, '(37) 3222-2332', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Agência, Brasil, Banco do Brasil', '2016-08-02 20:59:12', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 549 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(550, 177, 'SempreNegócio', 'Anuncie aqui, temos planos de incentivo a pequenas empresas e profissionais autônomos. Veja algumas de nossas vantagens.', 570, 730, '(37) 3512-2429', '(37) 99671-8571', 'contato@semprenegocio.com.br', 4, 0, '2016-08-02', 'guia eletrônico sites sistemas designer agência ', '2016-08-02 23:05:10', 'upload/anuncio-images/eliopiskt@yahoo.com.br_550/96da2f590cd7246bbde0051047b0d6f7Capa', '(37) 99119-1491', 'Premium', 0),
(551, 174, 'Banco Itaú - Centro ', 'MAIS DETALHES DA EMPRESA\r\n\r\nBancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algum', 571, 759, '(37) 30048-568', '', 'contato@semprenegocio.com', 11, 0, '2016-08-02', 'banco agencia financeira ', '2016-08-02 23:58:40', 'upload/anuncio-images/laenderdeveloper@gmail.com_551/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(552, 174, 'Banco Itaú S/A', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 572, 759, '(37) 40044-828', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'banco financeira itau empréstimo ', '2016-08-03 00:06:55', 'upload/anuncio-images/laenderdeveloper@gmail.com_552/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(553, 174, 'Hospital São João de Deus', 'Hospital é local destinado a tratar doentes, e proporcionar diagnóstico, dando-lhes o tratamento necessário. Os hospitais particulares usam os melhores equipamentos e oferecem variados serviços de tecnologia de ponta. Com diagnósticos modernos e simplificados, os hospitais privados garantem uma recuperação segura e rápida. Muitos hospitais particulares também oferecem outros serviços como psicólogos, com aconselhamento e apoio, além de serviços de farmácia.\r\n\r\nOs hospitais particulares oferecem uma gama de especialidades, incluindo cuidados cardíacos, maternidade, cirurgia geral e medicina geral. Estes hospitais possuem uma unidade 24 horas para o atendimento de emergência, além de oferecerem instalações modernas para diagnósticos, com muitas especialidades, incluindo radiologia, ultrassom e medicina nuclear. A seção da maternidade também inclui serviços para diagnóstico específicos, tais como pré-natal, obstetrícia e ginecológica, exames para assegurar os cuidados preventivos de saúde.\r\n\r\nEncontre aqui telef', 573, 756, '(37) 32297-600', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Hospitais particulares saúde medicina tratamento consultas médicos emergência enfermagem cirurgia', '2016-08-03 00:09:55', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 553 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(554, 174, 'Banco do Brasil - Sá', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias,', 574, 759, '(37) 32166-450', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'banco financeira empréstimo financiamento ', '2016-08-03 00:14:27', 'upload/anuncio-images/laenderdeveloper@gmail.com_554/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(555, 174, 'Banco Itaú - Bom Pastor', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 575, 759, '(37) 32138-206', '', 'contato@semprenegocio.com.br', 11, 1, '2016-08-02', 'banco bom pastor financeira empréstimo ', '2016-08-03 00:19:29', 'upload/anuncio-images/laenderdeveloper@gmail.com_555/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(556, 174, 'Hospital São Judas Tadeu', 'Hospital é local destinado a tratar doentes, e proporcionar diagnóstico, dando-lhes o tratamento necessário. Os hospitais particulares usam os melhores equipamentos e oferecem variados serviços de tecnologia de ponta. Com diagnósticos modernos e simplificados, os hospitais privados garantem uma recuperação segura e rápida. Muitos hospitais particulares também oferecem outros serviços como psicólogos, com aconselhamento e apoio, além de serviços de farmácia.\r\n\r\nOs hospitais particulares oferecem uma gama de especialidades, incluindo cuidados cardíacos, maternidade, cirurgia geral e medicina geral. Estes hospitais possuem uma unidade 24 horas para o atendimento de emergência, além de oferecerem instalações modernas para diagnósticos, com muitas especialidades, incluindo radiologia, ultrassom e medicina nuclear. A seção da maternidade também inclui serviços para diagnóstico específicos, tais como pré-natal, obstetrícia e ginecológica, exames para assegurar os cuidados preventivos de saúde.\r\n\r\nEncontre aqui telef', 576, 756, '(37) 32227-222', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Hospitais particulares saúde medicina tratamento consultas médicos emergência enfermagem cirurgia', '2016-08-03 00:22:01', 'upload/anuncio-images/laenderdeveloper@gmail.com_556/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(557, 174, 'Banco Itaú', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 577, 759, '(37) 32222-2600', '', 'contato@semprenegocio.com.br', 11, 1, '2016-08-02', 'banco financeira empréstimo ', '2016-08-03 00:27:48', 'upload/anuncio-images/laenderdeveloper@gmail.com_557/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(558, 174, 'Hospital Santa Lúcia', 'Hospital é local destinado a tratar doentes, e proporcionar diagnóstico, dando-lhes o tratamento necessário. Os hospitais particulares usam os melhores equipamentos e oferecem variados serviços de tecnologia de ponta. Com diagnósticos modernos e simplificados, os hospitais privados garantem uma recuperação segura e rápida. Muitos hospitais particulares também oferecem outros serviços como psicólogos, com aconselhamento e apoio, além de serviços de farmácia.\r\n\r\nOs hospitais particulares oferecem uma gama de especialidades, incluindo cuidados cardíacos, maternidade, cirurgia geral e medicina geral. Estes hospitais possuem uma unidade 24 horas para o atendimento de emergência, além de oferecerem instalações modernas para diagnósticos, com muitas especialidades, incluindo radiologia, ultrassom e medicina nuclear. A seção da maternidade também inclui serviços para diagnóstico específicos, tais como pré-natal, obstetrícia e ginecológica, exames para assegurar os cuidados preventivos de saúde.\r\n\r\nEncontre aqui telef', 578, 756, '(37) 32294-700', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Hospitais particulares saúde medicina tratamento consultas médicos emergência enfermagem cirurgia', '2016-08-03 00:27:53', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 558 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Premium', 0),
(559, 174, 'Banco Bradesco S/A', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 579, 759, '(37) 21025-250', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Banco financeira financiamento empréstimo ', '2016-08-03 00:38:03', 'upload/anuncio-images/laenderdeveloper@gmail.com_559/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(560, 174, 'Hospital Santa Mônica', 'Hospital é local destinado a tratar doentes, e proporcionar diagnóstico, dando-lhes o tratamento necessário. Os hospitais particulares usam os melhores equipamentos e oferecem variados serviços de tecnologia de ponta. Com diagnósticos modernos e simplificados, os hospitais privados garantem uma recuperação segura e rápida. Muitos hospitais particulares também oferecem outros serviços como psicólogos, com aconselhamento e apoio, além de serviços de farmácia.\r\n\r\nOs hospitais particulares oferecem uma gama de especialidades, incluindo cuidados cardíacos, maternidade, cirurgia geral e medicina geral. Estes hospitais possuem uma unidade 24 horas para o atendimento de emergência, além de oferecerem instalações modernas para diagnósticos, com muitas especialidades, incluindo radiologia, ultrassom e medicina nuclear. A seção da maternidade também inclui serviços para diagnóstico específicos, tais como pré-natal, obstetrícia e ginecológica, exames para assegurar os cuidados preventivos de saúde.\r\n\r\nEncontre aqui telef', 580, 756, '(37) 21025-600', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Hospitais particulares saúde medicina tratamento consultas médicos emergência enfermagem cirurgia', '2016-08-03 00:41:42', 'upload/anuncio-images/laenderdeveloper@gmail.com_560/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(561, 174, 'UPA Padre Roberto', 'As Unidades de Pronto Atendimento - UPA 24h são estruturas de complexidade intermediária entre as Unidades Básicas de Saúde e as portas de urgência hospitalares, onde em conjunto com estas compõe uma rede organizada de Atenção às Urgências.', 581, 756, '(37) 32137-601', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Hospitais gratuitos sus saúde medicina tratamento consultas médicos emergência enfermagem cirurgia', '2016-08-03 00:49:35', 'upload/anuncio-images/laenderdeveloper@gmail.com_561/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(562, 174, 'Banco Bradesco ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 582, 746, '(37) 21025-250', '', 'contato@semprenegocio.com', 11, 1, '2016-08-02', 'banco financeira empréstimo ', '2016-08-03 00:56:17', 'upload/anuncio-images/laenderdeveloper@gmail.com_562/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(563, 174, 'ACOM', 'Hospital é local destinado a tratar doentes, e proporcionar diagnóstico, dando-lhes o tratamento necessário. Os hospitais particulares usam os melhores equipamentos e oferecem variados serviços de tecnologia de ponta. Com diagnósticos modernos e simplificados, os hospitais privados garantem uma recuperação segura e rápida. Muitos hospitais particulares também oferecem outros serviços como psicólogos, com aconselhamento e apoio, além de serviços de farmácia.\r\n\r\nOs hospitais particulares oferecem uma gama de especialidades, incluindo cuidados cardíacos, maternidade, cirurgia geral e medicina geral. Estes hospitais possuem uma unidade 24 horas para o atendimento de emergência, além de oferecerem instalações modernas para diagnósticos, com muitas especialidades, incluindo radiologia, ultrassom e medicina nuclear. A seção da maternidade também inclui serviços para diagnóstico específicos, tais como pré-natal, obstetrícia e ginecológica, exames para assegurar os cuidados preventivos de saúde.\r\n\r\nEncontre aqui telef', 583, 756, '(37) 32121-500', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Hospitais particulares saúde medicina tratamento consultas médicos emergência enfermagem cirurgia', '2016-08-03 00:58:13', 'upload/anuncio-images/laenderdeveloper@gmail.com_563/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(564, 174, 'Banco Bradesco Jk', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 584, 759, '(37) 32135-272', '', 'contato@semprenegocio.com', 11, 1, '2016-08-02', 'Banco financeira empréstimo', '2016-08-03 01:01:09', 'upload/anuncio-images/laenderdeveloper@gmail.com_564/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(565, 174, 'UEMG Unidade Divinópolis - MG', 'Universidade Estadual do Estado de Minas Gerais', 585, 760, '(37) 32293-5500', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Universidade Escola Aprendizado curso Graduação Mestrado Faculdade vestibular Professores Aulas', '2016-08-03 01:09:34', 'upload/anuncio-images/laenderdeveloper@gmail.com_565/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(566, 174, 'Banco Mercantil do Brasil', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 586, 759, '(37) 21016-200', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'banco financeira financiamento empréstimo ', '2016-08-03 01:12:27', 'upload/anuncio-images/laenderdeveloper@gmail.com_566/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(567, 174, 'Faculdade Pitágoras - Divinópolis', 'Faculdade Pitágoras-Divinópolis', 587, 760, '(37) 32294-800', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Universidade Escola Aprendizado curso Graduação Mestrado Faculdade vestibular Professores Aulas', '2016-08-03 01:16:40', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 567 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(568, 174, 'Banco Santander ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 588, 759, '(37) 36911-800', '(37) 33016-300', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Banco financeira empréstimo financiamento ', '2016-08-03 01:20:16', 'upload/anuncio-images/laenderdeveloper@gmail.com_568/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(569, 174, 'Shopping Pátio Divinópolis', 'Shopping Pátio Divinópolis', 589, 764, '(37) 32141-870', '', 'patio@patiodivinopolis.com.br', 11, 0, '2016-08-02', 'Shopping Cinema Compras Roupas Jogos Alimentação Lazer Diversão lojas ', '2016-08-03 01:28:57', 'upload/anuncio-images/laenderdeveloper@gmail.com_569/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 5),
(570, 174, 'Banco Santander Centro', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 590, 759, '(37) 36911-800', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Banco financeira empréstimo  ', '2016-08-03 01:29:18', 'upload/anuncio-images/laenderdeveloper@gmail.com_570/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(571, 174, ' Posto Saúde Central', 'Posto de saúde do centro de Divinópolis - MG', 591, 757, '(37) 32229-940', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Posto de saúde médico saúde atendimento doença doente enfermeira febre terapia gratuito vacina', '2016-08-03 01:34:58', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 571 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(572, 174, 'Caixa Econômica Federal  ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancária.', 592, 759, '(37) 32132-395', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-02', 'Banco empréstimo financiamento ', '2016-08-03 01:36:40', 'upload/anuncio-images/laenderdeveloper@gmail.com_572/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(573, 174, 'Caixa Econômica Federal Centro', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 593, 759, '(37) 32132-395', '', 'contato@semprenegocio.com', 11, 0, '2016-08-02', 'Banco financeira financiamento empréstimo fies ', '2016-08-03 01:40:10', 'upload/anuncio-images/laenderdeveloper@gmail.com_573/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(574, 174, 'Caixa Econômica Federal Pernambuco  ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 594, 759, '(37) 32295-900', '', 'contato@semprenegocio.com.br', 11, 1, '2016-08-02', 'Banco financiamento financeira ', '2016-08-03 01:45:44', 'upload/anuncio-images/laenderdeveloper@gmail.com_574/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(575, 174, 'Caixa Econômica 1º de Junho', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 595, 759, '(37) 36903-550', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Banco financeira fies empréstimo ', '2016-08-03 16:38:23', 'upload/anuncio-images/laenderdeveloper@gmail.com_575/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(576, 174, 'Caixa Econômica Sete de Setembro ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 596, 759, '(37) 32169-100', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Banco financeira financiamento fies empréstimo ', '2016-08-03 16:40:45', 'upload/anuncio-images/laenderdeveloper@gmail.com_576/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(577, 174, 'HSBC Bank Brasil S/A', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 597, 759, '(37) 21026-200', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Banco financeira financiamento empréstimo ', '2016-08-03 16:45:19', 'upload/anuncio-images/laenderdeveloper@gmail.com_577/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(578, 174, 'Sicoob Divicred', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 598, 759, '(37) 32212-140', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Banco financeira financiamento empréstimo ', '2016-08-03 16:55:26', 'upload/anuncio-images/laenderdeveloper@gmail.com_578/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(579, 174, 'Sicoob Crediverde ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 599, 759, '(37) 32168-700', '', 'karla.lagares@sicoobcrediverde.com.br', 11, 0, '2016-08-03', 'Banco financeira financiamento empréstimo ', '2016-08-03 17:06:19', 'upload/anuncio-images/laenderdeveloper@gmail.com_579/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(580, 174, 'Sicoob Crediverde Bairro Interlagos', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 600, 759, '(37) 36916-371', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Banco empréstimos financeira financiamento ', '2016-08-03 17:11:50', 'upload/anuncio-images/laenderdeveloper@gmail.com_580/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(581, 174, 'Sicoob Crediverde Niterói ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 601, 759, '(37) 32133-813', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Banco financeira financiamento empréstimo ', '2016-08-03 17:14:15', 'upload/anuncio-images/laenderdeveloper@gmail.com_581/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(582, 174, 'Sicoob ', 'Bancos são instituições intermediárias entre agentes superavitários e agentes deficitários que exercem, além de outras, a função de captar os recursos dos superavitários e emprestá-los a juros aos deficitários. Todo banco, público ou privado, apresenta estas características. Os bancos tem também por funções depositar capital em formas de poupança, financiar automóveis e casas, trocar moedas internacionais, realizar pagamentos, entre outros. Trata-se de instituições financeiras que oferecem serviços e produtos como abertura de contas, cartões de crédito e débito, cheque e cheque especial etc. Existem vários tipos de banco, como o banco comercial, o banco de investimentos, o banco de desenvolvimento e o banco misto, cada um com suas características e peculiaridades. Além das agências bancárias, que funcionam de 10h às 16h, o usuário também pode contar com caixas eletrônicos que ficam disponíveis 24h nos próprios bancos e em shoppings, supermercados etc e são capazes de realizar algumas operações bancárias.', 602, 759, '(37) 32145-754', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Banco financeira empréstimo ', '2016-08-03 17:17:37', 'upload/anuncio-images/laenderdeveloper@gmail.com_582/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(583, 174, 'Posto de Saúde Centro ', 'Posto de saúde. ', 603, 757, '(37) 3222-9940', '', 'contato@semprenegocio.com.br', 11, 1, '2016-08-03', 'posto de saúde atendimento médico vacinação ', '2016-08-03 17:23:41', 'upload/anuncio-images/default/anuncio-default.jpg', '', 'Grátis', 0),
(584, 174, 'SECRETARIA MUNICIPAL DE SAÚDE CENTRAL DE INTERNAÇÃO', 'SECRETARIA MUNICIPAL DE SAÚDE CENTRAL DE INTERNAÇÃO.', 604, 757, '(37) 32219-922', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'secretaria, posto de saúde, internação  ', '2016-08-03 17:26:15', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 584 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(585, 174, 'Posto de Saúde Tietê ', 'Posto de Saúde ', 605, 757, '(37) 32229-984', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'posto de saúde tietê, atendimento médico ', '2016-08-03 19:30:16', 'upload/anuncio-images/laenderdeveloper@gmail.com_585/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(586, 174, 'Posto de Saúde Afonso Pena', 'Posto de saúde ', 606, 757, '(37) 32229-224', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Posto de saúde, atendimento médico', '2016-08-03 19:37:36', 'upload/anuncio-images/laenderdeveloper@gmail.com_586/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(587, 174, 'Posto de Saúde Bom Pastor ', 'Posto de saúde ', 607, 757, '(37) 32296-611', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'posto de saúde atendimento médico ', '2016-08-03 19:40:34', 'upload/anuncio-images/laenderdeveloper@gmail.com_587/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(588, 174, 'Posto de saúde Danilo Passos', 'Posto de saúde ', 608, 757, '(37) 32229-179', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'atendimento médico ', '2016-08-03 19:42:22', 'upload/anuncio-images/laenderdeveloper@gmail.com_588/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(589, 174, 'Posto de saúde Niterói ', 'Posto de saúde ', 609, 757, '(37) 3222-9709', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'atendimento médico ', '2016-08-03 19:47:17', 'upload/anuncio-images/laenderdeveloper@gmail.com_589/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(590, 174, 'Posto de Saúde Ipiranga', 'Posto de saúde ', 610, 757, '(37) 3222-9958', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Atendimento médico ', '2016-08-03 19:49:49', 'upload/anuncio-images/laenderdeveloper@gmail.com_590/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(591, 174, 'Posto de Saúde Itai ', 'Posto de saúde ', 611, 757, '(37) 32229-441', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'posto de saúde ', '2016-08-03 19:51:55', 'upload/anuncio-images/laenderdeveloper@gmail.com_591/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(592, 174, 'Posto de saúde São José ', 'Postos de saúde ', 612, 757, '(37) 3221-431', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'atendimento médico ', '2016-08-03 19:54:35', 'upload/anuncio-images/laenderdeveloper@gmail.com_592/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(593, 174, 'Posto de saúde Nossa Senhora ', 'Posto de médico ', 613, 757, '(37) 3221-2127', '', 'contato@semprenegocio.com.br ', 11, 0, '2016-08-03', 'atendimento médico ', '2016-08-03 19:57:18', 'upload/anuncio-images/laenderdeveloper@gmail.com_593/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(594, 174, 'Posto Saúde Nações ', 'Posto de saúde ', 614, 758, '(37) 3213-4642', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'atendimento médico ', '2016-08-03 20:01:52', 'upload/anuncio-images/laenderdeveloper@gmail.com_594/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(595, 174, 'Faced', 'Faculdade ensino superior. ', 615, 760, '(37) 3512-2000', '', 'contato@semprenegocio.com', 11, 0, '2016-08-03', 'Universidade Escola Aprendizado curso Graduação Mestrado Faculdade vestibular Professores Aulas ', '2016-08-03 20:08:29', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 595 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(596, 174, 'UFSJ ', 'Universidade federal UFSJ. ', 616, 760, '(37) 3221-1164', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Universidade Escola Aprendizado curso Graduação Mestrado Faculdade vestibular Professores Aulas', '2016-08-03 20:13:33', 'upload/anuncio-images/laenderdeveloper@gmail.com_596/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(597, 174, 'Unifenas', 'Curso superior ', 617, 760, '(37) 32127-888', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Universidade Escola Aprendizado curso Graduação Mestrado Faculdade vestibular Professores Aulas\r\n\r\n', '2016-08-03 20:18:32', 'upload/anuncio-images/laenderdeveloper@gmail.com_597/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(598, 174, 'Lar das Meninas ', 'Lar das meninas ', 618, 773, '(37) 3221-1338', '(37) 3222-7208', 'contato@semprenegocio.com', 11, 0, '2016-08-03', 'abrigos asilo lar ajudar', '2016-08-03 20:32:22', 'upload/anuncio-images/laenderdeveloper@gmail.com_598/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(599, 174, 'Vila Vicentina Padre Libório ', 'Vila Vicentina Padre Liberio', 619, 773, '(37) 32213-157', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'casa de idosos cuidador asilo ajuda terceira idade ', '2016-08-03 21:00:13', 'upload/anuncio-images/laenderdeveloper@gmail.com_599/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(600, 174, 'Abrigo Municipal Homem de Nazaré', 'Abrigo Municipal Homem de Nazaré', 620, 773, '(37) 32221-861', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'asilo abrigo casa para idosos cuidador ', '2016-08-03 21:02:36', 'upload/anuncio-images/laenderdeveloper@gmail.com_600/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(601, 174, 'Obras Assistenciais Frederico Ozanan', 'Obras Assistenciais Frederico Ozanan', 621, 773, '(37) 32217-063', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'obras casa terceira idade ajudar', '2016-08-03 21:04:29', 'upload/anuncio-images/laenderdeveloper@gmail.com_601/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(602, 174, 'Alcoólicos Anônimos', 'Alcoólicos Anônimos', 622, 738, '(37) 32213-500', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'dependência química alcoolismo aa alcoolátrico  aaa ', '2016-08-03 21:11:12', 'upload/anuncio-images/laenderdeveloper@gmail.com_602/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(603, 174, 'Trancid Transporte Coletivo ', 'Transporte Coletivo ', 623, 725, '(37) 32222-6788', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Transporte coletivo passagem ônibus deslocamento ', '2016-08-03 21:11:44', 'upload/anuncio-images/laenderdeveloper@gmail.com_603/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(604, 174, 'Aavida', 'Escola para Surdos Aavida', 624, 761, '(37) 32145-505', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'aavida avida escola para surdos especial ', '2016-08-03 21:17:21', 'upload/anuncio-images/laenderdeveloper@gmail.com_604/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(605, 174, 'Rodoviária de Divinópolis', 'Terminal rodoviário de Divinópolis - MG', 625, 725, '(37) 32222-6666', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Terminal rodoviário viagem passagem ônibus Divinópolis', '2016-08-03 21:21:38', 'upload/anuncio-images/laenderdeveloper@gmail.com_605/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(606, 174, 'Supermercado ABC', 'Supermercados ABC ', 626, 722, '(37) 32299-571', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Supermercado abc alimentos varejo ', '2016-08-03 21:22:33', 'upload/anuncio-images/laenderdeveloper@gmail.com_606/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(607, 174, 'Supermercados Bh', 'Supermercados BH', 627, 722, '(37) 32157-056', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'supermercado alimentação compras ', '2016-08-03 22:00:58', 'upload/anuncio-images/laenderdeveloper@gmail.com_607/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0);
INSERT INTO `Anuncio` (`anuncio_id`, `anuncio_cliente_ref`, `anuncio_titulo`, `anuncio_descricao`, `anuncio_endereco`, `anuncio_categoria`, `anuncio_tel_fixo`, `anuncio_tel_cel`, `anuncio_email`, `anuncio_status`, `anuncio_excluido`, `anuncio_data_ativacao`, `anuncio_breve_descricao`, `anuncio_data_insert`, `anuncio_imagem_capa`, `anuncio_whats`, `anuncio_pacote`, `anuncio_media`) VALUES
(608, 174, 'Cimcal Divinópolis-MG', 'Cimcal Divinópolis-MG', 628, 746, '(37) 32222-9400', '(37) 35124-595', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Construção materiais telhados pia sanitário cano cimento tijolo pá banheira aquecedor solar pintor', '2016-08-03 22:02:19', 'upload/anuncio-images/laenderdeveloper@gmail.com_608/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(609, 174, 'Supermercados Rena', 'Supermercados Rena', 629, 722, '(37) 32134-520', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'supermercado compras alimentos ', '2016-08-03 22:04:24', 'upload/anuncio-images/laenderdeveloper@gmail.com_609/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(610, 174, 'Supermercado Josildo', 'Supermercado Josildo', 630, 722, '(37) 32291-350', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'supermercado compras alimentos ', '2016-08-03 22:08:06', 'upload/anuncio-images/laenderdeveloper@gmail.com_610/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(611, 174, 'Diviclean Indústria Comércio', 'Diviclean Indústria Comércio', 631, 746, '(37) 32222-5698', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Material de limpeza química produtos loja compra ', '2016-08-03 22:12:03', 'upload/anuncio-images/laenderdeveloper@gmail.com_611/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(612, 174, 'Babilonia Dancing House Pizzaria', 'Babilonia Dancing House Pizzaria', 632, 740, '(37) 3732-2250', '', 'producao@babiloniashow.com.br', 11, 0, '2016-08-03', 'Danceteria pizzaria balada música diversão ', '2016-08-03 22:19:22', 'upload/anuncio-images/default/anuncio-default.jpg', '', 'Grátis', 0),
(613, 174, 'POINT BEER COM', 'POINT BEER COM', 633, 744, '(37) 3213-4929', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'balada festa música choperia cerveja boate  ', '2016-08-03 22:25:30', 'upload/anuncio-images/default/anuncio-default.jpg', '', 'Grátis', 0),
(614, 174, 'Barber Show ', 'Brasileiro nascido no interior de Mina Gerais em 1981 com descendencia Europeia, mudou se para Europa ainda jovem, passou por vårios paises como Itålia, Espanha e Inglaterra onde descobriu a paixåo pela a industria da beleza e onde residiu nos ültimos 14 anos.\r\n \r\nMaquiador profissional de sucesso com trabalhos entre revistas e desfiles de moda na Europa, vem que surge a paixåo pela barbearia em 2012 quando cursou seu primeiro curso adquirindo certificado internacional NVQ2 no TOTALBARBER ACADEMY em Londres.\r\nTambém cursou LONDON SCHOOL OF BARBERING umas das escolas de barbeiros mais prestigiadas de Londres.\r\n \r\nPor ültimo agora cursou a mais prestigiada academia reconhecida internacionalmente Toni&guy tåmbem em Londres\r\n \r\nAgora iniciando sua carreira no Brasil trazendo novidades, palestras e workshop pelo Brasil.', 634, 736, '(37) 99978-0430', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'cabelo barba corte tesoura fazer barba salão cabedeleiro \r\n', '2016-08-03 22:43:11', 'upload/anuncio-images/laenderdeveloper@gmail.com_614/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 5),
(615, 177, 'Cine Ritz Divinópolis-MG', 'Cine Ritz Divinópolis-MG', 635, 781, '(37) 32139-333', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-03', 'Cinema filme lazer animação 3d diversão sair passear ', '2016-08-03 22:56:12', 'upload/anuncio-images/eliopiskt@yahoo.com.br_615/96da2f590cd7246bbde0051047b0d6f7Capa', '', 'Grátis', 0),
(616, 174, 'Mart Minas Atacadista', 'Mart Minas Supermercados atacadista. ', 636, 722, '(37) 3512-9500', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'supermercado alimentação atacadista compras', '2016-08-04 12:40:36', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 616 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(617, 174, 'Edmur P. Lemos ', 'Está precisando de um reparo em sua casa ou empresa?! \r\n\r\nEstamos prontos para lhe atender, trabalhamos com parte elétrica, hidráulica e ar condicionado (Instalação e manutenção).\r\n\r\nSolicite seu orçamento sem compromisso pelo WhatsApp !', 637, 730, '(37) 99809-5869', '(37) 99145-7470', 'edmurpereira4@hotmail.com ', 11, 1, '2016-08-04', 'eletricista, ar condicionado, hidráulica,encanador, reparos,marido de aluguel, faz tudo,serviços  ', '2016-08-04 13:03:55', 'upload/anuncio-images/laenderdeveloper@gmail.com_617/bf8229696f7a3bb4700cfddef19fa23fCapa', '(37) 99922-2746', 'Grátis', 5),
(618, 174, 'SCE Eletricidade ', 'Eletricista, técnico Silmar Santos. Trabalhamos com os projetos: Instalação, manutenção, elétrica, predial, residencial e predial. Automação residencial. ', 638, 734, '(37) 98803-1610', '(37) 99902-0016', 'silmar_mi@hotmail.com', 11, 0, '2016-08-04', 'projeto,instalação,manutenção,eletricista,predial,elétrica,automação,residencial,serviços', '2016-08-04 13:10:03', 'upload/anuncio-images/laenderdeveloper@gmail.com_618/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(619, 174, 'Eduardo Mottatour', 'Transporte noturno e viagens. ', 639, 725, '(37) 99839-8206', '', 'eduardoantoniomota@hotmail.com', 11, 1, '2016-08-04', 'van,vans,viagens,transporte,viagem escolar,faculdade,noturno,turismo', '2016-08-04 15:28:49', 'upload/anuncio-images/laenderdeveloper@gmail.com_619/bf8229696f7a3bb4700cfddef19fa23fCapa', '(37) 98807-8286', 'Grátis', 0),
(620, 174, 'Delta Vídeo Locadora', 'Delta Vídeo Locadora.', 640, 746, '(37) 32121-026', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'locadora de filmes,filmes,desenhos,seriados,locar, ', '2016-08-04 16:02:20', 'upload/anuncio-images/laenderdeveloper@gmail.com_620/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(621, 174, 'Aspire Academia', 'Aspire Academia.', 641, 738, '(37) 32165-103', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'malhar,perder peso,academia,malhação,treinar', '2016-08-04 16:13:17', 'upload/anuncio-images/laenderdeveloper@gmail.com_621/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(622, 174, 'Biblioteca Pública Municipal Ataliba Lago', 'Biblioteca Pública Municipal Ataliba Lago', 642, 774, '(37) 3222-7297', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'livros,biblioteca,leitura,ler,estudar', '2016-08-04 16:46:06', 'upload/anuncio-images/laenderdeveloper@gmail.com_622/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(623, 174, 'Estrela do Oeste Clube', 'Estrela do Oeste Clube.', 643, 744, '(37) 3222-8900', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'clube,natação,nadar,diversão,esportes,piscina,academia,sauna,basquete,tênis,futebol ', '2016-08-04 16:58:28', 'upload/anuncio-images/laenderdeveloper@gmail.com_623/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(624, 174, 'SESI', 'Sesi.', 644, 761, '(37) 3222-0646', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'clube,escola,esporte,futebol,cursos,natação', '2016-08-04 17:01:46', 'upload/anuncio-images/laenderdeveloper@gmail.com_624/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(625, 177, 'SENAI Divinópolis-MG', 'SENAI Divinópolis-MG', 645, 761, '(37) 32144-444', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'Curso técnico escola profissionalizante professores alunos ', '2016-08-04 17:06:56', 'upload/anuncio-images/eliopiskt@yahoo.com.br_625/96da2f590cd7246bbde0051047b0d6f7Capa', '', 'Grátis', 0),
(626, 174, 'Aeroporto de Divinópolis', 'Aeroporto de Divinópolis', 646, 726, '(37) 3216-4952', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'aeronave,helicóptero,hangar,viagem,transporte,voo,aeroporto ', '2016-08-04 17:08:06', 'upload/anuncio-images/laenderdeveloper@gmail.com_626/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(627, 174, 'Drogaria São Paulo', 'Drogaria São Paulo ', 647, 746, '(37) 3213-7911', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'remédios,farmácia,injeção,medicamentos', '2016-08-04 17:44:50', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 627 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(628, 174, 'Drogasil', 'Drogasil', 648, 746, '(37) 3213-7571', '', 'contato@semprenegocio.com', 11, 0, '2016-08-04', 'Drogaria,remédios,farmácia,medicamentos', '2016-08-04 17:48:51', 'upload/anuncio-images/laenderdeveloper@gmail.com_628/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(629, 177, 'Escola Estadual Joaquim Nabuco', 'Escola Estadual Joaquim Nabuco', 649, 761, '(37) 32213-567', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'Escola aluno professor ensino médio fundamental matricula matutino', '2016-08-04 17:49:24', 'upload/anuncio-images/eliopiskt@yahoo.com.br_ 629 /96da2f590cd7246bbde0051047b0d6f7Capa', '', 'Grátis', 0),
(630, 174, 'Delegacia de Polícia', 'Delegacia de Polícia', 650, 776, '(37) 32211-202', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'Detran,policia civil,delegacia,', '2016-08-04 17:54:49', 'upload/anuncio-images/laenderdeveloper@gmail.com_630/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(631, 177, 'Escola Estadual Dona Antônia Valadares', 'Escola Estadual Dona Antônia Valadares', 651, 761, '(37) 32211-455', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'Escola alunos professores ensino médio fundamental matutino noturno', '2016-08-04 17:55:16', 'upload/anuncio-images/eliopiskt@yahoo.com.br_631/96da2f590cd7246bbde0051047b0d6f7Capa', '', 'Grátis', 0),
(632, 174, 'Secretaria de Estado de Defesa Social de MG', 'Secretaria de Estado de Defesa Social de MG', 652, 775, '(37) 3214-1655', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'presidio,cadeia,', '2016-08-04 18:07:23', 'upload/anuncio-images/laenderdeveloper@gmail.com_632/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(633, 174, 'Teatro Municipal Usina Gravatá', 'TEATRO MUNICIPAL GRAVATÁ ', 653, 744, '(37) 3216-1951', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-04', 'teatro,comédia', '2016-08-04 18:19:08', 'upload/anuncio-images/default/anuncio-default.jpg', '', 'Grátis', 0),
(634, 188, 'Edmur P Lemos ', 'Está precisando de um reparo em sua casa ou empresa?!\r\nEstamos prontos para lhe atender, trabalhamos com parte elétrica, hidráulica e ar condicionado (Instalação e manutenção).\r\nSolicite seu orçamento sem compromisso pelo WhatsApp !\r\nEdmur p. Lemos (37) 9 9922-2746 WhatsApp\r\nLigue agora, vamos até você: \r\n(37) 9 9145-7470 Tim\r\n(37) 9 9809-5869 Oi \r\n(37) 9 9922-2746 VIVO', 654, 763, '(37) 99809-5869', '(37) 99145-7470', 'edmurpereira4@hotmail.com', 3, 0, '2016-08-04', 'eletricista,ar condicionado,hidráulica,projeto,encanador,bombeiro,prestação,marido,elétrica', '2016-08-04 22:55:14', 'upload/anuncio-images/edmurpereira4@hotmail.com_ 634 /9dcb88e0137649590b755372b040afadCapa', '(37) 99922-2746', 'Premium', 5),
(635, 187, 'Consultório de Psicologia', 'Terapeuta cognitivo comportamental especialista em atendimento com criança e adolescente.Além deste público também faz atendimento de adulto, Orientação Profissional e Treinamento de Pais.', 655, 777, '(37) 99132-7867', '', 'liviapsique@gmail.com', 3, 0, '2016-08-04', 'Psicologia terapia cognitiva comportamental criança adolescente', '2016-08-05 01:36:31', 'upload/anuncio-images/liviapsique@gmail.com_635/31fefc0e570cb3860f2a6d4b38c6490dCapa', '(37) 99132-7867', 'Grátis', 0),
(636, 190, 'Instalar Tecseg', 'A Instalar Tecseg é especializada em instalações de ar condicionado e sistema de segurança. Garantimos a melhor instalação em casas, apartamentos e empresas. Trabalhamos com circuito fechado de TV, cercas elétrica, interfone, alarme, portão elétrico e para seu conforto e de sua família, ar condicionado! Solicite seu orçamento sem compromisso com Marco Barreto, aguardamos seu contato:) ', 656, 763, '(37) 99869-0492', '', 'marcobarretobvl@gmail.com', 3, 1, '2016-08-05', 'portão elétrico,interfone,ar condicionado,câmera,serviços,marido,aluguel,elétrica,instalação,', '2016-08-05 17:18:26', 'upload/anuncio-images/marcobarretobvl@gmail.com_ 636 /cfecdb276f634854f3ef915e2e980c31Capa', '(37) 98838-8809', 'Grátis', 0),
(637, 191, 'Eduardo Mottatour. ', 'Faça Seu Orçamento Conosco! Transporte com Conforto e Segurança !!! Transporte noturno para faculdade Pitágoras, Faced e curso técnico, Cecon. Vamos até você, Walchir Rezende, LP Pereira, Ipiranga, Santo Antônio, Sidil, Esplanada, Planalto, Tietê, Centro e bairros próximos. \r\nConfira nossas viagens e promoções, basta entrar em contato com Eduardo :) ', 657, 725, '(37) 32228-117', '(37) 99839-8206', 'eduardoantoniomota@hotmail.com', 3, 0, '2016-08-05', 'Van,Vans,passageiro,turismo,lugares,Mineirão,motatuor,escolar,faculdade,curso,noturno,transporte ', '2016-08-05 21:28:54', 'upload/anuncio-images/eduardoantoniomota@hotmail.com_637/0aa1883c6411f7873cb83dacb17b0afcCapa', '(37) 98807-8286', 'Premium', 0),
(638, 190, 'MultiService', 'A Ar+ é especializada em instalações de ar condicionado, sistema de segurança e Redes elétrica lógica e telefônica. Garantimos a melhor instalação em casas, apartamentos e empresas. Trabalhamos com circuito fechado de TV, cercas elétrica, interfone, portão elétrico e para seu conforto e de sua família, ar condicionado! Solicite seu orçamento sem compro\r\nmisso com Marco Barreto, aguardamos seu contato:) ', 658, 763, '(37) 99869-0492', '', 'marcobarretodvl@gmail.com', 3, 0, '2016-08-05', 'portão eletrônico,interfone,ar condicionado,câmera,serviços,marido,aluguel,elétrica,instalação,marco', '2016-08-05 22:27:07', 'upload/anuncio-images/marcobarretodvl@gmail.com_ 638 /cfecdb276f634854f3ef915e2e980c31Capa', '(37) 98838-8809', 'Premium', 0),
(639, 192, 'Jr martelinho ', 'A Jr Martelinho tem a capacidade de recuperar a latária de seu carro, mantendo a pintura de seu veículo  original. Faça seu orçamento sem compromisso.\r\n', 659, 730, '(37) 98618-266', '', 'Joaorobertoo58@gmail.com', 3, 0, '2016-08-06', 'Martelinho ouro carro pintura reparo lanternagem polimento acessórios ', '2016-08-06 14:00:17', 'upload/anuncio-images/Joaorobertoo58@gmail.com_639/58a2fc6ed39fd083f55d4182bf88826dCapa', '', 'Premium', 0),
(640, 193, 'Veterinária a domicílio', 'Consultas e vacinas a domicílio.', 660, 778, '(37) 98852-0904', '', 'Lucianamoura_12@hotmail.com', 8, 0, '2016-08-06', 'atendimento, domicílio', '2016-08-06 17:24:58', 'upload/anuncio-images/default/anuncio-default.jpg', '(37) 98852-0904', 'Grátis', 0),
(641, 199, 'Élio Pinturas Residenciais', 'Pinturas residenciais', 661, 730, '(37) 91215-4787', '', 'sysconsulte@gmail.com', 12, 1, '2016-08-07', 'pinturas reformas degradê ', '2016-08-08 01:23:43', 'upload/anuncio-images/sysconsulte@gmail.com_641/84d9ee44e457ddef7f2c4f25dc8fa865Capa', '(37) 49548-4512', 'Anual', 0),
(642, 199, 'Pintura Residencial', 'Pintura residencial em geral. ', 662, 730, '(37) 91212-4512', '', 'sysconsulte@gmail.com', 11, 1, '2016-08-07', 'pintura reforma casa', '2016-08-08 02:09:12', 'upload/anuncio-images/sysconsulte@gmail.com_642/84d9ee44e457ddef7f2c4f25dc8fa865Capa', '(37) 94545-4545', 'Grátis', 0),
(643, 199, 'Pintura Automotiva', 'Pintura e trabalhos automotivos em geral. ', 663, 763, '(37) 99121-2112', '', 'sysconsulte@gmail.com', 7, 0, '2016-08-07', 'automóveis pintura lanternagem martelinho ', '2016-08-08 02:35:23', 'upload/anuncio-images/sysconsulte@gmail.com_643/84d9ee44e457ddef7f2c4f25dc8fa865Capa', '(21) 21945-4541', 'Premium', 0),
(644, 200, 'Hotel Fenix ', 'Hotel Fenix tem ótima localização em Divinópolis-MG, bem no centro da cidade, local seguro e aconchegante.Perto de diversas farmácias, padarias, igrejas, prefeitura, supermercados e etc. Oferecemos café da manhã simples, estacionamento próximo ao hotel, tv a cabo, ventilador de teto e frigobar. Nosso hotel é para quem quer economizar e ter uma boa noite de sono, a diária está a partir de R$40,00. Venha para hospedar aqui, dos simples o melhor!', 664, 780, '(37) 30711-231', '', 'hotelfenix@gmail.com', 3, 0, '2016-08-08', 'hotel,hospedagem,hotéis,dormir,garagem,instalações,dormir,fenix,passar a noite  ', '2016-08-08 13:57:45', 'upload/anuncio-images/hotelfenix@gmail.com_644/3644a684f98ea8fe223c713b77189a77Capa', '', 'Premium', 0),
(645, 199, 'teste', 'teste test ', 665, 722, '(32) 13213-2132', '', 'laenderquadros@gmail.com', 12, 0, '2016-08-08', 'teste teste teste teste', '2016-08-08 16:30:56', 'upload/anuncio-images/default/anuncio-default.jpg', '', 'Anual', 0),
(646, 199, 'teste bb', 'teste teste teste teste', 666, 722, '(23) 13213-2132', '', 'laenderquadros@gmail.com', 12, 0, '2016-08-08', 'teste teste', '2016-08-08 17:21:30', 'upload/anuncio-images/sysconsulte@gmail.com_646/84d9ee44e457ddef7f2c4f25dc8fa865Capa', '', 'Anual', 0),
(647, 201, 'Moto Taxi José ', 'Moto taxi José Guilherme, confiança e pontualidade. Ligue, vamos até você.Transporte de passageiro, fazemos entregas de cargas, serviço rápido e seguro! Estamos aberto 24 horas :) ', 667, 724, '(37) 99921-0020', '(37) 98801-2222', 'contato@semprenegocio.com', 3, 0, '2016-08-08', 'transporte,moto-taxi,taxi,corrida,frete,24 horas,carga,transporte de passageiro,rápido ', '2016-08-08 17:27:45', 'upload/anuncio-images/josemoto@gmail.com_647/757b505cfd34c64c85ca5b5690ee5293Capa', '', 'Premium', 0),
(657, 177, 'Farmax', 'Distribuidora Amaral Ltda-Farmax ', 677, 738, '(37) 21019-696', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-08', 'produtos químicos química produtos de beleza', '2016-08-08 20:45:09', 'upload/anuncio-images/eliopiskt@yahoo.com.br_657/96da2f590cd7246bbde0051047b0d6f7Capa', '', 'Grátis', 0),
(659, 174, 'Taxi Primeiro de junho', 'Ponto de taxi. ', 679, 723, '(37) 3222-0073', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-08', 'transporte,passageiro,bh,viagens', '2016-08-09 01:17:32', 'upload/anuncio-images/laenderdeveloper@gmail.com_659/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(660, 174, 'Taxi Goias ', 'Ponto de taxi rua Goiás. ', 680, 723, '(37) 32211-100', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-08', 'Transporte,bh,passageiro ', '2016-08-09 01:20:43', 'upload/anuncio-images/laenderdeveloper@gmail.com_660/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(661, 174, 'Taxi Antonio Olímpio ', 'Ponto de taxi Antônio Olímpio ', 681, 723, '(37) 3221-1919', '', 'contato@semprenegocio.com', 11, 0, '2016-08-08', 'Transporte,bh,corrida ', '2016-08-09 01:23:18', 'upload/anuncio-images/laenderdeveloper@gmail.com_661/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(662, 174, 'Taxi Jk', 'Ponto de taxi.', 682, 723, '(37) 3214-4055', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-09', 'transporte,corrida,ponto', '2016-08-09 15:16:38', 'upload/anuncio-images/laenderdeveloper@gmail.com_662/bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(663, 174, 'Disk Moto', 'Disk moto', 683, 724, '(37) 3222-7100', '', 'contato@semprenegocio.com.br', 11, 0, '2016-08-09', 'corrida,transporte,tele moto ', '2016-08-09 15:20:53', 'upload/anuncio-images/laenderdeveloper@gmail.com_ 663 /bf8229696f7a3bb4700cfddef19fa23fCapa', '', 'Grátis', 0),
(664, 199, 'testecx', 'dsa dasdas dasd adasd', 684, 722, '(32) 13213-2132', '', 'laenderquadros@gmail.com', 7, 0, '2016-08-09', 'dsada dasdsa dsadsa', '2016-08-09 15:22:33', 'upload/anuncio-images/sysconsulte@gmail.com_664/84d9ee44e457ddef7f2c4f25dc8fa865Capa', '', 'Premium', 0),
(665, 199, 'testedds', 'dsad dsadsad asdsad sadas', 685, 722, '37991191491', '', 'laenderquadros@gmail.com', 7, 0, '2016-08-09', '', '2016-08-09 20:11:26', 'upload/anuncio-images/default/anuncio-default.jpg', '', 'Premium', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Avaliacao`
--

CREATE TABLE IF NOT EXISTS `Avaliacao` (
  `avaliacao_id` int(11) NOT NULL AUTO_INCREMENT,
  `avaliacao_nota` int(11) NOT NULL,
  `avaliacao_comentario` varchar(2200) NOT NULL,
  `avaliacao_data_horario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avaliacao_anuncio_ref` int(11) NOT NULL,
  `avaliacao_cli_ref` int(11) NOT NULL,
  `avaliacao_titulo` varchar(80) NOT NULL,
  `avaliacao_curtidas` int(11) NOT NULL,
  PRIMARY KEY (`avaliacao_id`),
  KEY `avaliacai_anuncio_idx` (`avaliacao_anuncio_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Fazendo dump de dados para tabela `Avaliacao`
--

INSERT INTO `Avaliacao` (`avaliacao_id`, `avaliacao_nota`, `avaliacao_comentario`, `avaliacao_data_horario`, `avaliacao_anuncio_ref`, `avaliacao_cli_ref`, `avaliacao_titulo`, `avaliacao_curtidas`) VALUES
(96, 5, 'Maior Shopping de Divinópolis-MG, vale a pena conhecer! =)', '2016-08-03 19:05:21', 569, 177, 'Muito bom', 1),
(97, 5, 'Recomendo, muito esta barbearia. Top de linha! ', '2016-08-05 00:40:34', 614, 174, 'Top de linha ', 2),
(98, 5, ' Recomendo, muito esta barbearia. Top de linha!', '2016-08-03 22:48:44', 614, 169, 'Top de linha ', 0),
(100, 5, 'Muito pontual e resolve os problemas, super indico!  ', '2016-08-08 15:49:27', 634, 178, 'Muito Bom ', 5),
(101, 5, 'Excelente profissional!', '2016-08-05 00:36:44', 614, 177, 'Top!', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Avaliacao_respostas`
--

CREATE TABLE IF NOT EXISTS `Avaliacao_respostas` (
  `avaliacao_respostas_id` int(11) NOT NULL AUTO_INCREMENT,
  `avaliacao_respostas_cliente_ref` int(11) NOT NULL,
  `avaliacao_respostas_retorno` text NOT NULL,
  `avaliacao_respostas_data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avaliacao_respostas_avaliacao_ref` int(11) NOT NULL,
  `avaliacao_respostas_dono` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`avaliacao_respostas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Bairros`
--

CREATE TABLE IF NOT EXISTS `Bairros` (
  `bairros_id` int(11) NOT NULL AUTO_INCREMENT,
  `bairros_nome` varchar(80) NOT NULL,
  PRIMARY KEY (`bairros_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Fazendo dump de dados para tabela `Bairros`
--

INSERT INTO `Bairros` (`bairros_id`, `bairros_nome`) VALUES
(1, 'Aeroporto'),
(2, 'Afonso Pena'),
(3, 'Alterosa'),
(4, 'Alto São Vicente'),
(5, 'Alvorada'),
(6, 'Anchieta'),
(7, 'Antares'),
(8, 'Antônio Fonseca'),
(9, 'Área Rural de Divinópolis'),
(10, 'Bela Vista'),
(11, 'Belo Vale'),
(12, 'Belvedere'),
(13, 'Belvedere II'),
(14, 'Bom Pastor'),
(15, 'Campina Verde'),
(16, 'Casa Nova'),
(17, 'Catalão'),
(18, 'Centro'),
(19, 'Chácara Santa Rita'),
(20, 'Chácaras Belo Horizonte'),
(21, 'Chácaras Bom Retiro'),
(22, 'Chácaras Sambeca-Núcleo Urbano Roseiras'),
(23, 'Chanadour'),
(24, 'Cidade Jardim'),
(25, 'Conjunto Habitacional Dom Cristiano'),
(26, 'Costa Azul'),
(27, 'Danilo Passos'),
(28, 'Danilo Passos II'),
(29, 'Davanuze'),
(30, 'Del-Rey'),
(31, 'Distrito Industrial Coronel Jovelino Rabelo'),
(32, 'Do Carmo'),
(33, 'Dom Pedro II'),
(34, 'Dona Quita'),
(35, 'Dona Rosa'),
(36, 'Doutor José Thomaz'),
(37, 'Dulphe Pinto de Aguiar'),
(38, 'Eldorado'),
(39, 'Esplanada'),
(40, 'Exposição'),
(41, 'Fábio Notini'),
(42, 'Floramar'),
(43, 'Floresta'),
(44, 'Gafanhoto'),
(45, 'Geraldo Pereira'),
(46, 'Grajaú'),
(47, 'Halin Souki'),
(48, 'Icaraí'),
(49, 'Industrial'),
(50, 'Interlagos'),
(51, 'Ipanema'),
(52, 'Ipiranga'),
(53, 'Itacolomi'),
(54, 'Itaí'),
(55, 'Jardim Alterosa'),
(56, 'Jardim Betânia'),
(57, 'Jardim Brasília'),
(58, 'Jardim Candelária'),
(59, 'Jardim Candidés\r\n'),
(60, 'Jardim Copacabana'),
(61, 'Jardim das Acácias'),
(62, 'Jardim das Mansões'),
(63, 'Jardim Nova América'),
(64, 'Jardim Real'),
(65, 'Jardinópolis'),
(66, 'João Antônio Gonçalves'),
(67, 'João Paulo II'),
(68, 'Juscelino Kubitschek'),
(69, 'Juza Fonseca\r\n'),
(70, 'Levindo Paula Pereira'),
(71, 'Liberdade'),
(72, 'Mangabeiras'),
(73, 'Manoel Valinhas'),
(74, 'Mar e Terra'),
(75, 'Marajó'),
(76, 'Maria Helena'),
(77, 'Maria Peçanha'),
(78, 'Morada Nova'),
(79, 'Morumbi'),
(80, 'Nações'),
(81, 'Niterói'),
(82, 'Nossa Senhora da Conceição'),
(83, 'Nossa Senhora das Graças'),
(84, 'Nossa Senhora de Lourdes'),
(85, ' Nova Fortaleza'),
(86, 'Nova Holanda'),
(87, 'Nova Suíça'),
(88, 'Novo Paraíso'),
(89, 'Oliveiras'),
(90, 'Orion'),
(91, 'Pacaembu'),
(92, 'Padre Eustáquio'),
(93, 'Padre Herculano Yanes'),
(94, 'Padre Libério'),
(95, 'Paraíso'),
(96, 'Parque Jardim Capitão Silva'),
(97, 'Planalto'),
(98, 'Ponte Funda'),
(99, 'Porto Velho'),
(100, 'Primavera'),
(101, 'Prolongamento I do  Manoel Valinhas'),
(102, 'Quinta das Palmeiras'),
(103, 'Quintino'),
(104, 'Rancho Alegre'),
(105, 'Realengo'),
(106, 'Residencial Castelo'),
(107, 'Residencial Doutor Walchir Resende Costa'),
(108, 'Residencial Fonte Boa'),
(109, 'Residencial Lagoa dos Mandarins'),
(110, 'Residencial Lagoa Park'),
(111, 'Residencial Morumbi'),
(112, 'Sagrada Família'),
(113, 'Santa Clara'),
(114, 'Santa Lúcia'),
(115, 'Santa Luzia'),
(116, 'Santa Marta'),
(117, 'Santa Rosa'),
(118, 'Santa Tereza'),
(119, 'Santo André'),
(120, 'Santo Antônio'),
(121, 'Santos Dumont'),
(122, 'São Bento'),
(123, 'São Caetano'),
(124, 'São Domingos'),
(125, 'São Francisco'),
(126, 'São Geraldo'),
(127, 'São João de Deus'),
(128, 'São José'),
(129, 'São Lucas'),
(130, 'São Luís'),
(131, 'São Miguel'),
(132, 'São Paulo'),
(133, 'São Roque'),
(134, 'São Sebastião'),
(135, 'São Simão'),
(136, 'Serra Verde'),
(137, 'Sidil'),
(138, 'Terra Azul'),
(139, 'Tietê'),
(140, 'Universitário'),
(141, 'Vale do Sol'),
(142, 'Vila Belo Horizonte'),
(143, 'Vila Cruzeiro'),
(144, 'Vila das Roseiras'),
(145, 'Vila Espírito Santo'),
(146, 'Vila Minas Gerais'),
(147, 'Vila Romana'),
(148, ' Vivendas da Exposição'),
(149, ' Xavante\r\n');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Categoria`
--

CREATE TABLE IF NOT EXISTS `Categoria` (
  `tipo_categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_categoria_descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`tipo_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=198 ;

--
-- Fazendo dump de dados para tabela `Categoria`
--

INSERT INTO `Categoria` (`tipo_categoria_id`, `tipo_categoria_descricao`) VALUES
(1, 'Alimentação'),
(2, 'Transporte'),
(3, 'Prestação de serviços'),
(4, 'Saúde e beleza'),
(5, 'Lazer e turismo'),
(6, 'Lojas e locadoras'),
(7, 'Educação'),
(8, 'Governo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_email` varchar(45) NOT NULL,
  `cli_senha` varchar(45) NOT NULL,
  `cli_nome` varchar(150) DEFAULT NULL,
  `cli_sobrenome` varchar(150) NOT NULL,
  `cli_foto` varchar(150) DEFAULT NULL,
  `cli_data_ts` varchar(14) NOT NULL,
  `cli_uid` varchar(50) NOT NULL,
  `cli_ativo` tinyint(1) NOT NULL,
  `cli_data_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cli_excluido` tinyint(1) NOT NULL,
  `cli_data_nasc` text NOT NULL,
  `cli_sexo` varchar(1) NOT NULL,
  `cli_estado_civil` varchar(30) NOT NULL,
  `cli_descricao` text NOT NULL,
  `cli_facebook` text NOT NULL,
  `cli_twitter` text NOT NULL,
  `cli_pais` varchar(40) NOT NULL,
  `cli_estado` varchar(40) NOT NULL,
  `cli_cidade` varchar(50) NOT NULL,
  `cli_endereco` varchar(200) NOT NULL,
  `cli_complemento` varchar(50) NOT NULL,
  `cli_userface` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=209 ;

--
-- Fazendo dump de dados para tabela `Cliente`
--

INSERT INTO `Cliente` (`cli_id`, `cli_email`, `cli_senha`, `cli_nome`, `cli_sobrenome`, `cli_foto`, `cli_data_ts`, `cli_uid`, `cli_ativo`, `cli_data_insert`, `cli_excluido`, `cli_data_nasc`, `cli_sexo`, `cli_estado_civil`, `cli_descricao`, `cli_facebook`, `cli_twitter`, `cli_pais`, `cli_estado`, `cli_cidade`, `cli_endereco`, `cli_complemento`, `cli_userface`) VALUES
(170, 'laenderquadroos@gmail.com', 'd155c2f519e9e32e2714803ffc894ec0', 'Elio', 'Laender', 'upload/user-images/149e9677a5989fd342ae44213df68868', '1470169514', '162278555257a101aab30ad5.22782636', 1, '2016-08-02 20:25:14', 0, '14/06/1990', 'M', 'solteiro', '', '', '', '', '', '', '', '', 0),
(171, 'pedroaltivo88@outlook.com', 'e6326f850d5a01865fc6d43e139611f5', 'Pedro ', '', 'upload/user-images/user-default.png', '1470170270', '28659694357a1049e8d2704.52279756', 0, '2016-08-02 20:37:50', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(174, 'laenderdeveloper@gmail.com', '157724297989192', 'SempreNegócio', 'Anúncios', 'https://graph.facebook.com/157724297989192/picture', '1470171032', '61238310257a10798b11a57.31839132', 1, '2016-08-02 20:50:32', 0, '', '', '', '', '', '', '', '', '', '', '', 1),
(177, 'eliopiskt@yahoo.com.br', '10207157549921042', 'Elio', 'Laender', 'https://graph.facebook.com/10207157549921042/picture', '1470172139', '91210690057a10beb0bbad6.31482009', 1, '2016-08-02 21:08:59', 0, '', '', '', '', '', '', '', '', '', '', '', 1),
(178, 'pedrogontijo88@outlook.com', '1760384534240151', 'Pedro', 'Altivo', 'https://graph.facebook.com/1760384534240151/picture', '1470176023', '58713050757a11b174400d5.26312449', 1, '2016-08-02 22:13:43', 0, '', '', '', '', '', '', '', '', '', '', '', 1),
(179, 'ginamaradivi@hotmail.com', 'c4c0061728ea5861c00260aa1990c56a', 'Gimara', 'Altivo', 'https://graph.facebook.com/10208549826556355/picture', '1470177096', '202287928357a11f48df7469.75347337', 1, '2016-08-02 22:31:36', 0, '', '', '', '', '', '', '', '', '', '', '', 1),
(180, 'pgontijo88@gmail.com', '143436139425953', 'Femina', 'Descontos', 'https://graph.facebook.com/143436139425953/picture', '1470238496', '52129793657a20f20d3d7e4.22131652', 1, '2016-08-03 15:34:56', 0, '', '', '', '', '', '', '', '', '', '', '', 1),
(183, 'pgontijo88@gma.com', 'e6326f850d5a01865fc6d43e139611f5', 'Pedro', '', 'upload/user-images/user-default.png', '1470269789', '98435420157a2895d7bbca2.27504408', 0, '2016-08-04 00:16:29', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(184, 'pedroaltivo@hotamail.com', 'e10adc3949ba59abbe56e057f20f883e', 'teste', '', 'upload/user-images/user-default.png', '1470281301', '160366237557a2b655a037f5.57285664', 0, '2016-08-04 03:28:21', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(187, 'liviapsique@gmail.com', 'de1afd4fba3938e7f7aa555743712de8', 'Lívia', '', 'upload/user-images/user-default.png', '1470349597', '78544530757a3c11de4fa33.96650431', 1, '2016-08-04 22:26:37', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(188, 'edmurpereira4@hotmail.com', 'bae092ec4ca2e170edd7fbbf132244b9', 'Edmur ', '', 'upload/user-images/9dcb88e0137649590b755372b040afad', '1470350570', '88947628457a3c4eaed4f65.18994628', 1, '2016-08-04 22:42:50', 0, '', 'M', 'casado', '', 'https://www.facebook.com/edmur.lemos?fref=ts', '', 'Brasil', 'MG', 'Divinópolis ', '', '', 0),
(190, 'marcobarretodvl@gmail.com', '9985039da9a041e4e95a6e62e63adf76', 'Marco', '', 'upload/user-images/cfecdb276f634854f3ef915e2e980c31', '1470416455', '32355005457a4c647c15b94.59096364', 0, '2016-08-05 17:00:55', 0, '', 'M', 'solteiro', '', 'https://www.facebook.com/marco.barreto.3194', '', 'Brasil ', 'Minas Gerais ', 'Divinópolis ', 'Santo Antônio ', '', 0),
(191, 'eduardoantoniomota@hotmail.com', 'ace86531e9fa1888968532a32242c055', 'Eduardo', '', 'upload/user-images/0aa1883c6411f7873cb83dacb17b0afc', '1470431025', '68447994057a4ff315b96d2.94846172', 0, '2016-08-05 21:03:45', 0, '', 'M', 'casado', '', '', '', '', '', '', '', '', 0),
(192, 'Joaorobertoo58@gmail.com', '202cb962ac59075b964b07152d234b70', 'Joao roberto altivo gontijo ', '', 'upload/user-images/58a2fc6ed39fd083f55d4182bf88826d', '1470491388', '107664789057a5eafc010888.68661214', 0, '2016-08-06 13:49:48', 0, '', 'M', 'solteiro', '', 'https://www.facebook.com/joaoroberto.altivo?fref=ts', '', '', '', '', '', '', 0),
(193, 'lucianamoura_12@hotmail.com', '450336441380591df61c97aa6791b692', 'Luciana Aparecida Moura', '', 'upload/user-images/user-default.png', '1470496788', '102909806057a60014c03bb9.13777273', 1, '2016-08-06 15:19:48', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(199, 'sysconsulte@gmail.com', 'd155c2f519e9e32e2714803ffc894ec0', 'Élio Laender', '', 'upload/user-images/user-default.png', '1470616947', '199369498957a7d573511bc5.79332414', 1, '2016-08-08 00:42:27', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(200, 'hotelfenix@gmail.com', '3aae0abe8dc1cb299a9260c13d4c731b', 'Hotel Fenix ', '', 'upload/user-images/3644a684f98ea8fe223c713b77189a77', '1470663972', '9048572557a88d241c2282.30541025', 0, '2016-08-08 13:46:12', 0, '', '', 'casado', '', '', '', '', '', '', '', '', 0),
(201, 'josemoto@gmail.com', '90e528618534d005b1a7e7b7a367813f', 'José', '', 'upload/user-images/user-default.png', '1470673137', '89825134857a8b0f1dca426.00999160', 0, '2016-08-08 16:18:57', 0, '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cli_exclu`
--

CREATE TABLE IF NOT EXISTS `Cli_exclu` (
  `cli_exclu_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_exclu_cli_ref` int(11) NOT NULL,
  `cli_exclu_motivo` varchar(80) NOT NULL,
  `cli_exclu_descricao` text NOT NULL,
  PRIMARY KEY (`cli_exclu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Controle_data`
--

CREATE TABLE IF NOT EXISTS `Controle_data` (
  `Controle_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `Controle_data_ref` int(11) NOT NULL,
  `Controle_data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Controle_data_venc_gratis` date NOT NULL,
  `Controle_data_ven_ano` date NOT NULL,
  `Controle_data_efetivo` tinyint(1) NOT NULL,
  `Controle_data_cancelamento` date DEFAULT NULL,
  PRIMARY KEY (`Controle_data_id`),
  KEY `data_anuncio_anuncio_idx` (`Controle_data_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Controle_pag`
--

CREATE TABLE IF NOT EXISTS `Controle_pag` (
  `Controle_pag_id` int(11) NOT NULL AUTO_INCREMENT,
  `Controle_pag_cli_ref` int(11) NOT NULL,
  `Controle_pag_plano_ref` int(11) NOT NULL,
  `Controle_pag_pacote_ref` int(11) NOT NULL,
  `Controle_anun_ref` int(11) NOT NULL,
  `Controle_data_pag` int(11) NOT NULL,
  `Controle_pag_status` int(11) NOT NULL,
  PRIMARY KEY (`Controle_pag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cont_views`
--

CREATE TABLE IF NOT EXISTS `Cont_views` (
  `cont_views_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_views_anuncio_ref` int(11) NOT NULL,
  `cont_views_qtd_total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cont_views_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=673 ;

--
-- Fazendo dump de dados para tabela `Cont_views`
--

INSERT INTO `Cont_views` (`cont_views_id`, `cont_views_anuncio_ref`, `cont_views_qtd_total`) VALUES
(556, 549, 22),
(557, 550, 41),
(558, 551, 12),
(559, 552, 2),
(560, 553, 14),
(561, 554, 2),
(562, 555, 1),
(563, 556, 0),
(564, 557, 1),
(565, 558, 2),
(566, 559, 3),
(567, 560, 1),
(568, 561, 0),
(569, 562, 2),
(570, 563, 5),
(571, 564, 1),
(572, 565, 5),
(573, 566, 0),
(574, 567, 0),
(575, 568, 2),
(576, 569, 25),
(577, 570, 3),
(578, 571, 14),
(579, 572, 5),
(580, 573, 2),
(581, 574, 1),
(582, 575, 0),
(583, 576, 0),
(584, 577, 0),
(585, 578, 1),
(586, 579, 2),
(587, 580, 1),
(588, 581, 1),
(589, 582, 1),
(590, 583, 2),
(591, 584, 4),
(592, 585, 0),
(593, 586, 0),
(594, 587, 1),
(595, 588, 0),
(596, 589, 0),
(597, 590, 0),
(598, 591, 0),
(599, 592, 0),
(600, 593, 0),
(601, 594, 0),
(602, 595, 0),
(603, 596, 0),
(604, 597, 0),
(605, 598, 0),
(606, 599, 0),
(607, 600, 0),
(608, 601, 0),
(609, 602, 1),
(610, 603, 19),
(611, 604, 0),
(612, 605, 3),
(613, 606, 2),
(614, 607, 4),
(615, 608, 17),
(616, 609, 5),
(617, 610, 3),
(618, 611, 13),
(619, 612, 2),
(620, 613, 1),
(621, 614, 25),
(622, 615, 5),
(623, 616, 3),
(624, 617, 11),
(625, 618, 4),
(626, 619, 17),
(627, 620, 0),
(628, 621, 0),
(629, 622, 0),
(630, 623, 0),
(631, 624, 0),
(632, 625, 0),
(633, 626, 7),
(634, 627, 2),
(635, 628, 3),
(636, 629, 0),
(637, 630, 0),
(638, 631, 1),
(639, 632, 0),
(640, 633, 0),
(641, 634, 59),
(642, 635, 83),
(643, 636, 15),
(644, 637, 33),
(645, 638, 53),
(646, 639, 16),
(647, 640, 0),
(648, 641, 0),
(649, 642, 1),
(650, 643, 1),
(651, 644, 32),
(652, 645, 0),
(653, 646, 0),
(654, 647, 15),
(664, 657, 1),
(666, 659, 3),
(667, 660, 1),
(668, 661, 2),
(669, 662, 2),
(670, 663, 3),
(671, 664, 0),
(672, 665, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cupon_codigo`
--

CREATE TABLE IF NOT EXISTS `Cupon_codigo` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cc_cupon_ref` int(11) NOT NULL,
  `cc_cli_impresso` int(11) NOT NULL,
  `cc_codigo` varchar(50) NOT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

--
-- Fazendo dump de dados para tabela `Cupon_codigo`
--

INSERT INTO `Cupon_codigo` (`cc_id`, `cc_cupon_ref`, `cc_cli_impresso`, `cc_codigo`) VALUES
(180, 15, 177, '6103292343'),
(181, 15, 178, '6776401477'),
(182, 15, 0, '6391184081'),
(183, 15, 0, '3127624065'),
(184, 15, 0, '1870110313'),
(185, 15, 0, '5271773644'),
(186, 15, 0, '4080953584'),
(187, 15, 0, '9443854213'),
(188, 15, 0, '8576246548'),
(189, 15, 0, '0310649652');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cupon_desconto`
--

CREATE TABLE IF NOT EXISTS `Cupon_desconto` (
  `cupon_desconto_id` int(13) NOT NULL AUTO_INCREMENT,
  `cupon_desconto_anun_ref` int(11) NOT NULL,
  `cupon_desconto_titulo` varchar(150) NOT NULL,
  `cupon_desconto_descricao` varchar(500) NOT NULL,
  `cupon_desconto_qtd_impress` int(11) DEFAULT NULL COMMENT 'Caso for zero será considerado ilimitado',
  `cupon_desconto_inicio` varchar(12) NOT NULL,
  `cupon_desconto_termino` varchar(12) NOT NULL,
  `cupon_desconto_tipo` varchar(25) NOT NULL,
  `cupon_desconto_percent` int(3) NOT NULL,
  `cupon_desconto_valor_de` decimal(7,2) NOT NULL,
  `cupon_desconto_valor_para` decimal(7,2) NOT NULL,
  `cupon_desconto_img` varchar(80) NOT NULL,
  `cupon_desconto_excluido` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = não excluído, 1 = excluído',
  `cupon_desconto_impressos` int(11) DEFAULT '0' COMMENT 'Está sendo usado porque se o usuário alterar a quantidade depois, será perdido a conta.',
  `cupon_desconto_restantes` int(11) NOT NULL,
  PRIMARY KEY (`cupon_desconto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Fazendo dump de dados para tabela `Cupon_desconto`
--

INSERT INTO `Cupon_desconto` (`cupon_desconto_id`, `cupon_desconto_anun_ref`, `cupon_desconto_titulo`, `cupon_desconto_descricao`, `cupon_desconto_qtd_impress`, `cupon_desconto_inicio`, `cupon_desconto_termino`, `cupon_desconto_tipo`, `cupon_desconto_percent`, `cupon_desconto_valor_de`, `cupon_desconto_valor_para`, `cupon_desconto_img`, `cupon_desconto_excluido`, `cupon_desconto_impressos`, `cupon_desconto_restantes`) VALUES
(15, 550, 'Promoção - Desenvolvimento de Web Site', 'Promoção Válida para desenvolvimento de Web Sites. Seus clientes estão cada vez mais conectados, tenha seu negócio online e saia na frente!', 10, '03/08/2016', '03/10/2016', 'porcentagem', 10, '0.00', '0.00', 'upload/cupon-images/96da2f590cd7246bbde0051047b0d6f715', 0, 2, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cupon_impresso`
--

CREATE TABLE IF NOT EXISTS `Cupon_impresso` (
  `cupon_impresso_id` int(11) NOT NULL AUTO_INCREMENT,
  `cupon_impresso_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cupon_impresso_ref` int(11) NOT NULL,
  `cupon_impresso_cli_ref` int(11) NOT NULL,
  PRIMARY KEY (`cupon_impresso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Fazendo dump de dados para tabela `Cupon_impresso`
--

INSERT INTO `Cupon_impresso` (`cupon_impresso_id`, `cupon_impresso_data`, `cupon_impresso_ref`, `cupon_impresso_cli_ref`) VALUES
(87, '2016-08-03 22:24:38', 15, 177),
(88, '2016-08-18 19:29:39', 15, 178);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Curriculum`
--

CREATE TABLE IF NOT EXISTS `Curriculum` (
  `curriculum_id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_nome` varchar(45) NOT NULL,
  `curriculum_sexo` varchar(10) NOT NULL,
  `curriculum_idade` varchar(45) DEFAULT NULL,
  `curriculum_endereco_ref` int(11) NOT NULL,
  `curriculum_area_atuacao` varchar(150) NOT NULL,
  `curriculum_descricao` varchar(2200) NOT NULL,
  `curriculum_escolaridade` varchar(80) NOT NULL,
  `curriculum_habilitacao` varchar(5) DEFAULT NULL,
  `curriculum_foto` varchar(300) DEFAULT NULL,
  `curriculum_tel_cel` varchar(45) DEFAULT NULL,
  `curriculum_tel_fixo` varchar(45) DEFAULT NULL,
  `curriculum_email` varchar(45) DEFAULT NULL,
  `curriculum_cliente_ref` int(11) NOT NULL,
  `curriculum_data_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curriculum_status` tinyint(1) NOT NULL DEFAULT '1',
  `curriculum_excluido` tinyint(1) NOT NULL,
  `curriculum_nacionalidade` varchar(45) NOT NULL,
  `curriculum_estado_civil` varchar(45) NOT NULL,
  `curriculum_cargo` varchar(50) NOT NULL,
  `curriculum_nome_empresa` varchar(100) NOT NULL,
  `curriculum_atividades_realizadas` text NOT NULL,
  `curriculum_data_admissao` text NOT NULL,
  `curriculum_data_demissao` text NOT NULL,
  `curriculum_observacoes` text NOT NULL,
  `curriculum_facebook` varchar(150) NOT NULL,
  `curriculum_lattes` varchar(150) NOT NULL,
  `curriculum_linkedin` varchar(150) NOT NULL,
  PRIMARY KEY (`curriculum_id`),
  KEY `curriculum_endereco_idx` (`curriculum_endereco_ref`),
  KEY `curriculum_cliente_idx` (`curriculum_cliente_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Desconto_virtual`
--

CREATE TABLE IF NOT EXISTS `Desconto_virtual` (
  `desconto_virtual_id` int(11) NOT NULL AUTO_INCREMENT,
  `desconto_virtual_titulo` varchar(150) NOT NULL,
  `desconto_virtual_descricao` varchar(500) NOT NULL,
  `desconto_virtual_redireciona` int(11) NOT NULL,
  `desconto_virtual_inicio` varchar(10) NOT NULL,
  `desconto_virtual_termino` varchar(10) NOT NULL,
  `desconto_virtual_tipo` varchar(15) NOT NULL,
  `desconto_virtual_percent` int(11) NOT NULL,
  `desconto_virtual_valor_de` decimal(7,2) NOT NULL,
  `desconto_virtual_valor_para` decimal(7,2) NOT NULL,
  `desconto_virtual_img` varchar(80) NOT NULL,
  `desconto_virtual_url` varchar(270) NOT NULL,
  `desconto_virtual_nome_loja` varchar(150) NOT NULL,
  PRIMARY KEY (`desconto_virtual_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Email_promocao`
--

CREATE TABLE IF NOT EXISTS `Email_promocao` (
  `email_promocao_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_promocao_descricao` varchar(70) NOT NULL,
  `email_data_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email_promocao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Fazendo dump de dados para tabela `Email_promocao`
--

INSERT INTO `Email_promocao` (`email_promocao_id`, `email_promocao_descricao`, `email_data_insert`) VALUES
(21, '', '2016-08-03 18:57:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Endereco`
--

CREATE TABLE IF NOT EXISTS `Endereco` (
  `endereco_id` int(11) NOT NULL AUTO_INCREMENT,
  `endereco_cep` varchar(45) NOT NULL,
  `endereco_rua` varchar(80) NOT NULL,
  `endereco_bairro` varchar(80) NOT NULL,
  `endereco_numero` int(11) NOT NULL,
  `endereco_complemento` varchar(45) DEFAULT NULL,
  `endereco_numero_complemento` int(11) NOT NULL,
  `endereco_cidade` varchar(80) NOT NULL,
  `endereco_estado` varchar(45) NOT NULL,
  PRIMARY KEY (`endereco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=686 ;

--
-- Fazendo dump de dados para tabela `Endereco`
--

INSERT INTO `Endereco` (`endereco_id`, `endereco_cep`, `endereco_rua`, `endereco_bairro`, `endereco_numero`, `endereco_complemento`, `endereco_numero_complemento`, `endereco_cidade`, `endereco_estado`) VALUES
(569, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 422, 'Outros', 0, 'Divinópolis', 'MG'),
(570, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 224, 'Apartamento', 801, 'Divinópolis', 'MG'),
(571, '35500-001', 'Rua Goiás', 'Centro', 1311, 'Outros', 0, 'Divinópolis', 'MG'),
(572, '35500-003', 'Avenida Primeiro de Junho', 'Centro', 427, 'Outros', 0, 'Divinópolis', 'MG'),
(573, '35500-222', 'Travessa do Cobre', 'Niterói', 800, 'Outros', 0, 'Divinópolis', 'MG'),
(574, '35500-006', 'Rua São Paulo', 'Centro', 151, 'Outros', 0, 'Divinópolis', 'MG'),
(575, '35500-155', 'Rua JK', 'Bom Pastor', 1090, 'Outros', 0, 'Divinópolis', 'MG'),
(576, '35500-017', 'Rua Coronel João Notini', 'Centro', 150, 'Outros', 0, 'Divinópolis', 'MG'),
(577, '35500-001', 'Rua Goiás', 'Centro', 384, 'Outros', 0, 'Divinópolis', 'MG'),
(578, '35500-155', 'Rua JK', 'Bom Pastor', 350, 'Outros', 0, 'Divinópolis', 'MG'),
(579, '35500-003', 'Avenida Primeiro de Junho', 'Centro', 333, 'Outros', 0, 'Divinópolis', 'MG'),
(580, '35502-562', 'Rua Pedro Ferreira do Amaral', 'Padre Libério', 33, 'Casa', 0, 'Divinópolis', 'MG'),
(581, '35500-485', 'Rua Nilo Maciel', 'Ponte Funda', 241, 'Outros', 0, 'Divinópolis', 'MG'),
(582, '35500-001', 'Rua Goiás', 'Centro', 946, 'Outros', 0, 'Divinópolis', 'MG'),
(583, '35500-215', 'Rua Topázio', 'Niterói', 500, 'Outros', 0, 'Divinópolis', 'MG'),
(584, '35500-201', 'Av JK', 'Bom Pastor ', 1650, 'Outros', 0, 'Divinópolis', 'MG'),
(585, '35501-170', 'Avenida Paraná', 'São José', 3001, 'Outros', 0, 'Divinópolis', 'MG'),
(586, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 764, 'Outros', 764, 'Divinópolis', 'MG'),
(587, '35500-286', 'Rua Santos Dumont', 'Manoel Valinhas', 1001, 'Outros', 0, 'Divinópolis', 'MG'),
(588, '35500-001', 'Rua Goiás', 'Centro', 1025, 'Outros', 0, 'Divinópolis', 'MG'),
(589, '35500-119', 'Rua Moacir José Leite', 'Santa Clara', 100, 'Outros', 0, 'Divinópolis', 'MG'),
(590, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 455, 'Outros', 0, 'Divinópolis', 'MG'),
(591, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 15, 'Outros', 0, 'Divinópolis', 'MG'),
(592, '35500-005', 'Avenida Antônio Olímpio de Morais', 'Centro', 338, 'Outros', 0, 'Divinópolis', 'MG'),
(593, '35500-010', 'Avenida Vinte e Um de Abril', 'Centro', 338, 'Outros', 0, 'Divinópolis', 'MG'),
(594, '35500-008', 'Rua Pernambuco', 'Centro', 60, 'Outros', 0, 'Divinópolis', 'MG'),
(595, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 325, 'Loja', 0, 'Divinópolis', 'MG'),
(596, '35500-011', 'Avenida Sete de Setembro', 'Centro', 794, 'Casa', 0, 'Divinópolis', 'MG'),
(597, '35500-006', 'Rua São Paulo', 'Centro', 349, 'Loja', 0, 'Divinópolis', 'MG'),
(598, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 210, 'Loja', 0, 'Divinópolis', 'MG'),
(599, '35500-001', 'Rua Goiás', 'Centro', 1390, 'Loja', 0, 'Divinópolis', 'MG'),
(600, '35500-456', 'Rua Bom Sucesso', 'Interlagos', 621, 'Outros', 0, 'Divinópolis', 'MG'),
(601, '35500-221', 'Avenida Governador Magalhães Pinto', 'Niterói', 299, 'Loja', 0, 'Divinópolis', 'MG'),
(602, '35502-580', 'Avenida Amazonas', 'Distrito Industrial Coronel Jovelino Rabelo', 280, 'Loja', 0, 'Divinópolis', 'MG'),
(603, '35500-001', 'Rua Goiás', 'Centro', 15, 'Outros', 0, 'Divinópolis', 'MG'),
(604, '35500-024', 'Avenida Getúlio Vargas', 'Centro', 268, 'Outros', 0, 'Divinópolis', 'MG'),
(605, '35502-437', 'Rua José Fernandes Xavier', 'Dulphe Pinto de Aguiar', 131, 'Casa', 0, 'Divinópolis', 'MG'),
(606, '35500-108', 'Rua Nova Serrana', 'Afonso Pena', 68, 'Casa', 0, 'Divinópolis', 'MG'),
(607, '35500-970', 'Avenida Antônio Olímpio de Morais', 'Centro', 96, 'Casa', 0, 'Divinópolis', 'MG'),
(608, '35500-336', 'Avenida Antônio Neto', 'Danilo Passos II', 1768, 'Casa', 0, 'Divinópolis', 'MG'),
(609, '35500-002', 'Rua Esmeralda ', 'Niterói ', 160, 'Casa', 0, 'Divinópolis', 'MG'),
(610, '35501-195', 'Rua Ibituruna', 'Planalto', 231, 'Casa', 0, 'Divinópolis', 'MG'),
(611, '35500-212', 'Rua Faradim', 'São Luís', 895, 'Casa', 0, 'Divinópolis', 'MG'),
(612, '35501-207', 'Rua Júlio Nogueira', 'Catalão', 1320, 'Casa', 0, 'Divinópolis', 'MG'),
(613, '35501-051', 'Rua José Afonso Micheline', 'Nossa Senhora das Graças', 685, 'Casa', 0, 'Divinópolis', 'MG'),
(614, '35500-532', 'Rua Bolívia', 'Santa Rosa', 1, 'Casa', 0, 'Divinópolis', 'MG'),
(615, '35500-048', 'Praça do Mercado', 'Centro', 44, 'Casa', 0, 'Divinópolis', 'MG'),
(616, '35501-296', 'Rua Sebastião Gonçalves Coelho', 'Chanadour', 400, 'Outros', 0, 'Divinópolis', 'MG'),
(617, '35502-634', 'Avenida Tedinho Alvim', 'Liberdade', 1000, 'Outros', 0, 'Divinópolis', 'MG'),
(618, '35500-432', 'Rua Fernão Dias', 'Porto Velho', 710, 'Casa', 0, 'Divinópolis', 'MG'),
(619, '35500-229', 'Rua do Ferro', 'Niterói', 411, 'Casa', 0, 'Divinópolis', 'MG'),
(620, '35500-018', 'Rua Itapecerica', 'Centro', 403, 'Casa', 0, 'Divinópolis', 'MG'),
(621, '35500-108', 'Rua Nova Serrana', 'Afonso Pena', 140, 'Casa', 0, 'Divinópolis', 'MG'),
(622, '35500-007', 'Rua Minas Gerais', 'Centro', 655, 'Casa', 0, 'Divinópolis', 'MG'),
(623, '35500-278', 'Rua Nossa Senhora das Graças', 'Manoel Valinhas', 281, 'Outros', 0, 'Divinópolis', 'MG'),
(624, '35500-179', 'Rua Artede Almada Alvim', 'Alvorada', 60, 'Casa', 0, 'Divinópolis', 'MG'),
(625, '35500-155', 'Rua JK', 'Bom Pastor', 1361, 'Outros', 0, 'Divinópolis', 'MG'),
(626, '35500-001', 'Rua Goiás', 'Centro', 1515, 'Outros', 0, 'Divinópolis', 'MG'),
(627, '35501-221', 'Avenida Autorama', 'Catalão', 1210, 'Outros', 0, 'Divinópolis', 'MG'),
(628, '35502-027', 'Rua Goiás', 'Ipiranga', 1899, 'Outros', 0, 'Divinópolis', 'MG'),
(629, '35500-010', 'Avenida Vinte e Um de Abril', 'Centro', 921, 'Outros', 0, 'Divinópolis', 'MG'),
(630, '35500-011', 'Avenida Sete de Setembro', 'Centro', 910, 'Outros', 0, 'Divinópolis', 'MG'),
(631, '35502-456', 'Rua Rio de Janeiro', 'Rancho Alegre', 1899, 'Outros', 0, 'Divinópolis', 'MG'),
(632, '35501-102', 'Rua Oribes Batista Leite', 'Santa Tereza', 650, 'Outros', 0, 'Divinópolis', 'MG'),
(633, '35500-026', 'Rua Bahia', 'Centro', 667, 'Outros', 0, 'Divinópolis', 'MG'),
(634, '35500-011', 'Avenida Sete de Setembro', 'Centro', 695, 'Casa', 0, 'Divinópolis', 'MG'),
(635, '35500-119', 'Rua Moacir José Leite', 'Santa Clara', 100, 'Outros', 0, 'Divinópolis', 'MG'),
(636, '35501-221', 'Avenida Autorama', 'São Judas Tadeu', 1313, 'Outros', 0, 'Divinópolis', 'MG'),
(637, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 1, 'Outros', 0, 'Divinópolis', 'MG'),
(638, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 1, 'Outros', 0, 'Divinópolis', 'MG'),
(639, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 1, 'Outros', 0, 'Divinópolis', 'MG'),
(640, '35501-168', 'Avenida Paraná', 'Catalão', 890, 'Loja', 0, 'Divinópolis', 'MG'),
(641, '35500-151', 'Rua Pitangui', 'Santa Clara', 61, 'Outros', 0, 'Divinópolis', 'MG'),
(642, '35500-011', 'Avenida Sete de Setembro', 'Centro', 1160, 'Outros', 0, 'Divinópolis', 'MG'),
(643, '35500-009', 'Rua Rio de Janeiro', 'Centro', 258, 'Outros', 0, 'Divinópolis', 'MG'),
(644, '35500-167', 'Rua Pratápolis', 'Bom Pastor', 2, 'Outros', 0, 'Divinópolis', 'MG'),
(645, '35501-001', 'Rua Engenheiro Benjamim de Oliveira', 'Esplanada', 144, 'Outros', 0, 'Divinópolis', 'MG'),
(646, '35501-110', 'Avenida Márcio Notini', 'Juza Fonseca', 100, 'Outros', 0, 'Divinópolis', 'MG'),
(647, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 224, 'Casa', 0, 'Divinópolis', 'MG'),
(648, '35500-001', 'Rua Goiás', 'Centro', 420, 'Loja', 0, 'Divinópolis', 'MG'),
(649, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 570, 'Outros', 0, 'Divinópolis', 'MG'),
(650, '35502-027', 'Rua Goiás', 'Ipiranga', 1983, 'Outros', 0, 'Divinópolis', 'MG'),
(651, '35500-011', 'Avenida Sete de Setembro', 'Centro', 669, 'Outros', 0, 'Divinópolis', 'MG'),
(652, '35502-302', 'Rua Paquetá', 'Floramar', 1, 'Outros', 0, 'Divinópolis', 'MG'),
(653, '35500-000', ' Rua Dr. Valdemar Raulch', 'Afonso Pena', 231, 'Outros', 0, 'Divinópolis', 'MG'),
(654, '35500-431', 'Rua Joaquim Nabuco', 'Porto Velho', 941, 'Casa', 0, 'Divinópolis', 'MG'),
(655, '35500-009', 'Rua Rio de Janeiro', 'Centro', 426, 'Sala', 309, 'Divinópolis', 'MG'),
(656, '35502-026', 'Rua Minas Gerais', 'Santo Antônio ', 1767, 'Outros', 0, 'Divinópolis', 'MG'),
(657, '35502-036', 'Rua Monte Santo', 'Santo Antônio', 631, 'Apartamento', 401, 'Divinópolis', 'MG'),
(658, '35502-026', 'Rua Minas Gerais', 'Santo Antônio', 1767, 'Outros', 202, 'Divinópolis', 'MG'),
(659, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 224, 'Apartamento', 801, 'Divinópolis', 'MG'),
(660, '35502-433', 'Rua Alfredo Rachid', 'São Roque', 225, 'Casa', 0, 'Divinópolis', 'MG'),
(661, '35500-003', 'Avenida Primeiro de Junho', 'Centro', 220, 'Outros', 0, 'Divinópolis', 'MG'),
(662, '35500-003', 'Avenida Primeiro de Junho', 'Centro', 220, 'Outros', 0, 'Divinópolis', 'MG'),
(663, '35500-003', 'Avenida Primeiro de Junho', 'Centro', 220, 'Galpao', 220, 'Divinópolis', 'MG'),
(664, '35500-001', 'Rua Goiás', 'Centro', 337, 'Outros', 0, 'Divinópolis', 'MG'),
(665, '35502-812', 'Rua Falcão', 'Serra Verde', 251, 'Outros', 0, 'Divinópolis', 'MG'),
(666, '35502-812', 'Rua Falcão', 'Serra Verde', 251, 'Outros', 0, 'Divinópolis', 'MG'),
(667, '35500-002', 'Avenida Primeiro de Junho', 'Centro', 708, 'Outros', 0, 'Divinópolis', 'MG'),
(677, '35502-284', 'Rua Luiz Guilherme da Silva', 'Distrito Industrial Coronel Jovelino Rabelo', 1001, 'Outros', 0, 'Divinópolis', 'MG'),
(679, '35500-003', 'Avenida Primeiro de Junho', 'Centro', 841, 'Outros', 0, 'Divinópolis', 'MG'),
(680, '35500-001', 'Rua Goiás', 'Centro', 946, 'Outros', 0, 'Divinópolis', 'MG'),
(681, '35500-005', 'Avenida Antônio Olímpio de Morais', 'Centro', 293, 'Outros', 0, 'Divinópolis', 'MG'),
(682, '35500-155', 'Rua JK', 'Bom Pastor', 1495, 'Outros', 0, 'Divinópolis', 'MG'),
(683, '35500-008', 'Rua Pernambuco', 'Centro', 524, 'Outros', 0, 'Divinópolis', 'MG'),
(684, '35502-812', 'Rua Falcão', 'Serra Verde', 220, 'Casa', 0, 'Divinópolis', 'MG'),
(685, '35502-812', 'Rua Falcão', 'Serra Verde', 220, 'Outros', 0, 'Divinópolis', 'MG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Facilidades`
--

CREATE TABLE IF NOT EXISTS `Facilidades` (
  `facilidades_id` int(11) NOT NULL AUTO_INCREMENT,
  `facilidades_anuncio_ref` int(11) NOT NULL,
  `facilidades_estacionamento` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_seguranca` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_acessibilidade` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_ar_condicionado` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_wifii` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_reservar` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_permite_animais` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_cupons_desconto` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_criancas` tinyint(1) NOT NULL DEFAULT '0',
  `facilidades_delivery` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`facilidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=676 ;

--
-- Fazendo dump de dados para tabela `Facilidades`
--

INSERT INTO `Facilidades` (`facilidades_id`, `facilidades_anuncio_ref`, `facilidades_estacionamento`, `facilidades_seguranca`, `facilidades_acessibilidade`, `facilidades_ar_condicionado`, `facilidades_wifii`, `facilidades_reservar`, `facilidades_permite_animais`, `facilidades_cupons_desconto`, `facilidades_criancas`, `facilidades_delivery`) VALUES
(559, 549, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(560, 550, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0),
(561, 551, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0),
(562, 552, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(563, 553, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(564, 554, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(565, 555, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(566, 556, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(567, 557, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(568, 558, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(569, 559, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(570, 560, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(571, 561, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(572, 562, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(573, 563, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(574, 564, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(575, 565, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(576, 566, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(577, 567, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(578, 568, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(579, 569, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0),
(580, 570, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(581, 571, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(582, 572, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(583, 573, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(584, 574, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(585, 575, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(586, 576, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(587, 577, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(588, 578, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(589, 579, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(590, 580, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(591, 581, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(592, 582, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(593, 583, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(594, 584, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(595, 585, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(596, 586, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(597, 587, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(598, 588, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(599, 589, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(600, 590, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(601, 591, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(602, 592, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(603, 593, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(604, 594, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(605, 595, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0),
(606, 596, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0),
(607, 597, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0),
(608, 598, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(609, 599, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(610, 600, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(611, 601, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(612, 602, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(613, 603, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(614, 604, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(615, 605, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(616, 606, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(617, 607, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(618, 608, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(619, 609, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(620, 610, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(621, 611, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(622, 612, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(623, 613, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(624, 614, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0),
(625, 615, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(626, 616, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(627, 617, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(628, 618, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(629, 619, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(630, 620, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(631, 621, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(632, 622, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(633, 623, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(634, 624, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(635, 625, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(636, 626, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(637, 627, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0),
(638, 628, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0),
(639, 629, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(640, 630, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(641, 631, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(642, 632, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(643, 633, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(644, 634, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(645, 635, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(646, 636, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(647, 637, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(648, 638, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(649, 639, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(650, 640, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0),
(651, 641, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(652, 642, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(653, 643, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0),
(654, 644, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(655, 645, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0),
(656, 646, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0),
(657, 647, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(667, 657, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(669, 659, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(670, 660, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(671, 661, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(672, 662, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(673, 663, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(674, 664, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0),
(675, 665, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Fale_conosco`
--

CREATE TABLE IF NOT EXISTS `Fale_conosco` (
  `fale_conosco_id` int(11) NOT NULL AUTO_INCREMENT,
  `fale_conosco_nome` varchar(100) NOT NULL,
  `fale_conosco_email` varchar(100) NOT NULL,
  `fale_conosco_assunto` varchar(100) NOT NULL,
  `fale_conosco_telefone` varchar(40) NOT NULL,
  `fale_conosco_mensagem` text NOT NULL,
  PRIMARY KEY (`fale_conosco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Forma_pagamento`
--

CREATE TABLE IF NOT EXISTS `Forma_pagamento` (
  `forma_pag_id` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pag_visa` tinyint(1) NOT NULL,
  `forma_pag_master_card` tinyint(1) NOT NULL,
  `forma_pag_boleto` tinyint(1) NOT NULL,
  `forma_pag_cheque` tinyint(1) NOT NULL,
  `forma_pag_vale_alimentacao` tinyint(1) NOT NULL,
  `forma_pag_dinheiro` tinyint(1) NOT NULL,
  `forma_pag_credito` tinyint(1) NOT NULL,
  `forma_pag_debito` tinyint(1) NOT NULL,
  `forma_pag_american_express` tinyint(1) NOT NULL,
  `forma_pag_diner_club` tinyint(1) NOT NULL,
  `forma_pag_elo` tinyint(1) NOT NULL,
  `forma_pag_pagseguro` tinyint(1) NOT NULL,
  `forma_pag_paypal` tinyint(1) NOT NULL,
  `forma_pag_mercado_pago` tinyint(1) NOT NULL,
  `forma_pag_sodexo` tinyint(1) NOT NULL,
  `forma_pag_ticket_restaurant` tinyint(1) NOT NULL,
  `forma_pag_anuncio_ref` int(11) NOT NULL,
  `forma_pag_outros_band` tinyint(1) NOT NULL,
  `forma_pag_outros_formPag` tinyint(1) NOT NULL,
  PRIMARY KEY (`forma_pag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=673 ;

--
-- Fazendo dump de dados para tabela `Forma_pagamento`
--

INSERT INTO `Forma_pagamento` (`forma_pag_id`, `forma_pag_visa`, `forma_pag_master_card`, `forma_pag_boleto`, `forma_pag_cheque`, `forma_pag_vale_alimentacao`, `forma_pag_dinheiro`, `forma_pag_credito`, `forma_pag_debito`, `forma_pag_american_express`, `forma_pag_diner_club`, `forma_pag_elo`, `forma_pag_pagseguro`, `forma_pag_paypal`, `forma_pag_mercado_pago`, `forma_pag_sodexo`, `forma_pag_ticket_restaurant`, `forma_pag_anuncio_ref`, `forma_pag_outros_band`, `forma_pag_outros_formPag`) VALUES
(556, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 549, 0, 1),
(557, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 550, 0, 0),
(558, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 551, 0, 1),
(559, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 552, 0, 1),
(560, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 553, 0, 1),
(561, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 554, 0, 1),
(562, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 555, 0, 1),
(563, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 556, 0, 0),
(564, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 557, 0, 1),
(565, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 558, 0, 0),
(566, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 559, 0, 1),
(567, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 560, 0, 0),
(568, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 561, 0, 0),
(569, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 562, 0, 1),
(570, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 563, 0, 0),
(571, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 564, 0, 1),
(572, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 565, 0, 0),
(573, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 566, 0, 1),
(574, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 567, 0, 1),
(575, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 568, 0, 1),
(576, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 569, 0, 1),
(577, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 570, 0, 1),
(578, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 571, 0, 0),
(579, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 572, 0, 1),
(580, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 573, 0, 1),
(581, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 574, 0, 1),
(582, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 575, 0, 1),
(583, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 576, 0, 1),
(584, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 577, 0, 1),
(585, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 578, 0, 1),
(586, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 579, 0, 1),
(587, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 580, 0, 1),
(588, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 581, 0, 1),
(589, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 582, 0, 1),
(590, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 583, 0, 0),
(591, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 584, 0, 0),
(592, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 585, 0, 0),
(593, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 586, 0, 0),
(594, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 587, 0, 0),
(595, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 588, 0, 0),
(596, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 589, 0, 0),
(597, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 590, 0, 0),
(598, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 591, 0, 0),
(599, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 592, 0, 0),
(600, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 593, 0, 0),
(601, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 594, 0, 0),
(602, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 595, 0, 1),
(603, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 596, 0, 0),
(604, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 597, 0, 1),
(605, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 598, 0, 0),
(606, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 599, 0, 0),
(607, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 600, 0, 0),
(608, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 601, 0, 0),
(609, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 602, 0, 0),
(610, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 603, 0, 0),
(611, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 604, 0, 0),
(612, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 605, 0, 1),
(613, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 606, 0, 1),
(614, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 607, 0, 1),
(615, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 608, 0, 1),
(616, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 609, 0, 0),
(617, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 610, 0, 0),
(618, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 611, 0, 1),
(619, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 612, 0, 0),
(620, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 613, 0, 0),
(621, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 614, 0, 0),
(622, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 615, 0, 1),
(623, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 616, 0, 0),
(624, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 617, 0, 0),
(625, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 618, 0, 0),
(626, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 619, 0, 0),
(627, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 620, 0, 0),
(628, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 621, 0, 0),
(629, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 622, 0, 0),
(630, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 623, 0, 0),
(631, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 624, 0, 0),
(632, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 625, 0, 0),
(633, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 626, 0, 0),
(634, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 627, 0, 0),
(635, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 628, 0, 0),
(636, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 629, 0, 0),
(637, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 630, 0, 0),
(638, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 631, 0, 0),
(639, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 632, 0, 0),
(640, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 633, 0, 0),
(641, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 634, 0, 0),
(642, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 635, 0, 0),
(643, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 636, 0, 0),
(644, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 637, 0, 0),
(645, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 638, 0, 0),
(646, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 639, 0, 0),
(647, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 640, 0, 0),
(648, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 641, 0, 0),
(649, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 642, 0, 0),
(650, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 643, 1, 1),
(651, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 644, 0, 0),
(652, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 645, 1, 1),
(653, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 646, 1, 1),
(654, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 647, 0, 0),
(664, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 657, 0, 1),
(666, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 659, 0, 0),
(667, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 660, 0, 0),
(668, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 661, 0, 0),
(669, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 662, 0, 0),
(670, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 663, 0, 0),
(671, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 664, 1, 1),
(672, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 665, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Horario_funcionamento`
--

CREATE TABLE IF NOT EXISTS `Horario_funcionamento` (
  `horario_func_id` int(11) NOT NULL AUTO_INCREMENT,
  `horario_func_semana_inicio` varchar(5) DEFAULT NULL,
  `horario_func_semana_termino` varchar(5) DEFAULT NULL,
  `horario_func_anuncio_ref` int(11) DEFAULT NULL,
  `horario_func_sabado_inicio` varchar(5) DEFAULT NULL,
  `horario_func_sabado_termino` varchar(5) DEFAULT NULL,
  `horario_func_domingo_inicio` varchar(5) DEFAULT NULL,
  `horario_func_domingo_termino` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`horario_func_id`),
  KEY `horario_funcionamento_anuncio_idx` (`horario_func_anuncio_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=672 ;

--
-- Fazendo dump de dados para tabela `Horario_funcionamento`
--

INSERT INTO `Horario_funcionamento` (`horario_func_id`, `horario_func_semana_inicio`, `horario_func_semana_termino`, `horario_func_anuncio_ref`, `horario_func_sabado_inicio`, `horario_func_sabado_termino`, `horario_func_domingo_inicio`, `horario_func_domingo_termino`) VALUES
(555, '', '', 549, '', '', '', ''),
(556, '08:00', '17:00', 550, '08:00', '11:00', '', ''),
(557, '', '', 551, '', '', '', ''),
(558, '', '', 552, '', '', '', ''),
(559, '', '', 553, '', '', '', ''),
(560, '', '', 554, '', '', '', ''),
(561, '', '', 555, '', '', '', ''),
(562, '', '', 556, '', '', '', ''),
(563, '', '', 557, '', '', '', ''),
(564, '', '', 558, '', '', '', ''),
(565, '', '', 559, '', '', '', ''),
(566, '', '', 560, '', '', '', ''),
(567, '', '', 561, '', '', '', ''),
(568, '', '', 562, '', '', '', ''),
(569, '', '', 563, '', '', '', ''),
(570, '', '', 564, '', '', '', ''),
(571, '', '', 565, '', '', '', ''),
(572, '', '', 566, '', '', '', ''),
(573, '', '', 567, '', '', '', ''),
(574, '', '', 568, '', '', '', ''),
(575, '', '', 569, '', '', '', ''),
(576, '', '', 570, '', '', '', ''),
(577, '', '', 571, '', '', '', ''),
(578, '', '', 572, '', '', '', ''),
(579, '', '', 573, '', '', '', ''),
(580, '', '', 574, '', '', '', ''),
(581, '11:00', '16:00', 575, '', '', '', ''),
(582, '', '', 576, '', '', '', ''),
(583, '11:00', '16:00', 577, '', '', '', ''),
(584, '11:00', '16:00', 578, '', '', '', ''),
(585, '11:00', '16:00', 579, '', '', '', ''),
(586, '11:00', '16:00', 580, '', '', '', ''),
(587, '11:00', '16:00', 581, '', '', '', ''),
(588, '11:00', '16:00', 582, '', '', '', ''),
(589, '', '', 583, '', '', '', ''),
(590, '', '', 584, '', '', '', ''),
(591, '', '', 585, '', '', '', ''),
(592, '', '', 586, '', '', '', ''),
(593, '', '', 587, '', '', '', ''),
(594, '', '', 588, '', '', '', ''),
(595, '', '', 589, '', '', '', ''),
(596, '', '', 590, '', '', '', ''),
(597, '', '', 591, '', '', '', ''),
(598, '', '', 592, '', '', '', ''),
(599, '', '', 593, '', '', '', ''),
(600, '', '', 594, '', '', '', ''),
(601, '', '', 595, '', '', '', ''),
(602, '', '', 596, '', '', '', ''),
(603, '', '', 597, '', '', '', ''),
(604, '', '', 598, '', '', '', ''),
(605, '', '', 599, '', '', '', ''),
(606, '', '', 600, '', '', '', ''),
(607, '', '', 601, '', '', '', ''),
(608, '', '', 602, '', '', '', ''),
(609, '', '', 603, '', '', '', ''),
(610, '07:00', '17:45', 604, '', '', '', ''),
(611, '', '', 605, '', '', '', ''),
(612, '', '', 606, '', '', '', ''),
(613, '', '', 607, '', '', '', ''),
(614, '07:30', '18:00', 608, '07:30', '12:30', '', ''),
(615, '', '', 609, '', '', '', ''),
(616, '', '', 610, '', '', '', ''),
(617, '', '', 611, '', '', '', ''),
(618, '', '', 612, '21:30', '04:00', '', ''),
(619, '', '', 613, '', '', '', ''),
(620, '', '', 614, '08:30', '18:00', '', ''),
(621, '', '', 615, '', '', '', ''),
(622, '', '', 616, '07:30', '21:00', '07:30', '14:00'),
(623, '', '', 617, '', '', '', ''),
(624, '', '', 618, '', '', '', ''),
(625, '', '', 619, '', '', '', ''),
(626, '', '', 620, '', '', '', ''),
(627, '', '', 621, '', '', '', ''),
(628, '', '', 622, '', '', '', ''),
(629, '', '', 623, '', '', '', ''),
(630, '', '', 624, '', '', '', ''),
(631, '', '', 625, '', '', '', ''),
(632, '', '', 626, '', '', '', ''),
(633, '', '', 627, '07:00', '22:00', '', ''),
(634, '0', '0', 628, '0', '0', '0', '0'),
(635, '', '', 629, '', '', '', ''),
(636, '', '', 630, '', '', '', ''),
(637, '10:30', '15:15', 631, '', '', '', ''),
(638, '', '', 632, '', '', '', ''),
(639, '', '', 633, '', '', '', ''),
(640, '08:00', '18:00', 634, '08:00', '18:45', '', ''),
(641, '', '', 635, '13:00', '17:00', '', ''),
(642, '08:00', '19:00', 636, '08:00', '13:00', '', ''),
(643, '', '', 637, '', '', '', ''),
(644, '08:00', '17:00', 638, '', '', '', ''),
(645, '08:00', '18:00', 639, '08:00', '12:00', '', ''),
(646, '', '', 640, '09:00', '12:00', '', ''),
(647, '07:00', '17:00', 641, '07:00', '11:30', '', ''),
(648, '07:00', '17:00', 642, '07:00', '11:30', '', ''),
(649, '07:00', '17:00', 643, '07:00', '13:00', '', ''),
(650, '', '', 644, '', '', '', ''),
(651, '', '', 645, '', '', '', ''),
(652, '07:00', '09:45', 646, '', '', '', ''),
(653, '', '', 647, '', '', '', ''),
(663, '07:00', '17:00', 657, '', '', '', ''),
(665, '', '', 659, '', '', '', ''),
(666, '', '', 660, '', '', '', ''),
(667, '', '', 661, '', '', '', ''),
(668, '', '', 662, '', '', '', ''),
(669, '', '', 663, '', '', '', ''),
(670, '06:30', '10:45', 664, '', '', '', ''),
(671, '', '', 665, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Horario_list`
--

CREATE TABLE IF NOT EXISTS `Horario_list` (
  `horario_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `horario_list_time` varchar(5) NOT NULL,
  PRIMARY KEY (`horario_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Fazendo dump de dados para tabela `Horario_list`
--

INSERT INTO `Horario_list` (`horario_list_id`, `horario_list_time`) VALUES
(1, '06:00'),
(2, '06:15'),
(3, '06:30'),
(4, '06:45'),
(5, '07:00'),
(6, '07:15'),
(7, '07:30'),
(8, '07:45'),
(9, '08:00'),
(10, '08:15'),
(11, '08:30'),
(12, '08:45'),
(13, '09:00'),
(14, '09:15'),
(15, '09:30'),
(16, '09:45'),
(17, '10:00'),
(18, '10:15'),
(19, '10:30'),
(20, '10:45'),
(21, '11:00'),
(22, '11:15'),
(23, '11:30'),
(24, '11:45'),
(25, '12:00'),
(26, '12:15'),
(28, '12:30'),
(29, '12:45'),
(30, '13:00'),
(31, '13:15'),
(32, '13:30'),
(33, '13:45'),
(34, '14:00'),
(35, '14:15'),
(36, '14:30'),
(37, '14:45'),
(38, '15:00'),
(39, '15:15'),
(40, '15:30'),
(41, '15:45'),
(42, '16:00'),
(43, '16:15'),
(44, '16:30'),
(45, '16:45'),
(46, '17:00'),
(47, '17:15'),
(48, '17:30'),
(49, '17:45'),
(50, '18:00'),
(51, '18:15'),
(52, '18:30'),
(53, '18:45'),
(54, '19:00'),
(55, '19:15'),
(56, '19:30'),
(57, '19:45'),
(58, '20:00'),
(59, '20:15'),
(60, '20:30'),
(61, '20:45'),
(62, '21:00'),
(63, '21:15'),
(64, '21:30'),
(65, '21:45'),
(66, '22:00'),
(67, '22:15'),
(68, '22:30'),
(69, '22:45'),
(70, '23:00'),
(71, '23:15'),
(72, '23:30'),
(73, '23:45'),
(74, '00:00'),
(75, '00:15'),
(76, '00:30'),
(77, '00:45'),
(78, '01:00'),
(79, '01:15'),
(80, '01:30'),
(81, '01:45'),
(82, '02:00'),
(83, '02:15'),
(84, '02:30'),
(85, '02:45'),
(86, '03:00'),
(87, '03:15'),
(88, '03:30'),
(89, '03:45'),
(90, '04:00'),
(91, '04:15'),
(92, '04:30'),
(93, '04:45'),
(94, '05:00'),
(95, '05:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Imagem`
--

CREATE TABLE IF NOT EXISTS `Imagem` (
  `imagem_id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem_anuncio_ref` int(11) NOT NULL,
  `imagem_localizacao` varchar(150) NOT NULL,
  `imagem_data_insert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`imagem_id`),
  KEY `imagem_anuncio_idx` (`imagem_anuncio_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=263 ;

--
-- Fazendo dump de dados para tabela `Imagem`
--

INSERT INTO `Imagem` (`imagem_id`, `imagem_anuncio_ref`, `imagem_localizacao`, `imagem_data_insert`) VALUES
(177, 634, 'edmurpereira4@hotmail.com_634/Marido-de-aluguel-dicas-firma-aberta-preços-contrato.-2.jpg', '2016-08-04 23:04:32'),
(178, 634, 'edmurpereira4@hotmail.com_634/Pequenos-reparos-20150430131455.jpg', '2016-08-04 23:04:32'),
(179, 634, 'edmurpereira4@hotmail.com_634/responsive-logo.jpg', '2016-08-04 23:04:33'),
(182, 634, 'edmurpereira4@hotmail.com_634/eco_systemedic_light__bulb_02.jpg', '2016-08-04 23:05:49'),
(183, 634, 'edmurpereira4@hotmail.com_634/reparo-de-ar-condicionado-split-carrier.jpg', '2016-08-04 23:07:44'),
(184, 634, 'edmurpereira4@hotmail.com_634/HotSiteImage.jpg', '2016-08-04 23:07:45'),
(185, 634, 'edmurpereira4@hotmail.com_634/hidraulico.jpg', '2016-08-04 23:07:45'),
(186, 634, 'edmurpereira4@hotmail.com_634/images.jpg', '2016-08-04 23:09:29'),
(187, 634, 'edmurpereira4@hotmail.com_634/692530100472238.jpg', '2016-08-04 23:10:35'),
(188, 634, 'edmurpereira4@hotmail.com_634/faz-tudo-marido-aluguel-eletrica-reparo-conserto_site.jpg', '2016-08-04 23:10:35'),
(189, 634, 'edmurpereira4@hotmail.com_634/reapro-3.jpg', '2016-08-04 23:10:35'),
(190, 637, 'eduardoantoniomota@hotmail.com_637/Sem-Título-2.jpg', '2016-08-05 21:30:22'),
(191, 637, 'eduardoantoniomota@hotmail.com_637/12418011_1647419308857275_4778600583982146902_n.jpg', '2016-08-05 21:33:49'),
(192, 637, 'eduardoantoniomota@hotmail.com_637/13734986_1719979831601222_7462106332461907441_o.jpg', '2016-08-05 21:33:49'),
(193, 637, 'eduardoantoniomota@hotmail.com_637/13781807_1719979778267894_6080368582525989925_n.jpg', '2016-08-05 21:33:50'),
(194, 637, 'eduardoantoniomota@hotmail.com_637/12401006_1678211335778072_3456312678716332113_n.jpg', '2016-08-05 21:35:04'),
(195, 637, 'eduardoantoniomota@hotmail.com_637/13095756_1691252354473970_3910996880435689717_n.jpg', '2016-08-05 21:35:05'),
(201, 638, 'marcobarretobvl@gmail.com_638/bannerInstalar.jpg', '2016-08-05 22:47:00'),
(204, 638, 'marcobarretobvl@gmail.com_638/manutenco-e-instalaco-de-ar-condicionado-split-14061-MLB2968213317_072012-O.jpg', '2016-08-05 22:48:45'),
(205, 638, 'marcobarretobvl@gmail.com_638/instalacao-ar-condicionado-na-chacara-flora.png', '2016-08-05 22:50:30'),
(206, 638, 'marcobarretobvl@gmail.com_638/instalacao-do-ar-condicionado-split-para-empresa-na-vila-jaragua.jpg', '2016-08-05 22:51:07'),
(208, 638, 'marcobarretobvl@gmail.com_638/kit alarme.jpg', '2016-08-05 22:53:39'),
(209, 638, 'marcobarretobvl@gmail.com_638/Base_Cerca_eletrica.fw.jpg', '2016-08-05 22:54:17'),
(210, 639, 'Joaorobertoo58@gmail.com_639/13423977_191939234540424_7461191854365376508_n.jpg', '2016-08-06 18:35:15'),
(211, 639, 'Joaorobertoo58@gmail.com_639/13507095_1593294520963993_431360758509993034_n.jpg', '2016-08-06 18:35:15'),
(212, 639, 'Joaorobertoo58@gmail.com_639/13528785_1592978554328923_6549208592552404941_n.jpg', '2016-08-06 18:35:15'),
(213, 639, 'Joaorobertoo58@gmail.com_639/13537683_1593294487630663_2157397394960330314_n.jpg', '2016-08-06 18:35:16'),
(216, 639, 'Joaorobertoo58@gmail.com_639/13580657_1592978410995604_8365617509175808518_o.jpg', '2016-08-06 18:36:51'),
(219, 644, 'hotelfenix@gmail.com_644/191cd4dc-37e4-46b3-8747-5af46986703a.jpg', '2016-08-08 13:59:17'),
(222, 644, 'hotelfenix@gmail.com_644/fenix01.jpg', '2016-08-08 14:00:53'),
(224, 644, 'hotelfenix@gmail.com_644/24dd9b72-c959-4fb3-8b0c-d25b3be9454c.jpg', '2016-08-08 14:03:27'),
(226, 644, 'hotelfenix@gmail.com_644/abc79fa5-b406-4993-8aa2-5e160b611b7e.jpg', '2016-08-08 14:05:27'),
(227, 644, 'hotelfenix@gmail.com_644/eb00ca68-da9c-455b-a900-369c6544802f.jpg', '2016-08-08 14:05:27'),
(228, 644, 'hotelfenix@gmail.com_644/ddd.jpg', '2016-08-08 14:07:23'),
(230, 647, 'josemoto@gmail.com_647/Ducati-Hyperstrada-Capa-Garupa.jpg', '2016-08-08 17:29:01'),
(231, 647, 'josemoto@gmail.com_647/mototaxi2.jpg', '2016-08-08 17:29:01'),
(233, 638, 'marcobarretodvl@gmail.com_638/bannerfundo01.png', '2016-08-08 18:33:33'),
(234, 638, 'marcobarretodvl@gmail.com_638/bannerInstalar01.jpg', '2016-08-08 18:33:34'),
(235, 644, 'hotelfenix@gmail.com_644/WhatsApp-Image-2016-08-09-at-09.28.jpg', '2016-08-09 12:36:32'),
(236, 644, 'hotelfenix@gmail.com_644/01.jpg', '2016-08-09 12:37:50'),
(237, 644, 'hotelfenix@gmail.com_644/02.jpg', '2016-08-09 12:37:51'),
(238, 644, 'hotelfenix@gmail.com_644/01.jpg', '2016-08-09 12:41:10'),
(239, 644, 'hotelfenix@gmail.com_644/02.jpg', '2016-08-09 12:41:12'),
(240, 644, 'hotelfenix@gmail.com_644/03.jpg', '2016-08-09 12:41:12'),
(241, 644, 'hotelfenix@gmail.com_644/04.jpg', '2016-08-09 12:41:12'),
(242, 644, 'hotelfenix@gmail.com_644/05.jpg', '2016-08-09 12:41:13'),
(243, 644, 'hotelfenix@gmail.com_644/06.jpg', '2016-08-09 12:41:13'),
(244, 644, 'hotelfenix@gmail.com_644/01.jpg', '2016-08-09 12:43:30'),
(245, 644, 'hotelfenix@gmail.com_644/02.jpg', '2016-08-09 12:43:30'),
(246, 644, 'hotelfenix@gmail.com_644/03.jpg', '2016-08-09 12:43:30'),
(247, 644, 'hotelfenix@gmail.com_644/04.jpg', '2016-08-09 12:43:31'),
(248, 644, 'hotelfenix@gmail.com_644/gggggggggy.jpg', '2016-08-09 12:46:19'),
(249, 644, 'hotelfenix@gmail.com_644/hg.jpg', '2016-08-09 12:46:19'),
(250, 638, 'marcobarretodvl@gmail.com_638/ELTRICISTA--296x300.png', '2016-08-09 19:26:33'),
(251, 638, 'marcobarretodvl@gmail.com_638/cftv.jpg', '2016-08-09 19:30:10'),
(252, 639, 'Joaorobertoo58@gmail.com_639/IMG-20160810-WA0181.jpg', '2016-08-11 22:18:44'),
(253, 639, 'Joaorobertoo58@gmail.com_639/IMG-20160810-WA0184.jpg', '2016-08-11 22:18:45'),
(254, 639, 'Joaorobertoo58@gmail.com_639/IMG-20160810-WA0185.jpg', '2016-08-11 22:18:45'),
(255, 639, 'Joaorobertoo58@gmail.com_639/IMG-20160810-WA0181.jpg', '2016-08-11 22:18:46'),
(256, 639, 'Joaorobertoo58@gmail.com_639/20160810_093045.jpg', '2016-08-11 22:18:48'),
(257, 639, 'Joaorobertoo58@gmail.com_639/IMG-20160810-WA0182.jpg', '2016-08-11 22:18:49'),
(258, 639, 'Joaorobertoo58@gmail.com_639/20160811_105017.jpg', '2016-08-11 22:18:52'),
(259, 639, 'Joaorobertoo58@gmail.com_639/20160811_105046.jpg', '2016-08-11 22:18:54'),
(260, 639, 'Joaorobertoo58@gmail.com_639/20160811_105017.jpg', '2016-08-11 22:18:56'),
(261, 639, 'Joaorobertoo58@gmail.com_639/20160811_105026.jpg', '2016-08-11 22:18:59'),
(262, 639, 'Joaorobertoo58@gmail.com_639/IMG-20160810-WA0184.jpg', '2016-08-11 22:20:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Link`
--

CREATE TABLE IF NOT EXISTS `Link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_facebook` varchar(150) DEFAULT NULL,
  `link_youtube` varchar(150) DEFAULT NULL,
  `link_linkedin` varchar(150) DEFAULT NULL,
  `link_twitter` varchar(150) DEFAULT NULL,
  `link_lattes` varchar(150) DEFAULT NULL,
  `link_site` varchar(150) NOT NULL,
  `link_anuncio_ref` int(11) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=673 ;

--
-- Fazendo dump de dados para tabela `Link`
--

INSERT INTO `Link` (`link_id`, `link_facebook`, `link_youtube`, `link_linkedin`, `link_twitter`, `link_lattes`, `link_site`, `link_anuncio_ref`) VALUES
(556, 'https://www.facebook.com/search/top/?q=banco%20do%20brasil', '', '', '', '', 'http://www.bb.com.br/pbb/pagina-inicial#/', 549),
(557, '', '', '', '', '', '', 550),
(558, '', '', '', '', '', 'https://www.itau.com.br/?gclid=CPO0uZj3o84CFQUIkQodIBIB6g', 551),
(559, '', '', '', '', '', 'https://www.itau.com.br/?gclid=CPO0uZj3o84CFQUIkQodIBIB6g', 552),
(560, 'https://www.facebook.com/profile.php?id=100012300005918&fref=ts', '', '', '', '', 'https://www.hsjd.com.br/', 553),
(561, '', '', '', '', '', 'http://www.bb.com.br/pbb/pagina-inicial#/', 554),
(562, '', '', '', '', '', 'https://www.itau.com.br/?gclid=CPO0uZj3o84CFQUIkQodIBIB6g', 555),
(563, '', '', '', '', '', '', 556),
(564, '', '', '', '', '', 'https://www.itau.com.br/?gclid=CPO0uZj3o84CFQUIkQodIBIB6g', 557),
(565, '', '', '', '', '', '', 558),
(566, '', '', '', '', '', 'http://banco.bradesco/html/classic/index.shtm', 559),
(567, '', '', '', '', '', 'http://www.gruposantamonicasaude.com/', 560),
(568, '', '', '', '', '', 'http://www.divinopolis.mg.gov.br/', 561),
(569, '', '', '', '', '', 'http://banco.bradesco/html/classic/index.shtm', 562),
(570, '', '', '', '', '', 'http://www.contraocancerpelavida.com.br/', 563),
(571, '', '', '', '', '', 'http://banco.bradesco/html/classic/index.shtm', 564),
(572, '', '', '', '', '', 'http://www.funedi.edu.br/', 565),
(573, '', '', '', '', '', 'http://mercantildobrasil.com.br/BeneficiarioINSS/Paginas/default.aspx', 566),
(574, '', '', '', '', '', '', 567),
(575, '', '', '', '', '', 'https://www.santander.com.br/br/pessoa-fisica/santander-van-gogh?gclid=CMGlsdyJpM4CFU0IkQodFU4APg', 568),
(576, 'https://www.facebook.com/patiodivinopolis/', '', '', '', '', 'http://www.patiodivinopolis.com.br/contato', 569),
(577, '', '', '', '', '', 'https://www.santander.com.br/br/pessoa-fisica/santander-van-gogh?gclid=CMGlsdyJpM4CFU0IkQodFU4APg', 570),
(578, '', '', '', '', '', '', 571),
(579, '', '', '', '', '', 'http://www.caixa.gov.br/Paginas/home-caixa.aspx', 572),
(580, '', '', '', '', '', 'http://www.caixa.gov.br/Paginas/home-caixa.aspx', 573),
(581, '', '', '', '', '', 'http://www.caixa.gov.br/Paginas/home-caixa.aspx', 574),
(582, '', '', '', '', '', 'http://www.caixa.gov.br/Paginas/home-caixa.aspx', 575),
(583, '', '', '', '', '', '', 576),
(584, '', '', '', '', '', 'https://www.hsbc.com.br/1/2/!ut/p/c5/04_SB8K8xLLM9MSSzPy8xBz9CP0os3gDA0tHQ-dgAw8Ld0M3A0-3UEf3YAtTYwNnA6B8JEgeO3A0IKC7IDdUEQCrTLbB/', 577),
(585, '', '', '', '', '', 'http://www.sicoobdivicred.com.br/', 578),
(586, '', '', '', '', '', 'http://sicoobcrediverde.com.br/index.php', 579),
(587, '', '', '', '', '', 'http://sicoobcrediverde.com.br/index.php', 580),
(588, '', '', '', '', '', 'http://sicoobcrediverde.com.br/index.php', 581),
(589, '', '', '', '', '', '', 582),
(590, '', '', '', '', '', '', 583),
(591, '', '', '', '', '', '', 584),
(592, '', '', '', '', '', '', 585),
(593, '', '', '', '', '', '', 586),
(594, '', '', '', '', '', '', 587),
(595, '', '', '', '', '', '', 588),
(596, '', '', '', '', '', '', 589),
(597, '', '', '', '', '', '', 590),
(598, '', '', '', '', '', '', 591),
(599, '', '', '', '', '', '', 592),
(600, '', '', '', '', '', '', 593),
(601, '', '', '', '', '', '', 594),
(602, '', '', '', '', '', '', 595),
(603, '', '', '', '', '', 'http://www.ufsj.edu.br/', 596),
(604, '', '', '', '', '', 'https://www.unifenas.br/campus.asp?link=divinopolis', 597),
(605, '', '', '', '', '', '', 598),
(606, '', '', '', '', '', '', 599),
(607, '', '', '', '', '', '', 600),
(608, '', '', '', '', '', '', 601),
(609, '', '', '', '', '', 'http://www.alcoolicosanonimos.org.br/', 602),
(610, '', '', '', '', '', '', 603),
(611, '', '', '', '', '', '', 604),
(612, '', '', '', '', '', '', 605),
(613, '', '', '', '', '', 'http://www.superabc.com.br/', 606),
(614, '', '', '', '', '', 'http://www.supermercadosbh.com.br/cidade', 607),
(615, '', '', '', '', '', '', 608),
(616, '', '', '', '', '', '', 609),
(617, '', '', '', '', '', '', 610),
(618, '', '', '', '', '', '', 611),
(619, '', '', '', '', '', 'http://www.babiloniashow.com.br/', 612),
(620, '', '', '', '', '', '', 613),
(621, '', '', '', '', '', 'http://www.barbershow.com/', 614),
(622, '', '', '', '', '', '', 615),
(623, '', '', '', '', '', 'http://www.martminas.com.br/principal/index.php?loja=div', 616),
(624, 'https://www.facebook.com/edmur.lemos?fref=ts', '', '', '', '', '', 617),
(625, '', '', '', '', '', '', 618),
(626, '', '', '', '', '', '', 619),
(627, '', '', '', '', '', '', 620),
(628, '', '', '', '', '', '', 621),
(629, '', '', '', '', '', '', 622),
(630, '', '', '', '', '', 'http://www.estreladooeste.com.br/', 623),
(631, '', '', '', '', '', 'http://www7.fiemg.com.br/sesi', 624),
(632, '', '', '', '', '', 'http://www.senaimg.com.br/', 625),
(633, '', '', '', '', '', 'http://www.socicam.com.br/', 626),
(634, '', '', '', '', '', 'http://www.drogariasaopaulo.com.br/', 627),
(635, '', '', '', '', '', 'http://www.drogasil.com.br/', 628),
(636, '', '', '', '', '', '', 629),
(637, '', '', '', '', '', 'https://wwws.pc.mg.gov.br/atestado/inicial.do?evento=cookie', 630),
(638, '', '', '', '', '', '', 631),
(639, '', '', '', '', '', 'http://www.seds.mg.gov.br/', 632),
(640, '', '', '', '', '', '', 633),
(641, 'https://www.facebook.com/edmur.lemos?fref=ts', '', '', '', '', '', 634),
(642, '', '', '', '', 'Lívia Gomes Ferreira', 'http://www.liviapsique.com.br/', 635),
(643, 'https://www.facebook.com/marco.barreto.3194', '', '', '', '', '', 636),
(644, 'https://www.facebook.com/eduardomottatour/', '', '', '', '', '', 637),
(645, 'https://www.facebook.com/marcobarretodvl', '', '', '', '', '', 638),
(646, 'https://www.facebook.com/Martelinho-Granizo-1592976964329082/?fref=ts', '', '', '', '', '', 639),
(647, '', '', '', '', '', '', 640),
(648, 'https://www.facebook.com/search/top/?q=sempreNegocio', '', '', '', '', 'http://www.semprenegocio.com.br/', 641),
(649, 'https://www.facebook.com/semprenegocio/?pnref=story', '', '', '', '', 'http://www.semprenegocio.com.br/', 642),
(650, 'https://www.facebook.com/semprenegocio/?pnref=story', 'https://www.youtube.com/embed/_MsVWj3fGkY', '', '', '', 'http://www.semprenegocio.com.br/home', 643),
(651, '', '', '', '', '', '', 644),
(652, '', '', '', '', '', '', 645),
(653, '', '', '', '', '', '', 646),
(654, '', '', '', '', '', '', 647),
(664, 'https://www.facebook.com/FarmaxOficial/', '', '', '', '', 'http://www.farmax.com.br/', 657),
(666, '', '', '', '', '', '', 659),
(667, '', '', '', '', '', '', 660),
(668, '', '', '', '', '', '', 661),
(669, '', '', '', '', '', '', 662),
(670, '', '', '', '', '', '', 663),
(671, '', '', '', '', '', '', 664),
(672, '', '', '', '', '', '', 665);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Melhorias`
--

CREATE TABLE IF NOT EXISTS `Melhorias` (
  `melhorias_id` int(11) NOT NULL AUTO_INCREMENT,
  `melhorias_cli_ref` int(11) NOT NULL,
  `melhorias_assunto` varchar(150) NOT NULL,
  `melhorias_opiniao` text NOT NULL,
  PRIMARY KEY (`melhorias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Mensagem`
--

CREATE TABLE IF NOT EXISTS `Mensagem` (
  `mensagem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem_nome` varchar(45) NOT NULL,
  `mensagem_texto` varchar(500) NOT NULL,
  `mensagem_anuncio_ref` int(11) NOT NULL,
  `mensagem_email` varchar(80) NOT NULL,
  `mensagem_data_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mensagem_tel` varchar(15) NOT NULL,
  `mensagem_exclu` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mensagem_id`),
  KEY `mensagem_anuncio_idx` (`mensagem_anuncio_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Mensagem_respostas`
--

CREATE TABLE IF NOT EXISTS `Mensagem_respostas` (
  `men_resp_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_resp_mensagem_ref` int(11) NOT NULL,
  `men_resp_assunto` varchar(150) NOT NULL,
  `men_resp_mensagem` text NOT NULL,
  PRIMARY KEY (`men_resp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Pagamentos`
--

CREATE TABLE IF NOT EXISTS `Pagamentos` (
  `Pag_id` int(11) NOT NULL AUTO_INCREMENT,
  `Pag_date` datetime NOT NULL,
  `Pag_code_transation` varchar(40) NOT NULL,
  `Pag_reference` varchar(200) NOT NULL,
  `Pag_transaction_type` int(11) NOT NULL,
  `Pag_status` int(11) NOT NULL,
  `Pag_cancelation_source` varchar(10) NOT NULL,
  `Pag_ultimo_evento` datetime NOT NULL,
  `Pag_tipo_pagamento` int(11) NOT NULL,
  `Pag_meio_cod` int(11) NOT NULL,
  `Pag_valor_bruto` decimal(6,2) NOT NULL,
  `Pag_valor_desconto` decimal(6,2) NOT NULL,
  `Pag_valor_taxas` decimal(6,2) NOT NULL,
  `Pag_data_credito` datetime NOT NULL,
  `Pag_valor_extra` decimal(6,2) NOT NULL,
  `Pag_parcelas_cartao` int(11) NOT NULL,
  `Pag_qtd_itens` int(11) NOT NULL,
  `Pag_item_identificacao` varchar(250) NOT NULL,
  `Pag_item_descricao` varchar(250) NOT NULL,
  `Pag_valor_unitario` decimal(6,2) NOT NULL,
  `Pag_qtd_item_unitario` int(11) NOT NULL,
  `Pag_email_comprador` varchar(70) NOT NULL,
  `Pag_nome_comprador` varchar(60) NOT NULL,
  `Pag_ddd_tel` int(11) NOT NULL,
  `Pag_tel_comprador` int(11) NOT NULL,
  `Pag_tipo_frete` int(11) NOT NULL,
  `Pag_custo_frete` double(6,2) NOT NULL,
  `Pag_pais_frete` varchar(3) NOT NULL,
  `Pag_estado_frete` varchar(2) NOT NULL,
  `Pag_cidade_frete` varchar(300) NOT NULL,
  `Pag_cep_frete` int(11) NOT NULL,
  `Pag_bairro_frete` varchar(250) NOT NULL,
  `Pag_rua_frete` varchar(300) NOT NULL,
  `Pag_numero_frete` int(11) NOT NULL,
  `Pag_complemento_frete` varchar(300) NOT NULL,
  PRIMARY KEY (`Pag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Fazendo dump de dados para tabela `Pagamentos`
--

INSERT INTO `Pagamentos` (`Pag_id`, `Pag_date`, `Pag_code_transation`, `Pag_reference`, `Pag_transaction_type`, `Pag_status`, `Pag_cancelation_source`, `Pag_ultimo_evento`, `Pag_tipo_pagamento`, `Pag_meio_cod`, `Pag_valor_bruto`, `Pag_valor_desconto`, `Pag_valor_taxas`, `Pag_data_credito`, `Pag_valor_extra`, `Pag_parcelas_cartao`, `Pag_qtd_itens`, `Pag_item_identificacao`, `Pag_item_descricao`, `Pag_valor_unitario`, `Pag_qtd_item_unitario`, `Pag_email_comprador`, `Pag_nome_comprador`, `Pag_ddd_tel`, `Pag_tel_comprador`, `Pag_tipo_frete`, `Pag_custo_frete`, `Pag_pais_frete`, `Pag_estado_frete`, `Pag_cidade_frete`, `Pag_cep_frete`, `Pag_bairro_frete`, `Pag_rua_frete`, `Pag_numero_frete`, `Pag_complemento_frete`) VALUES
(71, '2016-08-09 12:22:46', '7BD7DA07-32DC-4475-B637-C3DC2CD90D4E', '664', 1, 7, 'INTERNAL', '2016-08-22 07:48:07', 0, 2, '202.00', '60.00', '0.00', '0000-00-00 00:00:00', '0.00', 0, 1, '1', '1', '0.00', 60, '1', 'sysconsulte@gmail.com', 0, 37, 991191491, 3.00, '0.0', 'BR', 'MG', 0, '35502812', 'Serra Verde', 0, '251'),
(72, '2016-08-09 17:12:58', '5054220C-3A42-4DDD-A972-061A596EAF0B', '665', 1, 7, 'INTERNAL', '2016-08-22 08:16:58', 0, 2, '202.00', '60.00', '0.00', '0000-00-00 00:00:00', '0.00', 0, 1, '1', '1', '0.00', 60, '1', 'sysconsulte@gmail.com', 0, 37, 991191491, 3.00, '0.0', 'BR', 'MG', 0, '35502812', 'Serra Verde', 0, '351'),
(73, '2016-08-02 10:05:02', 'CBEAC86C-84F1-4F36-9B9D-FFD4FC19DD8A', '548', 1, 7, 'INTERNAL', '2016-08-15 07:32:57', 0, 2, '202.00', '50.00', '0.00', '0000-00-00 00:00:00', '0.00', 0, 1, '1', '1', '0.00', 50, '1', 'pgontijo88@gmail.com', 0, 37, 996718571, 3.00, '0.0', 'BR', 'MG', 0, '35550002', 'centro', 0, '224'),
(69, '2016-08-03 13:52:04', '071089D0-C6ED-4102-A60B-09DF8900F2CE', '550', 1, 4, '', '2016-09-02 13:59:10', 0, 1, '101.00', '50.00', '0.00', '0000-00-00 00:00:00', '2016.00', 0, 1, '1', '1', '0.00', 50, '1', 'pgontijo88@gmail.com', 0, 37, 996718571, 3.00, '0.0', 'BR', 'MG', 0, '35500002', 'Centro', 0, '224'),
(70, '2016-08-08 00:06:01', 'EBD1E4A2-DFC9-4538-B90D-4CBDD2D5432B', '643', 1, 7, 'INTERNAL', '2016-08-21 07:16:28', 0, 2, '202.00', '60.00', '0.00', '0000-00-00 00:00:00', '0.00', 0, 1, '1', '1', '0.00', 60, '1', 'sysconsulte@gmail.com', 0, 37, 991191491, 3.00, '0.0', 'BR', 'MG', 0, '35500002', 'Centro', 0, '220');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Plano_saude`
--

CREATE TABLE IF NOT EXISTS `Plano_saude` (
  `plano_saude_id` int(11) NOT NULL AUTO_INCREMENT,
  `plano_saude_anuncio_ref` int(11) NOT NULL,
  `plano_saude_unimed` tinyint(1) NOT NULL DEFAULT '0',
  `plano_saude_prontomed` tinyint(1) NOT NULL DEFAULT '0',
  `plano_saude_saudevida` tinyint(1) NOT NULL DEFAULT '0',
  `plano_saude_promed` tinyint(1) NOT NULL DEFAULT '0',
  `plano_saude_outros` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`plano_saude_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=673 ;

--
-- Fazendo dump de dados para tabela `Plano_saude`
--

INSERT INTO `Plano_saude` (`plano_saude_id`, `plano_saude_anuncio_ref`, `plano_saude_unimed`, `plano_saude_prontomed`, `plano_saude_saudevida`, `plano_saude_promed`, `plano_saude_outros`) VALUES
(556, 549, 0, 0, 0, 0, 0),
(557, 550, 0, 0, 0, 0, 0),
(558, 551, 0, 0, 0, 0, 0),
(559, 552, 0, 0, 0, 0, 0),
(560, 553, 0, 0, 0, 0, 0),
(561, 554, 0, 0, 0, 0, 0),
(562, 555, 0, 0, 0, 0, 0),
(563, 556, 0, 0, 0, 0, 0),
(564, 557, 0, 0, 0, 0, 0),
(565, 558, 0, 0, 0, 0, 0),
(566, 559, 0, 0, 0, 0, 0),
(567, 560, 0, 0, 0, 0, 0),
(568, 561, 0, 0, 0, 0, 1),
(569, 562, 0, 0, 0, 0, 0),
(570, 563, 0, 0, 0, 0, 0),
(571, 564, 0, 0, 0, 0, 0),
(572, 565, 0, 0, 0, 0, 0),
(573, 566, 0, 0, 0, 0, 0),
(574, 567, 0, 0, 0, 0, 0),
(575, 568, 0, 0, 0, 0, 0),
(576, 569, 0, 0, 0, 0, 0),
(577, 570, 0, 0, 0, 0, 0),
(578, 571, 0, 0, 0, 0, 0),
(579, 572, 0, 0, 0, 0, 0),
(580, 573, 0, 0, 0, 0, 0),
(581, 574, 0, 0, 0, 0, 0),
(582, 575, 0, 0, 0, 0, 0),
(583, 576, 0, 0, 0, 0, 0),
(584, 577, 0, 0, 0, 0, 0),
(585, 578, 0, 0, 0, 0, 0),
(586, 579, 0, 0, 0, 0, 0),
(587, 580, 0, 0, 0, 0, 0),
(588, 581, 0, 0, 0, 0, 0),
(589, 582, 0, 0, 0, 0, 0),
(590, 583, 0, 0, 0, 0, 0),
(591, 584, 0, 0, 0, 0, 0),
(592, 585, 0, 0, 0, 0, 0),
(593, 586, 0, 0, 0, 0, 0),
(594, 587, 0, 0, 0, 0, 0),
(595, 588, 0, 0, 0, 0, 0),
(596, 589, 0, 0, 0, 0, 0),
(597, 590, 0, 0, 0, 0, 0),
(598, 591, 0, 0, 0, 0, 0),
(599, 592, 0, 0, 0, 0, 0),
(600, 593, 0, 0, 0, 0, 0),
(601, 594, 0, 0, 0, 0, 0),
(602, 595, 0, 0, 0, 0, 0),
(603, 596, 0, 0, 0, 0, 0),
(604, 597, 0, 0, 0, 0, 0),
(605, 598, 0, 0, 0, 0, 0),
(606, 599, 0, 0, 0, 0, 0),
(607, 600, 0, 0, 0, 0, 0),
(608, 601, 0, 0, 0, 0, 0),
(609, 602, 0, 0, 0, 0, 0),
(610, 603, 0, 0, 0, 0, 0),
(611, 604, 0, 0, 0, 0, 0),
(612, 605, 0, 0, 0, 0, 0),
(613, 606, 0, 0, 0, 0, 0),
(614, 607, 0, 0, 0, 0, 0),
(615, 608, 0, 0, 0, 0, 0),
(616, 609, 0, 0, 0, 0, 0),
(617, 610, 0, 0, 0, 0, 0),
(618, 611, 0, 0, 0, 0, 0),
(619, 612, 0, 0, 0, 0, 0),
(620, 613, 0, 0, 0, 0, 0),
(621, 614, 0, 0, 0, 0, 0),
(622, 615, 0, 0, 0, 0, 0),
(623, 616, 0, 0, 0, 0, 0),
(624, 617, 0, 0, 0, 0, 0),
(625, 618, 0, 0, 0, 0, 0),
(626, 619, 0, 0, 0, 0, 0),
(627, 620, 0, 0, 0, 0, 0),
(628, 621, 0, 0, 0, 0, 0),
(629, 622, 0, 0, 0, 0, 0),
(630, 623, 0, 0, 0, 0, 0),
(631, 624, 0, 0, 0, 0, 0),
(632, 625, 0, 0, 0, 0, 0),
(633, 626, 0, 0, 0, 0, 0),
(634, 627, 0, 0, 0, 0, 0),
(635, 628, 0, 0, 0, 0, 0),
(636, 629, 0, 0, 0, 0, 0),
(637, 630, 0, 0, 0, 0, 0),
(638, 631, 0, 0, 0, 0, 0),
(639, 632, 0, 0, 0, 0, 0),
(640, 633, 0, 0, 0, 0, 0),
(641, 634, 0, 0, 0, 0, 0),
(642, 635, 0, 0, 0, 0, 0),
(643, 636, 0, 0, 0, 0, 0),
(644, 637, 0, 0, 0, 0, 0),
(645, 638, 0, 0, 0, 0, 0),
(646, 639, 0, 0, 0, 0, 0),
(647, 640, 0, 0, 0, 0, 0),
(648, 641, 0, 0, 0, 0, 0),
(649, 642, 0, 0, 0, 0, 0),
(650, 643, 0, 0, 0, 0, 0),
(651, 644, 0, 0, 0, 0, 0),
(652, 645, 1, 1, 0, 0, 0),
(653, 646, 0, 0, 0, 0, 0),
(654, 647, 0, 0, 0, 0, 0),
(664, 657, 0, 0, 0, 0, 0),
(666, 659, 0, 0, 0, 0, 0),
(667, 660, 0, 0, 0, 0, 0),
(668, 661, 0, 0, 0, 0, 0),
(669, 662, 0, 0, 0, 0, 0),
(670, 663, 0, 0, 0, 0, 0),
(671, 664, 0, 1, 0, 0, 1),
(672, 665, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Status_anuncio`
--

CREATE TABLE IF NOT EXISTS `Status_anuncio` (
  `status_anuncio_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_anuncio_situacao` varchar(150) NOT NULL,
  PRIMARY KEY (`status_anuncio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Fazendo dump de dados para tabela `Status_anuncio`
--

INSERT INTO `Status_anuncio` (`status_anuncio_id`, `status_anuncio_situacao`) VALUES
(1, 'INATIVO (Aguardando conf.)'),
(2, 'INATIVO (Em análise)'),
(3, 'ONLINE (Paga)'),
(4, 'ONLINE (Disponível)'),
(5, 'INATIVO (Em disputa)'),
(6, 'INATIVO (Devolvido)'),
(7, 'INATIVO (Cancelada)'),
(8, 'INATIVO (Pelo usuário) '),
(9, 'INATIVO (Desativado pelo Adm - Anúncio indevido)'),
(10, 'INATIVO (Pagamento Expirado, aguardando renovação)'),
(11, 'ONLINE (Gratuito)'),
(12, 'INATIVO (Não pago)');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Sub_categoria`
--

CREATE TABLE IF NOT EXISTS `Sub_categoria` (
  `sub_categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_categoria_descricao` varchar(60) NOT NULL,
  `sub_categoria_cat_ref` int(11) NOT NULL,
  PRIMARY KEY (`sub_categoria_id`),
  KEY `sub_categoria_cat_idx` (`sub_categoria_cat_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=782 ;

--
-- Fazendo dump de dados para tabela `Sub_categoria`
--

INSERT INTO `Sub_categoria` (`sub_categoria_id`, `sub_categoria_descricao`, `sub_categoria_cat_ref`) VALUES
(717, 'Restaurantes', 1),
(718, 'Lanchonete', 1),
(719, 'Churrascaria', 1),
(720, 'Pizzaria', 1),
(721, 'Bares', 1),
(722, 'Alimentação geral', 1),
(723, 'Taxi', 2),
(724, 'Moto taxi', 2),
(725, 'Transporte de passageiros', 2),
(726, 'Transporte geral', 2),
(727, 'Diarista', 3),
(728, 'Construção civil', 3),
(729, 'Serviços para autos', 3),
(730, 'Serviços gerais', 3),
(731, 'Médico', 4),
(732, 'Dentista', 4),
(733, 'Fisioterapeuta', 4),
(734, 'Esteticista', 3),
(735, 'Salão de beleza', 4),
(736, 'Barbearia', 4),
(737, 'Personal trainer', 3),
(738, 'Saúde em geral', 4),
(739, 'Agência de viagens', 5),
(740, 'Casa noturna', 5),
(741, 'Boate', 5),
(742, 'Motel', 5),
(743, 'Clube', 5),
(744, 'Lazer em geral', 5),
(745, 'Venda de carros', 6),
(746, 'Loja', 6),
(747, 'Locadora de carros', 6),
(748, 'Locadora de casas', 6),
(749, 'Lojas em geral', 6),
(756, 'Hospitais ', 4),
(757, 'Posto de Saúde', 4),
(758, 'Plano de Saúde', 4),
(759, 'Agência Bancária', 3),
(760, 'Universidade', 7),
(761, 'Escola', 7),
(762, 'Curso', 7),
(763, 'Prestação de serviços em geral', 3),
(764, 'Shopping', 6),
(765, 'Grãos e Sementes', 1),
(766, 'Iluminação para Casa e Escritório', 3),
(767, 'Jornais, revistas e impressos', 3),
(768, 'Gráfica ', 3),
(769, 'Natação', 3),
(770, 'Nutricionista', 4),
(771, 'Organização de Festas', 3),
(772, 'Odontologia', 4),
(773, 'Asilos e Abrigos', 3),
(774, 'Biblioteca', 7),
(775, 'Centro Sócio Educativo', 8),
(776, 'Delegacia de Polícia', 8),
(777, 'Psicologia', 4),
(778, 'Medicina Veterinária', 4),
(779, 'Músicos', 3),
(780, 'Hotel', 3),
(781, 'Cinema', 5);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Anuncio`
--
ALTER TABLE `Anuncio`
  ADD CONSTRAINT `anuncio_cliente` FOREIGN KEY (`anuncio_cliente_ref`) REFERENCES `Cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anuncio_endereco` FOREIGN KEY (`anuncio_endereco`) REFERENCES `Endereco` (`endereco_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `Avaliacao`
--
ALTER TABLE `Avaliacao`
  ADD CONSTRAINT `avaliacai_anuncio` FOREIGN KEY (`avaliacao_anuncio_ref`) REFERENCES `Anuncio` (`anuncio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `Controle_data`
--
ALTER TABLE `Controle_data`
  ADD CONSTRAINT `data_anuncio_anuncio` FOREIGN KEY (`Controle_data_ref`) REFERENCES `Anuncio` (`anuncio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `Curriculum`
--
ALTER TABLE `Curriculum`
  ADD CONSTRAINT `curriculum_cliente` FOREIGN KEY (`curriculum_cliente_ref`) REFERENCES `Cliente` (`cli_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `curriculum_endereco` FOREIGN KEY (`curriculum_endereco_ref`) REFERENCES `Endereco` (`endereco_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `Horario_funcionamento`
--
ALTER TABLE `Horario_funcionamento`
  ADD CONSTRAINT `horario_funcionamento_anuncio` FOREIGN KEY (`horario_func_anuncio_ref`) REFERENCES `Anuncio` (`anuncio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `Imagem`
--
ALTER TABLE `Imagem`
  ADD CONSTRAINT `imagem_anuncio` FOREIGN KEY (`imagem_anuncio_ref`) REFERENCES `Anuncio` (`anuncio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `Mensagem`
--
ALTER TABLE `Mensagem`
  ADD CONSTRAINT `mensagem_anuncio` FOREIGN KEY (`mensagem_anuncio_ref`) REFERENCES `Anuncio` (`anuncio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `Sub_categoria`
--
ALTER TABLE `Sub_categoria`
  ADD CONSTRAINT `sub_categoria_cat` FOREIGN KEY (`sub_categoria_cat_ref`) REFERENCES `Categoria` (`tipo_categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
