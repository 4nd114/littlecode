# littlecode
Little code 
## How to install

```
composer require 4nd114/littlecode
```

```
config/app.php

Set Provider 
Andre\LittleCode\LittleCodeServiceProvider::class,
```

```
config/app.php

Set aliases 
'LittleCode' => Andre\LittleCode\Facades\LittleCode::class,
```
## Usage
```
validate Name
LittleCode::NameValidator("Andre Luiz");

```
```
validate Cpf
LittleCode::CpfValidator("483.439.531-69"); OR LittleCode::CpfValidator("48343953169");

```
```
validate Cnpj
LittleCode::CnpjValidator("80.037.333/0001-24"); OR LittleCode::CnpjValidator("80037333000124");

```
```
Find Cep
LittleCode::FindCep("35182514"); OR LittleCode::FindCep("35182-514");
```
