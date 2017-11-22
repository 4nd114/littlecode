<?php
namespace Andre\LittleCode;


class LittleCode
{

	//string functions 

	//function return only Letters A-Z
	public function NameValidator($value)
	{
		$value = str_replace(' ', '', $value);
		if (!ctype_alpha($value)) 
		{
  			return ['error' => 'true',
				'message' => ' just pass letters from A to Z'
			 ];
		}else
		{
			return true;
		}
	}
	public function CpfValidator($cpf)
	{
		$cpf = str_replace('.', '', $cpf);
		$cpf = str_replace('-', '', $cpf);
		if($cpf != preg_replace("/[^0-9]/", "", $cpf) or strlen($cpf)> 11 or strlen($cpf)< 11)
		{
			return
				[
					'error' => true,
					'message' => 'numero de cpf invalido'
				];

		}if (preg_match('/(\d)\1{10}/', $cpf))
		{
			return
				[
					'error' => true,
					'message' => 'numero de cpf invalido'
				];
		}else
		{   // Calcula os números para verificar se o CPF é verdadeiro
        	for ($t = 9; $t < 11; $t++) {
            	for ($d = 0, $c = 0; $c < $t; $c++)
            	{
                	$d += $cpf{$c} * (($t + 1) - $c);
            	}
 
            		$d = ((10 * $d) % 11) % 10;
 
           	 	if ($cpf{$c} != $d) 
            	{
                	return
					[
						'error' => true,
						'message' => 'numero de cpf invalido'
					];
            	}
        }
 
        return true;
    }
	}

	public function CnpjValidator($cnpj)
	{
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
		// Valida tamanho
	if (strlen($cnpj) != 14)
	{
		return
				[
					'error' => true,
					'message' => 'numero de CNPJ invalido'
				];
	}
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
	{
		return
				[
					'error' => true,
					'message' => 'numero de CNPJ invalido'
				];
	}
		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
		{
			$soma += $cnpj{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
	}
	//busca por cep ! ! 
	public function FindCep($cep)
	{
		$cep = str_replace('-', '', $cep);
		// verifica se foi passado apenas numeros de 0 a 9
		if($cep != preg_replace("/[^0-9]/", "", $cep) or strlen($cep)> 8 or strlen($cep)< 8)
		{
			return ['error' => true,
					'message' => 'numero de cep invalido'
		];

		}else
		{
			$cep = preg_replace("/[^0-9]/", "", $cep);
			$url = "http://viacep.com.br/ws/$cep/xml/";
			$xml = simplexml_load_file($url);
			$adress = $xml;
			return array(	
							'logradouro' => $adress->logradouro,
							'bairro' => $adress->bairro,
							'localidade' => $adress->localidade,
							'uf' => $adress->uf,

			 			);

		}
	}


}