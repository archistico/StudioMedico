
CREATE TABLE `app` (
  `idapp` int(11) NOT NULL,
  `data` date NOT NULL,
  `fkorario` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `app` (`idapp`, `data`, `fkorario`, `nome`, `note`) VALUES
(2, '2017-03-15', 103, 'Pippo', ''),
(3, '2017-03-15', 105, 'Pluto', '');

ALTER TABLE `app`
  ADD PRIMARY KEY (`idapp`);

ALTER TABLE `app`
  MODIFY `idapp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
