<?php
	include_once("../model/Aviao.php");

	class AviaoDAO {
		//cadastra um aviao no bd recebe um objeto aviao o um objeto de conexao
		function cadastrar($aviao, $link) {
			$query = "INSERT INTO Aviao (prefixoAviao, modelo, fabricante, qtdAssentos) values ('".($aviao->getPrefixo())."','"
			.($aviao->getModelo())."','".($aviao->getFabricante())."',".($aviao->getQtdAssentos()).")";
			if(!mysqli_query($link, $query)) {
				die("ERRO! NÃO SALVOU OS DADOS.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>");
			}
			echo "DADOS SALVOS.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>";
		
		}
		
		//exclui um aviao do banco de dados
		function excluir($cod, $link) {
			$query = "DELETE FROM Aviao WHERE prefixoAviao='".($cod)."'";
			if(!mysqli_query($link, $query)) {
				die("ERRO. AVIAO NÃO EXCLUIDO.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>");
			}
			echo "AVIAO EXCLUIDO.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>";
		}
		
		//consulta um um aviao por prefixo e retorna o resultado da busca
		function consultar($cod, $link) {
			$query = "SELECT * FROM Aviao WHERE prefixoAviao='".($cod)."'";
			$result = mysqli_query($link, $query);
			if(!$result) {
				die("ERRO. AVIAO NÃO ENCONTRADO.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>");
			}
			return $result;
		}
		
		//consulta todos avioes no BD e retorna 
		function consultarTodos($link) {
			$query = "SELECT * FROM Aviao";
			$result = mysqli_query($link, $query);
			if(!$result) {
				die("ERRO. NENHUM AVIAO ENCONTRADO.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>");
			}

			return $result;
		}
		
		//faz update de um aviao no BD
		function alterar($aviao, $link) {
			$query = "UPDATE Aviao SET prefixoAviao='".($aviao->getPrefixo())."', modelo='".($aviao->getModelo())."', fabricante='".($aviao->getFabricante())."', qtdAssentos=".($aviao->getQtdAssentos())." WHERE prefixoAviao='".($aviao->getPrefixo())."'";
			if(!mysqli_query($link, $query)) {
				die("ERRO! NAO SALVOU OS DADOS.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>");
			}
			echo "DADOS SALVOS.<br /><br /><a href='./listarAviao.php'>VOLTAR</a>";
		}
	}
?>