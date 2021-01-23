-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 03:03 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pems`
--

-- --------------------------------------------------------

--
-- Table structure for table `addinterviewer`
--

CREATE TABLE `addinterviewer` (
  `addinterviewerid` bigint(20) UNSIGNED NOT NULL,
  `employeeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intervieweremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intervieweremailpass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuesday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wednesday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thrusday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saturday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sunday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `add_interview_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addinterviewer`
--

INSERT INTO `addinterviewer` (`addinterviewerid`, `employeeName`, `intervieweremail`, `intervieweremailpass`, `monday`, `tuesday`, `wednesday`, `thrusday`, `friday`, `saturday`, `sunday`, `main`, `add_interview_token`, `available_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'rahul801210@gmail.com', '123456', '0|0|1|1|1|1|1|1|1|1|1|0|0|0|0|0|0|0', '0|0|1|1|1|1|1|1|1|1|1|0|0|0|0|0|0|0', '0|0|1|1|1|1|1|1|1|1|1|0|0|0|0|0|0|0', '0|0|1|1|1|1|1|1|1|1|1|0|0|0|0|0|0|0', '0|0|1|1|1|1|1|1|1|1|1|0|0|0|0|0|0|0', '0|0|1|1|1|1|1|1|1|1|1|0|0|0|0|0|0|0', '0|0|1|1|1|1|1|1|1|1|1|0|0|0|0|0|0|0', '0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0', '625983679890431', '1', '2020-04-08 06:22:33', '2020-04-08 06:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `add_interviewer_jobpositions`
--

CREATE TABLE `add_interviewer_jobpositions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_position_main_id` bigint(20) NOT NULL,
  `position_token` bigint(20) NOT NULL,
  `add_interview_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_interviewer_jobpositions`
--

INSERT INTO `add_interviewer_jobpositions` (`id`, `position_name`, `job_position_main_id`, `position_token`, `add_interview_token`, `created_at`, `updated_at`) VALUES
(1, 'Representante Comercial', 1, 1037370, '625983679890431', '2020-04-08 06:22:33', '2020-04-08 06:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `add_interviewer_jobpositions_steps`
--

CREATE TABLE `add_interviewer_jobpositions_steps` (
  `id_steps` bigint(20) UNSIGNED NOT NULL,
  `jobPositionStep_name` bigint(20) NOT NULL,
  `check_steps_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checked_not` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position_token` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_interviewer_jobpositions_steps`
--

INSERT INTO `add_interviewer_jobpositions_steps` (`id_steps`, `jobPositionStep_name`, `check_steps_name`, `checked_not`, `position_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Primeira entrevista', '1', 1037370, '2020-04-08 06:22:33', '2020-04-08 06:22:33'),
(2, 2, 'Second entrevista', '0', 1037370, '2020-04-08 06:22:33', '2020-04-08 06:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `blacklistid` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `note` blob NOT NULL,
  `resume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume_folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docs_folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descp` blob NOT NULL,
  `retail_consultants` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_managers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regional_sales_managers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers_questions`
--

CREATE TABLE `careers_questions` (
  `questions_id` bigint(20) UNSIGNED NOT NULL,
  `question` blob NOT NULL,
  `step5_token` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `careers_questions`
--

INSERT INTO `careers_questions` (`questions_id`, `question`, `step5_token`, `created_at`, `updated_at`) VALUES
(1, 0x5247763647743449375a436c47534362305a316d5150456a356d5456534c5a4f59437a6c33566e61, 35307566316523, '2020-04-08 07:24:34', '2020-04-08 07:24:34'),
(2, 0x5247763647743449375a436c47534362305a316d5150456a356d5456534c5a4f59437a6c33566e61, 35307566316523, '2020-04-08 07:24:34', '2020-04-08 07:24:34'),
(3, 0x5247763647743449375a436c47534362305a316d5150456a356d5456534c5a4f59437a6c33566e61, 35307566316523, '2020-04-08 07:24:34', '2020-04-08 07:24:34'),
(4, 0x5247763647743449375a436c47534362305a316d5150456a356d5456534c5a4f59437a6c33566e61, 35307566316523, '2020-04-08 07:24:34', '2020-04-08 07:24:34'),
(5, 0x5247763647743449375a436c47534362305a316d5150456a356d5456534c5a4f59437a6c33566e61, 35307566316523, '2020-04-08 07:24:35', '2020-04-08 07:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `careers_steps_page`
--

CREATE TABLE `careers_steps_page` (
  `step_id` bigint(20) UNSIGNED NOT NULL,
  `job_position_id` bigint(20) NOT NULL,
  `introduction` blob NOT NULL,
  `step1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `step1Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `step2` blob NOT NULL,
  `step3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `step3Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `step4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `step5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `random_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `careers_steps_page`
--

INSERT INTO `careers_steps_page` (`step_id`, `job_position_id`, `introduction`, `step1`, `step1Type`, `step2`, `step3`, `step3Type`, `step4`, `step5`, `random_token`, `available_status`, `created_at`, `updated_at`) VALUES
(1, 1, 0x3c703e5247763647743449375a436c47534362305a316d5150456a356d5456534c5a4f59437a6c33566e613c2f703e, '', '', 0x3c703e5247763647743449375a436c47534362305a316d5150456a356d5456534c5a4f59437a6c33566e613c2f703e, '', '', 'RGv6Gt4I7ZClGSCb0Z1mQPEj5mTVSLZOYCzl3Vna', '35307566316523', '158633067484928021586330674', '1', '2020-04-08 07:24:34', '2020-04-08 07:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `careers_users`
--

CREATE TABLE `careers_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` bigint(20) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_on_steps_page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_on_survey_page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `survey_questions_correct` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `survey_questions_wrong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interview_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `job_position` bigint(20) NOT NULL,
  `job_position_step` bigint(20) NOT NULL,
  `interview_time_select` bigint(20) NOT NULL,
  `note_for_interviewer` blob NOT NULL,
  `interview_status_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `careers_users`
--

INSERT INTO `careers_users` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `remember_token`, `zipcode`, `city`, `state`, `resume`, `time_on_steps_page`, `time_on_survey_page`, `survey_questions_correct`, `survey_questions_wrong`, `session_token`, `interview_date`, `day`, `employee_id`, `job_position`, `job_position_step`, `interview_time_select`, `note_for_interviewer`, `interview_status_id`, `created_at`, `updated_at`) VALUES
(1, 'Rahul', 'Verma', 'rahul80123410@gmail.com', '307006950860', '$2y$10$7s7tIPRjpurRzuwUxYCUMuHzD88GiSFOEghlc5h0rTrFIXGoMXV.G', 'vkYzPITECKPH4fPizTQMiDpBRTEuwyQ5rwVnC6C1SjEsJ0kU6nTUAsXLV2TX', 120010, 'Jammu', 'Jammu and Kashmir', '20200408_6496111586331554/498192532857915H653742555.docx', '00:4', '00:3', '5', '0', '51606O1881538777225239054', '2020-04-14', 'tuesday', 2, 1, 1, 13, 0x72746668666468646667, 1, '2020-04-08 07:39:37', '2020-04-08 07:39:37'),
(2, 'Rahul', 'Verma', 'rahul801234534510@gmail.com', '+917034506950860', '$2y$10$1OLUaijmGzJI5qPMVhepK.oiVjk87XnB86b4cc5jDF.hlIBhtwri6', NULL, 180010, 'Jammu', 'Jammu and Kashmir', '20200410_195251586518305/155353752802502363N512938.docx', '00:3', '00:2', '5', '0', '61187304668G7105963570258', '2020-04-16', 'thursday', 2, 1, 1, 13, 0x64617366736466647366, 1, '2020-04-10 11:43:39', '2020-04-10 11:43:39'),
(3, 'Rahul', 'Verma', 'rahul8012assss10@gmail.com', '+91700695077860', '$2y$10$Lpx9bRtBnwZ0L8MaQ/PZkuznGHOKAfaiNA4zW66L45XUmDpabY6Ci', NULL, 180010, 'Jammu', 'Jammu and Kashmir', '20200410_9424781586518155/126554855137857248101615G.docx', '00:4', '00:3', '5', '0', '6243105966752521675F93618', '2020-04-16', 'thursday', 2, 1, 1, 13, 0x736466736466736466736466, 1, '2020-04-10 12:34:56', '2020-04-10 12:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `county_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `county_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `support_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`division_id`, `region_id`, `name`, `state`, `available`, `support_email`, `created_at`, `updated_at`) VALUES
(1, '1', 'Territoey1', 'SC', '20', 'rahul801210@gmail.com', NULL, NULL),
(2, '1', 'Territory2', 'SC', '20', 'biveshsharma1994@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_skype`
--

CREATE TABLE `email_skype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descp` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeid` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apptcond` longtext COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeid`, `fname`, `lname`, `email`, `level`, `division`, `apptcond`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'sprahul', 'Verma', 'er.rahulverma0@gmail.com', '2', '2', 'ACORDO DE NÃO CONCORRÊNCIA E NÃO SOLICITAÇÃO\r\n\r\nEsta seção irá definir os termos e condições de proteção que requeremos com relação a não competição e a não solicitação, que lhe são requeridos como condição para ser representante desta empresa.\r\n\r\n1. NÃO CONCORRÊNCIA:\r\n\r\nVocê concorda que não irá, sem consentimento prévio e por escrito da Neovora, a qualquer momento, durante o período que você estiver representando a empresa e por 1 ano após o término deste contrato de representação (seja ele encerrado por você ou pela Neovora, com ou sem quebra às regras deste Acordo), seja individualmente ou em conjunto com qualquer pessoa, como diretor, agente, funcionário, acionista (ou outra pessoa que possui ações listadas numa bolsa de valores dos EUA ou do Canadá, que não exceda 5 por cento das ações em circulação listadas) ou de qualquer outra maneira sendo parte interessada, emprestar dinheiro para garantir dívidas ou obrigações, ou permitir que o seu nome de qualquer maneira seja usado ou empregado por qualquer pessoa engajada ou preocupada com a descrição de aspectos do negócio, no qual o representante  esteja engajado na cidade onde você reside e num raio de 800 km.\r\n\r\nVocê concorda que as restrições definidas acima são razoáveis e válidas.\r\n\r\n2. NÃO CAPTAÇÃO DE CLIENTES:\r\n\r\nVocê concorda que não irá, sem consentimento prévio e por escrito da Neovora, a qualquer momento, durante o período que você estiver representando a empresa e por 1 ano após o término deste contrato (seja ele encerrado por você ou pela Neovora, com ou sem quebra às regras deste Acordo), seja individualmente ou através de pessoas jurídica ou em seu nome ou em nome de qualquer pessoa que seja concorrente ou que se esforce para ser, ou interferir numa negociação com qualquer pessoa que seja cliente da Neovora, na data do encerramento do seu contrato de representação, ou usar seu conhecimento pessoal ou influência sobre qualquer cliente para seu próprio benefício ou de qualquer pessoa que seja concorrente da Neovora.\r\n\r\n3. NÃO CONTRATAÇÃO DE EMPREGADOS:\r\n\r\nVocê concorda que não irá, sem o consentimento prévio e por escrito da Neovora,  a qualquer momento durante a duração do seu contrato como representante ou por um período de até 2 anos após o encerramento deste contrato (seja este encerrado por iniciativa sua ou da Neovora, com ou sem quebra dos termos deste contrato), seja individualmente, ou através de pessoa jurídica, ou ainda em nome de qualquer pessoa que seja concorrente ou trabalhe neste sentido, direta ou indiretamente, requerer emprego, ou tentar se manter como agente independente, a qualquer pessoa que seja funcionária da Neovora, na data de encerramento do seu contrato ou tenha sido funcionária da Neovora, em qualquer momento durante os 2 anos anteriores à data de encerramento do seu contrato.\r\n\r\nVocê também concorda que, caso receba contato de alguém que seja ou tenha sido funcionário da Neovora, no período mencionado acima, você não irá oferecer emprego nem contratá-lo como trabalhador ou agente independente por um período de 2 anos após o encerramento do seu contrato de representação.\r\n \r\n4. ACORDO PARA MODIFICAÇÃO DE CLÁUSULAS RESTRITIVAS:\r\n\r\nEnquanto as restrições nas seções 1, 2 e 3 são consideradas por você e pela Neovora como razoáveis em todas as circunstâncias no momento do Acordo, por meio deste, é mutualmente acordado que se uma ou mais restrições forem consideradas nulas por passarem o limite do razoável em todas as circunstâncias, para proteção dos interesses da Neovora, mas se estiverem válidas em parte do texto, ou, se parte do texto for excluído ou reduzido, ou ainda, a gama de atividades for reduzida no seu escopo, tais reduções devem ser consideradas, a fim de que os termos sejam validados e efetivados, sem afetar a validade de qualquer outra cláusula restrição contida neste Acordo.\r\n\r\n6. ACONSELHAMENTO LEGAL INDEPENDENTE:\r\n\r\nSe você tiver qualquer pergunta ou dúvida com relação a este acordo, você deve obter aconselhamento legal independente. Você confirma que irá buscar este aconselhamento e, caso não o faça, estará assumindo que você entendeu completamente os termos e condições aqui definidos e que concorda com eles.\r\n\r\n\r\nDECLARAÇÃO DO TITULAR DA POSIÇÃO\r\n\r\nSe você concorda com o que foi dito acima, por favor assine esta carta escrevendo seu nome na linha de Assinatura abaixo. Uma cópia deste acordo poderá ser encontrada nas suas configurações de conta na Neovora no Sistema de Gerenciamento de Funcionários (Neovora), sob o link “Home”.\r\n\r\nEu aceito as responsabilidades desta posição e concordo em produzir os resultados, executar o trabalho e atender aos padrões estabelecidos neste contrato.\r\n\r\n\r\nAssinado Eletronicamente:                          Data: 18/03/2020								', '', '2020-04-08 06:42:09', '2020-04-08 06:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `employeedivision`
--

CREATE TABLE `employeedivision` (
  `employeedivisionid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeelevel`
--

CREATE TABLE `employeelevel` (
  `employeelevelid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employeelevel`
--

INSERT INTO `employeelevel` (`employeelevelid`, `name`, `created_at`, `updated_at`) VALUES
(1, 'salesmanager', '2020-04-08 06:09:19', '2020-04-08 06:09:19'),
(2, 'salesperson', '2020-04-08 06:09:24', '2020-04-08 06:09:24'),
(3, 'hr', '2020-04-08 06:09:29', '2020-04-08 06:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `interviewer_notes`
--

CREATE TABLE `interviewer_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interviewer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interviewer_notes`
--

INSERT INTO `interviewer_notes` (`id`, `title`, `description`, `applicant_id`, `interviewer_id`, `created_at`, `updated_at`) VALUES
(1, 'Please provide NCK Code', 'sddfsdf', '1', '1', NULL, NULL),
(2, 'edrtdgd', 'sdfsdfsdfsdfsdf', '1', '1', '2020-04-09 09:58:40', NULL),
(3, 'edrtdgd', 'zsdgszdgasgasdg', '1', '1', '2020-04-10 02:00:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interviewer_reserved_time`
--

CREATE TABLE `interviewer_reserved_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviewstatus`
--

CREATE TABLE `interviewstatus` (
  `interviewstatusid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colorcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobPositionId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobPositionStepid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobPositionStepName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailSubject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EmailFromAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EmailFromAddressPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EmailFromName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `variables` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HTMLMessage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TextMessage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interviewstatus`
--

INSERT INTO `interviewstatus` (`interviewstatusid`, `name`, `colorcode`, `jobPositionId`, `jobPositionStepid`, `jobPositionStepName`, `emailSubject`, `EmailFromAddress`, `EmailFromAddressPass`, `EmailFromName`, `variables`, `HTMLMessage`, `TextMessage`, `created_at`, `updated_at`) VALUES
(1, 'scheduled', '#47d15e', '1', '1', 'Primeira entrevista', '', '', '', '', '', '', '', '2020-04-08 00:29:10', '2020-04-08 00:29:10'),
(2, 'scheduled', '#47d15e', '1', '2', 'Second entrevista', '', '', '', '', '', '', '', '2020-04-08 00:29:20', '2020-04-08 00:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobposition`
--

CREATE TABLE `jobposition` (
  `jobPositionId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` blob NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobposition`
--

INSERT INTO `jobposition` (`jobPositionId`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Representante Comercial', 0x4e2f41, 'N/A', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobpositionstep`
--

CREATE TABLE `jobpositionstep` (
  `jobPositionStepId` bigint(20) UNSIGNED NOT NULL,
  `jobPositionId` bigint(20) UNSIGNED NOT NULL,
  `stepno` int(11) NOT NULL,
  `stepname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timespan` int(11) NOT NULL,
  `desc` blob NOT NULL,
  `colorcode` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobpositionstep`
--

INSERT INTO `jobpositionstep` (`jobPositionStepId`, `jobPositionId`, `stepno`, `stepname`, `timespan`, `desc`, `colorcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Primeira entrevista', 30, 0x45737461207072696d6569726120656e747265766973746120676572616c6d656e7465206475726120656e7472652031352065203230206d696e75746f732c20656c612073657276652070617261206e6f7320636f6e68656365726d6f73206d656c686f722065207665726966696361726d6f73206120636f6d7061746962696c696461646520646f207365752070657266696c20636f6d2061206f706f7274756e69646164652e, 'N/A', 'N/A', NULL, NULL),
(2, 1, 2, 'Second entrevista', 20, 0x45737461207072696d6569726120656e747265766973746120676572616c6d656e7465206475726120656e7472652031352065203230206d696e75746f732c20656c612073657276652070617261206e6f7320636f6e68656365726d6f73206d656c686f722065207665726966696361726d6f73206120636f6d7061746962696c696461646520646f207365752070657266696c20636f6d2061206f706f7274756e69646164652e, 'N/A', 'N/A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `multi_county` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `state`, `state_name`, `city`, `county`, `zip`, `lat`, `long`, `region_id`, `division_id`, `multi_county`, `created_at`, `updated_at`) VALUES
(1, 'SC', 'Santa catrina', 'floranpolis', 'flora', '180010', '', '', '1', '1', '', NULL, NULL),
(2, 'SC', 'India', 'jammu', 'SC', '120010', '', '', '1', '2', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_13_113213_job_position_d_b', 1),
(4, '2019_03_18_081158_job_position_step', 1),
(5, '2019_03_19_075218_blacklist', 1),
(6, '2019_03_19_094830_add_employee', 1),
(7, '2019_03_19_101425_employee_level', 1),
(8, '2019_03_19_105801_employee_division', 1),
(9, '2019_03_27_102618_interviewer_db', 1),
(10, '2019_04_03_083214_interview_status', 1),
(11, '2019_06_05_051436_add_interviewer_jobpositions', 1),
(12, '2019_06_05_051716_add_interviewer_jobpositions_steps', 1),
(13, '2019_06_05_052433_blog', 1),
(14, '2019_06_05_052740_careers_questions', 1),
(15, '2019_06_05_052939_careers_steps_page', 1),
(16, '2019_06_05_053344_careers_users', 1),
(17, '2019_06_05_053856_category', 1),
(18, '2019_06_05_054049_interviewer_reserved_time', 1),
(19, '2019_06_05_054621_subcategory', 1),
(20, '2019_06_12_095911_sales_training_category', 1),
(21, '2019_06_12_095930_sales_training_database', 1),
(22, '2019_06_17_074435_recruitment_training_category', 1),
(23, '2019_06_17_080226_recruitment_training_database', 1),
(24, '2020_02_03_113810_email_skype', 1),
(25, '2020_03_25_103111_sales_manager_team', 1),
(26, '2020_03_25_123858_create_divisions_table', 1),
(27, '2020_03_25_124016_create_counties_table', 1),
(28, '2020_03_25_235443_create_regions_table', 1),
(29, '2020_03_27_061237_create_s_m_blogs_table', 1),
(30, '2020_03_28_111613_create_projects_table', 1),
(31, '2020_03_30_061235_create_prospects_table', 1),
(32, '2020_04_04_142135_create_locations_table', 1),
(33, '2020_04_09_123447_interviewer_notes', 2),
(34, '2020_04_10_060438_score', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prospects`
--

CREATE TABLE `prospects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commit_stage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commit_complete` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commit_schedule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commit_confirm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note_description` blob NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_training`
--

CREATE TABLE `recruitment_training` (
  `recruitment_training_id` bigint(20) UNSIGNED NOT NULL,
  `recruitment_training_category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `documents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_training_category`
--

CREATE TABLE `recruitment_training_category` (
  `recruitment_training_category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `region_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`, `created_at`, `updated_at`) VALUES
(1, 'South Brazil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_team`
--

CREATE TABLE `sales_team` (
  `teamid` bigint(20) UNSIGNED NOT NULL,
  `sales_person_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_person_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_person_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_person_skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_person_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assigned_manager_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_training`
--

CREATE TABLE `sales_training` (
  `sales_training_id` bigint(20) UNSIGNED NOT NULL,
  `sales_training_category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `documents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_training_category`
--

CREATE TABLE `sales_training_category` (
  `sales_training_category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(10) UNSIGNED NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scored_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques10` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques11` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques12` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques13` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques14` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques15` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques16` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques17` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques18` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques19` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques20` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques21` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques22` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques23` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques24` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `int_ques25` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `applicant_id`, `scored_by`, `score`, `int_ques1`, `int_ques2`, `int_ques3`, `int_ques4`, `int_ques5`, `int_ques6`, `int_ques7`, `int_ques8`, `int_ques9`, `int_ques10`, `int_ques11`, `int_ques12`, `int_ques13`, `int_ques14`, `int_ques15`, `int_ques16`, `int_ques17`, `int_ques18`, `int_ques19`, `int_ques20`, `int_ques21`, `int_ques22`, `int_ques23`, `int_ques24`, `int_ques25`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '0,10,7,7,7,7,7,7', 'Rahul', 'hgh', 'jh', 'jh', 'jkh', 'jk', 'j', 'j', 'j', 'j', 'j', 'j', 'jj', 'j', 'j', 'jj', 'j', 'j', 'j', 'j', 'j', 'j', 'jj', 'j', 'j', '2020-04-10 00:39:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sub_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `sub_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_m_blogs`
--

CREATE TABLE `s_m_blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `careersUserId` bigint(20) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `territory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume_folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docs_folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skypeid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manager_assign` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `careersUserId`, `fname`, `lname`, `email`, `email_verified_at`, `role`, `phone`, `city`, `state`, `zip`, `territory`, `gender`, `home_address`, `home_city`, `home_state`, `home_country`, `home_zip`, `business_address`, `business_city`, `business_state`, `business_country`, `business_zip`, `confirm`, `division_id`, `image`, `image_folder`, `resume`, `resume_folder`, `docs`, `docs_folder`, `password`, `skypeid`, `manager_assign`, `last_login`, `password_text`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Rahul', 'Verma', 'rahul801210@gmail.com', NULL, 'superadmin', '+917006950860', 'JAMMU', 'Please select', '180010', 'Territoey1', 'male', 'Hno30 sec6, Jawala ji colony Gangyal', 'Jammu', 'Jammu and Kashmir', 'India', '180010', '1995', 'JAMMU', 'Please select', 'India', '180010', 'Yes', '1', '', '', '', '', '', '', '$2y$10$7s7tIPRjpurRzuwUxYCUMuHzD88GiSFOEghlc5h0rTrFIXGoMXV.G', 'asdas', '0', '', '123456', 'WUcn8Mbh33nxSzLhCadHZRFT9wqJ3a3eyVBE1kclQB7xZB2xHpe5PV9GpVO1', '2020-04-08 00:26:57', '2020-04-08 02:06:32'),
(2, 0, 'Rahul', 'Verma', 'rahul@blackcapit.com', NULL, 'salesmanager', '+9170069450860', 'Jammu', 'Jammu and Kashmir', '120010', 'Territory2', 'male', 'Jawala ji colony Hno30 sec6 Gangyal, Jammu', 'Jammu', 'Jammu and Kashmir', 'India', '180010', '1995', 'Jammu', 'Jammu and Kashmir', 'India', '180010', 'Yes', '2', '', '', '', '', '', '', '$2y$10$kUAo9KPtZZoRAYZUZv00x.hqagQR7R4sPhjKUZGys08zjbWhEr3F6', 'asdas', '0', '', '123456', '6Vy7a1q1q77EQYZVWzqGBsXgqGZQOwdCA6mjADMhiORoeqPqAVaZy3rv3xpF', '2020-04-08 00:50:41', '2020-04-08 02:08:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addinterviewer`
--
ALTER TABLE `addinterviewer`
  ADD PRIMARY KEY (`addinterviewerid`);

--
-- Indexes for table `add_interviewer_jobpositions`
--
ALTER TABLE `add_interviewer_jobpositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_interviewer_jobpositions_steps`
--
ALTER TABLE `add_interviewer_jobpositions_steps`
  ADD PRIMARY KEY (`id_steps`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`blacklistid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_questions`
--
ALTER TABLE `careers_questions`
  ADD PRIMARY KEY (`questions_id`);

--
-- Indexes for table `careers_steps_page`
--
ALTER TABLE `careers_steps_page`
  ADD PRIMARY KEY (`step_id`);

--
-- Indexes for table `careers_users`
--
ALTER TABLE `careers_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`county_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `email_skype`
--
ALTER TABLE `email_skype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeid`);

--
-- Indexes for table `employeedivision`
--
ALTER TABLE `employeedivision`
  ADD PRIMARY KEY (`employeedivisionid`);

--
-- Indexes for table `employeelevel`
--
ALTER TABLE `employeelevel`
  ADD PRIMARY KEY (`employeelevelid`);

--
-- Indexes for table `interviewer_notes`
--
ALTER TABLE `interviewer_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviewer_reserved_time`
--
ALTER TABLE `interviewer_reserved_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviewstatus`
--
ALTER TABLE `interviewstatus`
  ADD PRIMARY KEY (`interviewstatusid`);

--
-- Indexes for table `jobposition`
--
ALTER TABLE `jobposition`
  ADD PRIMARY KEY (`jobPositionId`);

--
-- Indexes for table `jobpositionstep`
--
ALTER TABLE `jobpositionstep`
  ADD PRIMARY KEY (`jobPositionStepId`),
  ADD KEY `jobpositionstep_jobpositionid_foreign` (`jobPositionId`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment_training`
--
ALTER TABLE `recruitment_training`
  ADD PRIMARY KEY (`recruitment_training_id`);

--
-- Indexes for table `recruitment_training_category`
--
ALTER TABLE `recruitment_training_category`
  ADD PRIMARY KEY (`recruitment_training_category_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `sales_team`
--
ALTER TABLE `sales_team`
  ADD PRIMARY KEY (`teamid`);

--
-- Indexes for table `sales_training`
--
ALTER TABLE `sales_training`
  ADD PRIMARY KEY (`sales_training_id`);

--
-- Indexes for table `sales_training_category`
--
ALTER TABLE `sales_training_category`
  ADD PRIMARY KEY (`sales_training_category_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `s_m_blogs`
--
ALTER TABLE `s_m_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addinterviewer`
--
ALTER TABLE `addinterviewer`
  MODIFY `addinterviewerid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `add_interviewer_jobpositions`
--
ALTER TABLE `add_interviewer_jobpositions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `add_interviewer_jobpositions_steps`
--
ALTER TABLE `add_interviewer_jobpositions_steps`
  MODIFY `id_steps` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `blacklistid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `careers_questions`
--
ALTER TABLE `careers_questions`
  MODIFY `questions_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `careers_steps_page`
--
ALTER TABLE `careers_steps_page`
  MODIFY `step_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `careers_users`
--
ALTER TABLE `careers_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `county_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `division_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_skype`
--
ALTER TABLE `email_skype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employeedivision`
--
ALTER TABLE `employeedivision`
  MODIFY `employeedivisionid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeelevel`
--
ALTER TABLE `employeelevel`
  MODIFY `employeelevelid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `interviewer_notes`
--
ALTER TABLE `interviewer_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `interviewer_reserved_time`
--
ALTER TABLE `interviewer_reserved_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interviewstatus`
--
ALTER TABLE `interviewstatus`
  MODIFY `interviewstatusid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobposition`
--
ALTER TABLE `jobposition`
  MODIFY `jobPositionId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobpositionstep`
--
ALTER TABLE `jobpositionstep`
  MODIFY `jobPositionStepId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recruitment_training`
--
ALTER TABLE `recruitment_training`
  MODIFY `recruitment_training_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recruitment_training_category`
--
ALTER TABLE `recruitment_training_category`
  MODIFY `recruitment_training_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales_team`
--
ALTER TABLE `sales_team`
  MODIFY `teamid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_training`
--
ALTER TABLE `sales_training`
  MODIFY `sales_training_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_training_category`
--
ALTER TABLE `sales_training_category`
  MODIFY `sales_training_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sub_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_m_blogs`
--
ALTER TABLE `s_m_blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobpositionstep`
--
ALTER TABLE `jobpositionstep`
  ADD CONSTRAINT `jobpositionstep_jobpositionid_foreign` FOREIGN KEY (`jobPositionId`) REFERENCES `jobposition` (`jobPositionId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
