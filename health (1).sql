-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 19 2020 г., 18:52
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `health`
--

-- --------------------------------------------------------

--
-- Структура таблицы `BCP`
--

CREATE TABLE `BCP` (
  `ID_BCP` int(11) NOT NULL,
  `ID_pers` int(11) NOT NULL,
  `Main_PS` int(11) NOT NULL,
  `Req_per_day` int(15) NOT NULL,
  `Max_dur` int(5) NOT NULL,
  `peak_hour_phleb` int(10) NOT NULL,
  `peak_hour_nurse` int(10) NOT NULL,
  `peak_hour_tech` int(10) NOT NULL,
  `peak_hour_biol` int(10) NOT NULL,
  `peak_hour_sec` int(10) NOT NULL,
  `peak_hour_other` int(10) NOT NULL,
  `treat_reg` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `treat_la` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `treat_cent` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `treat_aliq` int(10) NOT NULL,
  `treat_exp` int(10) NOT NULL,
  `treat_other` int(10) NOT NULL,
  `valid_for_BCP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BCP_stagg_KPIs` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Or_and_form` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `BCP`
--

INSERT INTO `BCP` (`ID_BCP`, `ID_pers`, `Main_PS`, `Req_per_day`, `Max_dur`, `peak_hour_phleb`, `peak_hour_nurse`, `peak_hour_tech`, `peak_hour_biol`, `peak_hour_sec`, `peak_hour_other`, `treat_reg`, `treat_la`, `treat_cent`, `treat_aliq`, `treat_exp`, `treat_other`, `valid_for_BCP`, `BCP_stagg_KPIs`, `Or_and_form`) VALUES
(1, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, 'yes', 'no', 'yes', 0, 0, 0, '', 'no', 'OF'),
(2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, '', '', ''),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, '', '', ''),
(4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, '', '', ''),
(5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, '', '', ''),
(6, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `IT_DM`
--

CREATE TABLE `IT_DM` (
  `ID_it` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Basic_IT_sup` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Basic_IT_sup_num` int(15) NOT NULL,
  `Sys_adm` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Sys_adm_num` int(15) NOT NULL,
  `Par_of_assays` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Par_of_assays_num` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Abbott` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Beck_coulter` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Roche` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Siemens` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Auto_app` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Other_IS` text COLLATE utf8_unicode_ci NOT NULL,
  `BI_eng` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BI_eng_num` int(5) NOT NULL,
  `Data_sup_IT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Data_sup_IT_num` int(5) NOT NULL,
  `Med_stat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Med_stat_num` int(5) NOT NULL,
  `Data_Science` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Data_Science_num` int(5) NOT NULL,
  `Other_DM` text COLLATE utf8_unicode_ci NOT NULL,
  `Sys_dev_in_house` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Written_IT_plan_KPIs` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Corp_data_warehouse` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `DW_spec_LIS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `DW_spec_Mid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `DW_spec_Inv` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `DW_spec_other` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Master_data_man_sol` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Auto_rep` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `AR_spec_LIS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `AR_spec_Mid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `AR_spec_Inv` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `AR_spec_other` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `KPI_mo_rools` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `KPI_spec_Cost` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `KPI_spec_TTR` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `KPI_spec_Quality` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `KPI_spec_Other` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ext_data_for_one` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `HERA_RGPD` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `IT_DM`
--

INSERT INTO `IT_DM` (`ID_it`, `ID_user`, `Basic_IT_sup`, `Basic_IT_sup_num`, `Sys_adm`, `Sys_adm_num`, `Par_of_assays`, `Par_of_assays_num`, `Abbott`, `Beck_coulter`, `Roche`, `Siemens`, `Auto_app`, `Other_IS`, `BI_eng`, `BI_eng_num`, `Data_sup_IT`, `Data_sup_IT_num`, `Med_stat`, `Med_stat_num`, `Data_Science`, `Data_Science_num`, `Other_DM`, `Sys_dev_in_house`, `Written_IT_plan_KPIs`, `Corp_data_warehouse`, `DW_spec_LIS`, `DW_spec_Mid`, `DW_spec_Inv`, `DW_spec_other`, `Master_data_man_sol`, `Auto_rep`, `AR_spec_LIS`, `AR_spec_Mid`, `AR_spec_Inv`, `AR_spec_other`, `KPI_mo_rools`, `KPI_spec_Cost`, `KPI_spec_TTR`, `KPI_spec_Quality`, `KPI_spec_Other`, `Ext_data_for_one`, `HERA_RGPD`) VALUES
(4, 3, 'no dedicated person', 0, 'outsource', 0, 'both', '', 'no', 'no', 'no', 'no', 'we don', 'фыв', 'no dedicated person', 0, 'no dedicated person', 0, 'no dedicated person', 0, 'no dedicated person', 0, '$row[22]', 'other', 'no', 'no', 'no', 'no', 'no', '$row[29]', 'no', 'no', 'no', 'no', 'no', '$row[35]', 'no', 'no', 'no', 'no', '$row[40]', 'no', 'none');

-- --------------------------------------------------------

--
-- Структура таблицы `ListOfSys`
--

CREATE TABLE `ListOfSys` (
  `ID_LoS` int(11) NOT NULL,
  `ID_pers` int(11) NOT NULL,
  `name_LoS` text COLLATE utf8_unicode_ci NOT NULL,
  `Type_LoS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Vend_web_LoS` text COLLATE utf8_unicode_ci NOT NULL,
  `Sub_by_LoS` text COLLATE utf8_unicode_ci NOT NULL,
  `Inst_s_LoS` text COLLATE utf8_unicode_ci NOT NULL,
  `Dep_LoS` text COLLATE utf8_unicode_ci NOT NULL,
  `Users_LoS` text COLLATE utf8_unicode_ci NOT NULL,
  `Date_of_inst_LoS` date NOT NULL,
  `Date_of_end_cont_LoS` date NOT NULL,
  `Add_LoS` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ListOfSys`
--

INSERT INTO `ListOfSys` (`ID_LoS`, `ID_pers`, `name_LoS`, `Type_LoS`, `Vend_web_LoS`, `Sub_by_LoS`, `Inst_s_LoS`, `Dep_LoS`, `Users_LoS`, `Date_of_inst_LoS`, `Date_of_end_cont_LoS`, `Add_LoS`) VALUES
(1, 3, '123', '21', '32', '', '', '', '', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Структура таблицы `PS`
--

CREATE TABLE `PS` (
  `ID_PS` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `name_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `Routine_PS_per` int(11) NOT NULL,
  `Urgent_PS_per` int(11) NOT NULL,
  `ProdLoc_PS_per` int(11) NOT NULL,
  `InsInt_PS_per` int(11) NOT NULL,
  `InsExt_PS_per` int(11) NOT NULL,
  `Outsource_PS_per` int(11) NOT NULL,
  `Location_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Work_DpY_PS` int(11) NOT NULL,
  `Work_HpW` int(11) NOT NULL,
  `Num_req_av_PS` int(11) NOT NULL,
  `Num_tes_av_PS` int(11) NOT NULL,
  `Num_primetubes_av_PS` int(11) NOT NULL,
  `Space_PS` int(11) NOT NULL,
  `Automation_PS` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `tt_num_tech_p_shift_max_PS` int(11) NOT NULL,
  `tt_tech_work_hour_per_week_PS` int(11) NOT NULL,
  `tt_num_val_bios_max_per_shift_PS` int(11) NOT NULL,
  `tt_val_bios_work_hour_per_week_PS` int(11) NOT NULL,
  `tech_valid_result_PS` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sup_chemistry_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `sup_spec_chemistry_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `sup_immuno_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `sup_spec_immuno_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `sup_hema_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `sup_coag_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `sup_serology_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `cpr_chemistry_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpr_spec_chemistry_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpr_immuno_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpr_spec_immuno_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpr_hema_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpr_coag_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpr_serology_PS` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `an_name_chemistry_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `an_name_spec_chemistry_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `an_name_immuno_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `an_name_spec_immuno_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `an_name_hema_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `an_name_coag_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `an_name_serology_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `an_num_chemistry_PS` int(11) NOT NULL,
  `an_num_spec_chemistry_PS` int(11) NOT NULL,
  `an_num_immuno_PS` int(11) NOT NULL,
  `an_num_spec_immuno_PS` int(11) NOT NULL,
  `an_num_hema_PS` int(11) NOT NULL,
  `an_num_coag_PS` int(11) NOT NULL,
  `an_num_serology_PS` int(11) NOT NULL,
  `osd_name_microbiology_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `osd_name_molecul_meth_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `osd_name_hist_cit_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `osd_name_other_PS` text COLLATE utf8_unicode_ci NOT NULL,
  `osd_num_microbiology_PS` int(11) NOT NULL,
  `osd_num_mol_meth_PS` int(11) NOT NULL,
  `osd_num_hist_cit_PS` int(11) NOT NULL,
  `osd_num_other_PS` int(11) NOT NULL,
  `ss_hospitals_PS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ss_private_clinics_PS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ss_spec_off_PS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ss_home_visits_PS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ss_pharm_PS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ss_ext_nur_PS` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ss_other_PS` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `PS`
--

INSERT INTO `PS` (`ID_PS`, `ID_user`, `name_PS`, `Routine_PS_per`, `Urgent_PS_per`, `ProdLoc_PS_per`, `InsInt_PS_per`, `InsExt_PS_per`, `Outsource_PS_per`, `Location_PS`, `Work_DpY_PS`, `Work_HpW`, `Num_req_av_PS`, `Num_tes_av_PS`, `Num_primetubes_av_PS`, `Space_PS`, `Automation_PS`, `tt_num_tech_p_shift_max_PS`, `tt_tech_work_hour_per_week_PS`, `tt_num_val_bios_max_per_shift_PS`, `tt_val_bios_work_hour_per_week_PS`, `tech_valid_result_PS`, `sup_chemistry_PS`, `sup_spec_chemistry_PS`, `sup_immuno_PS`, `sup_spec_immuno_PS`, `sup_hema_PS`, `sup_coag_PS`, `sup_serology_PS`, `cpr_chemistry_PS`, `cpr_spec_chemistry_PS`, `cpr_immuno_PS`, `cpr_spec_immuno_PS`, `cpr_hema_PS`, `cpr_coag_PS`, `cpr_serology_PS`, `an_name_chemistry_PS`, `an_name_spec_chemistry_PS`, `an_name_immuno_PS`, `an_name_spec_immuno_PS`, `an_name_hema_PS`, `an_name_coag_PS`, `an_name_serology_PS`, `an_num_chemistry_PS`, `an_num_spec_chemistry_PS`, `an_num_immuno_PS`, `an_num_spec_immuno_PS`, `an_num_hema_PS`, `an_num_coag_PS`, `an_num_serology_PS`, `osd_name_microbiology_PS`, `osd_name_molecul_meth_PS`, `osd_name_hist_cit_PS`, `osd_name_other_PS`, `osd_num_microbiology_PS`, `osd_num_mol_meth_PS`, `osd_num_hist_cit_PS`, `osd_num_other_PS`, `ss_hospitals_PS`, `ss_private_clinics_PS`, `ss_spec_off_PS`, `ss_home_visits_PS`, `ss_pharm_PS`, `ss_ext_nur_PS`, `ss_other_PS`) VALUES
(1, 3, '123', 1, 0, 0, 0, 0, 0, 'Inside Hospital', 0, 0, 0, 0, 0, 0, 'none', 0, 0, 0, 0, 'none', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 'no', 'no', 'no', 'no', 'no', 'no', ''),
(2, 3, '', 0, 0, 0, 0, 0, 0, 'Outside Hospital', 0, 0, 0, 0, 0, 0, 'none', 0, 0, 0, 0, 'none', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', 'non CPR', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 'no', 'no', 'no', 'no', 'no', 'no', ''),
(3, 3, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', ''),
(4, 3, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', ''),
(5, 3, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', ''),
(6, 3, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', ''),
(7, 3, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', ''),
(8, 3, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `Tests`
--

CREATE TABLE `Tests` (
  `ID_test` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_PS` int(11) NOT NULL,
  `Name_of_assay` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `Cat_num` int(10) NOT NULL,
  `Vol_per_m` int(20) NOT NULL,
  `Analizer` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Tests`
--

INSERT INTO `Tests` (`ID_test`, `ID_user`, `ID_PS`, `Name_of_assay`, `Cat_num`, `Vol_per_m`, `Analizer`) VALUES
(1, 3, 1, '123', 4, 0, ''),
(2, 3, 0, '', 0, 0, ''),
(3, 3, 1, '123123', 123, 1231, 'qweqwe');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_pers` int(11) NOT NULL,
  `login` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `num_PS` int(5) NOT NULL DEFAULT '-1',
  `num_BCP` int(9) NOT NULL DEFAULT '-1',
  `role` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_pers`, `login`, `password`, `mail`, `num_PS`, `num_BCP`, `role`) VALUES
(3, 'usertest1', 'UserTest', '', 1, 2, 10),
(4, 'admintest1', 'AdminTest', '', 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `BCP`
--
ALTER TABLE `BCP`
  ADD PRIMARY KEY (`ID_BCP`),
  ADD KEY `Main_PS` (`Main_PS`),
  ADD KEY `ID_pers` (`ID_pers`);

--
-- Индексы таблицы `IT_DM`
--
ALTER TABLE `IT_DM`
  ADD PRIMARY KEY (`ID_it`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Индексы таблицы `ListOfSys`
--
ALTER TABLE `ListOfSys`
  ADD PRIMARY KEY (`ID_LoS`),
  ADD KEY `ID_pers` (`ID_pers`);

--
-- Индексы таблицы `PS`
--
ALTER TABLE `PS`
  ADD PRIMARY KEY (`ID_PS`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Индексы таблицы `Tests`
--
ALTER TABLE `Tests`
  ADD PRIMARY KEY (`ID_test`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pers`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `BCP`
--
ALTER TABLE `BCP`
  MODIFY `ID_BCP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `IT_DM`
--
ALTER TABLE `IT_DM`
  MODIFY `ID_it` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `ListOfSys`
--
ALTER TABLE `ListOfSys`
  MODIFY `ID_LoS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `PS`
--
ALTER TABLE `PS`
  MODIFY `ID_PS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `Tests`
--
ALTER TABLE `Tests`
  MODIFY `ID_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_pers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `BCP`
--
ALTER TABLE `BCP`
  ADD CONSTRAINT `bcp_ibfk_1` FOREIGN KEY (`ID_pers`) REFERENCES `user` (`id_pers`);

--
-- Ограничения внешнего ключа таблицы `IT_DM`
--
ALTER TABLE `IT_DM`
  ADD CONSTRAINT `it_dm_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`id_pers`);

--
-- Ограничения внешнего ключа таблицы `ListOfSys`
--
ALTER TABLE `ListOfSys`
  ADD CONSTRAINT `listofsys_ibfk_1` FOREIGN KEY (`ID_pers`) REFERENCES `user` (`id_pers`);

--
-- Ограничения внешнего ключа таблицы `PS`
--
ALTER TABLE `PS`
  ADD CONSTRAINT `ps_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`id_pers`);

--
-- Ограничения внешнего ключа таблицы `Tests`
--
ALTER TABLE `Tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`id_pers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
