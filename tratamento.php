<?php

$arquivo = 'export_some_products.csv';

importarCsv($arquivo);

function importarCsv($arquivo)
{
	//Mapeamento do arquivo .csv e conversão para string - armazenado na varável $alunos
	$produtos = array_map('str_getcsv', file($arquivo));

  $save = fopen('salvo.json', 'w');

	//Loop para coletar os dados dos alunos na planilha
	foreach ($produtos as $key => $produto) {
			//Condição para 'pular' a primeira linha da tabela
			if($key == 0)
			continue;
			//Aqui, define-se os dados que deseja 'filtrar' a partir da tabela CSV original
			$data = array(
				'store' => $produto[0],
				'websites' => $produto[1],
				'attibute_set' => $produto[2],
				'type' => $produto[3],
				'category_ids' => $produto[4],
	 		);
			//Grava os dados no arquivo que foi aberto
      $write = fwrite($save, json_encode($data));
	}
	//Fecha o arquivo e finaliza o procedimento
  fclose($save);
echo "Processamento de CSV finalizado!";
}
