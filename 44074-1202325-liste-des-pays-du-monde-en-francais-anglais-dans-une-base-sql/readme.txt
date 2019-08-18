Liste des pays du monde en français/anglais dans une base sql-------------------------------------------------------------
Url     : http://codes-sources.commentcamarche.net/source/44074-liste-des-pays-du-monde-en-francais-anglais-dans-une-base-sqlAuteur  : Joe_le_mortDate    : 04/08/2013
Licence :
=========

Ce document intitulé « Liste des pays du monde en français/anglais dans une base sql » issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis à disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fixées par la licence, tant que cette note
apparaît clairement.

Description :
=============

Pour tout ceux qui recherche la liste des pays du monde version fran&ccedil;aise
 et/ou anglaise pour leur d&eacute;veloppement, avec le code par pays pour une b
ase SQL ou un tableau PHP
<br /><a name='source-exemple'></a><h2> Source / Exem
ple : </h2>
<br /><pre class='code' data-mode='basic'>
CREATE TABLE `pays` (

  `rowid` int(11) NOT NULL auto_increment,
  `code` varchar(2) NOT NULL,
  `f
r` varchar(255) NOT NULL,
  `en` varchar(255) default NULL,
  PRIMARY KEY  (`r
owid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
</pre>
<br /><a name='conclusi
on'></a><h2> Conclusion : </h2>
<br />Pour me laisser un commentaire : <a href
='http://www.tuxboard.com/index.php/?2007/06/07/984-code-liste-des-pays-du-monde
-en-francais-anglais-dans-une-base-sql' target='_blank'>http://www.tuxboard.com/
index.php/?2007/06/07/984-code-liste-des-pays-du-monde-en-francais-anglais-dans-
une-base-sql</a>
